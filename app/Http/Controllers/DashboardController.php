<?php

namespace App\Http\Controllers;

use App\User;
use App\Test;
use App\Schedule;
use App\Question;
use App\Assignschedule;
use App\Models\Folder;
use App\Models\Credential;
use App\Models\File;
use App\Models\Assigndocument;
use App\Models\Assignfolder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    function index()
    {

        $data['user'] = $user = Auth::user();
        
        // dd($user);

        $data['document'] = Assigndocument::where('user_id', Auth::user()->id)->get();
        $data['schedule'] = Schedule::where('user_id', Auth::user()->id)->get();
        $data['test'] = DB::table('test_users')->where('user_id', Auth::user()->id)->get();
        if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null && $user->school !== null && $user->job_title !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 100;
            $data['preferenceprogress'] = 100;
        } else if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null && $user->school !== null) {
            $data['personalprogress'] = 100;
            $data['preferenceprogress'] = 100;
            $data['experienceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null) {
            $data['personalprogress'] = 65;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else {
            $data['personalprogress'] = 25;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        }
        if($user->isAdmin == 1 || $user->isAdmin == 2) {
            return redirect()->route('admin');
        }
        else {
            return redirect()->route('userdashboard');
      }
        return view('dashboard.userdashboard', $data);
    }
    public function userForm($slug)
    {
        $user = Auth::user();
        $data['document'] = Assigndocument::where('user_id', Auth::user()->id)->get();
        $data['schedule'] = Schedule::where('user_id', Auth::user()->id)->get();
        $data['test'] = DB::table('test_users')->where('user_id', Auth::user()->id)->get();

        if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null && $user->school !== null && $user->job_title !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 100;
            $data['preferenceprogress'] = 100;
        } else if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null && $user->school !== null) {
            $data['personalprogress'] = 100;
            $data['preferenceprogress'] = 100;
            $data['experienceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null) {
            $data['personalprogress'] = 65;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else {
            $data['personalprogress'] = 25;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        }
        if ($slug == 'preference') {
            return view('dashboard.preference', $data);
        } else if ($slug == 'skills') {
            return view('dashboard.skills', $data);
        } else if ($slug == 'experience') {
            return view('dashboard.experience', $data);
        } else if ($slug == 'credentials') {
            $data['credential'] = $credentials = Credential::where('user_id',Auth::user()->id)->first();
            
            return view('dashboard.credentials', $data);
  
        } else if ($slug == 'schedule') {
            $data['currentMonth'] = $currentMonth = Carbon::now()->monthName;
            $data['schedule'] = $schedules = Schedule::where('user_id', Auth::user()->id)->get();
            $data['weeks'] = $weeks = [];
            $data['days'] = $days = [];

            $data['weeks'] = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
            $data['days'] = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            return view('dashboard.taskschedule', $data);
        } else {
            return view('dashboard.index', $data);
        }
    }
    public function schedulemonth(Request $request)
    {
        $user = Auth::user();


        if ($user->name !== null && $user->nok_name !== null && $user->bank_name !== null && $user->institution !== null && $user->certificate1 !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 100;
            $data['preferenceprogress'] = 100;
        } else if ($user->name !== null && $user->nok_name !== null && $user->bank_name !== null && $user->institution !== null) {
            $data['personalprogress'] = 100;
            $data['preferenceprogress'] = 100;
            $data['experienceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null && $user->bank_name !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null) {
            $data['personalprogress'] = 65;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else {
            $data['personalprogress'] = 25;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        }

        $data['currentMonth'] = $currentMonth = $request->month;
        // dd($currentMonth);
        $data['schedule'] = $schedules = Schedule::where('user_id', Auth::user()->id)->get();
        $data['weeks'] = $weeks = [];
        $data['days'] = $days = [];

        $data['weeks'] = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
        $data['days'] = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        return view('dashboard.taskschedule', $data);
    }
    function  userdetails($id)
    {
        $data['user'] = User::find($id);
        $data['active'] = 'user';
        return view('dashboard.userdetails', $data);
    }
    static function checkschedule($month, $week, $day)
    {
        $schedule = Schedule::where('user_id', Auth::user()->id)->where('schedule_month', $month)->where('schedule_week', $week)->where('schedule_day', $day)->first();
        if ($schedule) {
            return $schedule->schedule_title;
        } else {
            return '-';
        }
    }
    static function checkstarttime($month, $week, $day)
    {
        $schedule = Schedule::where('user_id', Auth::user()->id)->where('schedule_month', $month)->where('schedule_week', $week)->where('schedule_day', $day)->first();
        if ($schedule) {

            return $schedule->schedule_start_time;
        } else {
            return '-';
        }
    }
    static function checkendtime($month, $week, $day)
    {
        $schedule = Schedule::where('user_id', Auth::user()->id)->where('schedule_month', $month)->where('schedule_week', $week)->where('schedule_day', $day)->first();
        if ($schedule) {

            return $schedule->schedule_end_time;
        } else {
            return '-';
        }
    }
    static function checkstatus($month, $week, $day)
    {
        $schedule = Schedule::where('user_id', Auth::user()->id)->where('schedule_month', $month)->where('schedule_week', $week)->where('schedule_day', $day)->first();
        if ($schedule) {

            return $schedule->status;
        } else {
            return '-';
        }
    }
    public function displayschedule($day, $week)
    {
    }
    public function admin()
    {
        $data['users'] = User::get();
        $data['tests'] = Test::get();
        $data['totaluser'] = count(User::get());
        $data['totaltest'] = count(Test::get());
        $data['totalschedule'] = count(Schedule::get());
        $data['active'] = 'user';
        return view('admin.userlist', $data);
    }
    function fetchuser(Request $request)
    {
        if ($request->ajax()) {
            $data['users'] = User::paginate(9);
            return view('dashboard.userpagination', $data)->render();
        }
    }
    function fetchschedule(Request $request)
    {
        if ($request->ajax()) {
            $data['schedules'] = Schedule::paginate(5);
            return view('dashboard.schedulepagination', $data)->render();
        }
    }

    function fetchtest(Request $request)
    {
        if ($request->ajax()) {
            $data['tests'] = Test::paginate(5);
            return view('dashboard.testpagination', $data)->render();
        }
    }

    function fetchquestion(Request $request)
    {
        if ($request->ajax()) {
            $data['questions'] = Question::paginate(5);
            return view('dashboard.questionpagination', $data)->render();
        }
    }

    function fetchassign(Request $request)
    {
        if ($request->ajax()) {
            $data['users'] = User::latest()->paginate(5);
            $data['tests'] = Test::latest()->paginate(5);
            return view('dashboard.assignpagination', $data)->render();
        }
    }

    function fetchfolder(Request $request, $id)
    {
        if ($request->ajax()) {
            $data['folder'] = $folder =  Folder::find($id);
            $data['folders'] = Folder::paginate(10);
            return view('dashboard.folderpagination', $data)->render();
        }
    }

    function fetchfile(Request $request, $id)
    {
        if ($request->ajax()) {
            $data['folder'] = $folder =  Folder::find($id);
            $data['files'] = File::where('folder_id', $folder->id)->paginate(5);
            return view('dashboard.filepagination', $data)->render();
        }
    }
    public function filteruser(Request $request)
    {
        $myInput = $request->myInput;
        $data['users'] = User::where('name', 'LIKE', "%" . $myInput . "%")
            ->orWhere('email', 'LIKE', "%" . $myInput . "%")
            ->orWhere('phone', 'LIKE', "%" . $myInput . "%")->get();
        return $data['users'];
    }
    public function filtertest(Request $request)
    {
        $myInput = $request->myInput;
        $data['users'] = Test::with('questions')->where('name', 'LIKE', "%" . $myInput . "%")
            ->orWhere('description', 'LIKE', "%" . $myInput . "%")
            ->orWhere('minutes', 'LIKE', "%" . $myInput . "%")->get();
        return $data['users'];
    }
    public function filterquestion(Request $request)
    {
        $myInput = $request->myInput;
        $data['users'] = Question::where('question', 'LIKE', "%" . $myInput . "%")->get();
        // ->orWhere('email', 'LIKE', "%".$myInput."%")
        // ->orWhere('phone', 'LIKE', "%".$myInput."%")->get(); 
        return $data['users'];
    }
}
