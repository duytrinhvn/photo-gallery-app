<html>
    <head>
        <title>Photo gallery</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">
            <h1 class="title"><a href="app.ctrl.php">Photo gallery</a></h1>
            <div class="inner-container">

                <div class="row">
                    <?php 
                    if(!isset($TPL['requestedGal'])){
                        foreach ($TPL['results'] as $row) { ?>
                            <div class="card col-sm" style="padding-right: 0; padding-left: 0">
                                <a href="app.ctrl.php?directory=<?=$row['directory']?>">
                                    <img src="./photos/<?php echo $row['directory'] . '/' . $row['photos'][0]; ?>" class="card-img-top img" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['description']; ?></h5>
                                    </div>
                                </a>
                            </div>
                    <?php 
                    } }
                    else if(isset($TPL['requestedGal']) && !isset($TPL['requestedPhoto'])) {
                        ?>
                        <?php
                        for($i = 0; $i < count($TPL['requestedGal']['photos']); $i++){
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <a href="app.ctrl.php?directory=<?=$TPL['requestedGal']['directory']; ?>&id=<?= $i; ?>">
                                    <img src="./photos/<?php echo $TPL['requestedGal']['directory'] . '/' . $TPL['requestedGal']['photos'][$i]; ?>" class="img-thumbnail" />
                                </a>
                            </div>
                            <?php
                        }
                    }
                    else if(isset($TPL['requestedGal']) && isset($TPL['requestedPhoto'])){
                        ?>    
                        <img style="margin: auto auto;" src="./photos/<?php echo $TPL['requestedGal']['directory'] . '/' . $TPL['requestedPhoto']; ?>" class="img-thumbnail single-photo" />
                        <?php
                    }
                    ?>
                </div>
        </div>   
    </body>
</html>