<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Wilgucki\Csv\Facades\Reader as CsvReader;
use Wilgucki\Csv\Facades\Writer as CsvWriter;

class AdminActions extends Controller {
  public function index() {
    # code...
  }

  public function getOptions()
  {
  	$reader = CsvReader::open('storage/app/options.csv');
    $allLines = $reader->readAll();
    $allOptions = [];
    foreach ($allLines as $key => $value) {
      array_push($allOptions, [
        'title' => $value[0],
        'description' => $value[1],
        'percent' => $value[2],
        'old_price' => $value[3],
        'new_price' => $value[4]
      ]);
    }
    return response()->json($allOptions);
  }

  public function saveOptions(Request $request)
  {
  	$data = $request->all();
  	if ($data) {
  		unset($data['_token']);
  		
  		$writer = CsvWriter::create('storage/app/options.csv');
  		$writer->writeLine($data);
  		$writer->close();

  		return response()->json([
        'response' => true,
        'data' => $data
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
      ]);
    }
    return response()->json($allOrders);
  }
}
