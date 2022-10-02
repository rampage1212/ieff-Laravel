@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — License</title>
<meta name="title" content="IEFF — International E-Football Federation">
<meta name="description" content="Buy your license and get all of the benefits of joining the E-football scene today!">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://ie-ff.com/license">
<meta property="og:title" content="IEFF — License">
<meta property="og:description" content="Buy your license and get all of the benefits of joining the E-football scene today!">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://ie-ff.com/license">
<meta property="twitter:title" content="IEFF — License">
<meta property="twitter:description" content="Buy your license and get all of the benefits of joining the E-football scene today!">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>License</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">License</li>
		</ol>
	</div>
 
</section><!-- #page-title end -->

<section id="content">
	<div class="content-wrap">
		<div class="container">

			<div class="row col-mb-50">
				<div class="col-12">

					@if(isset($warning))
						<div class="alert alert-danger mb-5">
						    <i class="icon-remove-sign"></i><strong>Purchase License Below</strong> {{ $warning }}
						</div>
					@endif

					<div class="pricing-box pricing-extended row align-items-stretch mb-5 mx-0">
						<div class="pricing-desc col-lg-9 p-4">
							<div class="pricing-title">
								<h3>
									Get your license today
									<img src="https://www.kindpng.com/picc/m/366-3669285_secure-ssl-encryption-logo-png-transparent-png.png" style="float:right" height="42">
									<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png" class="mr-2" alt="Buy now with PayPal" style="float: right;" />
								</h3>
							</div>
							<div class="pricing-features pb-0">
								<ul class="row">
									<li class="col-md-6"><i class="icon-check mr-2 me-2"></i> Full access to all website features</li>
									<li class="col-md-6"><i class="icon-check mr-2 me-2"></i> Only $4.50 per month</li>
									<li class="col-md-6"><i class="icon-check mr-2 me-2"></i> Pay via PayPal or credit/debit card</li>
									<li class="col-md-6"><i class="icon-check mr-2 me-2"></i> Secure checkout via SSL</li>
								</ul>

								<p class="mt-2 mb-2">View the full benefits of becoming a member below. Membership is available for players, team coaches, member nations, administrators and competition organisers. Click the button "Check out with PayPal" on the right to buy now. <i class="icon-arrow-right1 ml-2"></i> </p>
							</div>
						</div>

						<div class="pricing-action-area col-lg d-flex flex-column justify-content-center">
							<div class="pricing-meta">
								As Low as
							</div>
							<div class="pricing-price">
								<span class="price-unit">$</span>4.50<span class="price-tenure">monthly</span>
							</div>
							<div class="pricing-action">
								<a href="{{ url('subscribe/paypal') }}" class="mt-2">
									<img class="mt-4" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" />
								</a>
							</div>
						</div>
					</div>

					<div class="tabs tabs-justify mx-auto clearfix" id="tab-3">

						<ul class="tab-nav tab-nav2 clearfix">
							<li><a href="#player">Player</a></li>
							<li><a href="#coach">Team Coach</a></li>
							<li><a href="#member-nations">Member Nations</a></li>
							<li><a href="#admin">Administrator</a></li>
							<li class="hidden-phone"><a href="#organiser">Competition Organiser</a></li>
						</ul>

						<div class="tab-container">

							<div class="tab-content clearfix" id="player">
								<p>IEFF is a federation that is driven by and for the players, whose interests do always come first. The Spokesperson of IEFF is a competitive E-football player himself, the organization is structured through an executive committee with an IEFF Community forum, so that the players may play an important role in the shaping of the E-football scene now and in the future to come. If you as a player want to apply for the member license as an official E-football athlete of IEFF, you will have to accept the player statutes which are the terms and conditions that are connected to the license you apply for.</p>

								<div class="fancy-title title-border">
									<h3>Benefits for Players</h3>
								</div>

								<div class="row col-mb-50 mb-0">
									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon mb-4">
												<a href="#"><i class="icon-vcard i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Getting the Player card</h3>
												<p>The Player card is your unique license and personal profile. You can change the card’s player information about yourself depending on what you want to be shown, apart from some basic and fundamental information. You can use your Player card to show up yourself for team coaches that may be interested in you, so take care of your own brand. The player card will also be used if you may want to participate in an IEFF licensed competition. IEFF prioritize your individual security highest and we're following your rights of secrecy in the direction of our privacy policy.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-line-globe i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Shown on the website</h3>
												<p>Licensed players is shown on the website at the membership page.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-trophy i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Find ranked Competitions</h3>
												<p> You can find all upcoming ranked competitions and see events on the E-football page. On the membership page you can also see which competition organizers that is IEFF approved and therefore reaches our standards.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-news i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Full access to the News sections</h3>
												<p>You get full access to all the news found on the platform. This include full rights to read all form of news articles such as news from the worldwide E-football scene, competitions and IEFF Announcements with the latest happenings within the organization.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Join the Forum</h3>
												<p> You will be able to join the Forum which is a platform for serious discussions about the E-football scene. The Forum is a place where all IEFF licensed can interact on certain topics, come with own opinions and vote up/down on specific questions into the Governance. Explain your opinions when it comes to everything from competitions and its formats to the game and the scene in its whole. </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-gavel i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Permission to the Governance page</h3>
												<p>As you have permissions to view the 'Governance' page you can find all the presentments in different questions, both from IEFF and the Forum and read about the decisions and its supporting documentation. You will also have the possibility to vote in specific questions. This is a place where you in a democratic way can influence in which direction IEFF form the international E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-user21 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Show up as a free agent </h3>
												<p>You can show up yourself for team coaches that may be interested in you. Name yourself as a free agent or a member of a team on your Player card in the transfer window. If a team coach should contact you and come with a proposal, you can reply with an offer.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-check1 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Professionality, a guarantee with IEFF</h3>
												<p>IEFF breath quality. And we can guarantee you a professional atmosphere as a license of IEFF only is for people who believes in following our common laws for the E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-check1 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Join the ranking</h3>
												<p>Licensed players do automatically join the ranking lists.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Get in touch with IEFF</h3>
												<p>As a licensed member you are able to send and answer messages with the IEFF.</p>
											</div>
										</div>
									</div>

									<a href="#" class="button button-large button-rounded btn-block text-center">View Rules</a>
								</div>
							</div>
							<div class="tab-content clearfix" id="coach">
								<p>Note: As a team staff member you are obligated to know the laws for your signed players to follow. </p>

								<div class="fancy-title title-border">
									<h3>Benefits for coaches</h3>
								</div>

								<div class="row col-mb-50 mb-0">
									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon mb-4">
												<a href="#"><i class="icon-users i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Show interest for players</h3>
												<p>Team staff can through the transfer window page and connect with players of interest.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-line-globe i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Shown on the website</h3>
												<p>Licensed clubs are shown on the website at the E-Football page for licensed members.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Join the Forum</h3>
												<p> You will be able to join the Forum which is a platform for serious discussions about the E-football scene. The Forum is a place where all IEFF licensed can interact on certain topics, come with own opinions and vote up/down on specific questions into the Governance. Represent your team when it comes to questions in everything from competitions and its formats to the game and the scene in its whole. </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-gavel i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Permission to the Governance page</h3>
												<p>As you have permissions to view the 'Governance' page you can find all the presentments in different questions, both from IEFF and the Forum and read about the decisions and its supporting documentation. You will also have the possibility to vote in specific questions. This is a place where you in a democratic way can influence in which direction IEFF form the international E-football scene.  </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-news i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Full access to the News sections</h3>
												<p> You get full access to all the news found on the platform. This include full rights to read all form of news articles such as news from the worldwide E-football scene, competitions and IEFF Announcements with the latest happenings within the organization.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-trophy i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Find ranked Competitions</h3>
												<p>You can find all upcoming ranked competitions and see events on the E-football page. On the membership page you can also see which competition organizers that is IEFF approved and therefore reaches our standards.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-check1 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Professionality, a guarantee with IEFF</h3>
												<p>IEFF breath quality. And we can guarantee you a professional atmosphere as a license of IEFF only is for people who believes in following our common laws for the E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Get in touch with IEFF</h3>
												<p>As a licensed member you are able to send and answer messages with the IEFF.</p>
											</div>
										</div>
									</div>

									<a href="#" class="button button-large button-rounded btn-block text-center">View Rules</a>
								</div>
							</div>
							<div class="tab-content clearfix" id="member-nations">
								

								<div class="fancy-title title-border">
									<h3>Benefits for member nations</h3>
								</div>

								<div class="row col-mb-50 mb-0">
									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon mb-4">
												<a href="#"><i class="icon-hands-helping i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Expert help from IEFF</h3>
												<p>IEFF has a competent and productive team on board that always offer the licensed member nations and federations expert help. Together with the associations we discuss and offer support with the structuring of the associations. IEFF supports its allies with the development of its national E-football scenes.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-line2-game-controller i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Promoting the E-football</h3>
												<p>IEFF supports its member nations in their job to get the E-football more accepted in respectively country. This include the support to help promote the E-football in a positive way towards governments, Esport associations, Esport organizations and the Esport communities in the nation. We will continue to push the E-football forward in order to make it to an accepted Esport, recognized as a sport and certain type of athletics.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-line-globe i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Shown on the website </h3>
												<p>Licensed federations is shown on the website at the IEFF page for licensed members.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Join the Forum </h3>
												<p>You will be able to join the Forum which is a platform for serious discussions about the E-football scene. The Forum is a place where all IEFF licensed can interact on certain topics, come with own opinions and vote up/down on specific questions into the Governance. Represent your team when it comes to questions in everything from competitions and its formats to the game and the scene in its whole. </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-gavel i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Permission to the Governance page</h3>
												<p>As you have permissions to view the 'Governance' page you can find all the presentments in different questions, both from IEFF and the Forum and read about the decisions and its supporting documentation. You will also have the possibility to vote in specific questions. This is a place where you in a democratic way can influence in which direction IEFF form the international E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-news i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Full access to the News sections</h3>
												<p>You get full access to all the news found on the platform. This include full rights to read all form of news articles such as news from the worldwide E-football scene, competitions and IEFF Announcements with the latest happenings within the organization.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-trophy i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Find ranked Competitions</h3>
												<p>You can find all upcoming ranked competitions and see events on the E-football page. On the membership page you can also  see which competition organizers that is IEFF approved and therefore reaches our standards.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-check1 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Professionality, a guarantee with IEFF</h3>
												<p>IEFF breath quality. And we can guarantee you a professional atmosphere as a license of IEFF only is for people who believes in following our common laws for the E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Get in touch with IEFF</h3>
												<p>As a licensed member you are able to send and answer messages with the IEFF.</p>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="tab-content clearfix" id="admin">
								<p>The educational process of making the licensed administrators and referees worldwide familiar with the standardizations of IEFF, is an important work in order to establish and secure the knowledge of general rules and regulations for lEFF approved competitions. As an admin you shall know the laws for your competing players to follow.
								The rules for Competition organizers is also for Admins/referees to follow.</p>

								<div class="fancy-title title-border">
									<h3>Benefits for administrators</h3>
								</div>

								<div class="row col-mb-50 mb-0">
									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon mb-4">
												<a href="#"><i class="icon-certificate i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Get the IEFF Certification</h3>
												<p>As a licensed admin/referee you will be shown on the IEFF page or member nation page for licensed members.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-hands-helping i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Guidance</h3>
												<p>The licensed admins and referees will be offered guidance and help for differently situations.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-trophy i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Find all competitions</h3>
												<p>Licensed admins and referees can find all the upcoming ranked competitions and find events on the homesite of IEFF. On the E-football page you can also see which competition organizers that is IEFF approved and therefore reaches our standards.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-news i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>News articles</h3>
												<p>You will get full access to all the news found on the platform. This include full rights to read all form of news articles such as news from the worldwide E-football scene, competitions and IEFF Announcements with the latest happenings within the organization.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-gavel i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Governance</h3>
												<p>As you have permissions to view the ‘’Governance’’ page you can find all the presentments in different questions, both from IEFF and the Forum and read about the decisions and its supporting documentation. You will also have the possibility to vote in specific questions. This is a place where you in a democratic way can influence in which direction IEFF form the international E-football scene. </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Join the Forum</h3>
												<p>You will be able to join the Forum which is a platform for serious discussions about the E-football scene. The Forum is a place where all IEFF licensed can interact on certain topics, come with own opinions and vote up/down on specific questions into the Governance. Explain your opinions when it comes to everything from competitions and its formats to the game and the scene in its whole. </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-retweet i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Find Competition Organizers</h3>
												<p>In the member and e-football page you can show up yourself for competition organizers.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-check1 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Professionality, a guarantee with IEFF</h3>
												<p>IEFF breath quality. And we can guarantee you a professional atmosphere as a license of IEFF only is for people who believes in following our common laws for the E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Get in touch with IEFF</h3>
												<p>As a licensed member you are able to send and answer messages with the IEFF.</p>
											</div>
										</div>
									</div>

									<a href="#" class="button button-large button-rounded btn-block text-center">View Rules</a>
								</div>
							</div>
							<div class="tab-content clearfix" id="organiser">
								<p>If you are a competition organization you will have to understand and accept the general standardizations of IEFF for all the environmental aspects around competitions. All players and admins/referees have to get licensed before joining a competition of yours. As a competition organizer you shall know the laws for your competing players to follow. The rules for Competition organizers are also for Admins/referees to follow. </p>

								<div class="fancy-title title-border">
									<h3>Benefits for competition organisers</h3>
								</div>

								<div class="row col-mb-50 mb-0">
									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon mb-4">
												<a href="#"><i class="icon-hands-helping i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Expert help from IEFF</h3>
												<p>IEFF has a competent and productive team on board that always offer the licensed competition organizers expert help. Together with the competition organizers we discuss and offer support with the structuring of the arrangement of the competitions. The requirements of IEFF and the support to competition organizers in order for them to reach those requirements is an important work for IEFF in order to uphold the competitive E-football scene.  </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Access to the Forum </h3>
												<p>The competition distributors have access to the Forum so that the creators behind the competitions can interact and listen to what the community says. </p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-gavel i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Permission to the Governance page</h3>
												<p>As you have permissions to view the 'Governance' page you can find all the presentments in different questions, both from IEFF and the Forum and read about the decisions and its supporting documentation. You will also have the possibility to vote in specific questions. This is a place where you in a democratic way can influence in which direction IEFF form the international E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-line-globe i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Shown on the website of IEFF</h3>
												<p>Competitions that are approved are shown on the international or national E-football page and as upcoming competitions in the calendar for licensed members..</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-news i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Full access to the News sections</h3>
												<p>You get full access to all the news found on the platform. This include full rights to read all form of news articles such as news from the worldwide E-football scene, competitions and IEFF Announcements with the latest happenings within the organization.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-trophy i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Find ranked Competitions</h3>
												<p>You can find all upcoming ranked competitions and see events on the E-football page. On the membership page you can also  see which competition organizers that is IEFF approved and therefore reaches our standards.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-line-list i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Find admins</h3>
												<p>In the world map and e-football page you can find admins/referees for your E-football competition</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-check1 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Professionality, a guarantee with IEFF</h3>
												<p>IEFF breath quality. And we can guarantee you a professional atmosphere as a license of IEFF only is for people who believes in following our common laws for the E-football scene.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-check1 i-alt"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Shown on the website of IEFF</h3>
												<p>Competitions that are approved are shown on the international or national E-football page and as upcoming competitions in the calendar.</p>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-lg-6">
										<div class="feature-box fbox-effect">
											<div class="fbox-icon">
												<a href="#"><i class="icon-chat"></i></a>
											</div>
											<div class="fbox-content">
												<h3>Get in touch with IEFF</h3>
												<p>As a licensed member you are able to send and answer messages with the IEFF.</p>
											</div>
										</div>
									</div>

									<a href="#" class="button button-large button-rounded btn-block text-center">View Rules</a>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</section>

@endsection