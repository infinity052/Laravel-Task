<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\ATGModel;

class WebServicesController extends Controller
{
    public function store($request){

     
    }
    
    public function sendMail($emailid){
        
        Mail::to($emailid)->send(new SendMail());
    }


    public function toArray(Request $request)
    { 
        
       $status = 0;
       $rules = [
        'name'=>['required','unique:myatg','max:255'],
        'email'=>['required','unique:myatg','email:rfc,dns'],
        'pincode'=>['required','unique:myatg','digits:6']
    ];
    $validator = \Validator::make($request->all(),$rules);
    if($validator->fails()){
        return ['status'=>0,'message'=>$validator->errors()];
    }
    $accountValid = true;
    // try{
    // $this->sendMail($request->email);
    // }catch(\Exception $e){
    //     Log::debug($e);
    //     $accountValid = false; 
    // }
    if($accountValid) {
        Log::debug('Email Sent');
        ATGModel::create($request->all());
        $status = 1;  
 }
  else{
      $status =  0;
  }   
        
       if($status){
        return [
            'status'=>1,
            'message'=>'Your data has been successfully saved'
        ];
       }else{
           return [
        'status'=>0,
        'message'=>['email'=>'Invalid Email Address, Please enter a valid email address to store data']];
       }
       
    }
}
