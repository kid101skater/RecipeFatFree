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
    $f3->route('GET /Recipes', function($f3)
              {
                session_destroy();
                $f3->reroute('/');
              });
    
    
    // define view recipe route
    $f3->route('GET|POST /Recipes/@recipeID', function($f3, $params) {
        $db = new Database();
        $recipeID = $params['recipeID'];
        $f3->set('header','pages/navbar.html');
        $recipe = $db->GetRecipe($recipeID);
        $f3->set('recipe', $recipe);
        $randoms = $db->GetThreeRecipes();
        $f3->set('randoms', $randoms);
        
        echo Template::instance()->render('pages/recipe.html');
    });
    
    // Define create recipe route
    $f3->route('GET|POST /Create', function($f3) {
        
        $db = new Database();
        if(isset($_POST['recipeTitle']) and isset($_POST['recipeDetails']) and isset($_POST['recipeDetails']) and isset($_POST['burb']) and isset($_POST['Catagory']))
        {
            echo $_POST['recipeTitle'];
            echo $_POST['recipeDetails'];
            echo $_POST['burb'];
            echo $_POST["recipeImg"];
            echo $_FILES["recipeImg"]["name"];
            
            if(isset($_FILES ["recipeImg"]))
            {
                $pic = $_FILES["recipeImg"]["name"];
                
                $target_dir = "imgs/";
                $target_file = $target_dir . basename($_FILES["recipeImg"]["name"]);
                if (move_uploaded_file($_FILES["recipeImg"]["tmp_name"], $target_file))
                {
                    echo $pic;
                    $newImg = "/imgs/" . $pic;
                    echo $newImg;
                }
                else
                {
                    return;
                }
                $postID = $db->CreateRecipe($_POST['recipeTitle'], $_POST['recipeDetails'], $_POST['burb'], $newImg, $_POST['Catagory']);
            }
            else
            {
                $postID = $db->CreateRecipeDefault($_POST['recipeTitle'], $_POST['recipeDetails'], $_POST['burb'],  $_POST['Catagory']);
            }
            $f3->reroute('/');
        }
        else
        {
        $f3->set('header','pages/navbar.html');
        echo Template::instance()->render('pages/createrecipe.html');
        }
    });
    
    $f3->route('GET|POST /Catagory/@cat', function($f3, $params)
    {
        $db = new Database();
        $cat = $params['cat'];
        $recipes = $db->GetRecipesByCat($cat);
        $f3->set('recipes', $recipes);
        $f3->set('header','pages/navbar.html');
        
        echo Template::instance()->render('pages/home.html');
    });
    
    
    
    ////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    /////// NOT IMPLEMENTED YET BECAUSE TIME /////////////
    /////////////////////////////////////////////////////
    ////////////////////////////////////////////////////
    
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