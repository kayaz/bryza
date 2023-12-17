<?php
use Illuminate\Support\Facades\Route;

//GET - admin/crm/module
//POST - admin/crm/module - store
//PUT - admin/crm/module/{calendar} - update
//GET - admin/crm/module/{calendar} - show
//DELETE - admin/crm/module/{calendar} - destroy
//GET - admin/crm/module/{calendar}/edit - edit

Route::group([
    'namespace' => 'Admin', 'prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['auth', 'can:admin-panel']], function () {

    Route::get('/', function () {
        return redirect('admin/settings/seo');
    });

    Route::post('slider/set', 'Slider\IndexController@sort')->name('slider.sort');
    Route::post('gallery/set', 'Gallery\IndexController@sort')->name('gallery.sort');
    Route::post('image/set', 'Gallery\ImageController@sort')->name('image.sort');
    Route::get('ajaxGetGalleries', 'Gallery\IndexController@ajaxGetGalleries')->name('ajaxGetGalleries');

    Route::resources([
        'user' => 'User\IndexController',
        'role' => 'Role\IndexController',
        'greylist' => 'Greylist\IndexController',
        'article' => 'Article\IndexController',
        'page' => 'Page\IndexController',
        'file' => 'File\IndexController',
        'gallery' => 'Gallery\IndexController',
        'image' => 'Gallery\ImageController',
        'slider' => 'Slider\IndexController'
    ]);

    Route::group(['namespace' => 'Client','prefix'=>'/clients', 'as' => 'clients.'], function () {

        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/datatable', 'IndexController@datatable')->name('datatable');
        Route::get('/create', 'IndexController@create')->name('create');
        Route::get('/{client}', 'IndexController@show')->name('show');

        Route::get('{client}/calendar', 'CalendarController@index')->name('calendar');
        Route::get('{client}/rodo', 'RodoController@show')->name('rodo');

        // Client files
        Route::get('{client}/files', 'FileController@show')->name('files');
        Route::post('{client}/files', 'FileController@store')->name('files.store');
        Route::post('{client}/files/create', 'FileController@create')->name('files.create');
        Route::delete('{client}/files/{clientFile}', 'FileController@destroy')->name('file.destroy');

        // Client file description
        Route::post('file-desc/{clientFile}/form', 'FileController@form')->name('file.desc.form');
        Route::post('file-desc/{clientFile}', 'FileController@storeDesc')->name('file.desc.store');
        Route::delete('file-desc/{clientFile}', 'FileController@destroyDesc')->name('file.desc.destroy');

        // Client notes
        Route::get('{client}/notes', 'NoteController@show')->name('notes');
        Route::post('{client}/notes', 'NoteController@store')->name('notes.store');
        Route::put('{client}/notes/{note}', 'NoteController@update')->name('notes.update');
        Route::delete('{client}/notes/{note}', 'NoteController@destroy')->name('notes.destroy');

        // Client calendar
        Route::get('{client}/events', 'CalendarController@show')->name('events.show');
        Route::post('{client}/events/form', 'CalendarController@create')->name('events.create');

        // Client chat
        Route::group(['prefix'=>'{client}/chat', 'as' => 'chat.'], function () {
            Route::get('/', 'ChatController@show')->name('show');
            Route::post('/form', 'ChatController@form')->name('form');
            Route::post('/mark', 'ChatController@mark')->name('mark');
            Route::post('/', 'ChatController@create')->name('create');
        });
    });

    // Settings
    Route::group(['prefix'=>'/settings', 'as' => 'settings.'], function () {

        Route::resources([
            '/' => 'Dashboard\IndexController',
            'seo' => 'Dashboard\SeoController',
            'popup' => 'Dashboard\PopupController'
        ]);
    });

    // RODO
    Route::group(['prefix' => '/rodo', 'as' => 'rodo.'], function () {

        Route::resources([
            'rules' => 'Rodo\RulesController',
            'settings' => 'Rodo\SettingsController',
            'clients' => 'Rodo\ClientController'
        ]);
    });

    Route::get('logs', 'Log\IndexController@index')->name('log.index');
    Route::get('logs/datatable', 'Log\IndexController@datatable')->name('log.datatable');
});

Route::get('{uri}', 'Front\MenuController@index')->where('uri', '([A-Za-z0-9\-\/]+)');
