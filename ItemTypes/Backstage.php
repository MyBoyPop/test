<?php

namespace App\ItemTypes;

class Backstage extends AbstractItem
{
    public function updateQuality()
    {
    	++$this->quality;
    	
        if ($this->sellIn <= 0) {
            $this->quality =0;
        }elseif ($this->sellIn <= 5) {
            $this->quality += 2;
        } elseif ($this->sellIn <= 10) {
            ++$this->quality;
        }

        --$this->sellIn;

        parent::updateQualityAbstract();
    }
}
