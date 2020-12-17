<?php

namespace App;

class GildedRose {
    public $name;
    public $quality;
    public $sellIn;

    public function __construct($name, $quality, $sellIn) {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick() {
        // update sellIn
        if ($this->name != 'Sulfuras, Hand of Ragnaros') $this->sellIn -= 1;

        // update quality
        switch ($this->name) {
            case 'Aged Brie':
                $this->quality += $this->sellIn > 0 ? 1 : 2;
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                if ($this->sellIn >= 10) {
                    $this->quality += 1;
                } elseif ($this->sellIn < 10 and $this->sellIn > 5) {
                    $this->quality += 2;
                } elseif ($this->sellIn <= 5 and $this->sellIn >= 0) {
                    $this->quality += 3;
                } elseif ($this->sellIn < 0) {
                    $this->quality = 0;
                }
                break;
            case 'normal':
                $this->quality -= $this->sellIn >= 0 ? 1 : 2;
                break;
            case 'Conjured Mana Cake':
                $this->quality -= $this->sellIn > 0 ? 2 : 4;
        }

        // don't let quality be lower than than 0
        if ($this->quality < 0) $this->quality = 0;

        // don't let quality be higher than 50 unless it's Sulfuras
        if ($this->quality > 50 and $this->name != 'Sulfuras, Hand of Ragnaros') {
            $this->quality = 50;
        }
    }
}
