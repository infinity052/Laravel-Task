<?php

namespace App\Http\Controllers;
use App\ATGModel;
use Illuminate\Http\Request;

class ATGController extends Controller
{

    public function store(Request $request){
        
       $validatedData = $request->validate([
           'name'=>['required','max:255',],
           'email'=>['required','email:rfc,dns'],
           'pincode'=>['required','digits:6']
       ]);
        ATGModel::create($request->all());
        return view('success');

    }
}
