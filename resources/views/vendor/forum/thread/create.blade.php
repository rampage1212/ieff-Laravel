@extends ('forum::master', ['breadcrumb_other' => trans('forum::threads.new_thread')])

@section ('content')
    <div id="create-thread">

        <div class="row mb-1">
            <div class="col-6">
                <h2 class="mb-2">{{ trans('forum::threads.new_thread') }} ({{ $category->title }})</h2>
            </div>

            <div class="col-6">
                @include ('forum::partials.breadcrumbs')
            </div>
        </div>

        <form method="POST" action="{{ Forum::route('thread.store', $category) }}">
            {!! csrf_field() !!}
            {!! method_field('post') !!}

            <div class="form-group">
                <label for="title">{{ trans('forum::general.title') }}</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>

            <div class="form-group">
                <textarea name="content" class="form-control" rows="15">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="title">Poll title</label>
                <input type="text" name="pollTitle" value="{{ old('question') }}" class="form-control">
            </div>

            <div class="field_wrapper form-group">
                <label for="title">Poll answers</label>
                <div class="mb-3">
                    <input type="text" name="pollAnswers[]" value="" class="form-control">
                </div>
            </div>

            <a href="javascript:void(0);" class="add_button btn btn-success mb-5" title="Add field"><i class="icon-plus"></i> Add New Answer</a>

            <hr>

            <!--
            <div class="toggle toggle-bg">
                <div class="toggle-header">
                    <div class="toggle-icon">
                        <i class="toggle-closed icon-poll"></i>
                        <i class="toggle-open icon-ok-circle"></i>
                    </div>
                    <div class="toggle-title">
                        Click to add a poll to this thread
                    </div>
                </div>
                <div class="toggle-content px-0">
                    <div class="form-group">
                        <label for="title">Poll title</label>
                        <input type="text" name="question" value="{{ old('question') }}" class="form-control">
                    </div>

                    <div class="field_wrapper form-group">
                        <label for="title">Poll answers</label>
                        <div class="mb-3">
                            <input type="text" name="answers[]" value="" class="form-control">
                        </div>
                    </div>

                    <a href="javascript:void(0);" class="add_button btn btn-success mb-5" title="Add field"><i class="icon-plus"></i> Add New Answer</a>
                </div>
            </div>
            -->

            

            <hr>

            <button type="submit" class="btn btn-success pull-right"><i class="toggle-open icon-ok-circle"></i> Create New Thread</button>
            <a href="{{ URL::previous() }}" class="btn btn-danger"><i class="icon-line-circle-cross1"></i> {{ trans('forum::general.cancel') }}</a>
        </form>
    </div>
@stop
