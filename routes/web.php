<?php


//Front routes

Route::get('/', [
    'uses' => 'FrontController@index',
    'as'   => '/'
]);

Route::get('/about-us', [
    'uses' => 'FrontController@about',
    'as'   => 'about'
]);

Route::get('/contact-us', [
    'uses' => 'FrontController@contact',
    'as'   => 'contact'
]);

Route::get('/showing-this-category/{id}', [
    'uses' => 'FrontController@categoryBlog',
    'as'   => 'category-blogs'
]);

Route::get('/read-full-artical/read-more/{id}/{name}', [
    'uses' => 'FrontController@readMore',
    'as'   => 'read-more'
]);

//End Front routes

//Main Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/ajax/email-check/{email}', [
    'uses' => 'VisitorController@emailCheck',
    'as'   => 'email-check'
]);



Route::group(['middleware' => ['admin']], function () {
//Admin Area
//Category routes
Route::get('/category/add-category', [
    'uses' => 'AddCategoryController@category',
    'as'   => 'add-category'
]);

Route::get('/category/manage-category', [
    'uses' => 'AddCategoryController@manageCategory',
    'as'   => 'manage'
]);

Route::post('/category/new-category', [
    'uses' => 'AddCategoryController@newCategory',
    'as'   => 'new-category'
]);

Route::get('/category/edit-category/edit={id}', [
    'uses' => 'AddCategoryController@editCategory',
    'as'   => 'edit-category'
]);

Route::post('/category/update-category', [
    'uses' => 'AddCategoryController@updateCategory',
    'as'   => 'update-category'
]);

Route::get('/category/delete-category/{id}', [
    'uses' => 'AddCategoryController@deleteCategory',
    'as'   => 'delete-category'
]);
//End Category routes

//Blog routes
Route::get('/blog/add-blog', [
    'uses' => 'AddBlogController@blog',
    'as'   => 'add-blog'
]);

Route::post('/blog/new-blog', [
    'uses' => 'AddBlogController@newBlog',
    'as'   => 'new-blog'
]);

Route::get('/blog/manage-blog', [
    'uses' => 'AddBlogController@manageBlog',
    'as'   => 'manage-blog'
]);

Route::get('/blog/view-blog/view/{id}', [
    'uses' => 'AddBlogController@viewBlog',
    'as'   => 'view-blog'
]);

Route::get('/blog/edit-blog/edit/{id}', [
    'uses' => 'AddBlogController@editBlog',
    'as'   => 'edit-blog'
]);

Route::post('/blog/update-blog', [
    'uses' => 'AddBlogController@updateBlog',
    'as'   => 'update-blog'
]);

Route::get('/blog/delete-blog/{id}', [
    'uses' => 'AddBlogController@deleteBlog',
    'as'   => 'delete-blog'
]);
//End Blog  routes
//End Admin Area

});


//Visitor routes
Route::get('/blog/visitor-registration', [
    'uses'       => 'VisitorController@addVisitor',
    'as'         => 'add-visitor',
    'middleware' => 'visitor'
]);

Route::post('/blog/new-visitor', [
    'uses'       => 'VisitorController@newVisitor',
    'as'         => 'new-visitor'
]);

Route::get('/blog/visitor-logout', [
    'uses'       => 'VisitorController@visitorLogout',
    'as'         => 'visitor-logout'
]);

Route::get('/blog/visitor-login', [
    'uses'       => 'VisitorController@visitorLogin',
    'as'         => 'visitor-login',
    'middleware' => 'visitor'
]);

Route::post('/blog/login-visitor', [
    'uses'       => 'VisitorController@loginVisitor',
    'as'         => 'login-visitor'
]);

// Comment Routes
Route::post('/blog/new-comment', [
    'uses'       => 'CommentController@newComment',
    'as'         => 'new-comment'
]);

