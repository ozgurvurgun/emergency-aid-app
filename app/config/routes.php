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

Router::run('/uyeler', 'uyeler@index');
Router::run('/uyeler', 'uyeler@hello');
Router::run('/uyeler', 'uyeler@post', 'post');
