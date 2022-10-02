<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Document;
use App\Models\Governance;
use App\Models\Question;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $documents   = Document::all();
        $governances = Governance::all();
        $governanceQuestions = Question::where('governance', '=', '1')->get();

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
                $data = array(
                    'documents'           => $documents,
                    'governances'         => $governances,
                    'governanceQuestions' => $governanceQuestions,
                    'validVote'           => $validVote,
                );
            }
        }

        $data = array(
            'documents'           => $documents,
            'governances'         => $governances,
            'governanceQuestions' => $governanceQuestions,
        );

        \View::share('data', $data);
    }
}
