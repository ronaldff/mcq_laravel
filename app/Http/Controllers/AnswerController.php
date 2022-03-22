<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Carbon\Carbon;

class AnswerController extends Controller
{
    public function store(Request $request){
        if (Carbon::now()>Carbon::parse($request->start_time)->addMinute(Quiz::where('id',$request->quiz_id)->value('duration'))){
            return redirect()->back()->with('error','Time is Over');
        }
        $i=1;
        $db_answers = Question::all();
        $correct=0;
        $wrong = 0;
        $total=0;

        foreach ($db_answers as $db_answer){
           
            if(isset($request->answer[$i])){
                if ($db_answer->correct_option==$request->answer[$i]){
                    $correct++;
                }
                else{
                    $wrong++;
                }
            }
            
            $i++;
            $total++;
        }
        Result::create([
            'user_id'=>$request->session()->get('FRONT_USER_LOGIN'),
            'quiz_id'=>$request->quiz_id,
            'quiz_score'=>$total,
             'achieved_score'=>$correct,
             'wrong_score' => $wrong
         ]);
         return redirect()->route('results')->with('success','Quiz done and result published');
    }
}
