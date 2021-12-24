<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\PostsController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });
    Route::get('/about', [AboutController::class, 'index'])
    ->name('about')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('About Us'), route('frontend.about'));
    });

Route::get('/faq', [FaqController::class, 'index'])
    ->name('faq')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('faq'), route('frontend.faq'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });


Route::get('/posts', [PostsController::class, 'index'])
    ->name('posts')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('posts'), route('frontend.blog.posts'));
    });
    Route::group(['prefix' => '{id?}' ], function () {
        Route::get('/postshow', [PostsController::class, 'show'])
        ->name('postshow')
        ->breadcrumbs(function (Trail $trail,$id) {
             $trail->parent('frontend.posts')
             ->push(__('Show Posts'), route('frontend.posts.show',$id));
            });
        });


