@extends('layouts.frontend')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('/images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

    <div class="container clearfix">
        <h1>New Message</h1>
        <span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Message</li>
        </ol>
    </div>
 
</section><!-- #page-title end -->

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-5">

            <form action="{{ route('messages.store') }}" method="post">
                {{ csrf_field() }}
                <!-- Subject Form Input -->
                <div class="form-group">
                    <label class="control-label">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                </div>

                @if($users->count() > 0 && !isset($userid))
                    <div class="form-group">
                        <label class="control-label">Recipient</label>
                        <select class="js-example-basic-single" name="recipients[]" style="width: 100%">
                            @foreach($users as $user)
                                <option name="recipients[]" value="{{ $user->id }}">
                                    {!!$user->name!!} "{!!$user->nickname!!}" {!!$user->surname!!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if($users->count() > 0 && isset($userid))
                    <input type="hidden" name="recipients[]" value="{{ $userid }}">
                @endif

                <!-- Message Form Input -->
                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea name="message" class="form-control" rows="10">{{ old('message') }}</textarea>
                </div>

                <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection