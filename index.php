<?php

require_once './vendor/autoload.php';

use TransformersTopTrumps\Utilities\Db;
use TransformersTopTrumps\Hydrators\TransformerHydrator;
use TransformersTopTrumps\Classes\TransformersSelector;
use TransformersTopTrumps\Classes\Leaderboard;
use TransformersTopTrumps\ViewHelpers\TransformerViewHelper;
use TransformersTopTrumps\ViewHelpers\LeaderboardViewHelper;

$db = Db::connectDb();
$allTransformers = TransformerHydrator::getTransformers($db);
$shownTransformers = TransformersSelector::pickRandomTwo($allTransformers);
$shownTransformersHTML = TransformerViewHelper::displayTransformers($shownTransformers);
TransformerHydrator::logShown($db, $shownTransformers[0]->getId(), $shownTransformers[0]->getTimesShown());
TransformerHydrator::logShown($db, $shownTransformers[1]->getId(), $shownTransformers[1]->getTimesShown());
$topFive = Leaderboard::calculateTopFive($allTransformers);
$topFiveHTML = LeaderboardViewHelper::displayLeaderboard($topFive);

?>

<html lang="en-gb">
<head>
    <title>Transformers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header class="jumbotron jumbotron-fluid text-center m-0 game-title">
        <div class="container">
            <h1 class="display-4">Transformers Top Trumps</h1>
            <h2 class="lead">Choose your favourite!</h2>
        </div>
    </header>
    <main class="container">
        <section class="row d-flex card-deck mb-5 p-3">
            <?= $shownTransformersHTML ?>
        </section>
        <section class="row justify-content-center">
            <div class="col p-3 m-3 rounded shadow leaderboard-container">
                <h3>Leaderboard:</h3>
                <?= $topFiveHTML ?>
            </div>
        </section>
    </main>
</body>
</html>