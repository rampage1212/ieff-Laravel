@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Get in touch with the IEFF</title>
<meta name="title" content="IEFF — Contact Us">
<meta name="description" content="Get in touch with the IEFF">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://ie-ff.com">
<meta property="og:title" content="IEFF — Contact Us">
<meta property="og:description" content="Get in touch with the IEFF">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://ie-ff.com">
<meta property="twitter:title" content="IEFF — Contact Us">
<meta property="twitter:description" content="Get in touch with the IEFF">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Contact Us</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="row gutter-40 col-mb-80">
				<!-- Postcontent
				============================================= -->
				<div class="postcontent col-12">

					<div class="form-widget">

						<div class="form-result"></div>

						<form class="row mb-0" id="contact-form" name="template-contactform" action="include/form.php" method="post">
							@csrf

							<div class="form-process">
								<div class="css3-spinner">
									<div class="css3-spinner-scaler"></div>
								</div>
							</div>

							<div class="col-md-4 form-group">
								<label for="name">Name <small id="name-validation" class="text-danger">*</small></label>
								<input type="text" id="name" name="name" value="" class="sm-form-control required" />
							</div>

							<div class="col-md-4 form-group">
								<label for="email">Email <small id="email-validation" class="text-danger">*</small></label>
								<input type="email" id="email" name="email" value="" class="required email sm-form-control" />
							</div>

							<div class="col-md-4 form-group">
								<label for="phone">Phone <small id="phone-validation" class="text-danger"></small></label>
								<input type="phone" id="phone" name="phone" value="" class="phone sm-form-control" />
							</div>

							<div class="w-100"></div>

							<div class="col-md-4 form-group">
								<label for="subject">Subject <small id="subject-validation" class="text-danger">*</small></label>
								<input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
							</div>

							<div class="col-md-4 form-group">
								<label for="org">Organisation name<small id="org-validation" class="text-danger"></small></label>
								<input type="org" id="org" name="org" value="" class="sm-form-control" />
							</div>

							<div class="col-md-4 form-group">
								<label for="address">Address<small id="address-validation" class="text-danger"></small></label>
								<input type="address" id="address" name="address" value="" class="sm-form-control" />
							</div>

							<div class="col-md-12 form-group">
								<label for="occupation">Occupation within the E-football scene/Esport scene<small id="address-validation" class="text-danger">*</small></label>
								<input type="occupation" id="occupation" name="occupation" value="" class="required occupation sm-form-control" />
							</div>

							<div class="col-12 form-group">
								<label for="message">Message <small id="message-validation" class="text-danger">*</small></label>
								<textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
							</div>

							<div class="col-12 form-group d-none">
								<input type="text" id="recaptcha" name="recaptcha" value="" class="sm-form-control" />
							</div>

							<div class="col-12 form-group">

								<script src="https://www.google.com/recaptcha/api.js" async defer></script>
								<div class="g-recaptcha" data-sitekey="6LeoQGEcAAAAAD3dy_YJyP0Wy6WTazwNVXNu6_b4"></div>
								<small id="g-recaptcha-response-validation" class="text-danger"></small>
							</div>

							<div class="col-12 form-group">
								<button class="button button-3d m-0" type="submit" id="submit-form" name="template-contactform-submit" value="submit">Send Message</button>
							</div>

						</form>

						<div class="style-msg2 successmsg" id="message-sent" style="display: none">
							<div class="msgtitle"><i class="icon-check-circle"></i> Message received, we will be in touch shortly</div>
							<div class="sb-msg">
								<ul>
									<li>Name: <span id="name-response"></span></li>
									<li>Email: <span id="email-response"></span></li>
									<li>Subject: <span id="subject-response"></span></li>
									<li>Message: <span id="message-response"></span></li>
								</ul>
							</div>
						</div>

					</div>

				</div><!-- .postcontent end -->

			</div>

		</div>
	</div>
</section><!-- #content end -->
@endsection

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR5J57bbQzcLUyjHILUcWxE4yXyjiEMRI&callback=initMap" type="text/javascript"></script>

<script type="text/javascript">
$("#submit-form").on('click', function(e) {
e.preventDefault();
e.stopPropagation();
    $.ajax({
        data: $('#contact-form').serialize(),
        url: "{{ route('sendmessage') }}",
        type: "POST",
        dataType: 'json',
        success: function (data) 
        {
            if(data.errors) 
            {
                jQuery.each(data.errors, function(key, value){
                	jQuery('#'+key).addClass('border-danger');
                    jQuery('#'+key+'-validation').html('<i class="icon-exclamation-triangle"></i> '+value);
                });
            }
            else 
            {
            	$('#contact-form').remove();
            	$('#name-response').html(data.name);
            	$('#email-response').html(data.email);
            	$('#subject-response').html(data.subject);
            	$('#message-response').html(data.message);
            	$("#message-sent").removeAttr("style");
            }
        },
        error: function (data) {
        	alert("An unknown error occured. Please refresh the page and try again, if the problem persists please email us directly: wijo@ie-ff.com");
        }
    });
});
</script>
@endsection