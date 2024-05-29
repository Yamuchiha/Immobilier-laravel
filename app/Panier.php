<?php 

    namespace App;


    class Panier{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;
        public $status = '';

        public function __construct($oldCart, $trano_id){
            
            if($oldCart){
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
                // $this->items = null;
                // $this->totalQty = 0;
                // $this->totalPrice = 0;
                if($this->items){
                    if(array_key_exists($trano_id, $this->items)){
                        $this->status = 'existe';
                        // $storedItem = $this->items[$maison_id];
                    }
                }
            }

        }

        public function add($item, $trano_id){

            $storedItem = ['qty' => 0,'trano_id' => 0, 'trano_nom' => $item->Nom,
        'trano_prix' => $item->Prix, 'trano_image' => $item->Image_Vignette, 'item' =>$item];

        // if($this->items){
        //     if(array_key_exists($trano_id, $this->items)){
        //         $this->status = 'existe';
        //         // $storedItem = $this->items[$maison_id];
        //     }
        // }

        $storedItem['qty']++;
        $storedItem['trano_id'] = $trano_id;
        $storedItem['trano_nom'] = $item->Nom;
        $storedItem['trano_prix'] = $item->Prix;
        $storedItem['trano_image'] = $item->Image_Vignette;
        $this->totalQty++;
        $this->totalPrice += $item->Prix;
        $this->items[$trano_id] = $storedItem;

        // $this->items = null;
        // $this->totalQty = 0;
        // $this->totalPrice = 0;

        }

        public function removeItem($id){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['trano_prix'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }

    }






?>