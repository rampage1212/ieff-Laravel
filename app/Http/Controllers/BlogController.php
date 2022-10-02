<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Stream;
use App\Models\Team;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    public function index(Request $request) 
    {

        if(!Auth::check()) {
            return view('auth.login');
        }
        else {
            if (Auth::user()->paypal == 0) {
                return view('license');
            }
        } 

        $blogs    = Blog::where('efootball', '=', 1)->get();
        $teams    = Team::all();
        $streams  = Stream::where('location', '=', 'e-football')->get();
        $events   = Event::where('location', '=', 'e-football')->get();
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

    	return view('news')->withBlogs($blogs)->withStreams($streams)->withCalendar($calendar)->withTeams($teams);
    }

    public function getSingle($slug) 
    {
     	$blog = Blog::where('slug', '=', $slug)->first();
        $featured = Blog::where('slug', '!=', $slug)->inRandomOrder()->limit(4)->get();
     	return view('news-single')->withBlog($blog)->withFeatured($featured);
    }
}
