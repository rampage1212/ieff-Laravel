@extends ('forum::master', ['breadcrumb_other' => trans('forum::general.new_reply')])

@section ('content')
    <div id="create-post">

        <div class="row mb-0">
            <div class="col-6">
                <h2 class="mb-0">{{ trans('forum::general.new_reply') }} ({{ $thread->title }})</h2>

            </div>

            <div class="col-6">
                @include ('forum::partials.breadcrumbs')
            </div>
        </div>

        @if (!is_null($post) && !$post->trashed())
            <p>{{ trans('forum::general.replying_to', ['item' => $post->authorName]) }}...</p>
            @include ('forum::post.partials.excerpt')
        @endif

       

        <form method="POST" action="{{ Forum::route('post.store', $thread) }}">
            {!! csrf_field() !!}
            @if (!is_null($post))
                <input type="hidden" name="post" value="{{ $post->id }}">
            @endif

            <div class="form-group">
                <textarea name="content" class="form-control" rows="15">{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success pull-right">{{ trans('forum::general.reply') }}</button>
            <a href="{{ URL::previous() }}" class="btn btn-default">{{ trans('forum::general.cancel') }}</a>
        </form>
    </div>
@stop
