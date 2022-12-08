<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;

use App\Answer;
use App\Test;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['questions'] = Question::get();
        $data['tests'] = Test::get();
        $data['users'] = User::get();
        $data['active'] = 'question';
        return view('dashboard.question', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.question.create');
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
            'test' => ['required'],
            'question' => ['required', 'min:10'],
            'correct_answer' => ['required']

        ]);
        $data = $request->all();
        // dd($data);
        $question = (new Question)->storeQuestion($data);
        $answer = (new Answer)->storeAnswer($data, $question);
        return redirect()->back()->with('message', 'Question Created Successfully');
        return redirect()->route('question.index')->with('message', 'Question created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data['tests'] = (new Question)->getQuestionById($id);
        // return view('dashboard.showquestion2',$data);

        $data['tests'] = Test::with('questions')->where('id', $id)->get();
        $data['active'] = 'question';
        return view('dashboard.showquestion2', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['question'] = $question = (new Question)->findQuestion($id);
        $data['test_id'] = Question::where('id', $question->id)->pluck('test_id')[0];
        $data['active'] = 'question';

        return view('admin.editquestion', $data);
        return view('dashboard.editquestion', $data);
    }
    public function editquestionwithroute(Request $request) {
        $id = $request->id;
        $data['question'] = $question = (new Question)->findQuestion($id);
        return $question;
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
        $question = (new Question)->updateQuestion($id, $request);
        $answer = (new Answer)->updateAnswer($request, $question);
        return redirect()->route('questionlist')->with('message', 'Question updated successfully');
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

        (new Answer)->deleteAnswer($id);
        (new Question)->deleteQuestion($id);
        return redirect()->route('question.index')->with('message', 'Question deleted successfully!');
    }

    public function validateForm($request)
    {
        return $this->validate($request, [
            'quiz' => 'required',
            'question' => 'required',
            'options' => 'required|array|min:3',
            'options.*' => 'required|string|distinct',
            'correct_answer' => 'required'

        ]);
    }
}
