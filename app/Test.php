<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Test;
use App\User;
use App\Result;
class Test extends Model
{
    protected $fillable = [ 'name','description','minutes','images' ];

    public function questions(){
    	return $this->hasMany(Question::class);
    }

    public function users(){
        return $this->belongsTomany(User::class,'test_users');
    }

    public function storeTest($data){
    	return Test::create($data);
    }

    public function allTest(){
    	return Test::all();
    }

    public function editTest($id){
        return Test::find($id);
    }

    public function updateTest($id,$data){
        return Test::find($id)->update($data);
       
    }
    public function deleteTest($id){
        $test = Test::find($id);
        $questions = Question::where('test_id',$test->id)->get();
        foreach($questions as $question) {
            $question->delete();
        }
        return Test::find($id)->delete();

    }

    public function assignExam($data){
        foreach($data['test_id'] as $testId) {
            $test = Test::find($testId);
            foreach($data['user_id'] as $userId) {
                $test->users()->syncWithoutDetaching($userId);
            }
        }
        return('good');
        // dd($data);
        // $TestId = $data['test_id'];
        // $Test = Test::find($TestId);
        // $userId = $data['user_id'];
        // return $Test->users()->syncWithoutDetaching($userId);
    }

    public function hasTestAttempted(){
        $attemptTest  = [];
        $authUser = auth()->user()->id;
        $user = Result::where('user_id',$authUser)->get();
        foreach($user as $u){
            array_push($attemptTest,$u->test_id);
        }
        
        return $attemptTest;
    }


}
