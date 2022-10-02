<hr>
<div class="media">
    <a class="pull-left" href="#">
        <img src="/images/uploads/avatars/{{ $message->user->avatar }}"
             alt="{{ $message->user->name }}" width="48" class="img-circle mr-3">
    </a>
    <div class="media-body">
        <h4 class="media-heading mb-0">{{ $message->user->nickname }}</h4>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
        
    </div>
</div>
<p class="mt-3 mb-0">{{ $message->body }}</p>
