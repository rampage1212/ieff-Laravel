@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Rankings</title>
<meta name="title" content="IEFF — Rankings">
<meta name="description" content="Official World Rankings">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="IEFF — Rankings">
<meta property="og:description" content="Official World Rankings">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ Request::url() }}">
<meta property="twitter:title" content="IEFF — Rankings">
<meta property="twitter:description" content="Official World Rankings">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Rankings</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Rankings</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<style type="text/css">
	.z-0 {
		display: none;
	}

	.leading-5 {
		margin-top: 10px;
	}
</style>

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="row gutter-40 col-mb-80">

				<div class="col-12">
					<p>Upload evidence: Screenshot or evidence of record if you can’t find the competition(s) for your ranking points at (esportsearnings.com). Upload proof on the competition, bracket and prizes. </p>

					<p>The World rank is based upon results in competitions found on esportsearnings.com from year 2000 and forward
					- 2021 - 08 - 10 - latest updated</p>

					<p>In order for your Weekend League results or other competitions that is not found on eSportearnings to count on the world ranking list, please send in proof of your results and verify your team account. </p>
				</div>
 
				<div class="col-sm-12 col-md-8">
					<div class="table-responsive">
						<table class="table table-hover table-striped">
							<thead>
							  <tr>
								<th>Rank</th>
								<th>Country</th>
								<th>Player Name</th>
								<th>Nickname</th>
								<th>Points</th>
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
					<div class="mt-2"> {{ $rankings->links() }}</div>
				</div>

				<div class="col-sm-12 col-md-4">
					@if(Auth::guest() || Auth::user()->paypal == 0)
					<div class="style-msg infomsg">
						<div class="sb-msg"><i class="icon-info-sign"></i><strong>Heads up!</strong><br>Upgrade your membership to view the full rankings.<br><a href="/license">Click here to get your license</a></div>
					</div>
					@endif

					<div class="card">
						<div class="card-header"><b>{{ $text->title }}</b></div>
						<div class="card-body">
							<p class="card-text">{!! nl2br(e($text->body)) !!}</p>
						</div>
					</div>
				</div>

				<div class="col-12">
					<p>A competition must meet all minimum requirements in order to be classified as a competition for the relevant points class. The IEFF reserves the right to make exceptions for competitions played at an inappropriate time or in an approach that is not considered to be of good quality. The IEFF also has the right to change the requirements continuously during the season depending on which price levels the organizers apply and if new competitions are added.</p>

					<p>We will go out with all the necessary information before each competition on our social media. Twitter and facebook: @IEFFederation and here on our website.</p>
					<ul class="ml-3">
						<li>
							<p>The player is responsible for reporting earned ranking points by submitting a screenshot that clearly shows the result from the competition.</p>
						</li>
						<li>
							<p>Ranking points do not apply in invitational only tournaments or tournaments that are not for open for for the public to qualify. </p>
						</li>
						<li>
							<p>If a player participates in several different qualifiers for the same competition, the player only receives ranking points for the qualifier in which the player came furthest.advance</p>
						</li>
						<li>
							<p>If more than 1 players finishes in the same place, the following counts: 1. Most points from the ongoing season 2. Most wins against top players. </p>
						</li>
						<li>
							<p>The minimum classifications is only an approximate estimating. Individual judging is being made.</p>
						</li>
					</ul>

					<p><b>1000 Series</b></p>
					<table class="table table-hover table-striped">
						<th>Position</th>
						<th>Points</th>

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
					<p>*90 points in case of win in an eventual bronze match<br>Official world championships</p>
					<hr>

					<p><b>600 Series</b></p>
					<table class="table table-hover table-striped">
						<th>Position</th>
						<th>Points</th>

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
							<td>17-32</td>
							<td>60</td>
						</tr>

						<tr>
							<td>33-64</td>
							<td>30</td>
						</tr>
					</table>
					<p>50 points in case of win in an eventual bronze match.<br>International competitions: Competitions with large prestige and medium reach. Competing world elite. At least 6000 USD awarded to the winner.</p>
					<hr>

					<p><b>300 Series</b></p>
					<table class="table table-hover table-striped">
						<th>Position</th>
						<th>Points</th>

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
					<p>*25 points in case of a win in an eventual bronze match.<br>International competitions: Competitions with prestige. Competiting world elite. At least 3000 USD awarded to the winner.<br>International competitions LAN: At least 15000 USD awarded to the winner.<br>International compeititons online: At least 100 USD total prize pool.</p>
					<hr>

					<p><b>150 Series</b></p>
					<table class="table table-hover table-striped">
						<th>Position</th>
						<th>Points</th>

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
					<p>International competitions LAN: At least 750 USD awarded to the winner.<br>International competitions Online: At least 500 USD total prize pool.</p>
					<hr>

					<p><b>75 Series</b></p>
					<table class="table table-hover table-striped">
						<th>Position</th>
						<th>Points</th>

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
					<p>International compeititons: At least 100 USD awarded to the winner.</p>

					
				</div>
			</div>

		</div>
	</div>
</section>

@endsection