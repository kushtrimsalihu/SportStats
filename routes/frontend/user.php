<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\LivescoreController;
use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\ComparePlayersController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\StandingsController;


/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('is_user')
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Dashboard'), route('frontend.user.dashboard'));
            });
    Route::get('/ranking', [DashboardController::class, 'ranking'])
    ->name('ranking')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.user')
        ->push(__('Ranking'), route('frontend.user.ranking'));
    });
    Route::get('/filters', [DashboardController::class, 'filters'])
    ->name('filters')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.user')
        ->push(__('Ranking'), route('frontend.user.filters'));
    });

    Route::group(['prefix' => '{player}'], function () {
        Route::get('/show', [DashboardController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail,$player) {
                $trail->parent('frontend.user')
                    ->push(__('Show Player'), route('frontend.user.show', $player));
            
            });  
        });

        Route::get('/livescore', [LivescoreController::class, 'livescore'])
        ->name('livescore')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('livescore'), route('frontend.user.livescore'));
        });
    
    

    Route::group(['prefix' => '{id}'], function () {
        Route::get('/vote', [VoteController::class, 'store'])
            ->name('vote')
            ->breadcrumbs(function (Trail $trail,$id) {
                $trail->parent('frontend.user')
                    ->push(__('Vote'), route('frontend.user.vote', $id));
                });  
            });

            Route::get('/compareplayers', [ComparePlayersController::class, 'comparePlayer'])
            ->name('compareplayers')
            ->breadcrumbs(function (Trail $trail) {
              $trail->push(__('ComparePlayers'), route('frontend.user.compareplayers'));
            });


        Route::get('account', [AccountController::class, 'index'])
        ->name('account')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('My Account'), route('frontend.user.account'));
        });

    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/compareteams', [CompareController::class, 'index'])
        ->name('compareteams')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('CompareTeams'), route('frontend.user.compareteams'));
        });

    Route::post('/compareteams', [CompareController::class, 'apicall'])->name('compareteams');

    Route::get('/standings', [StandingsController::class, 'index'])
        ->name('standings')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Standings'), route('frontend.user.standings'));
        });

    Route::post('/standings', [StandingsController::class, 'getstanding'])->name('getstanding');

    Route::get('/subscription', [SubscriptionController::class ,'index'])->name('subscription.index');
    Route::get('/subscription/create/{id?}', [SubscriptionController::class ,'create'])->name('subscription.create');
    Route::post('order-post', [SubscriptionController::class ,'orderPost'])->name('order-post');
});


