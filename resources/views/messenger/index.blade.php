@extends('layouts.frontend')

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('/images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

    <div class="container clearfix">
        <h1>Messages</h1>
        <span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Messages</li>
        </ol>
        <a href="/messages/create" class="button button-3d button-rounded gradient-ocean mt-3"><i class="icon-pencil"></i> Create New Message</a>
    </div>
 
</section><!-- #page-title end -->

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            @include('messenger.partials.flash')

            @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
        </div>
    </div>
</div>
@endsection