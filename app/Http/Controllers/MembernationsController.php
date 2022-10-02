<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Stream;
use App\Models\Sweranking;
use Illuminate\Http\Request;

class MembernationsController extends Controller
{
    public function index(Request $request) 
    {
        $blogs    = Blog::where('member-nations', '=', 1)->get();
        $rankings = Sweranking::orderBy('points', 'desc')->paginate(25);
        $streams  = Stream::where('location', '=', 'member-nations')->get();
        $events   = Event::where('location', '=', 'member-nations')->get();
        $calendar = array();

        foreach ($events as $event) {
            $thisevent = array(
                'allDay'      => true,
                'title'       => $event->title,
                'start'       => $event->start,
                'end'         => $event->end,
                'description' => $event->description,
                'color'       => $event->color
            );

            array_push($calendar, $thisevent);
        }

        json_encode($calendar);

    	return view('membernations')->withBlogs($blogs)->withStreams($streams)->withCalendar($calendar)->withRankings($rankings);
    }
}
