<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

// Route::middleware(['web'])->group(
//     function() {
        Route::post('register', '\App\Http\Controllers\Auth\RegisterController@register');
        Route::post('verify', '\App\Http\Controllers\Auth\VerificationController@verify_user');
//     }
// );

/**
 * overwrite core
 */
Route::namespace('\LaravelEnso\Core\Http\Controllers')
    ->middleware(['multitenant'])
    ->group(function () {
        Route::get('/meta', 'Guest')->name('meta');

        Route::middleware(['web', 'auth'])
            ->group(fn () => Route::get('/sentry', 'Sentry')->name('sentry'));

        Route::middleware(['web', 'auth', 'core'])
            ->group(function () {
                // require 'app/core.php';
                Route::prefix('core')
                ->as('core.')
                ->group(function () {
                    Route::get('home', 'Spa')->name('home.index');

                    // require 'core/preferences.php';
                });
                // require 'app/administration.php';
            });
    });

Route::namespace('Auth')
    ->middleware('web')
    ->group(function () {
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::post('password/reset', 'ResetPasswordController@attemptReset')->name('password.reset');
    });
// example data for the dashboard
Route::middleware(['web', 'auth', 'multitenant'])
    ->namespace('Dashboard')
    ->prefix('dashboard')->as('dashboard.')
    ->group(function () {
        Route::get('line', 'ChartController@line')
            ->name('line');
        Route::get('bar', 'ChartController@bar')
            ->name('bar');
        Route::get('pie', 'ChartController@pie')
            ->name('pie');
        Route::get('doughnut', 'ChartController@doughnut')
            ->name('doughnut');
        Route::get('radar', 'ChartController@radar')
            ->name('radar');
        Route::get('polar', 'ChartController@polar')
            ->name('polar');
        Route::get('bubble', 'ChartController@bubble')
            ->name('bubble');
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Citations')
            ->prefix('citations')
            ->as('citations.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{citation}/edit', 'Edit')->name('edit');

                Route::patch('{citation}', 'Update')->name('update');

                Route::delete('{citation}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{citation}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Families')
            ->prefix('families')
            ->as('families.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{family}/edit', 'Edit')->name('edit');

                Route::patch('{family}', 'Update')->name('update');

                Route::delete('{family}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{family}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Notes')
            ->prefix('notes')
            ->as('notes.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{note}/edit', 'Edit')->name('edit');

                Route::patch('{note}', 'Update')->name('update');

                Route::delete('{note}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{note}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Places')
            ->prefix('places')
            ->as('places.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{place}/edit', 'Edit')->name('edit');

                Route::patch('{place}', 'Update')->name('update');

                Route::delete('{place}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{place}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Repositories')
            ->prefix('repositories')
            ->as('repositories.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{repository}/edit', 'Edit')->name('edit');

                Route::patch('{repository}', 'Update')->name('update');

                Route::delete('{repository}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{repository}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Sources')
            ->prefix('sources')
            ->as('sources.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{source}/edit', 'Edit')->name('edit');

                Route::patch('{source}', 'Update')->name('update');

                Route::delete('{source}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{source}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Types')
            ->prefix('types')
            ->as('types.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{type}/edit', 'Edit')->name('edit');

                Route::patch('{type}', 'Update')->name('update');

                Route::delete('{type}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{type}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Authors')
            ->prefix('authors')
            ->as('authors.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{author}/edit', 'Edit')->name('edit');

                Route::patch('{author}', 'Update')->name('update');

                Route::delete('{author}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{author}', 'Show')->name('show');
            });
    });
Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Publications')
            ->prefix('publications')
            ->as('publications.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{publication}/edit', 'Edit')->name('edit');

                Route::patch('{publication}', 'Update')->name('update');

                Route::delete('{publication}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{publication}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Gedcom')
            ->prefix('gedcom')
            ->as('gedcom.')
            ->group(function () {
                Route::post('store', 'Store')->name('store');
            });
    });

Route::get('gedcom/progress', '\App\Http\Controllers\Gedcom\Progress@index')->name('progress');

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Trees')
            ->prefix('trees')
            ->as('trees.')
            ->group(function () {
                Route::get('{tree}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('MediaObjects')
            ->prefix('objects')
            ->as('objects.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{mediaobject}/edit', 'Edit')->name('edit');

                Route::patch('{mediaobject}', 'Update')->name('update');

                Route::delete('{mediaobject}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{mediaobject}', 'Show')->name('show');
            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Addresses')
            ->prefix('addresses')
            ->as('addresses.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{addr}/edit', 'Edit')->name('edit');

                Route::patch('{addr}', 'Update')->name('update');

                Route::delete('{addr}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{addr}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Chan')
            ->prefix('chan')
            ->as('chan.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{chan}/edit', 'Edit')->name('edit');

                Route::patch('{chan}', 'Update')->name('update');

                Route::delete('{chan}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{chan}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Familyevents')
            ->prefix('familyevents')
            ->as('familyevents.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{familyEvent}/edit', 'Edit')->name('edit');

                Route::patch('{familyEvent}', 'Update')->name('update');

                Route::delete('{familyEvent}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{familyEvent}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Familyslugs')
            ->prefix('familyslugs')
            ->as('familyslugs.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{familySlgs}/edit', 'Edit')->name('edit');

                Route::patch('{familySlgs}', 'Update')->name('update');

                Route::delete('{familySlgs}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{familySlgs}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Personalias')
            ->prefix('personalias')
            ->as('personalias.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{personAlia}/edit', 'Edit')->name('edit');

                Route::patch('{personAlia}', 'Update')->name('update');

                Route::delete('{personAlia}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{personAlia}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Personanci')
            ->prefix('personanci')
            ->as('personanci.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{personAnci}/edit', 'Edit')->name('edit');

                Route::patch('{personAnci}', 'Update')->name('update');

                Route::delete('{personAnci}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{personAnci}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Personasso')
            ->prefix('personasso')
            ->as('personasso.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{personAsso}/edit', 'Edit')->name('edit');

                Route::patch('{personAsso}', 'Update')->name('update');

                Route::delete('{personAsso}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{personAsso}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Personevent')
            ->prefix('personevent')
            ->as('personevent.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{personEvent}/edit', 'Edit')->name('edit');

                Route::patch('{personEvent}', 'Update')->name('update');

                Route::delete('{personEvent}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{personEvent}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Personlds')
            ->prefix('personlds')
            ->as('personlds.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{personLds}/edit', 'Edit')->name('edit');

                Route::patch('{personLds}', 'Update')->name('update');

                Route::delete('{personLds}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{personLds}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Refn')
            ->prefix('refn')
            ->as('refn.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{refn}/edit', 'Edit')->name('edit');

                Route::patch('{refn}', 'Update')->name('update');

                Route::delete('{refn}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{refn}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Sourcedata')
            ->prefix('sourcedata')
            ->as('sourcedata.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{sourceData}/edit', 'Edit')->name('edit');

                Route::patch('{sourceData}', 'Update')->name('update');

                Route::delete('{sourceData}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{sourceData}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Sourcedataevent')
            ->prefix('sourcedataevent')
            ->as('sourcedataevent.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{sourceDataEven}/edit', 'Edit')->name('edit');

                Route::patch('{sourceDataEven}', 'Update')->name('update');

                Route::delete('{sourceDataEven}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{sourceDataEven}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Sourcerefevents')
            ->prefix('sourcerefevents')
            ->as('sourcerefevents.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{sourceRefEven}/edit', 'Edit')->name('edit');

                Route::patch('{sourceRefEven}', 'Update')->name('update');

                Route::delete('{sourceRefEven}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{sourceRefEven}', 'Show')->name('show');


            });
    });


Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Subm')
            ->prefix('subm')
            ->as('subm.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{subm}/edit', 'Edit')->name('edit');

                Route::patch('{subm}', 'Update')->name('update');

                Route::delete('{subm}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{subm}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Subn')
            ->prefix('subn')
            ->as('subn.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{subn}/edit', 'Edit')->name('edit');

                Route::patch('{subn}', 'Update')->name('update');

                Route::delete('{subn}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{subn}', 'Show')->name('show');


            });
    });

Route::middleware(['web', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Personsubm')
            ->prefix('personsubm')
            ->as('personsubm.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{personSubm}/edit', 'Edit')->name('edit');

                Route::patch('{personSubm}', 'Update')->name('update');

                Route::delete('{personSubm}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{personSubm}', 'Show')->name('show');


            });
    });


Broadcast::routes(['middleware' => ['auth:sanctum']]);
