@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Player Card</title>
<meta name="title" content="IEFF — Player Card">
<meta name="description" content="Player card for {{ $user->name}} '{{ $user->nickname }}' {{ $user->lastname }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="IEFF — Player Card">
<meta property="og:description" content="Player card for {{ $user->name}} '{{ $user->nickname }}' {{ $user->lastname }}">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ Request::url() }}">
<meta property="twitter:title" content="IEFF — Player Card">
<meta property="twitter:description" content="Player card for {{ $user->name}} '{{ $user->nickname }}' {{ $user->lastname }}">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('/images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<img src="/{{ $user->avatar }}" height="64" width="64" class="mb-5" style="border-radius:50%">
		<h1>
			@if($user->permissions->name != null)
                {{ $user->name }}
            @endif
			@if($user->nickname !== null)
				"{{ $user->nickname }}" 
			@endif
			@if($user->permissions->surname != null)
                {{ $user->surname }}
            @endif
		</h1>
		<span>
			<img src="/images/flags/svg/{{ strtolower($user->country) }}.svg" height="32" width="32">
			{{ ucfirst($user->type) }}
		</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Player Card</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container">

			<div class="row col-mb-50 justify-content-center">

                <div class="col-md-6">
                    <img src="/{{ $user->avatar }}" class="alignleft img-circle img-thumbnail" alt="Avatar" style="max-width: 150px; margin: 1rem;">
                    <div class="heading-block" style="background-color:#f6f6f6; border-radius: 1rem; padding: 1rem">
                        <h3><img src="/images/flags/svg/{{ strtolower($user->country) }}.svg" width="24" height="16" data-toggle="tooltip" data-placement="top" title="Manchester, United Kingdom"> {{ $user->name }} '{{ $user->nickname }}' {{ $user->surname }}</h3>
                        <h5 style="font-size: 1.1rem;">

                            @if($user->twitch != null)
                            <a href="/{{ $user->twitch }}" target="_blank" class="badge badge-info mr-1" style="background-color: #6441a5;display: initial;color: #fff;padding: 0.3em 0.6em;"><i class="icon-twitch"></i></a>
                            @endif

                            @if($user->twitter != null)
                            <a href="/{{ $user->twitter }}" target="_blank" class="badge badge-info mr-1" style="background-color: #00acee;display: initial;color: #fff;padding: 0.3em 0.5em;"><i class="icon-twitter"></i></a>
                            @endif

                            @if($user->youtube != null)
                            <a href="/{{ $user->youtube }}" target="_blank" class="badge badge-info mr-1" style="background-color: #FF0000;display: initial;color: #fff;padding: 0.3em 0.5em;"><i class="icon-youtube"></i></a>
                            @endif

                            @if($user->competing_playstation == 1)
                                <span class="badge badge-success" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes on Playstation"><i class="icon-line-check"></i> Playstation</span>
                            @else 
                                <span class="badge badge-danger" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes on Playstation"><i class="icon-line-cross"></i> Playstation</span>
                            @endif

                            @if($user->competing_xbox == 1)
                                <span class="badge badge-success" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes on Xbox"><i class="icon-line-check"></i> Xbox</span>
                            @else 
                                <span class="badge badge-danger" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes on Xbox"><i class="icon-line-cross"></i> Xbox</span>
                            @endif

                            @if($user->competing_fifa == 1)
                                <span class="badge badge-success" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes in FIFA esports"><i class="icon-line-check"></i> FIFA</span>
                            @else 
                                <span class="badge badge-danger" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes in FIFA esports"><i class="icon-line-cross"></i> FIFA</span>
                            @endif

                            @if($user->competing_pes == 1)
                                <span class="badge badge-success" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes in PES esports"><i class="icon-line-check"></i> PES</span>
                            @else 
                                <span class="badge badge-danger" style="display: initial;color: #fff;" data-toggle="tooltip" data-placement="top" title="This player competes in PES esports"><i class="icon-line-cross"></i> PES</span>
                            @endif
                        </h5>
                        <span><span  style="font-weight:600">Date Of Birth:</span> {{ $user->birthdate }}</span>
                        <span><span class="mb-4" style="font-weight:600">Current Team:</span> {{ $user->team_name }}</span>

                        <hr>

                        <span><span style="font-weight:600">Achievements:</span> {{ $user->achievements }}</span>
                        <span><span style="font-weight:600">Other information:</span> {{ $user->info }}</span>

                        <a href="#" class="button button-border button-rounded button-green btn-block" style="text-align: center;margin-left: 0px;margin-top: 1rem;"><i class="icon-envelope21"></i> Send Message</a>
                    </div>
                </div>

			</div>

		</div>
	</div>
</section><!-- #content end -->
@endsection

@section('scripts')
<script type="text/javascript">
    $("#profile-form-submit").on('click', function(e) {
    // Make sure that the form isn't actually being sent.
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            data: $('#profile-form').serialize(),
            url: "{{ route('profile.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) 
            {
                if(data.validation) 
                {
                    jQuery.each(data.validation, function(key, value){
                        jQuery('.'+key).addClass('is-invalid');
                        jQuery('.'+key+'-validation').append('<small class="text-danger validation-error"> - '+value+'</small>');
                    });
                    toastr.warning('Check the form and try again.');
                }
                else if(data.error)
                {
                    toastr.warning(data.error);
                }
                else 
                {
                    $('.form-control').attr('class','form-control is-valid');
                    $('.validation-error').removeClass();
                    toastr.success(data.success);
                }
            },
            error: function (data) {
                toastr.warning('An unknown error occured. Refresh the page and try again.');
            }
        });
    });
</script>
@endsection