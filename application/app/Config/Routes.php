<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AdminController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*NORMAL ROUTES*/
$routes->get('blog', 'BlogPostController::showBlog');
$routes->get('blog/(:num)', 'BlogPostController::blogDetails/$1');
$routes->get('blog/tag/(:any)', 'SearchEngineController::searchTag/$1');
$routes->get('blog/category/(:any)', 'SearchEngineController::getCategoryPost/$1');

/*ADMIN ROUTES*/
$routes->group("admin", function($routes){

    $routes->get('login', 'AdminController::index');
    $routes->post('login', 'AdminController::adminLogin');
    $routes->get('logout', 'AdminController::logout');

    /*authenticated routes*/
        $routes->get('dashboard', 'DashboardController::index', ["filter"=>"admin"]);

        /*blog category routes*/
        $routes->get('blog-category', 'BlogCategoryController::index', ["filter"=>"admin"]);
        $routes->match(['post', 'get'], 'blog-category/add', 'BlogCategoryController::addCategory', ["filter"=>"admin"]);
        $routes->get('blog-category/(:num)', 'BlogCategoryController::deleteCategory/$1', ["filter"=>"admin"]);

        /*blog tag routes*/
        $routes->get('blog-tag', 'BlogTagController::index', ["filter"=>"admin"]);
        $routes->match(['post', 'get'], 'blog-tag/add', 'BlogTagController::addTag', ["filter"=>"admin"]);
        $routes->get('blog-tag/(:num)', 'BlogTagController::deleteTag/$1', ["filter"=>"admin"]);

        /*blog post routes*/
        $routes->get('blog-post', 'BlogPostController::index', ["filter"=>"admin"]);
        $routes->match(['get','post'], 'blog-post/add', 'BlogPostController::addPost', ["filter"=>"admin"]);

        $routes->get('blog-post/edit/(:num)', 'BlogPostController::editPost/$1', ["filter"=>"admin"]);
        $routes->post('blog-post/update', 'BlogPostController::updatePost', ["filter"=>"admin"]);
        $routes->get('blog-post/(:num)', 'BlogPostController::deletePost/$1', ["filter"=>"admin"]);

        /*enquiry routes*/
        $routes->get('enquiry', 'EnquiryController::index', ["filter"=>"admin"]);
        $routes->get('enquiry/(:num)', 'EnquiryController::deleteEnquiry/$1', ["filter"=>"admin"]);

        /*Admin Profile*/
        $routes->get('change-password', 'AdminController::changePassword', ["filter"=>"admin"]);
        $routes->post('change-password', 'AdminController::changePassword', ["filter"=>"admin"]);
        $routes->get('profile', 'AdminController::adminProfile', ["filter"=>"admin"]);

        /*search engine*/
        $routes->match(['post','get'], 'search-engine', 'SearchEngineController::index/', ["filter"=>"admin"]);
});


/* end ROUTES SETUP*/

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
