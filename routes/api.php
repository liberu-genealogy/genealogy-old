<?php

Route::middleware(['auth', 'core'])
    ->group(function () {
        Route::namespace('Places')
            ->prefix('place')->as('place.')
            ->group(function () {
                Route::get('initTable', 'PlaceTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'PlaceTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'PlaceTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'PlaceSelectController@options')
                    ->name('options');
            });

        Route::namespace('Places')

            ->group(function () {
                Route::resource('place', 'PlaceController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });
        Route::namespace('Sources')
            ->prefix('source')->as('source.')
            ->group(function () {
                Route::get('initTable', 'SourceTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'SourceTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'SourceTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'SourceSelectController@options')
                    ->name('options');
            });

        Route::namespace('Sources')

            ->group(function () {
                Route::resource('source', 'SourceController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });

        Route::namespace('Relationship')
            ->prefix('relationship')->as('relationship.')
            ->group(function () {
                Route::get('initTable', 'RelationshipTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'RelationshipTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'RelationshipTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'RelationshipSelectController@options')
                    ->name('options');
            });

        Route::namespace('Relationship')

            ->group(function () {
                Route::resource('relationship', 'RelationshipController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });

        Route::namespace('Family')
            ->prefix('family')->as('family.')
            ->group(function () {
                Route::get('initTable', 'FamilyTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'FamilyTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'FamilyTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'FamilySelectController@options')
                    ->name('options');
            });

        Route::namespace('Family')

            ->group(function () {
                Route::resource('family', 'FamilyController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });

        Route::namespace('Citation')
            ->prefix('citation')->as('citation.')
            ->group(function () {
                Route::get('initTable', 'CitationTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'CitationTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'CitationTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'CitationSelectController@options')
                    ->name('options');
            });

        Route::namespace('Citation')

            ->group(function () {
                Route::resource('citation', 'CitationController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });

        Route::namespace('Repository')
            ->prefix('repository')->as('repository.')
            ->group(function () {
                Route::get('initTable', 'RepositoryTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'RepositoryTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'RepositoryTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'RepositorySelectController@options')
                    ->name('options');
            });

        Route::namespace('Repository')

            ->group(function () {
                Route::resource('repository', 'RepositoryController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });

        Route::namespace('Note')
            ->prefix('note')->as('note.')
            ->group(function () {
                Route::get('initTable', 'NoteTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'NoteTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'NoteTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'NoteSelectController@options')
                    ->name('options');
            });

        Route::namespace('Note')

            ->group(function () {
                Route::resource('note', 'NoteController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });

        Route::namespace('Event')
            ->prefix('event')->as('event.')
            ->group(function () {
                Route::get('initTable', 'EventTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'EventTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'EventTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'EventSelectController@options')
                    ->name('options');
            });

        Route::namespace('Event')

            ->group(function () {
                Route::resource('event', 'EventController'); // if it's the case, use `except` or `only` to avoid generating unused routes
            });





    });
