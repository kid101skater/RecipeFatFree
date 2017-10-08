<?php
require("../../../other/recipe_config.php");

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
    $f3->route('GET /', function($f3) {
        
        // get recipes from database
        $db = new Database();
        $recipes = $db->GetRecipes();
        $f3->set('recipes', $recipes);
        $f3->set('PageTitle', "Recipes with Fat Free");
        
        $f3->set('header','pages/navbar.html');
        echo Template::instance()->render('pages/home.html');
    });
    
    // deifine default recipe - if no recipe id is given show homepage
    $f3->route('GET /Recipe/', function($f3) {
        
        $f3->reroute('/');
    });
    
    
    // define view recipe route
    $f3->route('GET /Recipe/@recipeID', function($f3) {
        $f3->set('header','pages/navbar.html');
        echo Template::instance()->render('pages/recipe.html');
    });
    
    // Define create recipe route
    $f3->route('GET|POST /Create', function($f3) {
        
        $db = new Database();
        if(isset($_POST['recipeTitle']))
        {
            echo $_POST['recipeTitle'];
            echo $_POST['recipeDetails'];
            echo $_POST['burb'];
            $db->CreateRecipeDefault($_POST['recipeTitle'], $_POST['recipeDetails'], $_POST['burb']);
        }
        
        $f3->set('header','pages/navbar.html');
        echo Template::instance()->render('pages/createrecipe.html');
    });
    
    // Define edit recipe route
    $f3->route('GET|POST /Edit/@recipeID', function($f3) {
        $f3->set('header','pages/navbar.html');
        echo Template::instance()->render('pages/createrecipe.html');
    });
    
    // Define edit recipe route when no id is passed
    $f3->route('GET /Edit/', function($f3) {
        $f3->reroute('/');
    });
    
    
    //Run fat free
    $f3->run();