<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    function add(Request $request){

        //Post API that Accetpt 3 parameters
        $test = new Test;
        $test -> name = $request -> input('name');
        $test -> email = $request -> input('email');
        $test -> ip_address = $request -> input('ip_address');

        
        $result = $test->save();
        if($result){
            return response()->json(['Message' => 'Data Sucessfully Added'],200);
        }
        else{
            return response()->json(['Message' => 'Something went wrong.'],401);
        }
    }

    function show(){
        
        //Get API that returns name, email, country, city of all users
        $users = Test::whereNotNull('name')
            ->whereNotNull('email')
            ->whereNotNull('country')
            ->whereNotNull('city')
            ->get(['name','email','country','city']);
        
        return response()->json(['users'=>$users], 200);
    }

    function showById($id){

        //Get API that returns name, email, country, city by using id parameter.
        $usersId = Test::find($id);
        $usersData = Test::select('name','email','country','city')->where('id', $id)->get();  
        if($usersId){
            return response()->json(['users'=>$usersData], 200);
        }
        else{
            return response()->json(['Message'=> 'No record found.'], 401);
        }
   
    }
}
