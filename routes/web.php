<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Students
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::post('students/media', 'StudentController@storeMedia')->name('students.storeMedia');
    Route::post('students/ckmedia', 'StudentController@storeCKEditorImages')->name('students.storeCKEditorImages');
    Route::resource('students', 'StudentController');

    // Book Dates
    Route::delete('book-dates/destroy', 'BookDateController@massDestroy')->name('book-dates.massDestroy');
    Route::resource('book-dates', 'BookDateController');

    // Excel Reports
    Route::delete('excel-reports/destroy', 'ExcelReportController@massDestroy')->name('excel-reports.massDestroy');
    Route::resource('excel-reports', 'ExcelReportController');

    // Locations
    Route::delete('locations/destroy', 'LocationController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationController');

    // Modules
    Route::delete('modules/destroy', 'ModuleController@massDestroy')->name('modules.massDestroy');
    Route::resource('modules', 'ModuleController');

    // conductors
    Route::delete('conductors/destroy', 'ConductorController@massDestroy')->name('conductors.massDestroy');
    Route::resource('conductors', 'ConductorController');

    // Available Dates
    Route::delete('available-dates/destroy', 'AvailableDateController@massDestroy')->name('available-dates.massDestroy');
    Route::resource('available-dates', 'AvailableDateController');
});
