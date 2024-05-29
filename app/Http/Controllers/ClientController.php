<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Illustration;
use App\Models\Maison;
use App\Models\Slider;
use App\Panier;
use App\Trano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class ClientController extends Controller
{
    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $maisons = Maison::where('status', 1)->get();
        return view('clients.home')->with('sliders', $sliders)->with('maisons', $maisons);
    }

    public function shop(){
        $categories = Categorie::get();
        $maisons = Maison::where('status', 1)->get();
        return view('clients.shop')->with('categories', $categories)->with('maisons', $maisons);
    }

    public function selection_cat($nom){
        $categories = Categorie::get();
        $maisons = Maison::where('maison_categorie', $nom)->where('status', 1)->get();
        return view('clients.shop')->with('categories', $categories)->with('maisons', $maisons);
       
    }

    public function login(){
        return view('clients.login');
    }



    public function payer(){
        $sliders = Slider::find(2);
        if(!Session::has('panier')){
            return view('clients.panier')->with('sliders', $sliders);
        }
        return view('clients.checkout');
    }



    public function panier(){
        $sliders = Slider::find(2);

        if(!Session::has('panier')){
            return view('clients.panier')->with('sliders', $sliders);
        }

        $oldCart = Session::has('panier')? Session::get('panier'):null;
        $panier = new Panier($oldCart, 2);
        return view('clients.panier', ['tranos' => $panier->items, 'sliders' => $sliders]);

        //return view('clients.cart');


    }



    public function ajouterAuPanier($id){
        $trano = Trano::find($id);
        // dd($trano);
      
        $oldCart = Session::has('panier')? Session::get('panier'):null;
        $panier = new Panier($oldCart, $id);

        if($panier->status == 'existe'){
            return redirect('/acheter')->with('status', 'vous ne pouvez pas acheter la même maison plusieur fois');
        }
        $panier->add($trano, $id);
        Session::put('panier', $panier);
        // Session::put('panier', null);
        // dd(Session::get('panier'));
        return redirect('/acheter');
        
    }

    public function retirer_maison($id){
        $oldCart = Session::has('panier')? Session::get('panier'):null;
        $panier = new Panier($oldCart, 2);
        $panier->removeItem($id);
       
        if(count($panier->items) > 0){
            Session::put('panier', $panier);
        }
        else{
            Session::forget('panier');
        }

        //dd(Session::get('cart'));
        return Redirect::to('/panier');
    }



    public function acceuil(){
        $sliders = Slider::where('status', 1)->get();
        $tranos = Trano::where('status', 1)->get();
        return view('clients.acceuil')->with('sliders', $sliders)->with('tranos', $tranos);
    }



    public function detail($image, $id){
        $trano = Trano::find($id);
        
        $illustrations = Illustration::where('Image_vignette', $image)->get();
        return view('clients.detail')->with('trano', $trano)->with('illustrations', $illustrations);
    }



    public function achat(){
        $categories = Categorie::get();
        $tranos = Trano::where('status', 1)->get();
        return view('clients.achat')->with('categories', $categories)->with('tranos', $tranos);
    }



    public function selection_Categorie($categorie_nom){
        $categories = Categorie::get();
        $tranos = Trano::where('Categorie', $categorie_nom)->where('status', 1)->get();
        return view('clients.achat')->with('categories', $categories)->with('tranos', $tranos);
    }



    public function validation_payement(Request $request){
        $oldCart = Session::has('panier')? Session::get('panier'):null;
        $panier = new Panier($oldCart, 2);
        Stripe::setApiKey('sk_test_51N3CnDK66FC28y4df0IsOOeKNCZj3N3LnVNv9dthU9cD71KRRVthGsQmZBXGtNR3vBzHYlkgQWFRwjcpO3VmMq7200MWJFxG5R');

        try{

            $charge = Charge::create(array(
                "amount" => $panier->totalPrice * 100,
                "currency" => "eur",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

          

        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return Redirect::to('/payer');
        }

        Session::forget('panier');
        Session::put('success', 'Purchase accomplished successfully !');
        return Redirect::to('/panier')->with('status', 'Achat accompli avec succès');
    }
}
