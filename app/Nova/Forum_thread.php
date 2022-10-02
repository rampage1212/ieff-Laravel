<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Avatar;

class Forum_thread extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Forum_thread::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'weight',
    ];

    public static function label() {
        return 'Forum Threads';
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Avatar::make('Author Avatar')->disk('public_disk')->thumbnail(function () {
                return url($this->user->avatar);
            })->path('/images/uploads/avatars')->hideWhenUpdating(),

            Select::make('Author Name','author_id', function () { return $this->user->name.' "'.$this->user->nickname.'" '.$this->user->surname; })
                ->searchable()
                ->hideWhenUpdating()
                ->options(\App\Models\User::pluck('name', 'id')),

            Select::make('Category Name','category_id', function () { return $this->category->title; })
                ->searchable()
                ->options(\App\Models\Forum_category::pluck('title', 'id'))
                ->help('Select the category of this thread'),

            Text::make('Thread Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('pinned'),

            Boolean::make('locked'),

            Number::make('reply_count')->hideWhenUpdating(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
