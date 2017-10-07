<?php
require("../../../other/recipe_config.php");
class db
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
        $sql = "";
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $recipes[] = new Recipe(null, null, null, null, null);
        $counter = 0;
        foreach($result as $row)
        {
            $recipes[$counter] = new Recipe($row['recipeID'], $row['recipeTitle'], $row['recipeImg'], $row['recipeDetails'], $row['recipeBurb']);
            $counter = $counter + 1;
        }
    
        return $recipes;
    }
}