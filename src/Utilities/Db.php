<?php

namespace TransformersTopTrumps\Utilities;

class Db
{
    public static function connectDb(): \PDO
    {
        return new \PDO('mysql:host=db; dbname=top_trumps', 'root', 'password');
    }
}