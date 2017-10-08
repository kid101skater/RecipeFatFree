<?php
require("../../../other/recipe_config.php");
class Database
{
    function GetRecipes()
    {
        // connect to DB
        try
        {
            // get the db obj
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        
        // set the sql statment
        $sql = "SELECT * FROM `Recipes`";
        
        // fetch all the data from the sql statement
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        // create a new Recipe for each of the ones from the database
        $recipes[] = new Recipe(null, null, null, null, null);
        $counter = 0;
        
        // for each recipe in database, create a recipe object we can later reference
        foreach($result as $row)
        {
            $recipes[$counter] = new Recipe($row['recipeID'], $row['recipeTitle'], $row['recipeImg'], $row['recipeDetails'], $row['recipeBurb']);
            $counter = $counter + 1; // increment the counter so that we can correctly add new ones to the array
        }
    
        // return the recipes array list
        return $recipes;
    }
    
    // Add functionality to use a default picture
    function CreateRecipeDefault($title, $details, $burb)
    {
        $img = "/imgs/default.png";
        echo "img " + $img;
        $this->CreateRecipe($title, $details, $burb, $img);
    }
    
    // Main function to create a recipe
    function CreateRecipe($title, $details, $burb, $img)
    {
        try
        {
            // get the db obj
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        }
        catch(PDOException $e)
        {
            echo "GOT A DAMN ERROR";
             echo $e->getMessage();
        }
        $sql = "INSERT INTO `Recipes` (`recipeTitle`, `recipeImg`, `recipeDetails`, `recipeBurb`) VALUES(:title, :img, :details, :burb)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':details', $details, PDO::PARAM_STR);
        $stmt->bindParam(':burb', $burb, PDO::PARAM_STR);
        $stmt->bindParam(':img', $img, PDO::PARAM_STR);
        $stmt->execute();
    }
}