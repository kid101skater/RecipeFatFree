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
<div class="col-md-2"></div>
  <div class="row">
   <div class="col-md-8">
    <form method="post" name="formR" id="formR" enctype="multipart/form-data">
        <div class="col-md-8">
     <div class="form-group ">
      <label class="control-label requiredField" for="recipeTitle">
       Recipe Title
       <span class="required" name="rTitle" id="rTitle">
        *
       </span>
      </label>
      <input class="form-control" id="recipeTitle" name="recipeTitle" type="text"/>
      <span class="help-block" id="hint_recipeTitle">
       Give a title to your recipe
      </span>
     </div>
     
     <div class="form-group">
       <label class="control-label requiredField" for="description">
       Provide an Image
       </label>
         <input class="form-control" id="recipeImg" name="recipeImg" type="file"/>
       <hr>
     </div>
     <div class="form-group ">

      <label class="control-label requiredField" for="description">
       Short Description
       <span class="required" name="rDescription" id="rDescription">
        *
       </span>
      </label>
      <input class="form-control" id="burb" name="burb" type="text"/>
      <span class="help-block" id="hint_description">
       Give a short description (blurb) about your recipe
      </span>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="recipeDetails">
       Recipe Details
       <span class="required" name="rDetails" id="rDetails">
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
       <button class="btn btn-primary" name="submit" type="submit" onclick="return checkInput()">
        Submit
       </button>
      </div>
     </div>
     </div>
        <div class="col-md-4">
            <div class="selectPadding"></div>
            <div class="panel panel-default">
                <div class="panel-heading">Select Catagory <span class="required" name="rCat" id="rCat">*</span></div>
                <div class="panel-body">
                <select name="Catagory" id="Catagory" class="form-control" multiple title="Choose a Catagory">
                    <option value="Dinner">Dinner</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Desert">Desert</option>
                    <option value="Snack">Snack</option>
                    <option value="Drink">Drink</option>
                </select>
                </div>
            </div>
        </div>
    </form>
   </div>
  </div>
<div class="col-md-2"></div>
 </div>

<script type="text/javascript">

            function checkInput()
            {
                var rTitle = document.getElementById("rTitle");
                var rDescription = document.getElementById("rDescription");
                var rDetails = document.getElementById("rDetails");
                result = true;
                if(!formR.recipeTitle.value)
                {
                    rTitle.innerText = "* Please provide Title";
                    result = false;
                }
                if(!formR.burb.value)
                {
                    rDescription.innerText = "* Please provide short Description";
                    result = false;
                }
                if(!formR.recipeDetails.value)
                {
                    rDetails.innerText = "* Please provide Details";
                    result = false;
                }
                if(!formR.Catagory.value)
                {
                    rCat.innerText = "* Please provide a Catagory";
                    result = false;
                }
                return result;    
            }
</script>
</body>
</html>