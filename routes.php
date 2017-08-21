<?php
$router->get('', 'LoginController@viewLogin');
$router->post('login', 'LoginController@login');

$router->post('createProducts', 'ProductController@createProducts');
$router->get('viewProducts', 'ProductController@viewProducts');
$router->get('viewProductsRegion', 'ProductController@viewProductsRegion');
$router->post('updateProducts', 'ProductController@UpdateProducts');
$router->post('deleteProducts', 'ProductController@deleteProducts');
$router->get('create', 'ProductController@createProductView');