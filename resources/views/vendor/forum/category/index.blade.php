{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('forum::master', ['category' => null])

@section ('content')

    <table class="table table-index">
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
        @foreach ($categories as $category)
            
            <tr class="category">
                @include ('forum::category.partials.list', ['titleClass' => 'lead'])
            </tr>
            @if (!$category->children->isEmpty())
                @foreach ($category->children as $subcategory)
                    @include ('forum::category.partials.list', ['category' => $subcategory])
                @endforeach
            @endif
                
        @endforeach
        </tbody>
    </table>
@stop
