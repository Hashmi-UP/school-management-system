<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Attendance;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lectures;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\New_;

class TeacherController extends Controller
{

    public function login()
    {
        return view("auth.teacherlogin");
    }

    public function logout()
    {
        Session()->pull('TeacherloginId');
        return redirect('teacherlogin');
    }

    public function teacherlogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:12',
        ]);

        $user = Teacher::where('email', '=', $request->email)->first();
        if($user)
        {
            if($request->password == $user->password)
            {
                $request->session()->put('TeacherloginId', $user->sno);
                return redirect('teacherdashboard');
            }
            else
            {
                return back()->with('fail', 'The password not matched');
            }
        }
        else
        {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function teacherdashboard()
    {

        $data = Teacher::where('sno', '=', Session()->get('TeacherloginId'))->first();

        return view('teacher.teacherindex',  ['data'=>$data]);
    }

    public function attendance()
    {
        $data = Teacher::where('sno', '=', Session()->get('TeacherloginId'))->first();
        $class = 0;
        $time = 0;
        $date = 0;
        $attdata = Classes::where('class', 0)->get();

        return view('teacher.attendance',  ['data'=>$data,'attdata'=>$attdata,'class'=>$class, 'date'=>$date, 'time'=>$time]);

    }

    public function attendancedata(Request $request)
    {
        $data = Teacher::where('sno', '=', Session()->get('TeacherloginId'))->first();
        $class = $request->get('class');
        $time = $request->get('time');
        $date = $request->get('date');

        $attdata = Classes::where('class', $request->get('class'))->get();

        return view('teacher.attendance',  ['data'=>$data, 'attdata'=>$attdata, 'class'=>$class, 'date'=>$date, 'time'=>$time]);

    }


    public function attendancemark(Request $request)
    {
            if( $request->get('attendance')==='present')
            {
                $data = New Attendance;
                $data->student_id = $request->get('regno');
                $data->student_name = $request->get('studentname');
                $data->class = $request->get('class');
                $data->attend = $request->get('attendance');
                $data->date = Carbon::now();
                //$data->date = Carbon::createFromFormat('m/d/Y', $request->get('date'))->format('Y-m-d');
                $data->time = Carbon::now();
                $data->save();

                return redirect('attendance')->with('success', 'Data Enter successfully!');

            }
            else
            {
                $data = New Attendance;
                $data->student_id = $request->get('regno');
                $data->student_name = $request->get('studentname');
                $data->class = $request->get('class');
                $data->attend = 'absent';
                $data->date = Carbon::now();
                //$data->date = Carbon::createFromFormat('m/d/Y', $request->get('date'))->format('Y-m-d');
                $data->time = Carbon::now();
                $data->save();

                return redirect('attendance')->with('success', 'Data Enter successfully!');
            }

    }

    function timetable()
    {
        $data = Teacher::where('sno', '=', Session()->get('TeacherloginId'))->first();
        $lecture = Lectures::where('teacherid', '=', $data->sno)->get();
        return view('teacher.timetable',  ['data'=>$data, 'lecture'=>$lecture]);

    }

    public function teacherannouncement()
    {
        $data = Teacher::where('sno', '=', Session()->get('TeacherloginId'))->first();
        $announce = Announcement::all();

        return view('teacher.announce',  ['data'=>$data, 'announce'=>$announce]);

    }

     //uncomplete functions Start
     public function marksheet()
     {
         return view('error-404');
     }
     //uncomplete functions end

     //Back to home page start
     public function backfun()
     {
         return redirect()->back();
     }
     //Back to home page end



}
