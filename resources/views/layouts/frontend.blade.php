<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	@yield('metatags')
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="IEFF, International E-Football Federation, IEFFederation, International Federation, Federation, Governing body, Esport, Esports, E-Football, FIFA Esport, FIFA Esports, FIFA 18, FIFA 19, FIFA 20, FIFA 21, FIFA, FIFA Esport scene, FIFA scene, Esport scene, FIFA gaming, FIFA game, EA Sports, EA.">
	
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/style.css" type="text/css" />
	<link rel="stylesheet" href="/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />
	@yield('css')
	<link rel="stylesheet" href="/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<style type="text/css">
		.gold:hover {
			color: gold!important;
		}
	</style>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-68426448-1"></script>
	<script>
	    window.dataLayer = window.dataLayer || [];
	    function gtag(){dataLayer.push(arguments);}
	    gtag('js', new Date());

	    gtag('config', 'UA-68426448-1');
	</script>

	<style type="text/css">
		a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
		a.gflag img {border:0;}
		a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
		#goog-gt-tt {display:none !important;}
		.goog-te-banner-frame {display:none !important;}
		.goog-te-menu-value:hover {text-decoration:none !important;}
		body {top:0 !important;}
		#google_translate_element2 {display:none!important;}
		.translate {
			background-color: transparent;
			border: none;
			color: lightgrey;
		    font-weight: 700;
		    font-size: 0.8125rem;
		    letter-spacing: 1px;
		    text-transform: uppercase;
		    font-family: 'Poppins', sans-serif;
		    margin-top: -0.7rem;
			padding-left: 1rem;
		}
	</style>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="d-none d-lg-block">
			<div class="container clearfix">

				<div class="row">

					<div class="col-4" style="min-width: 250px;">

						<!-- Top Social
						============================================= -->
						<ul id="top-social" style="float: left;">
							<li class="mt-3 mr-3"><a href="https://facebook.com/IEFFederation" target="_blank" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span></a></li>
							<li class="mt-3"><a href="https://twitter.com/IEFFederation" target="_blank" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span></a></li>
						</ul><!-- #top-social end -->

					</div>

					<div class="col-4">
						<!-- Logo
						============================================= -->
						<div class="justify-content-center">
							<a href="/" class="standard-logo" data-dark-logo="/images/ieff-logo.jpg"><img src="/images/ieff-logo.jpg" alt="IEFF Logo"></a>
						</div><!-- #logo end -->
					</div>

					<div class="col-4">

						<!-- Top Links
						============================================= -->
						<div class="top-links on-click" style="float: right">
							@if (Auth::check()) 
							<div class="dropdown mx-3 mr-lg-0">
								<a href="#" class="btn btn-sm menu-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding: 0px">
									<img class="currentavatar" src="/{{ Auth::user()->avatar }}" height="40" width="40" class="mr-2" style="border-radius: 50%">
									{{ Auth::user()->name }}
								</a>
								<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
									<a href="/profile" class="menu-link" style="padding: 0px 20px">
										<i class="icon-user-alt"></i> My Profile
									</a>
									<a href="/messages" class="menu-link" style="padding: 0px 20px">
										<i class="icon-inbox"></i> Messages
									</a>
									<div class="dropdown-divider"></div>
									<a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                        style="padding: 0px 20px"
                                        class="menu-link">
                                        <i class="icon-signout"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								</ul>
							</div>
							@else 
								<ul class="menu-container text-white">
									<li class="menu-item">
										<a class="menu-link" href="/login" style="padding-top:1.8rem!important"><div style="border-left:none"><i class="icon-user-alt"></i>Login</div></a>
									</li>
									<li class="menu-item">
										<a class="menu-link" href="/register" style="padding-top:1.8rem!important"><div style="border-right: 1px solid darkgreen; padding-right: 20px;"><i class="icon-user-alt"></i>Sign Up</div></a>
									</li>
									
									<!-- GTranslate: https://gtranslate.io/ -->
									<li class="menu-item">
										<a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;">
										</a>
									</li>

									<br /><select class="translate" onchange="doGTranslate(this);"><option value="">Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese</option><option value="en|zh-TW">Chinese</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
									

								</ul>
							@endif
						</div><!-- .top-links end -->

					</div>

				</div>

			</div>
		</div><!-- #top-bar end -->

		<header id="header" class="d-none d-lg-block">

			<div id="header-wrap">
				<div class="container">
					<div>

						<div class="header-misc" style="float: right;">
							<ul class="menu-container">
								<li class="menu-item">
									<a class="menu-link gold" href="/license"><div style="border-left: none"><i class="icon-arrow-right2"></i> Get License</div></a>
								</li>
							</ul>
						</div>

						<nav class="primary-menu">

							<ul class="menu-container justify-content-center" style="margin-left: 65px">
								<li class="menu-item">
									<a class="menu-link" href="/" style="padding-left: 0px;"><div style="border-left: none; padding: 0px;"><i class="icon-home"></i> Home</div></a>
								</li>
								<li class="menu-item sub-menu">
									<a class="menu-link" href="/ieff"><div><i class="icon-info-circle"></i> IEFF <i class="icon-caret-down1"></i></div></a>
									<ul class="sub-menu-container">
										<li class="menu-item" style="">
											<a class="menu-link" href="/sverige"><div style="border-left: none"><i class="icon-globe1"></i> Sverige</div></a>
										</li>
									</ul>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="/governance"><div><i class="icon-gavel"></i> Governance <i class="icon-caret-down1"></i></div></a>
									<ul class="sub-menu-container">
										<li class="menu-item" style="">
											<a class="menu-link" href="/forum"><div style="border-left:none"><i class="icon-chat"></i> Forum</div></a>
										</li>
									</ul>
								</li>
								<li class="menu-item sub-menu">
									<a class="menu-link" href="/e-football"><div><i class="icon-futbol"></i> E-football <i class="icon-caret-down1"></i></div></a>
									<ul class="sub-menu-container">
										<li class="menu-item" style="">
											<a class="menu-link" href="/transfer-window"><div style="border-left:none"><i class="icon-retweet1"></i> Transfer Window</div></a>
										</li>
									</ul>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="/rankings"><div><i class="icon-list-ol1"></i> Rankings</div></a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="/members"><div style="padding-right: 10px"><i class="icon-users"></i> Members</div></a>
								</li>
							</ul>

						</nav>

					</div>

				</div>
			</div>
		</header>



		<!-- Header
		============================================= -->
		<header id="header" class="d-none d-xs-block d-md-block d-lg-none full-header transparent-header" data-sticky-class="not-dark">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="/" class="standard-logo" data-dark-logo="/images/ieff.png">
								<img src="/images/ieff.png" alt="IEFF Logo">
							</a>
							<a href="/" class="retina-logo" data-dark-logo="/images/ieff@2x.png">
								<img src="/images/ieff@2x.png" alt="IEFF Logo">
							</a>
						</div><!-- #logo end -->

						<div class="header-misc">
							<div class="d-none d-sm-block">
								<a class="menu-link mr-3" href="/register" style="display:inline-block"><i class="icon-user"></i>Sign Up</a>
								<a class="menu-link" href="/login" style="display:inline-block"><i class="icon-user"></i>Log In</a>
								
								<select class="translate" onchange="doGTranslate(this);" style="display:inline-block;width:120px"><option value="">Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese</option><option value="en|zh-TW">Chinese</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
							</div>

						</div>

						<div id="primary-menu-trigger" style="margin-right: -20px">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

							<ul class="menu-container">
								
								<li class="menu-item mr-0">
									<a class="menu-link" href="/">
										<div><i class="icon-home"></i> HOME</div>
									</a>
								</li>

								<li class="menu-item mr-0">
									<a class="menu-link" href="/ieff">
										<div><i class="icon-info-circle"></i> IEFF</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item mr-0">
											<a class="menu-link" href="/sverige">
												<div><i class="icon-globe1"></i> SVERIGE</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="menu-item mr-0">
									<a class="menu-link" href="/governance">
										<div><i class="icon-gavel"></i> GOVERNANCE</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item mr-0">
											<a class="menu-link" href="/forum">
												<div><i class="icon-chat"></i> FORUM</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="menu-item mr-0">
									<a class="menu-link" href="/e-football">
										<div><i class="icon-futbol"></i> E-FOOTBALL</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item mr-0">
											<a class="menu-link" href="/transfer-window">
												<div><i class="icon-retweet1"></i> TRANSFER WINDOW</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="menu-item mr-0">
									<a class="menu-link" href="/rankings">
										<div><i class="icon-list-ol1"></i> RANKINGS</div>
									</a>
								</li>

								<li class="menu-item mr-0">
									<a class="menu-link" href="/members">
										<div><i class="icon-users"></i> MEMBERS</div>
									</a>
								</li>

								@if (Auth::check()) 
									<li class="menu-item mr-0 d-none d-xs-block">
										<a class="menu-link" href="/profile">
											<div><i class="icon-user-alt"></i> MY PROFILE</div>
										</a>
									</li>

									<li class="menu-item mr-0 d-none d-xs-block">
										<a class="menu-link" href="/messages">
											<div><i class="icon-inbox"></i> MESSAGES</div>
										</a>
									</li>

									<li class="menu-item mr-0 d-none d-xs-block">
										<a href="{{ route('logout') }}"
	                                        onclick="event.preventDefault();
	                                        document.getElementById('logout-form').submit();"
	                                        class="menu-link">
	                                        <div><i class="icon-signout"></i> {{ __('Logout') }}</div>
	                                    </a>

	                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                                        @csrf
	                                    </form>
									</li>
								@else
									<li class="menu-item mr-0 d-none d-xs-block">
										<a class="menu-link" href="/register">
											<div><i class="icon-users"></i> SIGN UP</div>
										</a>
									</li>

									<li class="menu-item mr-0 d-none d-xs-block">
										<a class="menu-link" href="/login">
											<div><i class="icon-users"></i> LOG IN</div>
										</a>
									</li>
								@endif
								
								<li class="menu-item mr-0 mb-4"></li>
							</ul>

						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="search.html" method="get">
							<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		@yield('body')

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			
			<!-- Copyrights
			============================================= -->
			<div id="copyrights pt-0">

				<div class="mb-5 py-5" style="background-color: #166542">
					<div class="container">
						<h3 class="text-center">IEFF Documents</h3>
						<hr><br>
						@if(isset($data))
							@foreach (array_chunk($data['documents']->toArray(), 3) as $set) 
								<div class="row">
									@foreach ($set as $document) 
										<div class="col-sm-6 col-md-4">
										<li class="text-center" style="list-style: none">
												<a href="/storage/{{ $document['filename'] }}" target="_blank">
													<i class="icon-file-pdf"></i> {{ $document['name'] }}
												</a>
											</li>
										</div>
									@endforeach
							</div>
							@endforeach
						@endif
					</div>
				</div>

				<div class="container">

					<div class="row justify-content-between col-mb-30">
						<div class="col-12 col-lg-auto text-center text-lg-left order-last order-lg-first">
							<div id="donate-button-container">
								<a href="/" style="float: left"><img src="/images/ieff-footer-logo.png" alt="IEFF logo" class="mb-4" style="margin-top: -4px"></a>
								<div id="donate-button" style="float: right"></div>
							</div>
							<br>
							<p class="d-none d-lg-block" style="float: right">Copyright &copy; {{ now()->year }} All Rights Reserved by IEFF.</p>
							<p class="d-none d-md-block d-lg-none">Copyright &copy; {{ now()->year }} All Rights Reserved by IEFF.</p>

							
						</div>

						<div class="col-12 col-lg-auto text-center text-lg-right">
							<div class="copyrights-menu copyright-links">
								<a href="/">Home</a>/
								<a href="/ieff">IEFF</a>/
								<a href="/governance">Governance</a>/
								<a href="/forum">Forum</a>/
								<a href="/e-football">E-Football</a>/
								<a href="/rankings">Rankings</a>/
								<a href="/members">Members</a>
							</div>

							<div class="copyrights-menu copyright-links">
								<a href="/login">Login</a>/
								<a href="/register">Register</a>/
								<a href="/terms">Terms & Conditions</a>/
								<a href="/privacy">Privacy Policy</a>/
								<a href="/contact">Contact IEFF</a>
							</div>

							<a href="https://facebook.com/IEFFederation" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="https://twitter.com/IEFFederation" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<!--
							<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon inline-block si-small si-borderless mb-0 si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
							-->
						</div>
					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="/js/jquery.js"></script>
	<script src="/js/plugins.min.js"></script>
	@yield('scripts')

	<!-- Footer Scripts
	============================================= -->
	<script src="/js/functions.js"></script>

	<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
	<script>
		PayPal.Donation.Button({
			env:'production',
			hosted_button_id:'YY5URYMA6FZCY',
			image: {
				src:'https://www.paypalobjects.com/en_US/SE/i/btn/btn_donateCC_LG.gif',
				alt:'Donate with PayPal button',
				title:'PayPal - The safer, easier way to pay online!',
			}
		}).render('#donate-button');
	</script>

	<script type="text/javascript">
		function googleTranslateElementInit2() {
			new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
	</script>
	<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


	<script type="text/javascript">
	/* <![CDATA[ */
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
	/* ]]> */
	</script>



</body>
</html>