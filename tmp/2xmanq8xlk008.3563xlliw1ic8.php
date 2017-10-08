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
            
            <div class="col-md-4 img-responsive">
                <img src="<?= ($BASE) ?>/<?= ($recipe->getRecipeImg()) ?>">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?= ($recipe->getRecipeTitle())."
" ?>
                    </div>
                    <div class="panel-body">
                        <?= ($recipe->getRecipeDetails())."
" ?>
                    </div>
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Catagory
                    </div>
                    <div class="panel-body">
                        <?= ($recipe->getRecipeCat())."
" ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
</html>