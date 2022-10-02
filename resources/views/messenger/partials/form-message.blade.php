<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control" rows="10">{{ old('message') }}</textarea>
    </div>

    <!--
    @if($users->count() > 0)
        <div class="form-group">
            <label class="control-label">Recipient</label>
            <select class="js-example-basic-single" style="width: 100%">
                @foreach($users as $user)
                    <option name="recipients[]" value="{{ $user->id }}">
                        {!!$user->name!!}
                    </option>
                @endforeach
            </select>
        </div>
    @endif
    -->
    

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit Message</button>
    </div>
</form>