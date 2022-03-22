<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Quiz;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login_form(Request $request)
    {
        if($request->session()->has('FRONT_USER_VAL')){
            return redirect()->route("mcq");
        } else {
            return view('login_form');
        }
        
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        if(!$validate->passes()){
            return back()->withErrors($validate->errors()->toArray());
        } else {
            $customer = new User();
            $customer->name = $request->post('username');
            $customer->email = $request->post('email');

            if($customer->save()){
                $customer_record = User::latest()->first()->toArray();
               
                $request->session()->put('FRONT_USER_VAL',true);
                $request->session()->put('FRONT_USER_LOGIN',$customer_record['id']);
                $request->session()->put('FRONT_USER_NAME',$customer_record['name']);

                return redirect()->route('mcq');
            }
        }
    }

    public function mcq(Request $request)
    {
        return view('question_list')->with('questions',Question::all()->toArray())->with('start_time',Carbon::now())->with('quiz',Quiz::where('id',1)->first());
    }

    public function logout(Request $request)
    {
        $request->session()->forget('FRONT_USER_VAL');
        $request->session()->forget('FRONT_USER_LOGIN');
        $request->session()->forget('FRONT_USER_NAME');

        return redirect()->route('login_form');
    }
}
