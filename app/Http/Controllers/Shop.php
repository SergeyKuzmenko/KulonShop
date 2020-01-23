<?php

namespace App\Http\Controllers;
use Wilgucki\Csv\Facades\Reader as CsvReader;

use Illuminate\Http\Request;

class Shop extends Controller
{
    public function index()
    {
    	return view('main', $this->getOptions());
    }

    private function getOptions()
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
	    return $allOptions[0];
	  }
}
