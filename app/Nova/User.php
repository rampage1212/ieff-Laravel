<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Tapp\SelectCountryCode\SelectCountryCode;
use Laravel\Nova\Fields\DateTime;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

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
        'id', 'name', 'email',
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

            Avatar::make('Avatar')->disk('public_disk')->thumbnail(function () {
                return url($this->avatar);
            })->path('/images/uploads/avatars'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Surname')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Nickname')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            DateTime::make('Banned'),

            Select::make('Type')->options([
                'player'               => 'Player',
                'teamstaff'            => 'Team Staff',
                'membernation'         => 'Member Nation',
                'competitionorganiser' => 'Competition Organiser',
                'adminref'             => 'Admin/Referee',
            ])->rules('required', 'max:255'),

            SelectCountryCode::make(__('Country'))->rules('required', 'max:255'),

            Text::make('City')
                ->rules('required', 'max:255'),

            Text::make('Postcode')
                ->rules('required', 'max:255'),

            Text::make('Organiser Name', 'organiser_name')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Manager Name', 'manager_name')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Team Name', 'team_name')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Team Email', 'team_email')
                ->rules('nullable', 'email', 'max:255')
                ->hideFromIndex(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Textarea::make('Achievements')
                ->rules('nullable'),

            Boolean::make('Achievements Approved', 'achievements_approved')
                ->rules('nullable'),

            Boolean::make('Competing Fifa', 'competing_fifa')
                ->rules('nullable')
                ->hideFromIndex(),

            Boolean::make('Competing Pes', 'competing_pes')
                ->rules('nullable')
                ->hideFromIndex(),

            Boolean::make('Competing Playstation', 'competing_playstation')
                ->rules('nullable')
                ->hideFromIndex(),

            Boolean::make('Competing Xbox', 'competing_xbox')
                ->rules('nullable')
                ->hideFromIndex(),
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
