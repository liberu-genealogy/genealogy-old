<?php

Route::middleware(['auth', 'core'])
    ->group(function () {
        Route::namespace('Citation')
            ->prefix('citation')->as('citation.')
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
        Route::namespace('Note')
            ->prefix('note')->as('note.')
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

        Route::namespace('Repository')
            ->prefix('repository')->as('repository.')
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

        Route::namespace('Source')
            ->prefix('source')->as('source.')
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
