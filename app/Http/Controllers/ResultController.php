<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use App\Models\Result;

class ResultController extends Controller
{
    public function index(Request $request){
        $result['quiz_results'] = 
        DB::table('results')
            ->Join('users', 'users.id', '=', 'results.user_id')
            ->select('results.*','users.name','users.email')
            ->where(['results.user_id' => $request->session()->get('FRONT_USER_LOGIN')])
            ->orderBy('results.id','desc')
            ->get();
        return view('quiz_results', $result);
    }
}
