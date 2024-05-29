<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Maison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaisonController extends Controller
{

    public function ajouterMaison(){
        $categories = Categorie::get()->pluck('categorie_nom', 'categorie_nom');
        return view('admin.ajoutermaison')->with('categories', $categories);
    }

    public function sauvermaison(Request $request){
        $this->validate($request, ['maison_nom' => 'required|unique:maisons',
                                    'maison_prix' => 'required',
                                    'maison_categorie' => 'required',
                                    'maison_image' => 'image|nullable|max:1999']);
        
        $nom = $request->file('maison_image');
        
        if($request->hasFile('maison_image')){
            //prendre l'ensemble du nom de fichier
            $image_ensemble = $request->file('maison_image')->getClientOriginalName();
            // //prendre uniquement le nom de fichier
            $image_nom = pathinfo($image_ensemble, PATHINFO_FILENAME);
            // //prendre uniquement l'extension de fichier
            $extension = $request->file('maison_image')->getClientOriginalExtension();
            // //creation du nom de fichier à enregistrer dans la base et dans le fichier
            $image_enr = $image_nom.'_'.time().'.'.$extension;
            $path = $request->file('maison_image')->storeAs('public/Uploads', $image_enr);
            // print($image_enr);
        }else{
            $image_enr = 'noimage.jpg';
        }

        $maison = new Maison();
        $maison->maison_nom = $request->maison_nom;
        $maison->maison_prix = $request->maison_prix;
        $maison->maison_categorie = $request->maison_categorie;
        $maison->maison_image = $image_enr;
        $maison->status = 1;

        $maison->save();

        return redirect('/ajoutMaison')->with('status', 'La maison '.$maison->maison_nom.' a été ajoutée avec succès');
        
    }

    public function maisons(){

        $maisons = Maison::get();
        return view('admin.maisons')->with('maisons', $maisons);
    }

    public function editer_maison($id){
        $maison = Maison::find($id);
        $categories = Categorie::All()->pluck('categorie_nom', 'categorie_nom');
        return view('admin.formEdit.editerMaison')->with('maison', $maison)->with('categories', $categories);
    }

    public function modifiermaison(Request $request){
        $this->validate($request, ['maison_nom' => 'required',
                                    'maison_prix' => 'required',
                                    'maison_categorie' => 'required',
                                    'maison_image' => 'image|nullable|max:1999']);
        
        $maison = Maison::find($request->id);
        $maison->maison_nom = $request->maison_nom;
        $maison->maison_prix = $request->maison_prix;
        $maison->maison_categorie = $request->maison_categorie;

        if($request->hasFile('maison_image')){
            $image_ensemble = $request->file('maison_image')->getClientOriginalName();
            $image_nom = pathinfo($image_ensemble, PATHINFO_FILENAME);
            $extension = $request->file('maison_image')->getClientOriginalExtension();
            $image_enr = $image_nom.'_'.time().'.'.$extension;

            $path = $request->file('maison_image')->storeAs('public/Uploads', $image_enr);

            if($maison->maison_image != 'noimage.jpg'){
                Storage::delete('public/Uploads/'.$maison->maison_image);
            }
            $maison->maison_image = $image_enr;
        }

        $maison->update();
        return redirect('/maisons')->with('status', 'La maison '.$maison->maison_nom. ' a été modifiée avec succès');
    }

    public function supprimermaison($id){
        $maison = Maison::find($id);

        if($maison->maison_image != 'noimage.jpg'){
            Storage::delete('public/Uploads/'.$maison->maison_image);
        }

        $maison->delete();

        return redirect('/maisons')->with('status', 'La maison '.$maison->maison_nom.' a été supprimée avec succès');
    }

    public function desactive_maison($id){
        $maison = Maison::find($id);

        $maison->status = 0;
        $maison->update();
        return redirect('/maisons')->with('status', 'La maison '.$maison->maison_nom.' a été désactivé avec succès'); 
    }

    public function active_maison($id){
        $maison = Maison::find($id);

        $maison->status = 1;
        $maison->update();
        return redirect('/maisons')->with('status', 'La maison '.$maison->maison_nom.' a été activé avec succès'); 
    }
}
