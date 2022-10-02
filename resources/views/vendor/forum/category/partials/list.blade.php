<tr>
    <td {{ $category->threadsEnabled ? '' : 'colspan=5' }}>
        <p class="lead"><a href="{{ Forum::route('category.show', $category) }}">{!! $category->icon !!} {{ $category->title }}</a></p>
        <span class="text-muted">{{ $category->description }}</span>
    </td>
    @if ($category->threadsEnabled)
        <td>{{ $category->thread_count }}</td>
        <td>{{ $category->post_count }}</td>
        <td>
            @if ($category->newestThread)
                <img src="{{ $category->latestActiveThread->lastPost->authorAvatar }}" class="alignleft img-circle img-thumbnail mr-2 mt-1" alt="Avatar" style="max-width: 45px">
                <a href="{{ Forum::route('thread.show', $category->newestThread) }}">
                    {{ $category->newestThread->title }}
                </a>
                <br>
                <small class="text-muted">{{ $category->newestThread->authorName }}</small>
            @endif
        </td>
        <td>
            @if ($category->latestActiveThread)
                <img src="{{ $category->latestActiveThread->lastPost->authorAvatar }}" class="alignleft img-circle img-thumbnail mr-2 mt-1" alt="Avatar" style="max-width: 45px">
                <a href="{{ Forum::route('thread.show', $category->latestActiveThread->lastPost) }}">
                    {{ $category->latestActiveThread->title }}
                </a>
                <br>
                <small class="text-muted">{{ $category->latestActiveThread->lastPost->authorName }}</small>
            @endif
        </td>
    @endif
</tr> 
