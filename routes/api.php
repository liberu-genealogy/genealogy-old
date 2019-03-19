<?php

Route::middleware(['auth', 'core'])
    ->group(function () {

Route::namespace('Citations')
    ->prefix('citations')->as('citations.')
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

Route::namespace('Citations')

    ->group(function () {
        Route::resource('citations', 'CitationController'); // if it's the case, use `except` or `only` to avoid generating unused routes
    });


Route::namespace('Events')
    ->prefix('events')->as('events.')
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

Route::namespace('Events')

    ->group(function () {
        Route::resource('events', 'EventController'); // if it's the case, use `except` or `only` to avoid generating unused routes
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
        Route::resource('families', 'FamilyController'); // if it's the case, use `except` or `only` to avoid generating unused routes
    });



Route::namespace('Individual')
    ->prefix('individual')->as('individual.')
    ->group(function () {
       Route::get('initTable', 'IndividualTableController@init')
           ->name('initTable');
       Route::get('tableData', 'IndividualTableController@data')
           ->name('tableData');
       Route::get('exportExcel', 'IndividualTableController@excel')
           ->name('exportExcel');

       Route::get('options', 'IndividualSelectController@options')
           ->name('options');
   });

Route::namespace('Individual')

    ->group(function () {
        Route::resource('individuals', 'IndividualController'); // if it's the case, use `except` or `only` to avoid generating unused routes
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
        Route::resource('notes', 'NoteController'); // if it's the case, use `except` or `only` to avoid generating unused routes
    });




Route::namespace('Place')
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

Route::namespace('Place')

    ->group(function () {
        Route::resource('places', 'PlaceController'); // if it's the case, use `except` or `only` to avoid generating unused routes
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
        Route::resource('relationships', 'RelationshipController'); // if it's the case, use `except` or `only` to avoid generating unused routes
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
        Route::resource('repositories', 'RepositoryController'); // if it's the case, use `except` or `only` to avoid generating unused routes
    });




Route::namespace('Source')
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

Route::namespace('Source')

    ->group(function () {
        Route::resource('sources', 'SourceController'); // if it's the case, use `except` or `only` to avoid generating unused routes
    });





    });
