<?php


namespace App\Models;


class Wishlistadder
{
    public $items = null;
    public $totalQty = 0;

    public function __construct($wish)
    {
        if($wish){
            $this->items = $wish->items;
            $this->totalQty = $wish->totalQty;
        }
    }

    public function addItem($item, $productid){

        $storeditem = ['qty' => 0, 'item'=>$item];

        if($this->items){
            if(array_key_exists($productid, $this->items)){
                $storeditem = $this->items[$productid];
            }
        }

        $this->items[$productid] = $storeditem;
        $this->totalQty++;

    }

}
