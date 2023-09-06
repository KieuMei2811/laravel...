<?php

namespace App\Http\Controllers;

use App\Mail\DemoEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
   // public function store(Request $request){
   //    //   User::create($request->all());
      
   //      Mail::to("luc.phan24@student.passerellesnumeriques.org")->send(new DemoEmail($request->CV));
   //      return $request;
   // }

   public function sent_email_basic()
{
   $data["email"] = "aatmaninfotech@gmail.com";
   $data["title"] = "From ItSolutionStuff.com";
   $data["body"] = "This is Demo";

   $pdf = PDF::loadView('emails.myTestMail', $data);

   Mail::send([], [], function ($message) use ($data, $pdf) {
      $message->to($data["email"], $data["email"])
         ->subject($data["title"])
         ->attachData($pdf->output(), 'text.pdf');
   });
}


}


