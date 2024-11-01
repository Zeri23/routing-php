<?php

require_once __DIR__ . '/router.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost/main
// The output -> Index
get('/main', 'views/index.php');

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
get('/main/user/$id', 'views/user.php');

// Dynamic GET. Example with 2 variables
// The $name will be available in full_name.php
// The $last_name will be available in full_name.php
// In the browser point to: http://localhost/main/user/X/Y
get('/main/user/$name/$last_name', 'views/full_name.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/main/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
get('/main/product/$type/color/$color', 'product.php');

// A route with a callback
get('/main/callback', function() {
    echo 'Callback executed';
});

// A route with a callback passing a variable
// To run this route, in the browser type:
// http://localhost/main/callback/A
get('/main/callback/$name', function($name) {
    echo "Callback executed. The name is $name";
});

// Route where the query string happens right after a forward slash
get('/main/product', '');

// A route with a callback passing 2 variables
// To run this route, in the browser type:
// http://localhost/main/callback/A/B
get('/main/callback/$name/$last_name', function($name, $last_name) {
    echo "Callback executed. The full name is $name $last_name";
});

// ##################################################
// ##################################################
// ##################################################
// Route that will use POST data
post('/main/user', '/api/save_user');

// ##################################################
// ##################################################
// ##################################################
// Any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/main/404', 'views/404.php');
