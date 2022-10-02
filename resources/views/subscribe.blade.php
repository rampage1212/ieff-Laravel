@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Subscribe</title>
<meta name="title" content="IEFF — Subscribe">
<meta name="description" content="IEFF Premium Subscription">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="IEFF — Subscribe">
<meta property="og:description" content="IEFF Premium Subscription">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ Request::url() }}">
<meta property="twitter:title" content="IEFF — Subscribe">
<meta property="twitter:description" content="IEFF Premium Subscription">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Subscribe</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Rankings</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<a href="{{ url('subscribe/paypal') }}">Click here to subscribe</a>
		</div>
	</div>
</section>

@endsection