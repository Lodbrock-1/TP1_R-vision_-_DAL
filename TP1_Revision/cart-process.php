<?php

function generateToken() {
    $string = uniqid(rand());
    $randomString = substr($string, 0, 16);
    return $randomString;
}

require_once(realpath(__DIR__ . '/dal/DAL.php'));

if(isset($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
                if(!isset($_COOKIE['token'])) {
                    $valeur_cookie = generateToken();
                    setcookie('token', $valeur_cookie, time() + 3600, "/");
                }
                $dal = new DAL();
                $dal->CartProductFact()->addProduct($_POST["produitId"], $_POST["quantite"], $_COOKIE['token']);
                header("location: cart-view.php");
            break;
        case "remove":
            $dal = new DAL();
            $dal->CartProductFact()->removeProduct($_GET["id"]);
            header("location: cart-view.php");
            break;
    }
}