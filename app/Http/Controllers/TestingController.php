<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;

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

public function createProduct(){
  $user = User::findOrFail(3);
  $no = rand(10, 99);
  $product = new Product(
    ['name'=>'Automated product ' . $no
    ,'content'=>$no
    ,'price'=>$no
    ,'barcode'=> $no*$no+$no
  ]

  );


  $user->products()->save($product);

  return redirect('/home');

}


}
