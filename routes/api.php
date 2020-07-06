<?php

use Illuminate\Support\Facades\Route;

    // Route::middleware(['api'])->group(
    //     function() {
    Route::post('register', '\App\Http\Controllers\Auth\RegisterController@register');
    Route::post('verify', '\App\Http\Controllers\Auth\VerificationController@verify_user');
    //     }
    // );

    /**
     * overwrite core.
     */
    Route::namespace('\App\Http\Controllers\enso\core')
    ->group(function () {
        Route::get('/meta', 'Guest')->name('meta');

        // require 'app/auth.php';
        Route::namespace('Auth')
        ->middleware('api')
        ->group(function () {
            Route::middleware('guest')->group(function () {
                Route::post('login', 'LoginController@login')->name('login');
                Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
                Route::post('password/reset', 'ResetPasswordController@attemptReset')->name('password.reset');
            });

            Route::middleware('auth')->group(function () {
                Route::post('logout', 'LoginController@logout')->name('logout');
            });
        });

        // Route::middleware(['api', 'auth'])
        //     ->group(fn () => Route::get('/sentry', 'Sentry')->name('sentry'));

        Route::middleware(['api', 'auth', 'core'])
            ->group(function () {
                Route::prefix('core')
                ->as('core.')
                ->group(function () {
                    Route::get('home', 'Spa')->name('home.index');

                    Route::namespace('Preferences')
                    ->prefix('preferences')
                    ->as('preferences.')
                    ->group(function () {
                        Route::patch('store/{route?}', 'Store')->name('store');
                        Route::post('reset/{route?}', 'Reset')->name('reset');
                    });
                });

                Route::namespace('Administration')
                ->prefix('administration')
                ->as('administration.')
                ->group(function () {
                    // require 'administration/userGroups.php';
                    Route::namespace('UserGroup')
                    ->prefix('userGroups')
                    ->as('userGroups.')
                    ->group(function () {
                        Route::get('create', 'Create')->name('create');
                        Route::post('', 'Store')->name('store');
                        Route::get('{userGroup}/edit', 'Edit')->name('edit');
                        Route::patch('{userGroup}', 'Update')->name('update');
                        Route::delete('{userGroup}', 'Destroy')->name('destroy');

                        Route::get('initTable', 'InitTable')->name('initTable');
                        Route::get('tableData', 'TableData')->name('tableData');
                        Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                        Route::get('options', 'Options')->name('options');
                    });
                    Route::namespace('User')
                    ->prefix('users')
                    ->as('users.')
                    ->group(function () {
                        Route::get('create/{person}', 'Create')->name('create');
                        Route::post('', 'Store')->name('store');
                        Route::get('{user}/edit', 'Edit')->name('edit');
                        Route::patch('{user}', 'Update')->name('update');
                        Route::delete('{user}', 'Destroy')->name('destroy');

                        Route::get('initTable', 'InitTable')->name('initTable');
                        Route::get('tableData', 'TableData')->name('tableData');
                        Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                        Route::get('options', 'Options')->name('options');

                        Route::get('{user}', 'Show')->name('show');

                        Route::post('{user}/token', 'Token')->name('token');
                    });
                });
            });
    });

    /**
     * overwirte people
     */

    Route::namespace('\App\Http\Controllers\enso\people')
        ->middleware(['api', 'auth', 'core'])
        ->prefix('administration/people')
        ->as('administration.people.')
        ->group(function () {
            Route::get('create', 'Create')->name('create');
            Route::post('', 'Store')->name('store');
            Route::get('{person}/edit', 'Edit')->name('edit');
            Route::patch('{person}', 'Update')->name('update');
            Route::delete('{person}', 'Destroy')->name('destroy');

            Route::get('initTable', 'InitTable')->name('initTable');
            Route::get('tableData', 'TableData')->name('tableData');
            Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

            Route::get('options', 'Options')->name('options');
        });

    /**
     * overwrite companies
     */
    Route::namespace('\App\Http\Controllers\enso\companies')
        ->middleware(['api', 'auth', 'core'])
        ->prefix('administration/companies')
        ->as('administration.companies.')
        ->group(function () {
            // require 'app/companies.php';
            Route::namespace('Company')
            ->group(function () {
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{company}/edit', 'Edit')->name('edit');
                Route::patch('{company}', 'Update')->name('update');
                Route::delete('{company}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
            });

            // require 'app/people.php';
            Route::namespace('Person')
            ->group(function () {
                Route::prefix('people')
                    ->as('people.')
                    ->group(function () {
                        Route::get('{company}', 'Index')->name('index');
                        Route::get('{company}/create', 'Create')->name('create');
                        Route::get('{company}/{person}/edit', 'Edit')->name('edit');
                        Route::patch('{person}', 'Update')->name('update');
                        Route::post('', 'Store')->name('store');
                        Route::delete('{company}/{person}', 'Destroy')->name('destroy');
                    });
            });

        });

    /**
     * overwrite team
     */
    Route::namespace('\App\Http\Controllers\enso\teams')
        ->middleware(['api', 'auth', 'core'])
        ->prefix('administration/teams')
        ->as('administration.teams.')
        ->group(function () {
            Route::get('', 'Index')->name('index');
            Route::post('', 'Store')->name('store');
            Route::delete('{team}', 'Destroy')->name('destroy');
            Route::get('options', 'Options')->name('options');
        });

    /**
     * overwrite permission
     */

    Route::middleware(['api', 'auth', 'core', 'multitenant'])
        ->prefix('system/permissions')->as('system.permissions.')
        ->namespace('\App\Http\Controllers\enso\permissions')
        ->group(function () {
            Route::get('create', 'Create')->name('create');
            Route::post('', 'Store')->name('store');
            Route::get('{permission}/edit', 'Edit')->name('edit');
            Route::patch('{permission}', 'Update')->name('update');
            Route::delete('{permission}', 'Destroy')->name('destroy');

            Route::get('initTable', 'InitTable')->name('initTable');
            Route::get('tableData', 'TableData')->name('tableData');
            Route::get('exportExcel', 'ExportExcel')->name('exportExcel');
        });

    /**
     * overwrite menus
     */
    Route::middleware(['api', 'auth', 'core'])
        ->prefix('system/menus')
        ->as('system.menus.')
        ->namespace('\App\Http\Controllers\enso\menus')
        ->group(function () {
            Route::get('create', 'Create')->name('create');
            Route::post('', 'Store')->name('store');
            Route::get('{menu}/edit', 'Edit')->name('edit');
            Route::patch('{menu}', 'Update')->name('update');
            Route::delete('{menu}', 'Destroy')->name('destroy');
            Route::put('organize', 'Organize')->name('organize');

            Route::get('initTable', 'InitTable')->name('initTable');
            Route::get('tableData', 'TableData')->name('tableData');
            Route::get('exportExcel', 'ExportExcel')->name('exportExcel');
        });

    /**
     * overwrite roles
     */
    Route::middleware(['api', 'auth', 'core'])
        ->prefix('system/roles')->as('system.roles.')
        ->namespace('\App\Http\Controllers\enso\roles')
        ->group(function () {
            Route::get('create', 'Create')->name('create');
            Route::post('', 'Store')->name('store');
            Route::get('{role}/edit', 'Edit')->name('edit');
            Route::patch('{role}', 'Update')->name('update');
            Route::delete('{role}', 'Destroy')->name('destroy');

            Route::get('initTable', 'InitTable')->name('initTable');
            Route::get('tableData', 'TableData')->name('tableData');
            Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

            Route::get('options', 'Options')->name('options');

            Route::namespace('Permission')
            ->prefix('permissions')->as('permissions.')
            ->group(function () {
                Route::get('get/{role}', 'Index')->name('get');
                Route::post('set/{role}', 'Update')->name('set');
                Route::post('write/{role}', 'ConfigWriter')->name('write');
            });
        });

    /**
     * overwrite logs
     */
    Route::middleware(['api', 'auth', 'core'])
        ->namespace('\App\Http\Controllers\enso\logs')
        ->prefix('system/logs')
        ->as('system.logs.')
        ->group(function () {
            Route::get('', 'Index')->name('index');
            Route::delete('{log}', 'Destroy')->name('destroy');
            Route::delete('{log}', 'Destroy')->name('destroy');
            Route::get('{log}/download', 'Download')->name('download');
            Route::get('{log}', 'Show')->name('show');
        });

    /**
     * overwrite localisation
     */
    Route::middleware(['api', 'auth', 'core'])
        ->namespace('\App\Http\Controllers\enso\localisation')
        ->prefix('system/localisation')
        ->as('system.localisation.')
        ->group(function () {
            // require 'app/json.php';
            Route::namespace('Json')
                ->group(function () {
                    Route::get('editTexts', 'Index')->name('editTexts');
                    Route::get('getLangFile/{language}/{subDir}', 'Edit')->name('getLangFile');
                    Route::patch('saveLangFile/{language}/{subDir}', 'Update')->name('saveLangFile');
                    Route::patch('addKey', 'AddKey')->name('addKey');
                    Route::patch('merge/{locale?}', 'Merge')->name('merge');
                });
            // require 'app/language.php';
            Route::namespace('Language')
                ->group(function () {
                    Route::get('create', 'Create')->name('create');
                    Route::post('', 'Store')->name('store');
                    Route::get('{language}/edit', 'Edit')->name('edit');
                    Route::patch('{language}', 'Update')->name('update');
                    Route::delete('{language}', 'Destroy')->name('destroy');

                    Route::get('initTable', 'InitTable')->name('initTable');
                    Route::get('tableData', 'TableData')->name('tableData');
                    Route::get('exportExcel', 'ExportExcel')->name('exportExcel');
                });
        });

    /**
     * overwrite tutorial
     */
    Route::middleware(['api', 'auth', 'core'])
        ->prefix('system/tutorials')
        ->as('system.tutorials.')
        ->namespace('\App\Http\Controllers\enso\tutorials')
        ->group(function () {
            Route::get('create', 'Create')->name('create');
            Route::post('', 'Store')->name('store');
            Route::get('{tutorial}/edit', 'Edit')->name('edit');
            Route::patch('{tutorial}', 'Update')->name('update');
            Route::delete('{tutorial}', 'Destroy')->name('destroy');

            Route::get('initTable', 'InitTable')->name('initTable');
            Route::get('tableData', 'TableData')->name('tableData');
            Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

            Route::get('load', 'Load')->name('load');
        });

    /**
     * overwrite data-import
     */
    Route::middleware(['api', 'auth', 'core'])
        ->namespace('\App\Http\Controllers\enso\dataimport')
        ->prefix('import')->as('import.')
        ->group(function () {
            // require 'app/imports.php';
            Route::namespace('Import')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::delete('{dataImport}', 'Destroy')->name('destroy');
                Route::post('store', 'Store')->name('store');
                Route::get('download/{dataImport}', 'Download')->name('download');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');
            });

            // require 'app/rejected.php';
            Route::namespace('Rejected')
            ->group(function () {
                Route::get('downloadRejected/{rejectedImport}', 'Download')->name('downloadRejected');
            });

            // require 'app/template.php';
            Route::namespace('Template')
            ->group(function () {
                Route::get('template/{type}', 'Show')->name('template');
                Route::post('uploadTemplate', 'Store')->name('uploadTemplate');
                Route::delete('deleteTemplate/{importTemplate}', 'Destroy')->name('deleteTemplate');
                Route::get('downloadTemplate/{importTemplate}', 'Download')->name('downloadTemplate');
            });

        });

    /**
     * overwrite activity-log
     */
    Route::middleware(['api', 'auth', 'core'])
        ->namespace('\App\Http\Controllers\enso\activitylogs')
        ->prefix('core/activityLogs')
        ->as('core.activityLogs.')
        ->group(fn () => Route::get('', 'Index')->name('index'));

    /**
     * overwrite howto video
     */
    Route::middleware(['api', 'auth', 'core'])
        ->prefix('howTo')->as('howTo.')
        ->namespace('\App\Http\Controllers\enso\howto')
        ->group(function () {
            Route::namespace('Video')
            ->prefix('videos')
            ->as('videos.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::post('', 'Store')->name('store');
                Route::patch('{video}', 'Update')->name('update');
                Route::delete('{video}', 'Destroy')->name('destroy');
                Route::get('{video}', 'Show')->name('show');
            });

            Route::namespace('Poster')
            ->prefix('posters')
            ->as('posters.')
            ->group(function () {
                Route::post('', 'Store')->name('store');
                Route::delete('{poster}', 'Destroy')->name('destroy');
                Route::get('{poster}', 'Show')->name('show');
            });

            Route::namespace('Tag')
            ->prefix('tags')
            ->as('tags.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::post('', 'Store')->name('store');
                Route::delete('{tag}', 'Destroy')->name('destroy');
                Route::patch('{tag}', 'Update')->name('update');
            });
        });

    /**
     * overwritet file
     */
    Route::middleware(['api', 'auth', 'core'])
        ->namespace('enso\files')
        ->prefix('core')
        ->as('core.')
        ->group(function () {
            // require 'app/files.php';
            Route::namespace('File')
            ->prefix('files')
            ->as('files.')
            ->group(function () {
                Route::get('', 'Index')->name('index');
                Route::get('link/{file}', 'Link')->name('link');
                Route::get('download/{file}', 'Download')->name('download');
                Route::delete('{file}', 'Destroy')->name('destroy');
                Route::get('show/{file}', 'Show')->name('show');
            });

            // require 'app/uploads.php';
            Route::namespace('Upload')
            ->prefix('uploads')
            ->as('uploads.')
            ->group(function () {
                Route::post('store', 'Store')->name('store');
                Route::delete('{upload}', 'Destroy')->name('destroy');
            });
        });

    Route::middleware(['signed', 'bindings'])
        ->namespace('enso\files\File')
        ->prefix('core/files')
        ->as('core.files.')
        ->group(function () {
            Route::get('share/{file}', 'Share')->name('share');
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
        Route::get('changedb', 'ChartController@changedb')
            ->name('changedb');

    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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
Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Gedcom')
            ->prefix('gedcom')
            ->as('gedcom.')
            ->group(function () {
                Route::post('store', 'Store')->name('store');
            });
    });

Route::get('gedcom/progress', '\App\Http\Controllers\Gedcom\Progress@index')->name('progress');

Route::middleware(['api', 'auth', 'core', 'multitenant'])
    ->group(function () {
        Route::namespace('Trees')
            ->prefix('trees')
            ->as('trees.')
            ->group(function () {
                Route::get('{tree}', 'Show')->name('show');
            });
    });

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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

Route::middleware(['api', 'auth', 'core', 'multitenant'])
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
