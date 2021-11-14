<?php

namespace App\ItemTypes;

abstract class AbstractItem implements AbstractItemInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sellIn;

    /**
     * @var int
     */
    public $quality;

    public function __construct(string $name, int $sellIn, int $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function updateQualityAbstract()
    {
        if ($this->quality >= 50) {
            $this->quality = 50;
        }

        if ($this->quality <= 0) {
            $this->quality = 0;
        }
    }
}
