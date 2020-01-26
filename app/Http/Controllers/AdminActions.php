<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Wilgucki\Csv\Facades\Reader as CsvReader;
use Wilgucki\Csv\Facades\Writer as CsvWriter;

class AdminActions extends Controller {

  public function getOptions() {
    $reader = CsvReader::open('storage/app/options.csv');
    $allLines = $reader->readAll();
    $allOptions = [];
    foreach ($allLines as $key => $value) {
      array_push($allOptions, [
        'title' => $value[0],
        'description' => $value[1],
        'percent' => $value[2],
        'old_price' => $value[3],
        'new_price' => $value[4],
      ]);
    }
    return response()->json($allOptions);
  }

  public function saveOptions(Request $request) {
    $data = $request->all();
    if ($data) {
      $writer = CsvWriter::create('storage/app/options.csv');
      $writer->writeLine($data);
      $writer->close();

      return response()->json([
        'response' => true
      ]);
    } else {
      return response()->json([
        'response' => false
      ]);
    }
  }

  public function getOrders() {
    $reader = CsvReader::open('storage/app/orders.csv');
    $allLines = $reader->readAll();
    $allOrders = [];
    foreach ($allLines as $key => $value) {
      array_push($allOrders, [
        'id' => $key + 1,
        'form' => $value[0],
        'name' => $value[1],
        'phone' => $value[2],
        'timestamp' => $value[3],
        'ip' => $value[4],
        'location' => $value[5],
        'state' => $value[6],
      ]);
    }
    return response()->json($allOrders);
  }

  public function getAllOrdersAsArray() {
    $reader = CsvReader::open('storage/app/orders.csv');
    $allLines = $reader->readAll();
    $allOrders = [];
    foreach ($allLines as $key => $value) {
      array_push($allOrders, [
        'form' => $value[0],
        'name' => $value[1],
        'phone' => $value[2],
        'timestamp' => $value[3],
        'ip' => $value[4],
        'location' => $value[5],
        'state' => $value[6],
      ]);
    }
    return $allOrders;
  }

  public function setOrderState(Request $request) {
    $id = $request->input('id') - 1;
    $action = $request->input('action');

    if ($id !== null && $action !== null) {
      $allOrders = $this->getAllOrdersAsArray();
      switch ($action) {

      case 'successed':
        $allOrders[$id]['state'] = 1;
        $writer = CsvWriter::create('storage/app/orders.csv');
        $writer->writeAll($allOrders);
        $writer->close();
        return response()->json([
          'response' => true
        ]);
        break;

      case 'canceled':
        $allOrders[$id]['state'] = -1;
        $writer = CsvWriter::create('storage/app/orders.csv');
        $writer->writeAll($allOrders);
        $writer->close();
        return response()->json([
          'response' => true
        ]);
        break;

      case 'discard':
        $allOrders[$id]['state'] = 0;
        $writer = CsvWriter::create('storage/app/orders.csv');
        $writer->writeAll($allOrders);
        $writer->close();
        return response()->json([
          'response' => true
        ]);
        break;

      case 'delete':
        unset($allOrders[$id]);
        $writer = CsvWriter::create('storage/app/orders.csv');
        $writer->writeAll($allOrders);
        $writer->close();
        return response()->json([
          'response' => true
        ]);
        break;

      default:
        return response()->json([
          'response' => false,
          'error' => 'Action not found'
        ]);
        break;
      }
    } else {
      return response()->json([
        'response' => false,
      ]);
    }
  }
}
