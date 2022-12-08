<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\User;
use App\Answer;
use App\Question;
use App\Result;

use Illuminate\Support\Facades\Auth;
use DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tests'] = $test = Test::with('questions')->latest()->paginate(6);
        $data['users'] = User::get();
        $data['active'] = 'test';
        // $questions = $test->questions->get();

        return view('admin.testlist', $data);
        return view('dashboard.test', $data);
    }
    public function searchtest(Request $request) {
      
        $data['tests'] = $tests = Test::with('questions')->where('name','like','%'.$request->search.'%')
        ->orWhere('description','like','%'.$request->search.'%')->get();
       
        return $tests;
    }
    function get_ajax_data(Request $request)
    {
     if($request->ajax())
     {
        $data['tests'] = $test = Test::with('questions')->latest()->paginate(6);
      return view('layout.testpagination', $data)->render();
     }
}
    public function submittest(Request $request)
    {
        $questionId = $request['questionId'];
        $answerId = $request['answerId'];
        $data['active'] = 'test';
        $testId = $request['testId'];

        $question_id  = Answer::where('id', $answerId)->pluck('question_id')[0];
        // dd($question_id);
        $data['active'] = 'test';
        return $userQuestionAnswer = Result::updateOrCreate(
            ['user_id' => Auth::user()->id, 'test_id' => $testId, 'question_id' => $question_id],
            ['answer_id' => $answerId]

        );
    }

    public function finishtest()
    {
        $attemptTest  = [];
        $authUser = Auth::user()->id;
        $user = Result::where('user_id', $authUser)->get();
        $user->is_attempted = 1;
        foreach ($user as $u) {
            array_push($attemptTest, $u->test_id);
        }
        return $attemptTest;
    }
    public function viewResult($userId, $testId)
    {
        $data['results'] = $results = Result::where('user_id', $userId)->where('test_id', $testId)->get();
        $data['totalQuestions'] = $totalQuestions = Question::where('test_id', $testId)->count();
        $data['attemptQuestion'] = $attemptQuestion = Result::where('test_id', $testId)->where('user_id', $userId)->count();
        $ans = [];
        foreach ($results as $answer) {
            array_push($ans, $answer->answer_id);
        }
        $data['userCorrectedAnswer'] = $userCorrectedAnswer  = Answer::whereIn('id', $ans)->where('is_correct', 1)->count();
        $data['userWrongAnswer'] = $userWrongAnswer  = $totalQuestions - $userCorrectedAnswer;
        if ($attemptQuestion) {
            $data['percentage'] = $percentage  = round(($userCorrectedAnswer / $totalQuestions) * 100, 2);
        } else {
            $data['percentage'] = $percentage = 0;
        }
        $data['test'] = Test::find($testId);
        return view('dashboard.viewresult', $data);
    }

    public function checkuserresult($userId, $testId)
    {
        $user = User::get();
        $userId = $request->userId;
        $testId = $request->testId;


        $results = Result::where('user_id', $userId)->where('test_id', $testId)->get();
        $totalQuestions = Question::where('test_id', $testId)->count();
        $attemptQuestion = Result::where('test_id', $testId)->where('user_id', $userId)->count();
        $Test = Test::where('id', $testId)->get();

        $ans = [];
        foreach ($results as $answer) {
            array_push($ans, $answer->answer_id);
        }
        $userCorrectedAnswer = Answer::whereIn('id', $ans)->where('is_correct', 1)->count();
        $userWrongAnswer = $totalQuestions - $userCorrectedAnswer;
        if ($attemptQuestion) {
            $percentage = ($userCorrectedAnswer / $totalQuestions) * 100;
        } else {
            $percentage = 0;
        }
        // dd($userCorrectedAnswer,'corrent',$userWrongAnswer,'wrong',$totalQuestions,'all questions',$attemptQuestion,'attempted questions');

        return view('backend.result.result', compact('user', 'results', 'totalQuestions', 'attemptQuestion', 'userCorrectedAnswer', 'userWrongAnswer', 'percentage', 'Test'));
    }
    public function starttest(Request $request, $testId)
    {
        $authUser = Auth::user()->id;

        //check if user has been assigned a particular test
        $userId = DB::table('test_users')->where('user_id', $authUser)->pluck('test_id')->toArray();
        if (!in_array($testId, $userId)) {
            return redirect()->back()->with('error', 'You are not assigned this test');
        }

        $data['test'] = $test = Test::find($testId);
        $data['time'] = $time = Test::where('id', $testId)->value('minutes');
        $data['testQuestions'] = $testQuestions = Question::where('test_id', $testId)->with('answers')->get();
        $data['authUserHasPlayedtest'] = $authUserHasPlayedtest = Result::where(['user_id' => $authUser, 'test_id' => $testId])->get();
        // dd($testQuestions);
        //has user played particular test
        $wasCompleted = Result::where('user_id', $authUser)->whereIn('test_id', (new Test)->hasTestAttempted())->pluck('test_id')->toArray();

        if (in_array($testId, $wasCompleted)) {

            return redirect()->back()->with('error', 'You already participated in this test');
        }

        return view('dashboard.testpage', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'min:8', 'string'],
            'description' => ['required', 'min:8', 'string'],
            'minutes' => ['required'],

        ]);
        if ($request->image) {
            $this->validate($request, [
                'image' => ['mimes:jpeg,jpg,png']
            ]);
            $image = $request->image;
            $hashImage = $image->hashName();
            $image->move(public_path() . '/testimages/', $hashImage);
            Test::create([
                'name' => $request->name,
                'description' => $request->description,
                'minutes' => $request->minutes,
                'images' => $hashImage,
            ]);
        } else {

            $data['test'] = Test::create($request->all());
        }
        return redirect()->back()->with('message', 'Test created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['test'] = (new test)->edittest($id);
        $data['active'] = 'test';
        return view('admin.edittest', $data);
        return view('dashboard.edittest', $data);
    }
    public function edittestwithroute(Request $request)
    {
        $id = $request->id;
        $data['test'] = $test = (new test)->edittest($id);
        
        return $test;
        return view('admin.edittest', $data);
        return view('dashboard.edittest', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateForm($request);
        if ($request->image) {
            $test = Test::find($id);
            $test->name = $request->name;
            $test->description = $request->description;
            $test->minutes = $request->minutes;
            $image = $request->image;
            $hashImage = $image->hashName();
            $image->move(public_path() . '/testimages/', $hashImage);
            $test->images = $hashImage;
            $test->save();
        } else {

            $test = (new test)->updatetest($id, $data);
        }
        return redirect(route('testlist'))->with('message', 'Test updated Successfully!');
    }

    public function updatewithroute(Request $request)
    {
        $data = $this->validateForm($request);
        $id = $request->id;
        
        if ($request->image) {
            $test = Test::find($id);
            $test->name = $request->name;
            $test->description = $request->description;
            $test->minutes = $request->minutes;
            $image = $request->image;
            $hashImage = $image->hashName();
            $image->move(public_path() . '/testimages/', $hashImage);
            $test->images = $hashImage;
            $test->save();
        } else {

            $test = (new test)->updatetest($id, $data);
        }
        return redirect()->back()->with('message', 'Test updated Successfully!');
        return redirect(route('testlist'))->with('message', 'Test updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        (new Test)->deleteTest($id);
        return redirect()->back()->with('message', 'Test deleted Successfully!');
    }

    public function question($id)
    {
        $data['tests'] = Test::with('questions')->where('id', $id)->get();
        $data['active'] = 'question';
        return view('dashboard.showquestion2', $data);
    }


    // public function removeTest(Request $request, $userId, $testId){
    public function removeTest(Request $request)
    {
        $request->all();
        $testId = $request->testId;
        $userId = $request->userId;
        $test = Test::find($testId);
        $result = Result::where('test_id', $testId)->where('user_id', $userId)->exists();
        if ($result) {
            return redirect()->back()->with('message', 'This test has be done by user, so it cannot be removed!');
        } else {
            $test->users()->detach($userId);
            return redirect()->back()->with('message', 'Test is now detached from user!');
        }
    }

    public function assign(Request $request)
    {

        $this->validate($request, [
            'user_id' => ['required'],
            'test_id' => ['required']
        ]);
        // foreach($request->user_id as $user) {

        // }
        $test = (new Test)->assignExam($request->all());
        return redirect()->back()->with('message', 'Test assigned to user successfully!');
    }
    public function showassign()
    {

        $data['users'] = User::latest()->get();
        $data['tests'] = Test::latest()->get();
        $data['active'] = 'assign';
        return view('dashboard.assign', $data);
    }
    public function validateForm($request)
    {
        return $this->validate($request, [

            'name' => 'required|string',
            'description' => 'required|min:3|max:500',
            'minutes' => 'required|integer'
        ]);
    }
}
