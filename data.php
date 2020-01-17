<?php

    // On simule un serveur plus lent
    // sleep(1);

    session_start();

    if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

    // Check de la requête AJAX côté serveur
    function is_ajax_request()
    {

        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    // Si pas de requête AJAX, alors nous quittons le script
    if(!is_ajax_request()) { exit; }

    /*
        *** Traitement des favoris
    */
    if($_POST)
    {
        // Extracion du $_POST
            // print_r($_POST);
        $id = isset($_POST["id"]) ? $_POST["id"] : "";

            // echo $id;

        // Nous passons la donnée dans un filtre REGEX acceptant 1 ou plusieurs nombres et en conservant la valeur dans une variable si true
        if(preg_match("/post-(\d+)/", $id, $filter ))
        {
            // print_r($filter);
            $id = $filter[1];

            if(!in_array($id, $_SESSION["favorites"]))
            {
                $_SESSION["favorites"][] = $id;
            }

            // Traitement du retrait des favoris
            if(isset($_POST["a"]) && $_POST["a"] == "remove")
            {
                foreach ($_SESSION['favorites'] as $key => $value)
                {
                  if($id == $value)
                  {
                    unset($_SESSION['favorites'][$key]);
                  }
                }
            }

            print "true";
        } else {
            print "false";
        }
    }

    /*
        *** Traitement de la deconnexion
    */
    if($_GET)
    {
        // print_r($_GET);
        if(isset($_GET["a"]) && $_GET["a"] == "deconnect")
        {
            session_destroy();
            print "true";
        }
    }
