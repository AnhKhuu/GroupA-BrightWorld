<?php 
namespace App;
class CartOps{
    public $products = null;
    public $totalPrice = 0;
    public $finalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->finalPrice = $cart->finalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product, $id, $sale){
        $newProduct = ['quanty' => 0, 'price'=> $product->price, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * (1 - $sale->percent) * $product->price;
        $this->products[$id] =  $newProduct;
        $this->totalPrice += (1 - $sale->percent) * $product->price;
        $this->finalPrice = ($this->totalPrice * 110 / 100) + 30000;
        $this->totalQuanty++;
    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'] ?? true;
        $this->totalPrice -= $this->products[$id]['price'] ?? true;
        unset($this->products[$id]);
    }

    public function UpdateItemCart($id, $quanty, $sale){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * ((1 - $sale->percent) * $this->products[$id]['productInfo']->price);

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
    }

}
?>