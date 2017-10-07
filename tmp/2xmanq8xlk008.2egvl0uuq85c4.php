<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= ($PageTitle) ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/styles/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php echo $this->render($header,NULL,get_defined_vars(),0); ?>


<div class="container-fluid">
  <div class="row">
   <div class="col-md-10">
    <form method="post">
        <div class="col-md-8">
     <div class="form-group ">
      <label class="control-label requiredField" for="recipeTitle">
       Recipe Title
       <span class="required">
        *
       </span>
      </label>
      <input class="form-control" id="recipeTitle" name="recipeTitle" type="text"/>
      <span class="help-block" id="hint_recipeTitle">
       Give a title to your recipe
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="description">
       Short Description
       <span class="required">
        *
       </span>
      </label>
      <input class="form-control" id="description" name="description" type="text"/>
      <span class="help-block" id="hint_description">
       Give a short description (blurb) about your recipe
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="recipeDetails">
       Recipe Details
       <span class="required">
        *
       </span>
      </label>
      <textarea class="form-control" cols="40" id="recipeDetails" name="recipeDetails" rows="10"></textarea>
      <span class="help-block" id="hint_recipeDetails">
       Give steps to make your recipe!
      </span>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
     </div>
        <div class="col-md-4">
            Cat selection goes here
        </div>
    </form>
   </div>
  </div>
 </div>
</body>
</html>