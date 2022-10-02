@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — International E-Football Federation</title>
<meta name="title" content="IEFF — International E-Football Federation">
<meta name="description" content="All the latest news and statements from IEFF">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://ie-ff.com">
<meta property="og:title" content="IEFF — International E-Football Federation">
<meta property="og:description" content="All the latest news and statements from IEFF">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://ie-ff.com">
<meta property="twitter:title" content="IEFF — International E-Football Federation">
<meta property="twitter:description" content="All the latest news and statements from IEFF">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=268366001348877&autoLogAppEvents=1" nonce="ujIEeXAc"></script>

@if(!$news->isEmpty())
<section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100 include-header">
	<div class="slider-inner">
 
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				@foreach($news as $key => $newspost)
					@if($newspost->featured == 0)
						@continue
					@endif
					<div class="swiper-slide dark">
						<div class="container">
							<div class="slider-caption slider-caption-center">
								<h2 data-animate="fadeInUp" style="color: {{ $newspost->color }}">{{ $newspost->name }}</h2>
								<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">{{ $newspost->description }}</p>
								<a data-animate="fadeInUp" href="/e-football/{{ $newspost->slug }}" class="button button-border button-rounded button-light mt-5" style="max-width: 20rem; margin: 0 auto">Read More</a>
							</div>
						</div>
						<div class="swiper-slide-bg" style="background-image: url('/storage/{{ $newspost->image }}');"></div>
					</div>
				@endforeach
			</div>
			@if($key > 0)
				<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
			@endif
		</div>

		<a href="#" data-scrollto="#content" data-offset="100" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

	</div>
</section>
@endif

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">

		<div class="container">

			@foreach($questions as $number => $question)
				<div class="heading-block center">
					<h2>Vote Now</h2>
					<span class="mx-auto">{{ $question->question }}</span>
				</div>

				<div class="row col-mb-50 mb-4 justify-content-center">
					<div class="col-lg-4 col-md-6 text-center">
						@if(!isset($percentages))
						<form method="POST" id="vote-form-{{ $number }}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="question_id" value="{{ $question->id }}">
							<fieldset class="form-group">
								@foreach($question->tags as $key => $tag)
								<div class="form-check">
									<input class="form-check-input-{{ $number }}" type="radio" name="answer" id="answer-{{ $number }}-{{ $key }}" value="{{ $tag['id'] }}">
									<label class="form-check-label" for="answer-{{ $number }}-{{ $key }}">
										{{ $tag['name'] }} <span id="answer{{ $tag['id'] }}"></span>
									</label>
								</div>
								@endforeach
							</fieldset>

	                        <div class="form-group mt-5">
	                            <button id="submit-vote-form-{{ $number }}" class="button btn-block button-3d button-black m-0" id="submit-vote-form" name="submit-vote-form" value="register">Submit Vote</button>
	                        </div>
						</form>
						@endif

						<div id="piechart-{{ $number }}" style="margin-left: -2rem;margin-top: -3rem;"></div>
					</div>
				</div>
			@endforeach

		</div>

	</div>
</section><!-- #content end -->
@endsection

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR5J57bbQzcLUyjHILUcWxE4yXyjiEMRI&callback" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@if(isset($voteResults))
<script type="text/javascript">
percentages = @json($voteResults);

jQuery.each(percentages, function(key, answers){
	
	const piechart   = [];
	piechart.push(['Player', 'Percentage']);

	jQuery.each(answers, function(key, value){
		var loopNumber = key;

    	jQuery.each(value, function(key, value){
    		$('#answer'+key).html(' - '+value+'%');

    		piechart.push([key, value]);
    	});

    	// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
		    var data = google.visualization.arrayToDataTable(piechart);

		  // Optional; add a title and set the width and height of the chart
		  var options = {'width':550, 'height':400};

		  // Display the chart inside the <div> element with id="piechart"
		  var chart = new google.visualization.PieChart(document.getElementById('piechart-'+loopNumber));
		  chart.draw(data, options);
		}

		$('#vote-form-'+loopNumber).hide();
	});
});   
</script>
@endif

@foreach($questions as $key => $question)
	<script type="text/javascript">
	$("#submit-vote-form-{{ $key }}").on('click', function(e) {
	e.preventDefault();
	e.stopPropagation();
	    $.ajax({
	        data: $('#vote-form-{{ $key }}').serialize(),
	        url: "{{ route('vote') }}",
	        type: "POST",
	        dataType: 'json',
	        success: function (data) 
	        {
	        	console.log(data);
	            if(data.success) 
	            {
	            	console.log(data.success);
	            	const piechart   = [];
	            	piechart.push(['Player', 'Percentage']);

	            	jQuery.each(data.success, function(key, value){
	                	jQuery.each(value, function(key, value){
	                		$('#answer'+key).html(' - '+value+'%');

	                		piechart.push([key, value]);
	                	});
	                });

	                console.log(piechart);

	                $('#vote-form-{{ $key }}').hide();
	                $('.form-check-input-{{ $key }}').hide();
	                $('#submit-vote-form- {{ $key }}').hide();

	                // Load google charts
					google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

					// Draw the chart and set the chart values
					function drawChart() {
					    var data = google.visualization.arrayToDataTable(piechart);

					  // Optional; add a title and set the width and height of the chart
					  var options = {'width':550, 'height':400};

					  // Display the chart inside the <div> element with id="piechart"
					  var chart = new google.visualization.PieChart(document.getElementById('piechart-{{ $key }}'));
					  chart.draw(data, options);
					}
	            }
	            else 
	            {
	            	alert(data.error);
	            }
	        },
	        error: function (data) {
	        	alert("An unknown error occured. Please refresh the page and try again, if the problem persists please contact us: wijo@ie-ff.com");
	        }
	    });
	});
	</script>
@endforeach

@endsection
