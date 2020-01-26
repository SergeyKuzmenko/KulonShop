<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use \Carbon\Carbon;

class ShopApi extends Controller {

  public function newOrder(Request $request, Carbon $carbon) {
    $data = [
      'form' => $request->input('form'),
      'name' => $request->input('name'),
      'phone' => $request->input('phone'),
      'timestamp' => $carbon->now()->format('d.m.Y') . ' ' . $carbon->now()->format('H:i:s'),
      'ip' => $request->ip(),
      'location' => $this->getLocation($request->ip()),
      'state' => 0,
    ];

    if ($data['form'] !== null && $data['name'] !== null && $data['phone'] !== null) {
      $this->saveOrders($data);
      return $this->sendMessage($data);
    } else {
      return response()->json([
        'response' => false,
        'error_code' => 1,
        'error_description' => 'Not enough parameters',
      ]);
    }
  }

  private function getLocation($ip = '127.0.0.1') {
    $apiKey = env('IPGEOLOCATION_KEY', false);
    $IpGeolocation = $this->getIpGeolocation($apiKey, $ip, 'ru');
    $decodedLocation = json_decode($IpGeolocation, true);
    if (!isset($decodedLocation['message'])) {
      $location = '' . $decodedLocation['country_name'] . ', ' . $decodedLocation['city'] . ', ' . $decodedLocation['district'] . '';
      return $location;
    } else {
      $location = "Неизвестно";
      return $location;
    }
  }

  private function getIpGeolocation($apiKey, $ip, $lang = 'ru') {
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey=$apiKey&ip=$ip&lang=$lang";
    $cURL = curl_init();

    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Accept: application/json',
    ));
    return curl_exec($cURL);
  }

  private function sendMessage($data) {
    if (env('APP_ENV') == 'production') {
      $chatIds = ['134791860', '624549483', '510926083'];
    } else {
      $chatIds = ['134791860'];
    }
    $messagesIds = [];
    $location = $this->getLocation($data['ip']);
    foreach ($chatIds as $chatId) {
      $response = Telegram::sendMessage([
        'chat_id' => $chatId,
        'parse_mode' => 'html',
        'text' => '
<b>🔥 Новый заказ 🔥</b>
<b>Имя:</b> ' . $data['name'] . '
<b>Телефон:</b> ' . $data['phone'] . '
<b>Дата:</b> ' . $data['timestamp'] . '
<b>Форма:</b> ' . $data['form'] . '
<b>IP:</b> ' . $data['ip'] . '
<b>Местоположение:</b> ' . $data['location'] . '
',
      ]);
      array_push($messagesIds, $response->getMessageId());
    }
    $messageId = $response->getMessageId();
    if ($messageId) {
      return response()->json([
        'response' => true,
      ]);
    } else {
      return response()->json([
        'response' => false,
      ]);
    }
  }

  private function saveOrders($data) {
    $fp = fopen('storage/app/orders.csv', 'a');
    fputcsv($fp, $data);
    fclose($fp);
  }
}