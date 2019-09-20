<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\TestCat;
use App\TestSubcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificationController extends Controller
{
    //
    public function categories($id){

        $category = TestCat::findOrFail($id);
        $subCategories = $category->subs;
        return view('pages.categories', compact('subCategories'));
    }

    public function tests($id){
        $subCategory = TestSubcat::findOrFail($id);
        $tests = $subCategory->tests;
        return view('pages.tests', compact('tests'));
    }

    public function details($id){
        $quiz = Quiz::findOrFail($id);
        return view('pages.testProfile', compact('quiz'));
    }

    public function user_tests(){
        if (!Auth::check()) {
            return redirect('/');
        }
        $tests = Auth::user()->tests;
        return view('pages.user_tests', compact('tests'));
    }

    public function user_results(){
        if (!Auth::check()) {
            return redirect('/');
        }
        $tests = Auth::user()->tests;
        return view('pages.user_results', compact('tests'));
    }

    public function giveTest($id){

        return view('pages.test', compact('id'));
    }

    public function buyNow($id){
        if(Auth::check()){
            $quiz = Quiz::findOrFail($id);
            $user = Auth::user();
            $user->tests()->attach($quiz);
            return redirect()->back();
        }
        else {
            return redirect('/signin');
        }

    }
}
