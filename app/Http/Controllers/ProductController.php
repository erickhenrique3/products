<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function teste(Request $request){
       $name = $request->input ('name');
       $age = $request->input('age');
       

       
   

    return "Meu nome é   $name   e tenho  $age   anos";
    // return $request->all();


   }
}
