{{-- $thread is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('forum::master', ['thread' => null])

@section ('content')
    <div id="category">

        <div class="row mb-1">
            <div class="col-6">
                <h2 class="mb-2">
                    {{ $category->title }}
                    @if ($category->description)
                        <small>- {{ $category->description }}</small>
                    @endif
                </h2>
            </div>
            <div class="col-6">
                @include ('forum::partials.breadcrumbs')
            </div>
        </div>

        <!--
        @can ('manageCategories')
            <form action="{{ Forum::route('category.update', $category) }}" method="POST" data-actions-form>
                {!! csrf_field() !!}
                {!! method_field('patch') !!}

                @include ('forum::category.partials.actions')
            </form>
        @endcan
        -->

        @if (!$category->children->isEmpty())
            <table class="table table-category">
                <thead>
                    <tr>
                        <th>{{ trans_choice('forum::categories.category', 1) }}</th>
                        <th class="col-md-2">{{ trans_choice('forum::threads.thread', 2) }}</th>
                        <th class="col-md-2">{{ trans_choice('forum::posts.post', 2) }}</th>
                        <th class="col-md-2">{{ trans('forum::threads.newest') }}</th>
                        <th class="col-md-2">{{ trans('forum::posts.last') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->children as $subcategory)
                        @include ('forum::category.partials.list', ['category' => $subcategory])
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="row">
            <div class="col-xs-4">
                @if ($category->threadsEnabled)
                    @if (Auth::check())
                    <a href="{{ Forum::route('thread.create', $category) }}" class="btn btn-success ml-3 mb-5"><i class="icon-line-plus"></i> Create New Thread</a>
                    @endif
                @endif
            </div>
            <div class="col-xs-8 text-right">
                {!! $threads->render() !!}
            </div>
        </div>

        @can ('manageThreads', $category)
            <form action="{{ Forum::route('bulk.thread.update') }}" method="POST" data-actions-form>
                {!! csrf_field() !!}
                {!! method_field('delete') !!}
        @endcan

        @if ($category->threadsEnabled)
            <table class="table table-thread">
                <thead>
                    <tr>
                        <th>{{ trans('forum::general.subject') }}</th>
                        <th class="col-md-2 text-right">{{ trans('forum::general.replies') }}</th>
                        <th class="col-md-2 text-right" style="min-width: 350px;">{{ trans('forum::posts.last') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$threads->isEmpty())
                        @foreach ($threads as $thread)
                            <tr class="{{ $thread->trashed() ? "deleted" : "" }}">
                                <td>
                                    <span class="pull-right">
                                        @if ($thread->locked)
                                            <span class="label label-warning">{{ trans('forum::threads.locked') }}</span>
                                        @endif
                                        @if ($thread->pinned)
                                            <span class="label label-info">{{ trans('forum::threads.pinned') }}</span>
                                        @endif
                                        @if ($thread->userReadStatus && !$thread->trashed())
                                            <span class="label label-primary">{{ trans($thread->userReadStatus) }}</span>
                                        @endif
                                        @if ($thread->trashed())
                                            <span class="label label-danger">{{ trans('forum::general.deleted') }}</span>
                                        @endif
                                    </span>
                                    <p class="lead mb-3" style="font-size:1.8rem">
                                        <a href="{{ Forum::route('thread.show', $thread) }}">{{ $thread->title }}</a>
                                    </p>
                                    <img src="/{{ $thread->authorAvatar }}" class="alignleft img-circle img-thumbnail mr-2 mt-1" alt="Avatar" style="max-width: 50px">
                                    <p class="mb-0">By {{ $thread->authorName }}</p>
                                    <small class="text-muted">Thread created {{ $thread->posted }}</small>
                                </td>
                                @if ($thread->trashed())
                                    <td colspan="2">&nbsp;</td>
                                @else
                                    <td class="text-right">
                                        <p class="mt-3"> {{ $thread->reply_count }} </p>
                                    </td>
                                    <td>
                                        <span class="float-right">
                                            <p class="mb-0">By {{ $thread->lastPost->authorName }}</p>
                                            <small class="text-muted">Post created {{ $thread->lastPost->posted }}</small>
                                        </span>
                                        <img src="/{{ $thread->lastPost->authorAvatar }}" class="float-right img-circle img-thumbnail mr-2 mt-1" alt="Avatar" style="max-width: 50px">
                                        <br>
                                        <a href="{{ Forum::route('thread.show', $thread->lastPost) }}" class="btn btn-primary btn-xs mt-4 float-right">View Post <i class="icon-line-arrow-right"></i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>
                                {{ trans('forum::threads.none_found') }}
                            </td>
                            <td class="text-right" colspan="3">
                                @can ('createThreads', $category)
                                    <a href="{{ Forum::route('thread.create', $category) }}">{{ trans('forum::threads.post_the_first') }}</a>
                                @endcan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endif

        <!--
        @can ('manageThreads', $category)
                @include ('forum::category.partials.thread-actions')
            </form>
        @endcan


        <div class="row">
            <div class="col-xs-4">
                @if ($category->threadsEnabled)
                    @can ('createThreads', $category)
                        <a href="{{ Forum::route('thread.create', $category) }}" class="btn btn-primary">{{ trans('forum::threads.new_thread') }}</a>
                    @endcan
                @endif
            </div>
            <div class="col-xs-8 text-right">
                {!! $threads->render() !!}
            </div>
        </div>

        -->

        @if ($category->threadsEnabled)
            @can ('markNewThreadsAsRead')
                <hr>
                <div class="text-center">
                    <form action="{{ Forum::route('mark-new') }}" method="POST" data-confirm>
                        {!! csrf_field() !!}
                        {!! method_field('patch') !!}
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <a class="btn btn-info btn-sm mt-3"><small>{{ trans('forum::categories.mark_read') }}</small></a>
                    </form>
                </div>
            @endcan
        @endif
    </div>
@stop
