<?php
namespace App;

use App\ItemTypes\AbstractItem;
use App\ItemTypes\AgedBrie;
use App\ItemTypes\Backstage;
use App\ItemTypes\Conjured;
use App\ItemTypes\Normal;
use App\ItemTypes\Sulfuras;

final class GildedRose
{
    /**
     * @var array
     */
    public static $types = [
        'Aged Brie' => AgedBrie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => Backstage::class,
        'Conjured Mana Cake' => Conjured::class,
    ];

    /**
     * @var AbstractItem[]
     */
    public $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param AbstractItem $item
     * @return Normal
     */
    public static function createType($item)
    {
        if (array_key_exists($item->name, self::$types)) {
            return new self::$types[$item->name]($item->name, $item->sellIn, $item->quality);
        }

        return new Normal($item->name, $item->sellIn, $item->quality);
    }

    public function updateQualityParent(): array
    {
        foreach ($this->items as $key => $item) {
            $this->items[$key] = self::createType($item);
            $this->items[$key]->updateQuality();
        }
        return $this->items;
    }
}
