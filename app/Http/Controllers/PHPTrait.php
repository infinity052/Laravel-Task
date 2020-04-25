<?php

namespace App\Http\Controllers;
use App\ATGModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Log;

class PHPTrait extends Controller
{
   

    
    public function store(Request $request){
        
       $validatedData = $request->validate([
           'name'=>['required','unique:myatg','max:255'],
           'email'=>['required','unique:myatg','email:rfc,dns'],
           'pincode'=>['required','unique:myatg','digits:6']
       ]);
       $accountValid = true;
       try{
        $this->sendMail($request->email);
       
       }
       catch(\Exception $e){
           $accountValid = false; 
           
       }
       if($accountValid) {
        Log::debug('Email sent');
           ATGModel::create($request->all());
           return view('success');
    }
     else{
         return view('failure',['message'=>'The email account entered is invalid. Please enter a valid email address to store data']);
     }   

    } 
    public function sendMail($emailid){
        
        Mail::to($emailid)->send(new SendMail());
    }
}
