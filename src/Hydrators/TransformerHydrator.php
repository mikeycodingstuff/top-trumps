<?php

namespace TransformersTopTrumps\Hydrators;

use TransformersTopTrumps\Classes\Transformer;

class TransformerHydrator
{
    public static function getTransformers(\PDO $db)
    {
        $query = $db->prepare("SELECT `id`, `name`, `size`, `speed`, `power`, `disguise`, `top_trumps_rating`, `type`, `img_url`, `times_shown`, `winner` FROM `characters`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, Transformer::class);
        $query->execute();
        return $query->fetchAll();
    }

    public static function logWinner(\PDO $db, $id, $wins)
    {
        $wins ++;
        $query = $db->prepare("UPDATE `characters` SET `winner` = :wins WHERE `id` = :id;");
        $query->bindParam(':wins', $wins);
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public static function logShown(\PDO $db, $id, $times_shown)
    {
        $times_shown++;
        $query = $db->prepare("UPDATE `characters` SET `times_shown` = :times_shown WHERE `id` = :id;");
        $query->bindParam(':times_shown', $times_shown);
        $query->bindParam(':id', $id);
        $query->execute();
    }
}