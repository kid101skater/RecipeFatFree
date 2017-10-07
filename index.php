<?php
require("../../../other/blogs_config.php");

    try
    {
        // get the db obj
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    //Require the autoload file
    error_reporting('E_ALL');
    require_once('vendor/autoload.php');
    session_start();
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    
    //Define a default route
    $f3->route('GET /', function() {
        echo Template::instance()->render('pages/home.html');
    });
    
    // deifine default recipe - if no recipe id is given show homepage
    $f3->route('GET /Recipe/', function() {
        echo Template::instance()->render('pages/home.html');
    });
    
    
    // define view recipe route
    $f3->route('GET /Recipe/@recipeID', function() {
        echo Template::instance()->render('pages/recipe.html');
    });
    
    // Define create / edit recipe route
    $f3->route('GET /', function() {
        echo Template::instance()->render('pages/home.html');
    });
    
    
    //Run fat free
    $f3->run();