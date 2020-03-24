<?php

use Spatie\Newsletter\NewsletterFacade as Newsletter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// INDEX FILE
Route::get('/', 'FrontEndController@index')->name('index');

// SINGLE PAGE SHOW
Route::get('/post/{slug}', 'FrontEndController@single_page')->name('single_page');

// SINGLE CATEGORY PAGE SHOW MULTIPLE POSTS
Route::get('/category/{id}', 'FrontEndController@single_category')->name('single_category');

// SINGLE TAG PAGE SHOW MULTIPLE POSTS
Route::get('/tag/{id}', 'FrontEndController@single_tag')->name('single_tag');

// FOR MAIL CHAMP TO SEND EMALS
Route::post('/subscribe', function () {
    $email = request('email');
    Newsletter::subscribe($email);
    Session::flash('success', 'Successfully Subcribed');
    return redirect()->back();
});

// FOR SERACHING POSTS
Route::get('/results', function () {
    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
    return view('results')
        ->with('posts', $posts)
        ->with('title', 'Search Results : ' . request('query'))
        ->with('categories', \App\Category::take(5)->get())
        ->with('settings', \App\Setting::first())
        ->with('query', request('query'));
})->name('results');

Auth::routes();

Route::get('test', function () {
    return App\profile::find(1)->user;
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::get('/post/create', 'PostController@create')->name('post.create');

    // For Stroing the Post
    Route::post('/post/store', 'PostController@store')->name('post.store');

    // FOR CREATING THE CATEGORY
    Route::get('/category/create', 'CategoryController@create')->name('category.create');

    // FOR STORING THE CATEGORY
    Route::post('/category/store', 'CategoryController@store')->name('category.store');

    // FOR DISPLAYING THE CATEGORIES
    Route::get('/categoires', 'CategoryController@index')->name('categories.show');

    // FOR DELETEING THE CATEGORY
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    // FOR EDITING THE CATEGORY
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');

    // FOR UPDATING THE CATEGORY
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');

    // ********************************** POSTS *************************************
    // FOR DISPLYING ALL THE POSTS
    Route::get('/posts', 'PostController@index')->name('posts');

    // FOR DELETEING THE POST
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');

    // FOR EDITING THE POST
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');

    // FOR GETTING THE ALL TRASHED POST
    Route::get('/posts/trashed', 'PostController@trashed')->name('posts.trashed');

    // FOR PERMANANTLY DELETE
    Route::get('/post/kill/{id}', 'PostController@kill')->name('post.kill');

    // FOR RESTROING THE DELETED POST
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

    // FOR UPDATING THE POST
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');

    // ********************************** TAGS *************************************
    Route::get('/tags', 'TagsController@index')->name('tags');

    // FOR ADDING NEW THE TAG
    Route::post('/tag/new/', 'TagsController@store')->name('tag.store');

    // FOR EDITING THE TAG
    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');

    // FOR UPDATING THE TAG
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');

    // FOR DELETING THE TAG
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');

    // FOR Creating THE TAG
    Route::get('/tag/create/', 'TagsController@create')->name('tag.create');

    // ********************************** TAGS *************************************
    // FOR DISPLAYING USERS
    Route::get('/users', 'UserController@index')->name('users');

    // FOR CREATEING THE USER
    Route::get('/user/create', 'UserController@create')->name('user.create');

    // FOR STOREING THE USER
    Route::post('/user/store', 'UserController@store')->name('user.store');

    // REVOKE PERMISSION FROM USER
    Route::get('user/not-admin/{id}', 'UserController@not_admin')->name('user.not_admin');

    // GRANT PERMISSION TO USER
    Route::get('user/admin/{id}', 'UserController@admin')->name('user.admin');

    // SHOW USER PROFILE
    Route::get('user/profile', 'ProfileController@index')->name('user.profile');

    // USER PROFILE UPDATE
    Route::post('user/profile/update', 'ProfileController@update')->name('user.profile.update');

    //  USER TO DELETE AND DELETE THE PROFILE
    Route::get('/user/delete/{id}', 'UserController@destroy')->name('user.delete');

    // ********************************** SETTINS *************************************
    Route::get('/settings', 'SettingController@index')->name('setting.index');

    // UPDATE THE SETTINGS

    Route::post('/settings/update', 'SettingController@update')->name('settings.update');

});