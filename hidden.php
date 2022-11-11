<?php

require_once './vendor/autoload.php';

use TransformersTopTrumps\Utilities\Db;
use TransformersTopTrumps\Hydrators\TransformerHydrator;

if (isset($_POST) && ($_POST !== [])) {
    $db = Db::connectDb();
    $id = $_POST['id'];
    $wins = $_POST['wins'];

    TransformerHydrator::logWinner($db, $id, $wins);
    header('Location: index.php');
} else {
    header('Location: index.php');
}