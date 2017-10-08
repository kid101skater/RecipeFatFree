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
            <div class="col-md-12 container">
            <!-- repeat card layout for each blog -->
            <?php foreach (($recipes?:[]) as $recipe): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="<?= ($BASE) ?><?= ($recipe->getRecipeImg()) ?>" alt="recipe image">
                            <div class="card-block">
                                <h4 class="card-title"><center><?= ($recipe->getRecipeTitle()) ?></center></h4>
                                <hr>
                                    <p class="card-text"><center><?= ($recipe->getRecipeBurb()) ?></center></p>
                                <hr>
                                    <span>
                                        <center>
                                            <a href="<?= ($BASE. '/Recipes/' .$recipe->getRecipeId()) ?>"><button type="button" class="btn btn-primary">View Recipe</button></a>
                                        </center>
                                    </span>
                            </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>