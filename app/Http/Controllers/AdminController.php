<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Announcement;
use App\Models\Fees;
use App\Models\feestime;
use App\Models\Lectures;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Session;
use DateTime;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\PseudoTypes\True_;

use function Ramsey\Uuid\v1;

//use Illuminate\Contracts\Session\Session;

class AdminController extends Controller
{

        public function start()
        {
            return view('index');
        }

    public function login()
    {
        return view("auth.adminlogin");
    }


    public function adminlogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:12',
        ]);

        $user = Admin::where('email', '=', $request->email)->first();
        if($user)
        {
            if($request->password == $user->password)
            {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
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


    public function dashboard()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        return view('admin.adminindex', compact('data'))->with('success', 'You have logged in successfully!');
    }


    public function logout()
    {

        Session()->pull('loginId');
        return redirect('adminlogin');
    }


    public function teacheraddform()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        return view('admin.addteacher', compact('data'))->with('success', 'You have logged in successfully!');
    }



    public function addteacher(Request $request)
    {


        $data = Admin::where('id', '=', Session()->get('loginId'))->first();

        $request->validate([
            'sno' => 'required|unique:teacheruser',
            'teachername' => 'required',
            'firstname' => 'required|min:3|max:25',
            'lastname' => 'required|min:3|max:15',
            'age' => 'required',
            'email' => 'required|unique:teacheruser',
            'gender' => 'required',
            'religion' => 'required',
            'phone' => 'required|min:11|max:15|unique:teacheruser',
            'address' => 'required|min:10|max:70',
            'password' => 'required|min:4',
            'mainsubject' => 'required|min:4|max:30',
            'doj' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            $imageName = $request->get('sno').'.'.$request->image->extension();
            $photo = $request->image->move(public_path('images'), $imageName);

            $data1 = new Teacher;
            $data1->sno = $request->get('sno');
            $data1->name = $request->get('teachername');
            $data1->firstname = $request->get('firstname');
            $data1->lastname = $request->get('lastname');
            $data1->age = $request->get('age');
            $data1->phone = $request->get('phone');
            $data1->gender = $request->get('gender');
            $data1->religion = $request->get('religion');
            $data1->email = $request->get('email');
            $data1->address = $request->get('address');
            $data1->password = $request->get('cpassword');
            $data1->mainsubject = $request->get('mainsubject');
            $data1->doj = Carbon::createFromFormat('m/d/Y', $request->get('doj'))->format('Y-m-d');
            $data1->image = $imageName;
            $data1->save();

            return back()->with('success', 'Data Enter successfully!');

    }


    public function teacherlist()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Teacher::all();

        return view('admin.teacherlist', compact('data'), compact('data1'));
    }

    public function deleteteacher($sno)
    {
        $res=Teacher::where('sno', '=', $sno)->delete();

        if ($res)
        {
            return back()->with('success', 'Record Deleted successfully!');
        }
        else
        {
            return back()->with('fail', 'Record cannot be deleted!');
        }
    }


    public function editteacher($sno)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Teacher::where('sno', '=', $sno)->first();

        return view('admin.updateteacher', ['data'=>$data, 'data1'=>$data1]);
    }



    public function editteacherdb(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Teacher::where('sno', '=', $request->sno)->first();
        $data1->name = $request->teachername;
        $data1->firstname = $request->firstname;
        $data1->lastname = $request->lastname;
        $data1->age = $request->age;
        $data1->phone = $request->phone;
        $data1->email = $request->email;
        $data1->address = $request->address;
        $data1->password = $request->password;
        $data1->mainsubject = $request->mainsubject;
        $data1->doj = $request->doj;
        $data1->update();

        return back()->with('success', 'Record Updated successfully!');
    }


    public function studentaddform()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        return view('admin.addstudent', compact('data'))->with('success', 'You have logged in successfully!');
    }


    public function studentlist()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Student::all();
        return view('admin.studentlist', compact('data'), compact('data1'));
    }


    public function addstudent(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();

        $request->validate([
            'sno' => 'required|unique:teacheruser|max:11|min:4',
            'studentname' => 'required',
            'firstname' => 'required|min:3|max:25',
            'lastname' => 'required|min:3|max:15',
            'fathername' => 'required|min:3|max:25',
            'age' => 'required',
            'dob' => 'required',
            'email' => 'required|unique:teacheruser',
            'gender' => 'required',
            'religion' => 'required',
            'phone' => 'required|min:11|max:15|unique:teacheruser',
            'address' => 'required|min:10|max:70',
            'password' => 'required|min:4',
            'doj' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            $imageName = $request->get('sno').'.'.$request->image->extension();
            $photo = $request->image->move(public_path('images/student'), $imageName);

            $data1 = new Student;
            $data1->sno = $request->get('sno');
            $data1->name = $request->get('studentname');
            $data1->firstname = $request->get('firstname');
            $data1->lastname = $request->get('lastname');
            $data1->fathername = $request->get('fathername');
            $data1->age = $request->get('age');
            $data1->phone = $request->get('phone');
            $data1->gender = $request->get('gender');
            $data1->religion = $request->get('religion');
            $data1->email = $request->get('email');
            $data1->address = $request->get('address');
            $data1->password = $request->get('cpassword');
            $data1->dob = Carbon::createFromFormat('m/d/Y', $request->get('doj'))->format('Y-m-d');
            $data1->doj = Carbon::createFromFormat('m/d/Y', $request->get('doj'))->format('Y-m-d');
            $data1->image = $imageName;
            $data1->save();

            return back()->with('success', 'Data Enter successfully!');
    }


    public function deletestudent($sno)
    {
        $res=Student::where('sno', '=', $sno)->delete();

        if ($res)
        {
            return back()->with('success', 'Record Deleted successfully!');
        }
        else
        {
            return back()->with('fail', 'Record cannot be deleted!');
        }
    }


    public function editstudent($sno)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Student::where('sno', '=', $sno)->first();
        return view('admin.updatestudent', ['data'=>$data, 'data1'=>$data1]);
    }



    public function editstudentdb(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Student::where('sno', '=', $request->sno)->first();
        $data1->name = $request->studentname;
        $data1->firstname = $request->firstname;
        $data1->lastname = $request->lastname;
        $data1->age = $request->age;
        $data1->phone = $request->phone;
        $data1->email = $request->email;
        $data1->address = $request->address;
        $data1->password = $request->password;
        $data1->doj = $request->doj;
        $data1->update();

        return back()->with('success', 'Record Updated successfully!');
    }


    //timetable start
    public function timetablelist()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Lectures::all();
        return view('admin.timetablelist', compact('data'), compact('data1'));
    }


    public function lectureaddform()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Teacher::all();
        return view('admin.addtimetable', compact('data'), compact('data1'))->with('success', 'You have logged in successfully!');
    }


    public function lectureadd(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $request->validate([
            'sno' => 'required|unique:lectures|max:11|min:4',
            'coursename' => 'required',
            'class' => 'required',
            'teachername' => 'required|min:3|max:25',
            'teacherid' => 'required|min:3|max:10',
            'time' => 'required',
            'day' => 'required',
        ]);
            $data1 = new Lectures;
            $data1->sno = $request->get('sno');
            $data1->coursename = $request->get('coursename');
            $data1->class = $request->get('class');
            $data1->teachername = $request->get('teachername');
            $data1->teacherid = $request->get('teacherid');
            $data1->time = $request->get('time');
            //$data1->time = Carbon::createFromFormat('h/i/s', $request->get('time'))->format('h:i:s');
            $data1->day = $request->get('day');
            $data1->save();

            return back()->with('success', 'Data Enter successfully!');
    }


    public function deletelecture($sno)
    {
        $res = Lectures::where('sno', '=', $sno)->delete();
        if ($res)
        {
            return back()->with('success', 'Record Deleted successfully!');
        }
        else
        {
            return back()->with('fail', 'Record cannot be deleted!');
        }
    }


    public function editlecture($sno)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Lectures::where('sno', '=', $sno)->first();
        $data2 = Teacher::all();
        return view('admin.updatetimetable', ['data'=>$data, 'data1'=>$data1, 'data2'=>$data2]);
    }


    public function editlecturedb(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Lectures::where('sno', '=', $request->sno)->first();
        $data1->coursename = $request->coursename;
        $data1->class = $request->class;
        $data1->teachername = $request->teachername;
        $data1->teacherid = $request->teacherid;
        $data1->time = $request->time;
        $data1->day = $request->day;
        $data1->update();
        return back()->with('success', 'Record Updated successfully!');
    }
    //timetable end

    //Announcement Start
    public function announcelist()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Announcement::all();

        return view('admin.announcelist', compact('data'), compact('data1'));
    }


    public function announceaddform()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        return view('admin.addannouncement', compact('data'))->with('success', 'You have logged in successfully!');
    }


    public function announceadd(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $request->validate([
            'sno' => 'required|unique:announcement|max:11|min:2',
            'topic' => 'required',
            'message' => 'required',
            'day' => 'required',
            'date' => 'required',
        ]);

            $data1 = new Announcement;
            $data1->sno = $request->get('sno');
            $data1->topic = $request->get('topic');
            $data1->message = $request->get('message');
            $data1->day = $request->get('day');
            $data1->date = Carbon::createFromFormat('m/d/Y', $request->get('date'))->format('Y-m-d');
            $data1->save();

            return back()->with('success', 'Data Enter successfully!');
    }


    public function deleteannounce($sno)
    {
        $res=Announcement::where('sno', '=', $sno)->delete();
        if ($res)
        {
            return back()->with('success', 'Record Deleted successfully!');
        }
        else
        {
            return back()->with('fail', 'Record cannot be deleted!');
        }
    }


    public function editannounce($sno)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Announcement::where('sno', '=', $sno)->first();
        $data2 = Teacher::all();
        return view('admin.updatetimetable', ['data'=>$data, 'data1'=>$data1, 'data2'=>$data2]);
    }


    public function editannouncedb(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Announcement::where('sno', '=', $request->sno)->first();
        $data1->coursename = $request->coursename;
        $data1->class = $request->class;
        $data1->teachername = $request->teachername;
        $data1->teacherid = $request->teacherid;
        $data1->time = $request->time;
        $data1->day = $request->day;
        $data1->update();
        return back()->with('success', 'Record Updated successfully!');
    }

    public function deleteannouncement($sno)
    {
        $res = Announcement::where('sno', '=', $sno)->delete();
        if ($res)
        {
            return back()->with('success', 'Record Deleted successfully!');
        }
        else
        {
            return back()->with('fail', 'Record cannot be deleted!');
        }
    }


    public function editannouncement($sno)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Announcement::where('sno', '=', $sno)->first();
        return view('admin.updateannouncement', ['data'=>$data, 'data1'=>$data1]);
    }


    public function updateannouncedb(Request $request)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Announcement::where('sno', '=', $request->sno)->first();
        $data1->topic = $request->topic;
        $data1->message = $request->message;
        $data1->day = $request->day;
        $data1->date = Carbon::createFromFormat('m/d/Y', $request->get('doa'))->format('Y-m-d');
        $data1->update();
        return back()->with('success', 'Record Updated successfully!');
    }

    //Announcement End

    //fee start
    public function feeslist()
    {
        $data = Admin::where('id', Session()->get('loginId'))->first();
        $data1= Fees::all();
        $data2 = feestime::all();
        return view('admin.feeslist', ['data'=>$data, 'data1'=>$data1]);

    }

    public function feesaddform()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        return view('admin.addfees', compact('data'))->with('success', 'You have logged in successfully!');
    }


    public function addfeesdb(Request $request)
    {

        $data = Admin::where('id', '=', Session()->get('loginId'))->first();

        $request->validate([
            'sno' => 'required|unique:fees|max:11|min:2',
            'class' => 'required',
            'libraryfees' => 'required ',
            'labfees' => 'required ',
            'actfees' => 'required ',
            'fine' => 'required|integer',
            'date' => 'required',
            'dod' => 'required'
        ]);

            $data1 = new Fees;
            $data1->sno = $request->get('sno');
            $data1->class = $request->get('class');
            $data1->tutionfees = $request->get('tutionfees');
            $data1->libraryfees = $request->get('libraryfees');
            $data1->labfees = $request->get('labfees');
            $data1->activitiesfees = $request->get('actfees');
            $data1->fine = $request->get('fine');
            $data1->date = Carbon::createFromFormat('m/d/Y', $request->get('date'))->format('Y-m-d');
            $data1->duedate = Carbon::createFromFormat('m/d/Y', $request->get('dod'))->format('Y-m-d');
            $data1->total = $request->get('tutionfees') + $request->get('libraryfees') + $request->get('labfees') + $request->get('actfees') +  $request->get('fine');
            $data1->save();
            return back()->with('success', 'Data Enter successfully!');

    }

    public function deletefees($sno)
    {
        $res=Fees::where('sno', $sno)->delete();
        if ($res)
        {
            return back()->with('success', 'Record Deleted successfully!');
        }
        else
        {
            return back()->with('fail', 'Record cannot be deleted!');
        }
    }

    public function editfees($sno)
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        $data1 = Fees::where('sno', '=', $sno)->first();
        $data2 = feestime::where('sno', '=', $sno)->first();

        return view('admin.editfees', ['data'=>$data, 'data1'=>$data1, 'data2'=>$data2]);
    }

    public function classassign()
    {
        $data = Admin::where('id', '=', Session()->get('loginId'))->first();
        return view('admin.classassign', ['data'=>$data]);
    }

    public function classassigndb(Request $request)
    {
        $request->validate([
            'regno' => 'required|max:11|min:2',
            'studentname' => 'required',
            'class' => 'required ',
        ]);

            $entery = Student::where('sno',$request->get('regno'))->first();
            if ($entery)
            {
                $inclasses = Classes::where('regno',$request->get('regno'))->first();
                if($inclasses)
                {
                    $class = $request->get('class');
                    $done = Classes::where('regno', $request->get('regno'))->where('studentname', $request->get('studentname') )->update(['class'=>$class]);
                    return back()->with('success', 'Data Enter successfully!');
                }

                else
                {
                    $data1 = new Classes;
                    $data1->regno = $request->get('regno');
                    $data1->studentname = $request->get('studentname');
                    $data1->class = $request->get('class');
                    $data1->save();
                    return back()->with('success', 'Data Enter successfully!');
                }
            }
            else
            {
                return back()->with('fail', 'No Student exist in database!');
            }
    }

    public function classlist()
    {
        $data = Admin::where('id', Session()->get('loginId'))->first();
        $data1= Classes::all();
        return view('admin.classlist', ['data'=>$data, 'data1'=>$data1]);
    }

    //fees end


   

}
