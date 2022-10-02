<ol class="breadcrumb" style="margin-top: 0px !important">
    <li class="breadcrumb-item"><a href="{{ url(config('forum.routing.prefix')) }}">Forum</a></li>
    @if (isset($category) && $category)
        @include ('forum::partials.breadcrumb-categories', ['category' => $category])
    @endif
    @if (isset($thread) && $thread)
        <li class="breadcrumb-item"><a href="{{ Forum::route('thread.show', $thread) }}">{{ $thread->title }}</a></li>
    @endif
    @if (isset($breadcrumb_other) && $breadcrumb_other)
        <li class="breadcrumb-item">{!! $breadcrumb_other !!}</li>
    @endif
</ol>
