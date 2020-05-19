<?php


namespace App\Models;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $discount = 0;
    public $discountid = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
            $this->discount = $oldCart->discount;
            $this->discountid = $oldCart->discountid;
        }
    }

    public function addItem($item, $productid){

        $storeditem = ['qty' => 0, 'discount'=>0,'discountid'=>0, 'price'=>$item->price, 'item'=>$item];

        $productid = (int)$productid;
        if($this->items){
            if(array_key_exists($productid, $this->items)){
                $storeditem = $this->items[$productid];
            }
        }

        $storeditem['qty']++;
        $storeditem['price'] = $item->price * $storeditem['qty'];
        $this->items[$productid] = $storeditem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
        $this->discount = $storeditem['discount'];
        $this->discountid = $storeditem['discountid'];

    }

    public function removeItem($item, $productid){

        $storeditem = ['qty' => 0,'discount'=>0,'discountid'=>0, 'price'=>$item->price, 'item'=>$item];

        //$productid = $productid;

        if($this->items) {

            if(array_key_exists($productid, $this->items)) {
                $qty = $this->items[$productid]['qty'];
                $price = $this->items[$productid]['price'];
                unset($this->items[$productid]);
                //dd($this->items);
                //$this->items = array_values($this->items);
                $this->totalQty -= $qty;
                $storeditem['qty'] = $this->totalQty;
                $this->totalPrice -= $price;
                $storeditem['price'] = $this->totalPrice;
            }

        }
    }

    public function updateItem($item, $productid, $qty)
    {

        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        if ($this->items){

            if (array_key_exists($productid, $this->items)) {

                $oldprice = $item->price;
                $oldqty = $this->items[$productid]['qty'];
                $qty = (int)$qty;

                if ($oldqty > $qty){
                    $oldqty -= $qty;
                    $this->totalQty -= $oldqty;
                    $tprice = $oldqty * $oldprice;
                    $this->totalPrice -= $tprice;
                }
                else if($oldqty === $qty) {
                    $this->totalQty;
                }
                else{
                    $newqty = $qty - $oldqty;
                    $this->totalQty += $newqty;
                    $tprice = $newqty * $oldprice;
                    $this->totalPrice += $tprice;
                }
                $storeditem['qty'] = $qty;
                $newprice = $oldprice * $storeditem['qty'];
                $storeditem['price'] = $newprice;
                $this->items[$productid] = $storeditem;


            }
        }
    }

    public function discount($discount, $discountid){
        $item = $this->items;
        //dd($item);
       // $this->items->discount = $discount;
        $this->discount = $discount;
        $this->discountid = $discountid;

    }

    public function removediscount(){
        $this->discount = 0;
        $this->discountid = 0;
    }

}
