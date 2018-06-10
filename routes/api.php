<?php

Route::namespace('Auth')
    ->group(function () {
        Route::post('login', 'LoginController@login')
            ->name('login');
        Route::post('logout', 'LoginController@logout')
            ->name('logout');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')
            ->name('password.email');
        Route::post('password/reset', 'ResetPasswordController@reset')
            ->name('password.reset');
    });

Route::middleware(['auth'])
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

Route::middleware(['auth', 'core'])
    ->group(function () {
        Route::namespace('Administration')
            ->prefix('administration')->as('administration.')
            ->group(function () {
                Route::namespace('Owner')
                    ->prefix('owners')->as('owners.')
                    ->group(function () {
                        Route::get('initTable', 'OwnerTableController@init')
                            ->name('initTable');
                        Route::get('getTableData', 'OwnerTableController@data')
                            ->name('getTableData');
                        Route::get('exportExcel', 'OwnerTableController@excel')
                            ->name('exportExcel');

                        Route::get('selectOptions', 'OwnerSelectController@options')
                            ->name('selectOptions');
                    });

                Route::resource('owners', 'Owner\OwnerController', ['except' => ['show']]);

                Route::namespace('User')
                    ->prefix('users')->as('users.')
                    ->group(function () {
                        Route::get('initTable', 'UserTableController@init')
                            ->name('initTable');
                        Route::get('getTableData', 'UserTableController@data')
                            ->name('getTableData');
                        Route::get('exportExcel', 'UserTableController@excel')
                            ->name('exportExcel');
                        Route::get('selectOptions', 'UserSelectController@options')
                            ->name('selectOptions');
                    });

                Route::resource('users', 'User\UserController');
            });
    });

Route::middleware(['web', 'auth', 'core'])
    ->group(function () {
        Route::namespace('Event')
            ->prefix('events')->as('events.')
            ->group(function () {
                Route::get('initTable', 'EventTableController@init')
                    ->name('initTable');
                Route::get('form', 'EventTableController@init')
                     ->name('form');
                Route::get('getTableData', 'EventTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'EventTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'EventSelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('events', 'Event\EventController');

        Route::namespace('Individual')
            ->prefix('individuals')->as('individuals.')
            ->group(function () {
                Route::get('initTable', 'IndividualTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'IndividualTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'IndividualTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'IndividualSelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('individuals', 'Individual\IndividualController');

        Route::namespace('Family')
            ->prefix('families')->as('families.')
            ->group(function () {
                Route::get('initTable', 'FamilyTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'FamilyTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'FamilyTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'FamilySelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('families', 'Family\FamilyController');

        Route::namespace('Note')
            ->prefix('notes')->as('notes.')
            ->group(function () {
                Route::get('initTable', 'NoteTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'NoteTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'NoteTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'NoteSelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('notes', 'Note\NoteController');

        Route::namespace('Source')
            ->prefix('sources')->as('sources.')
            ->group(function () {
                Route::get('initTable', 'SourceTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'SourceTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'SourceTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'SourceSelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('sources', 'Source\SourceController');

        Route::namespace('Citation')
            ->prefix('citations')->as('citations.')
            ->group(function () {
                Route::get('initTable', 'CitationTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'CitationTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'CitationTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'CitationSelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('citations', 'Citation\CitationController');

        Route::namespace('Repository')
            ->prefix('repositories')->as('repositories.')
            ->group(function () {
                Route::get('initTable', 'RepositoryTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'RepositoryTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'RepositoryTableController@excel')
                    ->name('exportExcel');
                Route::get('selectOptions', 'RepositorySelectController@options')
                    ->name('selectOptions');
            });

        Route::resource('repositories', 'Repository\RepositoryController');

        Route::namespace('Tree')
            ->prefix('trees')->as('trees.')
            ->group(function () {
                Route::get('links', 'TreeController@links')
                    ->name('links');
                Route::get('pedigree', 'TreeController@links')
                    ->name('pedigree');
            });

        Route::resource('trees', 'Tree\TreeController');
    });
