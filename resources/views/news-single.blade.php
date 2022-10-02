@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — {{ $blog->name }}</title>
<meta name="title" content="IEFF — {{ $blog->name }}">
<meta name="description" content="{{ $blog->description}}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="IEFF — {{ $blog->name }}">
<meta property="og:description" content="{{ $blog->description}}">
<meta property="og:image" content="https://ie-ff.com/storage/{{ $blog->image }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ Request::url() }}">
<meta property="twitter:title" content="IEFF — {{ $blog->name }}">
<meta property="twitter:description" content="{{ $blog->description}}">
<meta property="twitter:image" content="https://ie-ff.com/storage/{{ $blog->image }}">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('/images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>{{ $blog->name }}</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item"><a href="/news">News</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $blog->name }}</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="row justify-content-center">
				<div class="col-sm-12 col-lg-9">

					<div class="single-post mb-0">

						<!-- Single Post
						============================================= -->
						<div class="entry clearfix">

							<!-- Entry Title
							============================================= -->
							<div class="entry-title">
								<h2>{{ $blog->name }}</h2>
							</div><!-- .entry-title end -->

							<!-- Entry Meta
							============================================= -->
							<div class="entry-meta">
								<ul>
									<li><i class="icon-calendar3"></i>{{ $blog->created_at->diffForHumans() }}</li>
									<li>
										<img src="/{{ $blog->admin->avatar }}" class="img-circle mr-2" alt="Avatar" width="32">
										By {{ $blog->admin->name }}
									</li>
								</ul>
							</div><!-- .entry-meta end -->

							<!-- Entry Image
							============================================= -->
							<div class="entry-image bottommargin">
								<a href="/storage/{{ $blog->image }}" data-lightbox="image"><img src="/storage/{{ $blog->image }}" alt="{{ $blog->name }}"></a>
							</div><!-- .entry-image end -->

							<!-- Entry Content
							============================================= -->
							<div class="entry-content mt-0" style="font-size: 1.5rem">

								{!! nl2br(e($blog->content)) !!}

								<div class="clear"></div>

								<!-- Post Single - Share
								============================================= -->
								<div class="mt-5 si-share border-0 d-flex justify-content-between align-items-center">
									<span>Share this Post:</span>
									<div class="sharethis-inline-share-buttons" style="z-index: 1"></div>
								</div><!-- Post Single - Share End -->

							</div>
						</div><!-- .entry end -->

						<h4>Related Posts:</h4>

						<div class="related-posts row posts-md col-mb-30">

							@foreach($featured as $blog)
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

						</div>

						<div class="line"></div>

						<!-- Comments
						============================================= -->
						<div id="disqus_thread"></div>
						<!-- #comments end -->

					</div>
				</div>
			</div>

		</div>
	</div>
</section><!-- #content end -->
@endsection

@section('scripts')
<script>
    var disqus_config = function () {
    	this.page.url = '/news/{{ $blog->slug }}';  // Replace PAGE_URL with your page's canonical URL variable
    	this.page.identifier = {{ $blog->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://ieff.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=609ae7646056180012824733&product=inline-share-buttons" async="async"></script>
@endsection