<?php

namespace App\ItemTypes;

class Normal extends AbstractItem
{
    public function updateQuality()
    {
        --$this->sellIn;
        --$this->quality;

        if ($this->sellIn <= 0) {
            $this->quality -= 1;
        }

        parent::updateQualityAbstract();
    }
}
