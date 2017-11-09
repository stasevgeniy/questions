<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{

    public function index(){
        $questions=DB::table('questions')
            ->leftJoin('users', 'questions.user_id', '=', 'users.id')
            ->select(
                [
                    'questions.id',
                    'questions.title',
                    'questions.created_at',
                    'users.name'
                ])
            ->orderBy('id', 'desc')->get();
        return view('index')->with(['questions'=>$questions]);
    }

    public function newQuestion(){
        return view('newQuestion');
    }

    public function sendQuestion(Request $request){
        if (Auth::check()) {
            $this->validate($request,[
                'title' => 'required|max:300|unique:questions',
                'text' => 'required'
            ]);
            $data = $request->all();
            $post = new Question();
            $post->fill($data);
            $post->id_user = Auth::id();
            $post->save();
            $id = $post->id;
            return redirect()->route('show',[
                $id
            ]);
        }
    }

    public function show($id){
        DB::table('questions')->where('id',$id);

        $questions=DB::table('questions')
            ->leftJoin('users', 'questions.user_id', '=', 'users.id')
            ->select(
                [
                    'questions.id',
                    'questions.title',
                    'questions.text',
                    'questions.created_at',
                    'users.name'
                ])
            ->where('questions.id',$id)->first();

        $answers=DB::table('answers')
            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
            ->select(
                [
                    'answers.id',
                    'answers.text',
                    'answers.created_at',
                    'answers.rate',
                    'users.name'
                ])
            ->where('answers.question_id',$id)
            ->orderBy('id', 'desc')
            ->get();

        return view('show')->with(['questions'=>$questions,'answers'=>$answers]);
    }
    public function newComment(Request $request, $id){

        $this->validate($request,[
            'text' => 'required'
        ]);
        if (Auth::check()) {
            $data = $request->all();
            $answer = new Answer();
            $answer->fill($data);
            $answer->user_id = Auth::id();
            $answer->question_id = $id;
            $answer->save();
            return redirect()->route('show', [
                $id
            ]);
        }else{
            return redirect()->to('/');
        }
    }

    public function addRate(Request $request, $question, $id){
        if (Auth::check()) {

            DB::table('answers')->where('id', '=', $id)->increment('rate');

            return redirect()->route('show', [
                $question
            ]);
        }else{
            return redirect()->to('/');
        }

    }

    public function minRate(Request $request, $question, $id){
        if (Auth::check()) {

            DB::table('answers')->where('id', '=', $id)->decrement('rate');

            return redirect()->route('show', [
                $question
            ]);
        }else{
            return redirect()->to('/');
        }

    }

}
