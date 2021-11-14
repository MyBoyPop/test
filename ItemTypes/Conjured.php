<?php

namespace App\ItemTypes;

class Conjured extends AbstractItem
{
    public function updateQuality()
    {
        --$this->sellIn;
        $this->quality -= 2;

        if ($this->sellIn <= 0) {
            $this->quality -= 2;
        }

        parent::updateQualityAbstract();
    }
}
