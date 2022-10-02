<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Taggable;
use Auth;
 
class GovernanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::where('governance', '=', '1')->get();

        if (Auth::check()) {  
            $voteResults = array();

            foreach($questions as $question) {
                $validVote = Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first();
            
                if ($validVote) {
                    $answer = $question;
                    $total = $answer->tags->sum('count');

                    $percentages = array();
                    foreach ($answer->tags as $key => $answer) {
                        if ($answer->count != 0) {
                            $thispercentage = array(
                                $answer->name => round(($answer->count/$total)*100, 1)
                            );
                            array_push($percentages, $thispercentage);
                        }
                        else {
                            $thispercentage = array(
                                $answer->name => 0
                            );
                            array_push($percentages, $thispercentage);
                        }
                    }
                    array_push($voteResults, $percentages);
                }
            }
            if ($validVote) {
                return view('governance')->withQuestions($questions)->withVoteResults($voteResults);
            }
        }
        return view('governance')->withQuestions($questions);
    }

    public function vote(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Only logged in users may vote']);
        }

        $validVote = Answer::where('question_id', $request->question_id)->where('user_id', Auth::user()->id)->first();

        if (!$validVote) {
            $vote              = new Answer;
            $vote->question_id = $request->question_id;
            $vote->user_id     = Auth::user()->id;
            

            $tag = Tag::find($request->answer);
            if($tag) {
                $tag->increment('count');
                $vote->save();
            }
            else {
                return response()->json(['error' => 'An unknown error occured, please try again.']);
            }
        }
        else {
            return response()->json(['error' => 'You can not vote multiple times on the same poll']);
        }

        $answer = Question::find($request->question_id);
        $total = $answer->tags->sum('count');

        $percentages = array();
        foreach ($answer->tags as $key => $answer) {
            if ($answer->count != 0) {
                $thispercentage = array(
                    $answer->name => round(($answer->count/$total)*100, 1)
                );
                array_push($percentages, $thispercentage);
            }
            else {
                $thispercentage = array(
                    $answer->name => 0
                );
                array_push($percentages, $thispercentage);
            }
        }
        
        return response()->json(['success' => $percentages]);
    }
}
