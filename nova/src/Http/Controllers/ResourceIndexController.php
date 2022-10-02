<?php

namespace Laravel\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\ResourceIndexRequest;

class ResourceIndexController extends Controller
{
    /**
     * List the resources for administration.
     *
     * @param  \Laravel\Nova\Http\Requests\ResourceIndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(ResourceIndexRequest $request)
    {
        $query = $request->toQuery();

        $paginator = $this->paginator(
            $request, $resource = $request->resource(), $query
        );

        return response()->json([
            'label' => $resource::label(),
            'resources' => $paginator->getCollection()->mapInto($resource)->map->serializeForIndex($request),
            'prev_page_url' => $paginator->previousPageUrl(),
            'next_page_url' => $paginator->nextPageUrl(),
            'per_page' => $paginator->perPage(),
            'per_page_options' => $resource::perPageOptions(),
            'total' => $query->toBase()->getCountForPagination(),
            'softDeletes' => $resource::softDeletes(),
        ]);
    }

    /**
     * Get the paginator instance for the index request.
     *
     * @param  \Laravel\Nova\Http\Requests\ResourceIndexRequest  $request
     * @param  string  $resource
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Pagination\Paginator
     */
    protected function paginator(ResourceIndexRequest $request, $resource, $query)
    {
        return $query->simplePaginate(
            $request->viaRelationship()
                        ? $resource::$perPageViaRelationship
                        : ($request->perPage ?? $resource::perPageOptions()[0])
        );
    }
}
