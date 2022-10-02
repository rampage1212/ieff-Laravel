@extends('layouts.frontend')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('/images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

    <div class="container clearfix">
        <h1>{{ $thread->subject }}</h1>
        <span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/messages">Messages</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $thread->subject }}</li>
        </ol>
    </div>
 
</section><!-- #page-title end -->

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-5">
            @each('messenger.partials.messages', $thread->messages, 'message')

            
            <form action="{{ route('messages.update', $thread->id) }}" method="post" class="mt-3">
                {{ method_field('put') }}
                {{ csrf_field() }}
                    
                <!-- Message Form Input -->
                <div class="form-group">
                    <textarea name="message" class="form-control" rows="10" required>{{ old('message') }}</textarea>
                </div>

                <input type="hidden" name="recipients[]" value="6">

                <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit Message</button>
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