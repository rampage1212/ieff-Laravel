@extends('layouts.frontend')

@section('title', 'Authentication')
 
@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Authentication</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Authentication</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="tabs tabs-justify mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">

				<ul class="tab-nav tab-nav2 center clearfix">
					<li class="inline-block"><a href="#tab-login">Login</a></li>
					<li class="inline-block"><a href="#tab-register">Register</a></li>
				</ul>

				<div class="tab-container">

					<div class="tab-content" id="tab-login">
						<div class="card mb-0">
							<div class="card-body" style="padding: 40px;">
								<form method="POST" action="{{ route('login') }}">
                        			@csrf

									<h3>Login to your Account</h3>

									<div class="row">
										<div class="col-12 form-group">
											<label for="login-form-username">Username:</label>
											<input id="email login-form-username" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

			                                @error('email')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

										<div class="col-12 form-group">
											<label for="login-form-username">Password:</label>
											<input id="password login-form-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

			                                @error('password')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

			                            <div class="col-12 form-group">
			                                <div class="form-check">
			                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

			                                    <label class="form-check-label" for="remember">
			                                        {{ __('Remember Me') }}
			                                    </label>
			                                </div>
			                            </div>

										<div class="col-12 form-group">
											<button type="submit" class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
											<a href="#" class="float-right">Forgot Password?</a>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>

					<div class="tab-content" id="tab-register">
						<div class="card mb-0">
							<div class="card-body" style="padding: 40px;">
								<h3>Register for an Account</h3>

								<form method="POST" action="{{ route('register') }}">
                        		@csrf

                        			<div class="row">
										<div class="col-12 form-group">
											<label for="register-form-name">Name:</label>
											<input id="name register-form-name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

			                                @error('name')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-surname">Surname:</label>
											<input id="surname register-form-surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

			                                @error('surname')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-avatar">Avatar:</label>
											<input id="avatar register-form-avatar" type="file" class="form-control-file @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar" autofocus>

			                                @error('avatar')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-country">Country:</label>
											<select id="country register-form-country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="country" autofocus>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>

			                                @error('country')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-city">City:</label>
											<input id="city register-form-city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

											@error('city')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-postcode">Postcode:</label>
											<input id="postcode register-form-postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" autofocus>

											@error('postcode')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-nickname">Nickname:</label>
											<input id="nickname register-form-nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus>

											@error('nickname')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-team_email">Team Email:</label>
											<input id="team_email register-form-team_email" type="text" class="form-control @error('team_email') is-invalid @enderror" name="team_email" value="{{ old('team_email') }}" required autocomplete="team_email" autofocus>

											@error('team_email')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-organiser_name">Organiser Name:</label>
											<input id="organiser_name register-form-organiser_name" type="text" class="form-control @error('organiser_name') is-invalid @enderror" name="organiser_name" value="{{ old('organiser_name') }}" required autocomplete="organiser_name" autofocus>

											@error('organiser_name')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-manager_name">Manager Name:</label>
											<input id="manager_name register-form-manager_name" type="text" class="form-control @error('manager_name') is-invalid @enderror" name="manager_name" value="{{ old('manager_name') }}" required autocomplete="manager_name" autofocus>

											@error('manager_name')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-teamname">Team Name:</label>
											<input id="teamname register-form-teamname" type="text" class="form-control @error('teamname') is-invalid @enderror" name="teamname" value="{{ old('teamname') }}" required autocomplete="teamname" autofocus>

											@error('teamname')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-birthdate">Date Of Birth:</label>
											<input id="birthdate register-form-birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>

											@error('birthdate')
											    <span class="invalid-feedback" role="alert">
											        <strong>{{ $message }}</strong>
											    </span>
											@enderror
										</div>

										<div class="col-12">
											<label>Select the games & consoles you compete on</label>
										</div>
										<div class="col-3 form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" name="competing_fifa" id="fifa">
												<label class="form-check-label" for="fifa">
													FIFA
												</label>
											</div>
										</div>
										<div class="col-3 form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" name="competing_pes" id="pes">
												<label class="form-check-label" for="pes">
													PES
												</label>
											</div>
										</div>
										<div class="col-3 form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" name="competing_playstation" id="playstation">
												<label class="form-check-label" for="playstation">
													Playstation
												</label>
											</div>
										</div>
										<div class="col-3 form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" name="competing_xbox" id="xbox">
												<label class="form-check-label" for="xbox">
													Xbox
												</label>
											</div>
										</div>

										<div class="col-12 form-group">
											<label for="register-form-email">* Email Address:</label>
											<input id="email register-form-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

			                                @error('email')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-password">* Choose Password:</label>
											<input id="password register-form-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

			                                @error('password')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>

										<div class="col-12 form-group">
											<label for="register-form-repassword">* Re-enter Password:</label>
											<input id="password-confirm register-form-repassword" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
										</div>

										<div class="col-12 form-group">
			                                <div class="form-check">
			                                    <input class="form-check-input" type="checkbox" name="terms" id="terms">

			                                    <label class="form-check-label" for="remember">
			                                        I agree to the IEFF <a href="/terms">terms & conditions</a> 
			                                    </label>
			                                </div>
			                            </div>

										<div class="col-12 form-group">
											<button type="submit" class="button button-3d button-black m-0" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
										</div>

									</div>

								</form>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</section><!-- #content end -->
@endsection