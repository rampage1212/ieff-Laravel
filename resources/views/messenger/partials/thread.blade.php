<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        <small>- {{ $thread->userUnreadMessagesCount(Auth::id()) }}  messages unread</small>
    </h4>
    <p>
        Latest message: {{ $thread->latestMessage->body }}
    </p>
    
    <p class="mb-0">
        <small><strong>Creator:</strong> {{ $thread->creator()->nickname }}</small>
    </p>

    <p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>

</div>
<hr>