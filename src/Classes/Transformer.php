<?php

namespace TransformersTopTrumps\Classes;

class Transformer
{
    private $id;
    private $name;
    private $size;
    private $speed;
    private $power;
    private $disguise;
    private $top_trumps_rating;
    private $type;
    private $img_url;
    private $times_shown;
    private $winner;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function getDisguise()
    {
        return $this->disguise;
    }

    public function getTopTrumpsRating()
    {
        return $this->top_trumps_rating;
    }
    
    public function getType()
    {
        return $this->type;
    }

    public function getImgUrl()
    {
        return $this->img_url;
    }

    public function getTimesShown()
    {
        return $this->times_shown;
    }
    
    public function getWinner()
    {
        return $this->winner;
    }

    public function getWinRatio()
    {
        if (($this->times_shown) == 0) {
            return 0;
        } else {
            return (($this->winner)/($this->times_shown)) * 100;
        }
    }
}