@extends ('forum::master', ['breadcrumb_other' => trans('forum::posts.edit')])

@section ('content')
    <div id="edit-post">

        <div class="row mb-3">
            <div class="col-6">
                <h2 class="mb-2">{{ trans('forum::posts.edit') }} ({{ $thread->title }})</h2>
            </div>

            <div class="col-6">
                @include ('forum::partials.breadcrumbs')
            </div>
        </div>

        @if ($post->parent)
            <h3>{{ trans('forum::general.response_to', ['item' => $post->parent->authorName]) }}...</h3>

            @include ('forum::post.partials.excerpt', ['post' => $post->parent])
        @endif

        <form method="POST" action="{{ Forum::route('post.update', $post) }}">
            {!! csrf_field() !!}
            {!! method_field('patch') !!}

            <div class="form-group">
                <textarea name="content" class="form-control" rows="15">{{ !is_null(old('content')) ? old('content') : $post->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-success pull-right">{{ trans('forum::general.proceed') }}</button>
            <a href="{{ URL::previous() }}" class="btn btn-default">{{ trans('forum::general.cancel') }}</a>
        </form>
    </div>
@stop
