<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Product;

class TestingController extends Controller
{
    public function index(){

    	//$data = DB::table('products')->paginate(4);
    	$data = Product::orderBy('created_at', 'desc')->paginate(5);

        //return view('testing.pagination', ['data'=> $data]);
        $detail = Product::find(73)->productDetails();
        //return $detail;
        foreach ($detail as $d){
            return $d;
        }
    }
}
