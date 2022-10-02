@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — E-football</title>
<meta name="title" content="IEFF — E-football">
<meta name="description" content="All the latest e-football news from the IEFF">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="IEFF — E-football">
<meta property="og:description" content="All the latest e-football news from the IEFF">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ Request::url() }}">
<meta property="twitter:title" content="IEFF — E-football">
<meta property="twitter:description" content="All the latest e-football news from the IEFF">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endsection 

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>E-football</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">E-football</li>
		</ol>
	</div>
 
</section><!-- #page-title end --> 

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="tabs tabs-bordered tabs-justify clearfix" id="tab-2">
 
				<h2 style="border: 1px solid #DDD; border-bottom: 0; background-color: #F2F2F2" class="mb-0 text-center"><i class="icon-twitch"></i> Live Streams</h2>

				<div class="tab-container">

					@foreach($streams as $key => $stream)
						<div class="tab-content clearfix" id="tabs-{{ $key }}">
							<div id="twitch-embed-{{ $key }}"></div>
						</div>
					@endforeach

				</div>

				<ul class="tab-nav clearfix mb-5">
					@foreach($streams as $key => $stream)
						<li><a href="#tabs-{{ $key }}"><i class="icon-video"></i> {{ $stream->name }}</a></li>
					@endforeach
				</ul>

			</div>
			<!--LIVE STREAM END-->

			<div id='calendar'></div>
			<!--CALENDAR END-->

			<!-- Posts
			============================================= -->
			<div id="posts" class="post-grid row grid-container gutter-50 clearfix" data-layout="fitRows">

				@foreach($blogs as $blog)
				<div class="entry col-sm-6 col-12">
					<div class="grid-inner">
						<div class="entry-image">
							<a href="/e-football/{{ $blog->slug }}"><img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}"></a>
						</div>
						<div class="entry-title">
							<h2><a href="/e-football/{{ $blog->slug }}">{{ $blog->name }}</a></h2>
						</div>
						<div class="entry-meta">
							<ul>
								<li><i class="icon-calendar3"></i>{{ $blog->created_at->diffForHumans() }}</li>
								<li>
									<img src="/{{ $blog->admin->avatar }}" class="img-circle mr-2" alt="Avatar" width="32">
									By {{ $blog->admin->name }}
								</li>
							</ul>
						</div>
						<div class="entry-content">
							<p>{{ $blog->description }}</p>
							<a href="/e-football/{{ $blog->slug }}" class="more-link">Read More</a>
						</div>
					</div>
				</div>
				@endforeach

			</div>

			<h2 class="mt-5">Approved esport teams</h2>

			<div class="row">
				@foreach($teams as $team)
					<div class="col-sm-6 col-lg-4">
						<div class="feature-box text-center media-box fbox-bg">
							<div class="fbox-media">
								<a href="{{ $team->link }}"><img src="/storage/{{ $team->image }}" alt="{{ $team->name }}"></a>
							</div>
							<div class="fbox-content">
								<h3>{{ $team->name }}<span class="subtitle">{{ $team->link }}</span></h3>
							</div>
						</div>
					</div>
				@endforeach
			</div>

		</div>
	</div>
</section><!-- #content end -->

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://embed.twitch.tv/embed/v1.js"></script>

<script>
$(document).ready(function () {
   
	var SITEURL = "{{ url('/') }}";
	$.ajaxSetup({
	    headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var calendar = $('#calendar').fullCalendar({
	    events: {!! json_encode($calendar) !!},
	    eventRender: function(eventObj, $el) {
		  	$el.popover({
		        title: eventObj.title,
		        content: eventObj.description,
		        color: eventObj.color,
		        trigger: 'hover',
		        placement: 'top',
		        container: 'body'
		    });
	    }
	});
 
});
</script>

<script type="text/javascript">
	@foreach($streams as $key => $stream)
	    new Twitch.Embed("twitch-embed-{{ $key }}", {
	    	width: "100%",
	    	height: 480,
	    	channel: "{{ $stream->channel }}",
	    });
    @endforeach
</script>
@endsection