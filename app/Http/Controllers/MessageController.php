<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function send(Request $request){

        $message = new Message();
        if(Auth::guard('admin')->check()){
            $message->sender_image = Auth::guard('admin')->user()->image;
            $message->sender = Auth::guard('admin')->user()->name;
        }elseif(Auth::guard('web')->check()){
            $message->sender_image = Auth::guard('web')->user()->image;
            $message->sender = Auth::guard('web')->user()->name;
        }
        $message->send_to = $request->input('send_to');
        $message->send_to_all = $request->input('send_to_all');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');

        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $filename = $file->getClientOriginalName();
            $request->attachment->storeAs('attachments', $filename, 'public');
            $message->attachment = $filename;
        }

        if($request->filled('send_to')){

            if($request->send_to === 'Admin'){
                $employee = Admin::all();
            }else{
                $employee = User::where('name','=',$message->send_to)->first();
            }

        }elseif($request->send_to_all === 'All'){

            $employee = User::all();

        }else{

            $employee = User::where('role','=',$message->send_to_all)->get();

        }

        $message->save();
        Notification::send($employee, new MessageNotification(Message::latest('id')->first()));
        return redirect()->back();

    }

    public function reply(Request $request){

        $message = new Message();

        if(Auth::guard('admin')->check()){
            $message->sender_image = Auth::guard('admin')->user()->image;
            $message->sender = Auth::guard('admin')->user()->name;
        }elseif(Auth::guard('web')->check()){
            $message->sender_image = Auth::guard('web')->user()->image;
            $message->sender = Auth::guard('web')->user()->name;
        }
        $message->send_to = $request->input('send_to');
        $message->send_to_all = $request->input('send_to_all');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');

        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $filename = $file->getClientOriginalName();
            $request->attachment->storeAs('attachments', $filename, 'public');
            $message->attachment = $filename;
        }

        if($request->filled('send_to')){

            if($request->send_to === 'Admin'){
                $employee = Admin::all();
            }else{
                $employee = User::where('name','=',$message->send_to)->first();
            }

        }

        $message->save();
        Notification::send($employee, new MessageNotification(Message::latest('id')->first()));
        return redirect()->back();

    }
}
