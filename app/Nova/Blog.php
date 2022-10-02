<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Image;
use Drobee\NovaSluggable\SluggableText;
use Drobee\NovaSluggable\Slug;
use Froala\NovaFroalaField\Froala;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Yna\NovaSwatches\Swatches;
use Auth;

class Blog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Blog::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

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

            Boolean::make('Featured')
                ->help('Check this box to display on home page'),

            Boolean::make('Efootball')
                ->help('Check this box to display on e-football page'),

            Boolean::make('Member-nations')
                ->help('Check this box to display on member nations page'),

            Select::make('Author','user_id')
                ->searchable()
                ->options(\App\Models\Admin::pluck('name', 'id'))
                ->help('Select the author of this blog post'),

            SluggableText::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Swatches::make('Color')
                ->withProps([
                    'colors' => ('text-advanced'),
                    'show-fallback' => true,
                    'fallback-type' => 'input',
                    'popover-to' => 'left',
                ])
                ->rules('required', 'max:255'),

            Slug::make('Slug')
                ->help('Recommended not to change this value'),

            Image::make('Image')->disk('public'),

            Textarea::make('Description')
                ->withMeta(['extraAttributes' => [
                    'placeholder' => 'Maximum 255 characters']
                ]),

            Textarea::make('Content')
                ->rows(25),
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
