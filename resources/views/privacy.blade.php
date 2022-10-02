@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Privacy Policy</title>
<meta name="title" content="IEFF — Privacy Policy">
<meta name="description" content="Privacy policy of the IEFF.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="IEFF — Privacy Policy">
<meta property="og:description" content="Privacy policy of the IEFF.">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ Request::url() }}">
<meta property="twitter:title" content="IEFF — Privacy Policy">
<meta property="twitter:description" content="Privacy policy of the IEFF.">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Privacy Policy</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container">

			<div class="row col-mb-50">
				<div class="col-12">
					<p>The Privacy policy of IEFF is updated towards the GDPR law (General Data Protection Regulation) implemented by the European Union (EU) 25th of May 2018.<p>

					<p>In order to know which data that will be shown publicly, please view the "membership" page and look after your actors form and its respectively profile information.As a member of IEFF you agree upon that all the necessary information of your data will be published and used in the Member page, Forum, Transfer window, Ranking page and the Player card. The data in the Member page and the Ranking will be open for any third parties, the other is only for licensed members to access. It is prohibited for members to share inside information to any third party. The information will be stored by IEFF as long as you remain licensed.</p>

					<p>IEFF will store contact information for emailing licensed actors, sending newsletters and other IEFF updates or of personal characteristics. You can choose your settings for Emails in your account. Emails that affect you directly are obligatory and not an optional choice.</p>

					<p>If you have any questions regarding your privacy rights, please contact (wijo@ie-ff.com).</p>
				</div>
			</div>

		</div>
	</div>
</section><!-- #content end -->
@endsection