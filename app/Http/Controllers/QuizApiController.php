<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuizResource;
use App\Marks;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizApiController extends Controller
{
    //
    public function show($id)
    {
        return new QuizResource(Quiz::findOrFail($id));
    }

    public function store(Request $request){
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        Marks::create($input);
        return redirect()->route('profile');
    }
}
