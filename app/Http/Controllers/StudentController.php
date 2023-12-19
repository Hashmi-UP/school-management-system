<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Fees;
use App\Models\Lectures;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function login()
    {
        return view("auth.studentlogin");
    }

    public function studentlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:12',
        ]);

        $user = Student::where('email', '=', $request->email)->first();
        if($user)
        {
            if($request->password == $user->password)
            {
                $request->session()->put('StudentloginId', $user->sno);
                return redirect('studentdashboard');
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

    public function studentdashboard()
    {

        $data = Student::where('sno', '=', Session()->get('StudentloginId'))->first();

        return view('student.studentindex',  ['data'=>$data]);
    }

    public function studentattendance()
    {
        $data = Student::where('sno', '=', Session()->get('StudentloginId'))->first();

        $attendance = Attendance::where('student_id','=', $data->sno)->get();

        return view('student.attendance', ['data'=>$data, 'attendance'=>$attendance]);

    }

    public function studentannouncement()
    {
        $data = Student::where('sno', '=', Session()->get('StudentloginId'))->first();
        $announce = Announcement::all();
        return view('student.announce',  ['data'=>$data, 'announce'=>$announce]);

    }

    public function studentfee()
    {
        $data = Student::where('sno', '=', Session()->get('StudentloginId'))->first();
        $studentdata = Classes::where('regno', '=', $data->sno)->first();
        $fees = Fees::where('class', '=', $studentdata->class)->get();
        return view('student.fees',  ['data'=>$data, 'fees'=>$fees, 'studentdata'=>$studentdata]);
    }


    function timetable()
    {
        $data = Student::where('sno', '=', Session()->get('StudentloginId'))->first();
        $studentdata = Classes::where('regno', '=', $data->sno)->first();
        $lecture = Lectures::where('class', '=', $studentdata->class)->get();
        return view('student.timetable',  ['data'=>$data, 'lecture'=>$lecture, 'studentdata'=>$studentdata]);

    }

    public function logout()
    {
        Session()->pull('StudentloginId');
        return redirect('studentlogin');
    }

}
