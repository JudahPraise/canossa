<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AnnouncementNotification;

class AnnouncementController extends Controller
{
    public function index(){

        $announcements = Announcement::all();       
        return view('admin.announcements.index', compact('announcements', $announcements));

    }

    public function store(Request $request){

        $announcement = new Announcement();

        $announcement->announcement_title = $request->input('announcement_title');
        $announcement->affected_employees = $request->input('affected_employees');
        $announcement->date_from = $request->input('date_from');
        $announcement->time_from = $request->input('time_from');
        $announcement->date_to = $request->input('date_to');
        $announcement->time_to = $request->input('time_to');
        $announcement->announcement_description = $request->input('announcement_description');
        $announcement->link = $request->input('link');

        if($request->hasFile('attachment')){

            $file = $request->file('attachment');
            $filename = $file->getClientOriginalName();
            $request->attachment->storeAs('attachments', $filename, 'public');
            $announcement->attachment = $filename;

        }
        
        if($request->affected_employees = 'All'){
            $employee = User::all();
        }
        else{
            $employee = User::where('role','=',$announcement->affected_employees)->get();
        }
        
        $announcement->save();
        Notification::send($employee, new AnnouncementNotification(Announcement::latest('id')->first()));

        return redirect()->route('announcement.index');

    }

    public function update(Request $request){

        $announcement = Announcement::where('id','=',$request->input('id'))->first();

        $announcement->announcement_title = $request->input('announcement_title');
        $announcement->affected_employees = $request->input('affected_employees');
        $announcement->date_from = $request->input('date_from');
        $announcement->time_from = $request->input('time_from');
        $announcement->date_to = $request->input('date_to');
        $announcement->time_to = $request->input('time_to');
        $announcement->announcement_description = $request->input('announcement_description');
        $announcement->link = $request->input('link');

        if($request->hasFile('attachment')){

            $file = $request->file('attachment');
            $filename = $file->getClientOriginalName();
            $request->attachment->storeAs('attachments', $filename, 'public');
            $announcement->attachment = $filename;

        }
        
        $announcement->update();

        return redirect()->route('announcement.index');

    }

    public function delete($id){

        $announcement = Announcement::where('id','=',$id)->first();
        $announcement->delete();
        $notification = DB::table('notifications')->where('data->announcement->id','=',$id)->delete();
        return redirect()->route('announcement.index');

    }
}
