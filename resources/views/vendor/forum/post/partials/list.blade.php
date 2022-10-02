<tr id="post-{{ $post->sequence }}" class="{{ $post->trashed() ? 'deleted' : '' }}" class="post-body">
    <td class="author-info">
        <img src="/{{ $post->authorAvatar }}" class="alignleft img-circle img-thumbnail" alt="Avatar" style="max-width: 150px; margin: 1rem;">
        <p class="text-center mb-2"><strong>{{ $post->authorName }}</strong></p>
    </td>
    <td class="content pt-5">
        @if (!is_null($post->parent))
            <p>
                <strong>
                    {{ trans('forum::general.response_to', ['item' => $post->parent->authorName]) }}
                    (<a href="{{ Forum::route('post.show', $post->parent) }}">{{ trans('forum::posts.view') }}</a>):
                </strong>
            </p>
            <blockquote>
                {!! str_limit(Forum::render($post->parent->content)) !!}
            </blockquote>
        @endif

        @if ($post->trashed())
            <span class="label label-danger">{{ trans('forum::general.deleted') }}</span>
        @else
            {!! Forum::render($post->content) !!}
        @endif
    </td>
</tr>
<tr class="post-footer">
    <td>
        <small class="text-muted">{{ trans('forum::general.posted') }} {{ $post->posted }}</small>
        @if ($post->hasBeenUpdated())
            <br><small class="text-muted">{{ trans('forum::general.last_updated') }} {{ $post->updated }}</small>
        @endif
    </td>
    <td class="text-muted">
        <a href="{{ Forum::route('thread.show', $post) }}" class="btn btn-success btn-sm mr-2">Post #{{ $post->sequence }}</a>
        @if (!$post->trashed())
            @can ('edit', $post)
                <a href="{{ Forum::route('post.edit', $post) }}" class="btn btn-warning btn-sm"><i class="icon-line-edit"></i> Edit Post</a>
            @endcan
        @endif

        
        @if (!$post->trashed())
            @can ('reply', $post->thread)
                <a href="{{ Forum::route('post.create', $post) }}" class="btn btn-success btn-sm" style="float:right"><i class="icon-chat"></i> Reply</a>
            @endcan
        @endif
        @if (Request::fullUrl() != Forum::route('post.show', $post) && !$post->trashed())
            <a href="{{ Forum::route('post.show', $post) }}" class="btn btn-success btn-sm mr-2" style="float:right"><i class="icon-line-eye"></i> View Post</a>
        @endif

        <!--
        @if (isset($thread))
            @can ('deletePosts', $thread)
                @if (!$post->isFirst)
                    <input type="checkbox" name="items[]" value="{{ $post->id }}">
                @endif
            @endcan
        @endif
        -->
    </td>
</tr>
