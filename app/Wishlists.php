<?php

namespace App;


class Wishlists
{

    public $items = null;
    public function __construct($oldWish)
    {
        if ($oldWish) {
            $this->items = $oldWish->items;
            
        }
    }
    public function add($item, $id) {
        $storedItem = ['item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        
        $this->items[$id] = $storedItem;
    }
   
}
