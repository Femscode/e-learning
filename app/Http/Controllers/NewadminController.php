<?php

namespace App\Http\Controllers;

use App\User;
use App\Schedule;
use App\Question;


use App\Answer;
use App\Test;

use Illuminate\Support\Facades\Auth;
use App\Models\Assigndocument;
use App\Models\Assignfolder;
use App\Models\Credential;
use App\Models\Folder;
use App\Models\File;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;


class NewadminController extends Controller
{
    public function userlist() {
        $data['users'] = User::get();
        return view('admin.userlist', $data);
    }
    public function testlist() {
        $data['tests'] = $test = Test::with('questions')->get();
        $data['users'] = User::get();
        $data['active'] = 'test';
        // $questions = $test->questions->get();

        return view('admin.testlist', $data);
    }
    function  adminviewuser($id)
    {
        $data['user'] = $user = User::find($id);
        $data['active'] = 'user';
        $data['credential'] = $cre = Credential::where('user_id',$user->id)->first();
        
        return view('admin.userdetails', $data);
    }
    public function adminschedulelist()
    {
        $data['schedules'] = Schedule::latest()->get();
        $data['active'] = 'schedule';
        return view('admin.schedulelist', $data);
    }
    public function adminschedulecalendar()
    {
        $data['users'] = User::get();
        $data['schedule'] = Schedule::get();
        return view('admin.admincalendar', $data);
    }
    public function question2()
    {
        $data['questions'] = Question::get();
        $data['tests'] = Test::get();
        $data['users'] = User::get();
        $data['active'] = 'question';
        return view('admin.questionlist', $data);
    }
}
