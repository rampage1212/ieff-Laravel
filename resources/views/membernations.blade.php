@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Sverige</title>
<meta name="title" content="IEFF — Sverige">
<meta name="description" content="All the latest member nations news">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://ie-ff.com/sverige">
<meta property="og:title" content="IEFF — Sverige">
<meta property="og:description" content="All the latest member nations news">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://ie-ff.com/sverige">
<meta property="twitter:title" content="IEFF — Sverige">
<meta property="twitter:description" content="All the latest member nations news">
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
		<h1>Sverige</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Member Nations</li>
		</ol>
	</div>
 
</section><!-- #page-title end --> 

<!-- Content
============================================= -->
<img src="/images/sweheader.png" style="width: 100%">
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="tabs tabs-bordered tabs-justify clearfix" id="tab-2">
 
				<h2 style="border: 1px solid #DDD; border-bottom: 0; background-color: #F2F2F2" class="mb-0 text-center"><i class="icon-twitch"></i> Live strömning</h2>

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
							<a href="/sverige/{{ $blog->slug }}"><img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}"></a>
						</div>
						<div class="entry-title">
							<h2><a href="/sverige/{{ $blog->slug }}">{{ $blog->name }}</a></h2>
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
							<a href="/sverige/{{ $blog->slug }}" class="more-link">Read More</a>
						</div>
					</div>
				</div>
				@endforeach

			</div><!-- #posts end -->

			<h2 class="mt-5">Ranking</h2>

			<p>Ladda upp bevis: Skärmdump eller bevis på rekord om du inte kan hitta tävlingen för dina rankingpoäng på (esportsearnings.com). Ladda upp bevis på tävlingen och priser.</p>
			<p>Den nationella rankingen är baserad på resultat i tävlingar som finns på esportsearnings.com från år 2000 och framåt - 2021 - 06 - 23 senast uppdaterad - </p>
			<p>För att dina Weekend League resultat eller andra tävlingar som inte finns med på esportearnings ska räknas med i rankingen, skicka in bevis på dina resultat och verifiera ditt lagkonto.</p>

			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
					  <tr>
						<th>Rank</th>
						<th>Land</th>
						<th>Spelarnamn</th>
						<th>Smeknamn</th>
						<th>Poäng</th>
					  </tr>
					</thead>
					<tbody>
						@foreach($rankings as $key => $ranking)
							@php
								if($rankings->currentPage() > 1) {
									$key = (($rankings->currentPage() - 1) * 25) + $key;
								}
							@endphp

							@if($key > 2 && (Auth::guest() || Auth::user()->paypal == 0))
								<tr>
									<td>{{ $key+1 }} {!! $ranking->change !!}</td>
									<td><img src="/images/flags/svg/{{ strtolower($ranking->country) }}.svg" width="24" height="16"></td>
									<td>
										Hidden
									</td>
									<td>Hidden</td>
									<td>{{ $ranking->points }}</td>
								</tr>
							@else
							<tr>
					    		<td>{{ $key+1 }} {!! $ranking->change !!}</td>
								<td><img src="/images/flags/svg/{{ strtolower($ranking->country) }}.svg" width="24" height="16"></td>
								<td>
									@if($ranking->user_id != null)
										<a href="/player-card/{{ $ranking->user_id }}" target="_blank">{{ $ranking->name }}</a>
									@else
										<a href="#">{{ $ranking->name }}</a>
									@endif
								</td>
								<td>{{ $ranking->nickname }}</td>
								<td>{{ $ranking->points }}</td>
					    	</tr>
					    	@endif
					    @endforeach
					</tbody>
				</table>
			</div>

			<hr>

			<p class="mb-0"><b>Ranking information</b></p>
			<p>En tävling måste uppfylla alla minimikrav för att kunna klassas som en tävling för vederbörande poängklass. SEFF förbehåller sig rätten att göra undantag för tävlingar som spelas vid olämplig tidpunkt eller på ett tillvägagångssätt som inte anses hålla kvalitet. SEFF har även rätt att ändra kraven löpande under säsongen beroende på vilka prisnivåer arrangörerna lägger sig på och ifall nya tävlingar tillkommer. </p>
			<p>Vi kommer gå ut med all nödvändig information inför varje tävling på våra sociala medier. Twitter och facebook: @SEFForbundet och här på vår hemsida.</p>

			<p>Redovisning: Spelaren ansvarar själv för att redovisa intjänade rankningspoäng genom att skicka in en screenshot som tydligt visar resultatet från tävlingen</p>
			<p>Bonuspoäng: En spelare som är rankad utanför topp 8, som slår en spelare rankad inom topp 4 i Sverige, i FRS 150 Series eller högre, får 20 rankningspoäng. Detta gäller endast tävlingar på svensk mark och gäller inte under gruppspel.</p>
			<p>Inbjudning: Rankningspoäng gäller ej i invitational only-turneringar eller turneringar som inte är öppna att kvala in till för allmänheten.</p>
			<p>Dubbelbelöning: Om en spelare deltar i flera olika kval till samma tävling får spelaren endast rankningspoäng för det kvalet som spelaren kom längst i.</p>
			<p>Wild card: En spelare som fått wild card till en tävling måste avancera minst en runda för att kunna aktivera sina rankningspoäng.</p>
			Om flera spelare hamnar på samma rankningspoäng gäller följande: <br>1. Datum vid senast intjänade poäng <br>2. Datum vid senast högst intjänade poäng <br>3. Flest poäng från nuvarande säsong <br>4. Flest vinster mot toppspelare<br><br>
			<p>Minimikraven är bara en ungefärlig uppskattning, enskilda bedömningar görs.</p>

			<p><b>1000 Series (FIWC, Ultimate Team Championship, SM)</b></p>
			<table class="table table-hover table-striped">
				<th>Position</th>
				<th>Poäng</th>

				<tr>
					<td>1</td>
					<td>1000</td>
				</tr>
				<tr>
					<td>2</td>
					<td>670</td>
				</tr>
				<tr>
					<td>3-4*</td>
					<td>450</td>
				</tr>
				<tr>
					<td>5-8</td>
					<td>300</td>
				</tr>
				<tr>
					<td>9-16</td>
					<td>200</td>
				</tr>
				<tr>
					<td>17-32</td>
					<td>100</td>
				</tr>
				<tr>
					<td>33-64</td>
					<td>50</td>
				</tr>
				<tr>
					<td>65-128</td>
					<td>25</td>
				</tr>
			</table>
			<small>*90 poäng vid vinst i eventuell bronsmatch</small>

			<p class="mb-0 mt-3">Krav:</p>
			<ul style="list-style-position: inside;">
				<li>Officiellt världsmästerskap eller svensk mästerskap.</li>
			</ul>
			
			<hr>
			<p><b>600 Series (Ultimate Team Regional Final, ESWC, PLAL Grand Finals)</b></p>

			<table class="table table-hover table-striped">
				<th>Position</th>
				<th>Poäng</th>
				<tr>
					<td>1</td>
					<td>600</td>
				</tr>
				<tr>
					<td>2</td>
					<td>400</td>
				</tr>
				<tr>
					<td>3-4*</td>
					<td>270</td>
				</tr>
				<tr>
					<td>5-8</td>
					<td>180</td>
				</tr>
				<tr>
					<td>9-16</td>
					<td>120</td>
				</tr>
				<tr>
					<td>33-64</td>
					<td>30</td>
				</tr>
			</table>
			<small>*50 poäng vid vinst i eventuell bronsmatch</small>

			<p class="mb-0 mt-3">Krav:</p>
			<ul style="list-style-position: inside;">
				<li>Internationella tävlingar: Tävling med stor prestige och medial räckvidd. Deltagande världselit. Minst 6000 dollar till vinnaren.</li>
				<li>Svenska tävlingar LAN: Tävling med stor prestige och medial räckvidd. Minst fem deltagare från topp 8 i Sverige. Minst 30.000 SEK till vinnaren.</li>
			</ul>
			
			<hr>
			<p><b>300 Series (Ultimate Team Qualifer, Gfinity H2H total Leaderboard, FUT Champions monthly Leaderboard)**</b></p>
			<table class="table table-hover table-striped">
				<th>Position</th>
				<th>Poäng</th>

				<tr>
					<td>1</td>
					<td>300</td>
				</tr>
				<tr>
					<td>2</td>
					<td>200</td>
				</tr>
				<tr>
					<td>3-4*</td>
					<td>135</td>
				</tr>
				<tr>
					<td>5-8</td>
					<td>90</td>
				</tr>
				<tr>
					<td>9-16</td>
					<td>60</td>
				</tr>
				<tr>
					<td>17-32</td>
					<td>30</td>
				</tr>
				<tr>
					<td>33-64</td>
					<td>15</td>
				</tr>
			</table>           
			<small>*25 poäng vid vinst i eventuell bronsmatch</small>

			<p class="mb-0 mt-3">Krav:</p>
			<ul style="list-style-position: inside;">
				<li>Internationella tävlingar: Tävling med prestige. Deltagande världselit. Minst 3000 dollar till vinnaren.</li>
				<li>Svenska tävlingar LAN: Tävling med prestige. Minst fyra deltagare från topp 8 i Sverige. Minst 15.000 SEK till vinnaren.</li>
				<li>Svenska tävlingar Online: Tävling med prestige. Minst fyra deltagare från topp 8 i Sverige. Minst 10.000 SEK i total prispott/prylar.</li>
			</ul>
			<small>**Om en spelare slutar top 64 i en leaderboard på båda konsolerna, gäller endast resultatet på den konsolen där spelaren har bäst placering.</small>


			<hr>
			<p><b>150 Series</b></p>
			<table class="table table-hover table-striped">
				<th>Position</th>
				<th>Poäng</th>

				<tr>
					<td>1</td>
					<td>150</td>
				</tr>
				<tr>
					<td>2</td>
					<td>100</td>
				</tr>
				<tr>
					<td>3-4</td>
					<td>70</td>
				</tr>
				<tr>
					<td>5-8</td>
					<td>45</td>
				</tr>
				<tr>
					<td>9-16</td>
					<td>30</td>
				</tr>
				<tr>
					<td>17-32</td>
					<td>15</td>
				</tr>
			</table>          
			<p class="mb-0">Krav:</p>
			<ul style="list-style-position: inside;">
				<li>Internationella tävlingar LAN: Minst tre deltagare från topp 8 i Sverige. Minst 1500 dollar till vinnaren.</li>
				<li>Internationella tävlingar Online: Minst tre deltagare från topp 8 i Sverige. Minst 1000 dollar i total prispott/prylar.</li>
				<li>Svenska tävlingar LAN: Minst tre deltagare från topp 8 i Sverige. Minst 7500 SEK till vinnaren.</li>
				<li>Svenska tävlingar Online: Minst tre deltagare från topp 8 i Sverige. Minst 5.000 SEK i total prispott/prylar.</li>
			</ul>

			<hr>
			<p><b>75 Series</b></p>
			<table class="table table-hover table-striped">
				<th>Position</th>
				<th>Poäng</th>

				<tr>
					<td>1</td>
					<td>75</td>
				</tr>
				<tr>
					<td>2</td>
					<td>50</td>
				</tr>
				<tr>
					<td>3-4</td>
					<td>35</td>
				</tr>
				<tr>
					<td>5-8</td>
					<td>25</td>
				</tr>
				<tr>
					<td>9-16</td>
					<td>15</td>
				</tr>
			</table>
			<p class="mb-0">Krav:</p>
			<ul style="list-style-position: inside;">
				<li>Internationella tävlingar LAN: Minst två deltagare från topp 8 i Sverige. Minst 750 dollar till vinnaren. Minst 124 deltagare.</li>
				<li>Internationella tävlingar Online: Minst två deltagare från topp 8 i Sverige. Minst 500 dollar i total prispott/prylar. Minst 124 deltagare.</li>
				<li>Svenska tävlingar Online: Minst två deltagare från topp 8 i Sverige. Minst 2.500 SEK i total prispott/prylar.</li>
			</ul>

			<hr>
			<p><b>25 Series (Gfinity H2H Cup*, ESL månadsfinal, mindre utvalda svenska turneringar)</b></p>
			<table class="table table-hover table-striped">
				<th>Position</th>
				<th>Poäng</th>

				<tr>
					<td>1</td>
					<td>25</td>
				</tr>
				<tr>
					<td>2</td>
					<td>15</td>
				</tr>
				<tr>
					<td>3-4</td>
					<td>10</td>
				</tr>
				<tr>
					<td>5-8</td>
					<td>5</td>
				</tr>
			</table>
			<p class="mb-0">Krav:</p>
			<ul style="list-style-position: inside;">
				<li>Internationella tävlingar: Deltagande av flertal europeiska toppspelare. Minst 100 dollar till vinnaren. Minst 128 deltagare. Gäller till och med 30:e juni pågående säsong.</li>
				<li>Svenska tävlingar Online: Utvalda mindre turneringar med någon form av pris.</li>
			</ul>

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