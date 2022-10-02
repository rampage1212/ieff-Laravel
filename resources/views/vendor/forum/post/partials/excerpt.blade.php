<table class="table">
    <thead>
        <tr>
            <th class="col-md-2" style="min-width: 350px">
                {{ trans('forum::general.author') }}
            </th>
            <th>
                {{ trans_choice('forum::posts.post', 1) }}
            </th>
        </tr>
    </thead>
    <tbody>
        <tr id="post-{{ $post->id }}">
            <td>
                <img src="/{{ $thread->authorAvatar }}" class="alignleft img-circle img-thumbnail mr-2 mt-1" alt="Avatar" style="max-width: 50px">
                <p class="mb-0">{!! $post->authorName !!}</p>
                <small class="text-muted">{{ $post->posted }}</small>
            </td>
            <td>
                {!! Forum::render($post->content) !!}
            </td>
        </tr>
    </tbody>
</table>
