<?php

    // Nous allons conserver en session les articles favoris de l'utilisateur (normalement en BDD)
    session_start();

    if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

    // print_r($_SESSION);

    // Nous créons ici une fonction pour voir si nous avons des articles en favoris ou non
    function checkFavorite($id)
    {
        return in_array($id, $_SESSION['favorites']);
    }

    // Nous permettons à l'utilisateur de se déconnecter
    // EN GET POUR DECONNEXION
    // if($_GET)
    // {
    //     if(isset($_GET["a"]) && $_GET["a"] == "deconnect")
    //     {
    //         session_destroy();
    //         // session_unset(($_SESSION['favorites']));
    //         header("location:index.php");
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Interaction 1 | Utilisation de la session</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .marker {
            display: none;
        }

        .favorite .marker {
            display: block;
            float: right;
            width: 50px;
        }

        .marker:hover {
            background-color: tomato;
        }
    </style>

</head>
<body>

    <main class="container">
        <!-- <a class="btn btn-warning" href="?a=deconnect"><i class="fas fa-power-off"></i></a> -->
        <a class="btn btn-warning" id="btn-deconnect"><i class="fas fa-power-off"></i></a>
        <section id="blog" class="row">
            <div class="col-sm-6">
                <div class="card <?php if(checkFavorite(1)){print "favorite";} ?>" id="post-1">
                    <div class="card-body">
                        <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>
                    <h5 class="card-title">Post #1</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id.
                    </p>
                </div>

                <a class="btn btn-outline-success btn-favorite">Ajout favoris</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card <?php if(checkFavorite(2)){print "favorite";} ?>" id="post-2">
                    <div class="card-body">
                        <span class="btn btn-info marker"><i class="fas fa-heart"></i></span>
                    <h5 class="card-title">Post #2</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id.
                    </p>
                </div>
                <a class="btn btn-outline-success btn-favorite">Ajout Favoris</a>
                </div>
            </div>
        </section>

    </main>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="ajax.js"></script>
</body>
</html>
