<?php
/* 
  callback function
  Router::run('/', function () {
    echo "hello world";
  });
*/

/*
  callback function in directory 
  Router::run('/profile/{url}', function ($name) {
    echo "welcome " . $name;
  });
*/

/*  
  Run method
  Router::run('/url','class@method');
*/

/*  
  in directory class@method
  Router::run('/profile/change-password', 'directory/class@method');
*/

/*  
  Run method with request
  Router::run('/url','class@method','request(post|get)');
*/

/*  
  Variables Uri
  Router::run('/url/{url}', 'class@method');
*/

/* 
  The default parameter is "get". It doesn't need to be specified. 
  But it is useful to specify it for legibility.
*/

//homepage start
Router::run('/', 'HomePage@index');
Router::run('/getCounty/{id}', 'HomePage@getCounty', 'get');
Router::run('/getNeighbourhood/{id}', 'HomePage@getNeighbourhood', 'get');
Router::run('/saveForm', 'HomePage@saveForm', 'post');
Router::run('/filterTable', 'HomePage@filterTable', 'post');
//homepage end

//admin panel start
Router::run('/admin', 'admin@index');
Router::run('/admin', 'admin@login', 'post');
Router::run('/sessionDestroy', 'admin@sessionDestroy');
//admin panel end
