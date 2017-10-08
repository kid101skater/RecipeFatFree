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
    function __construct($id, $title, $img, $details, $burb, $cat)
    {
        $this->recipeID = $id;
        $this->title = $title;
        $this->img = $img;
        $this->details = $details;
        $this->burb = $burb;
        $this->cat = $cat;
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
        return $this->details;
    }
    
    function getRecipeBurb()
    {
        return $this->burb;
    }
    
    function getRecipeCat()
    {
        return $this->cat;
    }
}