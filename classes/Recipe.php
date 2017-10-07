<?php
class Recipe
{
    protected $recipeID;
    protected $title;
    protected $img;
    protected $details;
    protected $burb;
    
    /*
     * Default constructor to create a recipe.
     */
    function __construct($id, $title, $img, $details, $burb)
    {
        $this->recipeID = $id;
        $this->title = $title;
        $this->img = $img;
        $this->details = $recipe;
        $this->burb = $burb;
    }
    
    /*
     * Get the recipe ID
     */
    function getRecipeId()
    {
        return $this->recipeID;
    }
    
    function getRecipeTitle()
    {
        return $this->title;
    }
    
    function getRecipeImg()
    {
        return $this->img;
    }
    
    function getRecipeDetails()
    {
        return $this->recipe;
    }
    
    function getRecipeBurb()
    {
        return $this->burb;
    }
}