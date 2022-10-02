@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Governance</title>
<meta name="title" content="IEFF — Governance">
<meta name="description" content="Platform for governmental processes.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://ie-ff.com/forum">
<meta property="og:title" content="IEFF — Governance">
<meta property="og:description" content="Platform for governmental processes.">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://ie-ff.com/forum">
<meta property="twitter:title" content="IEFF — Governance">
<meta property="twitter:description" content="Platform for governmental processes.">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Governance</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Governance</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container">

			<div class="row col-mb-50">
				<div class="col-6">

					@foreach($questions as $number => $question)
						<div class="toggle toggle-bg">
							<div class="toggle-header">
								<div class="toggle-icon">
									<i class="toggle-closed icon-question"></i>
									<i class="toggle-open icon-remove-circle"></i>
								</div>
								<div class="toggle-title">
									{{ $question->question }}
								</div>
							</div>
							<div class="toggle-content pt-5">
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
				<div class="col-6">
					<p>The executive committee consists of the Spokesperson and the Professional player committee. As IEFF strives for an inclusive E-football scene, all the actors that are members in the community can share their opinions in the Forum.</p>

					<p>The committee picks up the presentments from the forum to the Governance, where it is up for voting.</p>

					<p>IEFF is always striving for consensus within the Governance between the Spokesperson, the Professional player committee and all the members.</p>
				</div>
			</div>

		</div> 
		
	</div>
</section><!-- #content end -->
@endsection

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR5J57bbQzcLUyjHILUcWxE4yXyjiEMRI&callback=initMap" type="text/javascript"></script>
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
