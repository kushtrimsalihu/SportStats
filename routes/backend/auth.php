<?php
use App\Domains\Auth\Http\Controllers\Backend\UpdateInformation\UpdateInformationController;
use App\Domains\Auth\Http\Controllers\Backend\Posts\PostsController;
use App\Domains\Auth\Http\Controllers\Backend\Position\PositionController;
use App\Domains\Auth\Http\Controllers\Backend\Sports\SportsController;
use App\Domains\Auth\Http\Controllers\Backend\League\LeagueController;
use App\Domains\Auth\Http\Controllers\Backend\Role\RoleController;
use App\Domains\Auth\Http\Controllers\Backend\User\DeactivatedUserController;
use App\Domains\Auth\Http\Controllers\Backend\User\DeletedUserController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserPasswordController;
use App\Domains\Auth\Http\Controllers\Backend\User\UserSessionController;
use App\Domains\Auth\Http\Controllers\Backend\Statistics\StatisticsController;
use App\Domains\Auth\Http\Controllers\Backend\Teams\TeamsController;
use App\Domains\Auth\Http\Controllers\Backend\Landing_Page\LandingController;
use App\Domains\Auth\Http\Controllers\Backend\Faq\FaqController;
use App\Domains\Auth\Models\Faq;
use App\Domains\Auth\Http\Controllers\Backend\Landing_Page\AboutUsController;
use App\Domains\Auth\Http\Controllers\Backend\Landing_Page\DashboardViewController;
use App\Domains\Auth\Http\Controllers\Backend\Landing_Page\TabsController;
use App\Domains\Auth\Http\Controllers\Backend\About\AboutController;
use App\Domains\Auth\Models\About;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\DailyVoteController;
use App\Domains\Auth\Models\LandingPage;
use App\Domains\Auth\Models\LandingPageModels\AboutUs;
use App\Domains\Auth\Models\LandingPageModels\DashboardView;
use App\Domains\Auth\Models\LandingPageModels\Tabs;
use App\Domains\Auth\Http\Controllers\Backend\Livescore\LivescoreController;
use App\Domains\Auth\Models\Livescore;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\Position;
use App\Domains\Auth\Models\User;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.auth'.
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    // asks the administrator for the password
    // 'middleware' => config('boilerplate.access.middleware.confirm'),
], function () {
    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {
        Route::group([
            'middleware' => 'role:'.config('boilerplate.access.role.admin'),
        ], function () {
            Route::get('deleted', [DeletedUserController::class, 'index'])
                ->name('deleted')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.user.index')
                        ->push(__('Deleted Users'), route('admin.auth.user.deleted'));
                });

            Route::get('create', [UserController::class, 'create'])
                ->name('create')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.user.index')
                        ->push(__('Create User'), route('admin.auth.user.create'));
                });

            Route::post('/', [UserController::class, 'store'])->name('store');

            Route::group(['prefix' => '{user}'], function () {
                Route::get('edit', [UserController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail, User $user) {
                        $trail->parent('admin.auth.user.show', $user)
                            ->push(__('Edit'), route('admin.auth.user.edit', $user));
                    });

                Route::patch('/', [UserController::class, 'update'])->name('update');
                Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => '{deletedUser}'], function () {
                Route::patch('restore', [DeletedUserController::class, 'update'])->name('restore');
                Route::delete('permanently-delete', [DeletedUserController::class, 'destroy'])->name('permanently-delete');
            });
        });

        Route::group([
            'middleware' => 'permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.reactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password',
        ], function () {
            Route::get('deactivated', [DeactivatedUserController::class, 'index'])
                ->name('deactivated')
                ->middleware('permission:admin.access.user.reactivate')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.user.index')
                        ->push(__('Deactivated Users'), route('admin.auth.user.deactivated'));
                });

            Route::get('/', [UserController::class, 'index'])
                ->name('index')
                ->middleware('permission:admin.access.user.list|admin.access.user.deactivate|admin.access.user.clear-session|admin.access.user.impersonate|admin.access.user.change-password')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('User Management'), route('admin.auth.user.index'));
                });

            Route::group(['prefix' => '{user}'], function () {
                Route::get('/', [UserController::class, 'show'])
                    ->name('show')
                    ->middleware('permission:admin.access.user.list')
                    ->breadcrumbs(function (Trail $trail, User $user) {
                        $trail->parent('admin.auth.user.index')
                            ->push($user->name, route('admin.auth.user.show', $user));
                    });

                Route::patch('mark/{status}', [DeactivatedUserController::class, 'update'])
                    ->name('mark')
                    ->where(['status' => '[0,1]'])
                    ->middleware('permission:admin.access.user.deactivate|admin.access.user.reactivate');

                Route::post('clear-session', [UserSessionController::class, 'update'])
                    ->name('clear-session')
                    ->middleware('permission:admin.access.user.clear-session');

                Route::get('password/change', [UserPasswordController::class, 'edit'])
                    ->name('change-password')
                    ->middleware('permission:admin.access.user.change-password')
                    ->breadcrumbs(function (Trail $trail, User $user) {
                        $trail->parent('admin.auth.user.show', $user)
                            ->push(__('Change Password'), route('admin.auth.user.change-password', $user));
                    });

                Route::patch('password/change', [UserPasswordController::class, 'update'])
                    ->name('change-password.update')
                    ->middleware('permission:admin.access.user.change-password');
            });
        });
    });

    Route::group([
        'prefix' => 'dailyvote',
        'as' => 'dailyvote.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [DailyVoteController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(('Daily Vote'), route('admin.auth.dailyvote.index'));
            });
        Route::get('/create', [DailyVoteController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.dailyvote.index')
                    ->push(('Daily Vote'), route('admin.auth.dailyvote.create'));
            });

        Route::post('/dailyvote', [DailyVoteController::class, 'store'])->name('store');

        Route::group(['prefix' => '{id?}' ], function () {
            Route::get('/', [DailyVoteController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$id) {
                        $trail->parent('admin.auth.dailyvote.index')
                            ->push(__('Show Daily Vote'), route('admin.auth.dailyvote.show',$id));
                });
            Route::delete('/', [DailyVoteController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group([
        'prefix' => 'teams',
        'as' => 'teams.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [TeamsController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(('Teams'), route('admin.auth.teams.index'));
            });

        Route::get('/RefreshTeams', [TeamsController::class, 'RefreshTeams'])
            ->name('RefreshTeams')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Teams'), route('admin.auth.teams.index'));
            });

        Route::get('/UpdateTeams', [TeamsController::class, 'UpdateTeams'])
            ->name('UpdateTeams')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Teams'), route('admin.auth.teams.index'));
            });

        Route::get('/create', [TeamsController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.teams.index')
                    ->push(('Create Teams'), route('admin.auth.teams.create'));
            });

        Route::post('/teams', [TeamsController::class, 'store'])->name('store');

        Route::group(['prefix' => '{id?}' ], function () {
            Route::get('/', [TeamsController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$teams_id) {
                        $trail->parent('admin.auth.team.index')
                            ->push(__('Show Team'), route('admin.auth.team.show',$teams_id));
                });
            Route::get('/edit', [TeamsController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.teams.index')
                        ->push(__('Editing teams'), route('admin.auth.teams.edit'));
                });

            Route::patch('/', [TeamsController::class, 'update'])->name('update');
            Route::delete('/', [TeamsController::class, 'destroy'])->name('destroy');
        });
    });


    Route::group([
        'prefix' => 'players',
        'as' => 'players.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ],function () {
        Route::get('/', [PlayerController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Player management'), route('admin.auth.players.index'));
            });
            Route::get('/RefreshPlayers', [PlayerController::class, 'RefreshPlayers'])
            ->name('RefreshPlayers')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Player'), route('admin.auth.players.index'));
            });

            Route::get('/UpdatePlayers', [PlayerController::class, 'UpdatePlayers'])
            ->name('UpdatePlayers')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Players'), route('admin.auth.players.index'));
            });


            Route::get('create', [PlayerController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.players.index')
                    ->push(__('Create Player'), route('admin.auth.players.create'));
            });
            Route::post('/', [PlayerController::class, 'store'])->name('store');
            Route::group(['prefix' => '{player}'], function () {
                Route::get('/', [PlayerController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$player) {
                        $trail->parent('admin.auth.players.index')
                            ->push(__('Show Player'), route('admin.auth.players.show',$player));
                });
                Route::get('/update', [PlayerController::class, 'update'])
                    ->name('update')
                    ->breadcrumbs(function (Trail $trail,$player) {
                        $trail->parent('admin.auth.players.index')
                            ->push(__('Edit Player'), route('admin.auth.players.update',$player));
                });
                Route::post('/', [PlayerController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail,$player) {
                        $trail->parent('admin.auth.players.index')
                            ->push(__('Edit Player'), route('admin.auth.players.edit',$player));
                });
                Route::delete('/', [PlayerController::class, 'destroy'])->name('destroy');
            });
    });

    Route::group([
        'prefix' => 'role',
        'as' => 'role.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [RoleController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Role Management'), route('admin.auth.role.index'));
            });

        Route::get('create', [RoleController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.role.index')
                    ->push(__('Create Role'), route('admin.auth.role.create'));
            });

        Route::post('/', [RoleController::class, 'store'])->name('store');

        Route::group(['prefix' => '{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Role $role) {
                    $trail->parent('admin.auth.role.index')
                        ->push(__('Editing :role', ['role' => $role->name]), route('admin.auth.role.edit', $role));
                });

            Route::patch('/', [RoleController::class, 'update'])->name('update');
            Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
        });
    });

        //Statistics CRUD
    Route::group([
        'prefix' => 'statistics',
        'as' => 'statistics.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [StatisticsController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Statistics'), route('admin.auth.statistics.index'));
            });

        Route::get('/{league}/{player}', [StatisticsController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$league,$player) {
                        $trail->parent('admin.auth.statistics.index')
                            ->push(__('Show Statistic'), route('admin.auth.statistics.show',$league,$player));
                });

        Route::delete('/{league}/{player}', [StatisticsController::class, 'destroy'])->name('destroy');


        Route::get('/RefreshStatistics', [StatisticsController::class, 'RefreshStatistics'])
            ->name('RefreshStatistics')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Statistics'), route('admin.auth.statistics.index'));
            });

        Route::get('/UpdateStatistics', [StatisticsController::class, 'UpdateStatistics'])
            ->name('UpdateStatistics')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Statistics'), route('admin.auth.statistics.index'));
            });

        Route::get('/create', [StatisticsController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.statistics.index')
                    ->push(__('Create Statistics'), route('admin.auth.statistics.create'));
            });

        Route::post('/statistics', [StatisticsController::class, 'store'])->name('store');

        Route::group(['prefix' => '{id?}' ], function () {
            Route::get('/edit', [StatisticsController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.statistics.index')
                        ->push(__('Editing Statistics'), route('admin.auth.statistics.edit'));
                });

            Route::patch('/', [StatisticsController::class, 'update'])->name('update');
        });
    });


    //Position


Route::group([
    'prefix' => 'position',
    'as' => 'position.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [PositionController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
            ->push(__('Position'), route('admin.auth.position.index'));
        });
    Route::get('/create', [PositionController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.auth.position.index')
                ->push(__('Create Position'), route('admin.auth.position.create'));
        });
    Route::post('/position', [PositionController::class, 'store'])->name('store');
    Route::group(['prefix' => '{id?}' ], function () {
        Route::get('/', [PositionController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$position_id) {
                        $trail->parent('admin.auth.position.index')
                            ->push(__('Show Position'), route('admin.auth.position.show',$position_id));
                });
        Route::get('/edit', [PositionController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.position.index')
                    ->push(__('Editing Position'), route('admin.auth.position.edit'));
            });

        Route::post('/', [PositionController::class, 'update'])
            ->name('update')
            ->breadcrumbs(function (Trail $trail,$position_id) {
                $trail->parent('admin.auth.position.index')
                    ->push(__('Edit Position'), route('admin.auth.position.update',$position_id));
        });
        Route::delete('/', [PositionController::class, 'destroy'])->name('destroy');
    });
});



//Sports
      Route::group([
        'prefix' => 'sports',
        'as' => 'sports.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [SportsController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Sports'), route('admin.auth.sports.index'));
            });

        Route::get('/create', [SportsController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.sports.index')
                    ->push(__('Create Sports'), route('admin.auth.sports.create'));
            });

        Route::post('/sports', [SportsController::class, 'store'])->name('store');

        Route::group(['prefix' => '{id?}' ], function () {
            Route::get('/', [SportsController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$sports_id) {
                        $trail->parent('admin.auth.sports.index')
                            ->push(__('Show Sport'), route('admin.auth.sports.show',$sports_id));
                });

            Route::get('/edit', [SportsController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.sports.index')
                        ->push(__('Editing Sports'), route('admin.auth.sports.edit'));
                });

            Route::post('/', [SportsController::class, 'update'])
                ->name('update')
                ->breadcrumbs(function (Trail $trail,$sports_id) {
                    $trail->parent('admin.auth.sports.index')
                        ->push(__('Edit Sports'), route('admin.auth.sports.update',$sports_id));
            });
            Route::delete('/', [SportsController::class, 'destroy'])->name('destroy');
        });
    });


    Route::group([
        'prefix' => 'posts',
        'as' => 'posts.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [PostsController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Posts'), route('admin.auth.posts.index'));
            });

        Route::get('/create', [PostsController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.posts.index')
                    ->push(__('Create Posts'), route('admin.auth.posts.create'));
            });

        Route::post('/posts', [PostsController::class, 'store'])->name('store');

        Route::group(['prefix' => '{id?}' ], function () {
            Route::get('/', [PostsController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$id) {
                        $trail->parent('admin.auth.posts.index')
                            ->push(__('Show Post'), route('admin.auth.posts.show',$id));
                });

            Route::get('/edit', [PostsController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.posts.index')
                        ->push(__('Editing Posts'), route('admin.auth.posts.edit'));
                });

            Route::post('/', [PostsController::class, 'update'])
                ->name('update')
                ->breadcrumbs(function (Trail $trail,$id) {
                    $trail->parent('admin.auth.posts.index')
                        ->push(__('Edit Posts'), route('admin.auth.posts.update',$id));
            });
            Route::delete('/', [PostsController::class, 'destroy'])->name('destroy');
        });
    });


    //Landing_page

    Route::group([
        'prefix' => 'landing',
        'as' => 'landing.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [LandingController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
            ->push(__('Landing Page'), route('admin.auth.landing.index'));
        });
        Route::post('/landing', [LandingController::class, 'store'])->name('store');
        Route::group(['prefix' => '{id?}' ], function () {
            Route::get('/', [LandingController::class, 'show'])
                        ->name('show')
                        ->breadcrumbs(function (Trail $trail,$landing_page) {
                            $trail->parent('admin.auth.landing.edit')
                                ->push(__('Show Landing Page'), route('admin.auth.landing.show',$landing_page));
                    });
            Route::get('/edit', [LandingController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.landing.edit')
                        ->push(__('Editing Position'), route('admin.auth.landing.edit'));
                });
    
            Route::post('/', [LandingController::class, 'update'])
                ->name('update')
                ->breadcrumbs(function (Trail $trail,$landing_page) {
                    $trail->parent('admin.auth.landing.edit')
                        ->push(__('Edit Landing Page'), route('admin.auth.landing.update',$landing_page));
            });
            Route::delete('/', [LandingController::class, 'destroy'])->name('destroy');
        });
    });
 
    //Landing about section
    
    Route::group([
        'prefix' => 'aboutlanding',
        'as' => 'aboutlanding.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [AboutUsController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
            ->push(__('About Us View'), route('admin.auth.aboutlanding.index'));
        });
        
        Route::post('/landing_about', [AboutUsController::class, 'store'])->name('store');
        Route::group(['prefix' => '{id?}' ], function () {
          
            Route::get('/edit', [AboutUsController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.landing.edit')
                        ->push(__('About Landing Edit'), route('admin.auth.aboutlanding.edit'));
                });
    
            Route::post('/', [AboutUsController::class, 'update'])
                ->name('update')
                ->breadcrumbs(function (Trail $trail,$landing_about) {
                    $trail->parent('admin.dashboard')
                        ->push(__('Edit About Section'), route('admin.auth.aboutlanding.update',$landing_about));
            });
        });
    });
    
    //Landing Dashboard Section

    Route::group([
        'prefix' => 'dashboardlanding',
        'as' => 'dashboardlanding.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [DashboardViewController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
            ->push(__('Dashboard Landing View'), route('admin.auth.dashboardlanding.index'));
        });
        
        Route::post('/landing_dashboard', [DashboardViewController::class, 'store'])->name('store');
        Route::group(['prefix' => '{id?}' ], function () {
          
            Route::get('/edit', [DashboardViewController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.landing.edit')
                        ->push(__('Dashboard Landing Edit'), route('admin.auth.dashboardlanding.edit'));
                });
    
            Route::post('/', [DashboardViewController::class, 'update'])
                ->name('update')
                ->breadcrumbs(function (Trail $trail,$landing_dashboard) {
                    $trail->parent('admin.dashboard')
                        ->push(__('Dashboard Landing Section'), route('admin.auth.dashboardlanding.update',$landing_dashboard));
            });
        });
    });

        //Landing Tabs Section

        Route::group([
            'prefix' => 'tabslanding',
            'as' => 'tabslanding.',
            'middleware' => 'role:'.config('boilerplate.access.role.admin'),
        ], function () {
            Route::get('/', [TabsController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Tabs Landing View'), route('admin.auth.tabslanding.index'));
            });
            
            Route::post('/landing_tabs', [TabsController::class, 'store'])->name('store');
            Route::group(['prefix' => '{id?}' ], function () {
              
                Route::get('/edit', [TabsController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail) {
                        $trail->parent('admin.auth.landing.edit')
                            ->push(__('Tabs Landing Edit'), route('admin.auth.tabslanding.edit'));
                    });
        
                Route::post('/', [TabsController::class, 'update'])
                    ->name('update')
                    ->breadcrumbs(function (Trail $trail,$landing_tabs) {
                        $trail->parent('admin.dashboard')
                            ->push(__('Tabs Landing Section'), route('admin.auth.tabslanding.update',$landing_tabs));
                });
            });
        });

// About Us

Route::group([
    'prefix' => 'about',
    'as' => 'about.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [AboutController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('admin.dashboard')
        ->push(__('About Us'), route('admin.auth.about.index'));
    });
    
    Route::post('/about', [AboutController::class, 'store'])->name('store');
    Route::group(['prefix' => '{id?}' ], function () {
      
        Route::get('/edit', [AboutController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.about.edit')
                    ->push(__('About Us Edit'), route('admin.auth.about.edit'));
            });

        Route::post('/', [AboutController::class, 'update'])
            ->name('update')
            ->breadcrumbs(function (Trail $trail,$about) {
                $trail->parent('admin.dashboard')
                    ->push(__('About Us'), route('admin.auth.about.update',$about));
        });
    });
});
   
// FAQ CRUD -----------------

Route::group([
    'prefix' => 'faq',
    'as' => 'faq.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', [FaqController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
            ->push(__('FAQ'), route('admin.auth.faq.index'));
        });

    Route::get('/create', [FaqController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.auth.faq.index')
                ->push(__('Create FAQ'), route('admin.auth.faq.create'));
        });

    Route::post('/faq', [FaqController::class, 'store'])->name('store');

    Route::group(['prefix' => '{id?}' ], function () {
        Route::get('/', [FaqController::class, 'show'])
                ->name('show')
                ->breadcrumbs(function (Trail $trail,$faq_id) {
                    $trail->parent('admin.auth.faq.index')
                        ->push(__('Show FAQ'), route('admin.auth.faq.show',$faq_id));
            });

        Route::get('/edit', [FaqController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.faq.index')
                    ->push(__('Editing FAQ'), route('admin.auth.faq.edit'));
            });

        Route::post('/', [FaqController::class, 'update'])
            ->name('update')
            ->breadcrumbs(function (Trail $trail,$faq_id) {
                $trail->parent('admin.auth.faq.index')
                    ->push(__('Edit FAQ'), route('admin.auth.faq.update',$faq_id));
        });
        Route::delete('/', [FaqController::class, 'destroy'])->name('destroy');
    });
});

//League CRUD
    Route::group([
        'prefix' => 'league',
        'as' => 'league.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [LeagueController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('League'), route('admin.auth.league.index'));
            });

        Route::get('/RefreshLeagues', [LeagueController::class, 'RefreshLeagues'])
            ->name('RefreshLeagues')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('League'), route('admin.auth.league.index'));
            });

        Route::get('/updateleague', [LeagueController::class, 'UpdateLeagues'])
            ->name('UpdateLeagues')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('League'), route('admin.auth.league.index'));
            });

        Route::get('/create', [LeagueController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.auth.league.index')
                    ->push(__('Create League'), route('admin.auth.league.create'));
            });

        Route::post('/league', [LeagueController::class, 'store'])->name('store');

        Route::group(['prefix' => '{league}' ], function () {
            Route::get('/', [LeagueController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$league) {
                        $trail->parent('admin.auth.league.index')
                            ->push(__('Show League'), route('admin.auth.league.show',$league));
                });
            Route::get('/edit', [LeagueController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail,$league) {
                    $trail->parent('admin.auth.league.index')
                    ->push(__('Editing league'), route('admin.auth.league.edit',$league));
                });
            Route::post('/', [LeagueController::class, 'update'])
                ->name('update')
                ->breadcrumbs(function (Trail $trail,$league) {
                    $trail->parent('admin.auth.league.index')
                        ->push(__('Edit League'), route('admin.auth.league.update',$league));
            });
            Route::delete('/', [LeagueController::class, 'destroy'])->name('destroy');
        });
    });

    //LiveScore
   Route::group([
        'prefix' => 'livescore',
        'as' => 'livescore.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [LivescoreController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('LiveScore'), route('admin.auth.livescore.index'));
            });
            Route::get('/addLivescore', [LivescoreController::class, 'addLivescore'])
            ->name('addLivescore')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Livescore'), route('admin.auth.livescore.index'));
            });

        Route::get('/updateLivescore', [LivescoreController::class, 'updateLivescore'])
            ->name('updateLivescore')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('Livescore'), route('admin.auth.livescore.index'));
            });
    });
    Route::group([
        'prefix' => 'updateinformation',
        'as' => 'updateinformation.',
        'middleware' => 'role:'.config('boilerplate.access.role.admin'),
    ], function () {
        Route::get('/', [UpdateInformationController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                ->push(__('logo'), route('admin.auth.updateinformation.index'));
            }); 

        // Route::get('/create', [UpdateInformationController::class, 'create'])
        //     ->name('create')
        //     ->breadcrumbs(function (Trail $trail) {
        //         $trail->parent('admin.auth.updateinformation.index')
        //             ->push(__('Create logo'), route('admin.auth.updateinformation.create'));
        //     });

        Route::post('/updateinformation', [UpdateInformationController::class, 'store'])->name('store');

        Route::group(['prefix' => '{id?}' ], function () {
            Route::get('/', [UpdateInformationController::class, 'show'])
                    ->name('show')
                    ->breadcrumbs(function (Trail $trail,$id) {
                        $trail->parent('admin.auth.updateinformation.index')
                            ->push(__('Show logo'), route('admin.auth.updateinformation.show',$id));
                });

            Route::get('/edit', [UpdateInformationController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.auth.updateinformation.index')
                        ->push(__('Editing logo'), route('admin.auth.updateinformation.edit'));
                });

            Route::post('/', [UpdateInformationController::class, 'update'])
                ->name('update')
                ->breadcrumbs(function (Trail $trail,$id) {
                    $trail->parent('admin.auth.updateinformation.index')
                        ->push(__('Edit logo'), route('admin.auth.updateinformation.update',$id));
            });
            // Route::delete('/', [UpdateInformationController::class, 'destroy'])->name('destroy');
        });
    });



});





