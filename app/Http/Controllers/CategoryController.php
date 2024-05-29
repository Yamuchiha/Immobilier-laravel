<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ajoutCategorie(){
        return view('admin.ajoutercategorie');
    }

    public function sauvercategorie(Request $request){
        $this->validate($request, ['categorie_nom' => 'required|unique:categories']);

        $categorie = new Categorie();
        $categorie->categorie_nom = $request->input('categorie_nom');
        $categorie->save();
        
        return redirect('/ajoutCategorie')->with('status', 'La catégorie '.$categorie->categorie_nom. ' a été ajouté avec succès');
    }

    public function categories(){
        $categories = Categorie::get();
        return view('admin.categories')->with('categories', $categories);
    }

    public function editer_categorie($id){
        $categorie = Categorie::find($id);
        return view('admin.formEdit.editerCategorie')->with('categorie', $categorie);
    }

    public function modifiercategorie(Request $request){
        $this->validate($request, ['categorie_nom' => 'required|unique:categories']);


        $categorie = Categorie::find($request->input('id'));
        $categorie->categorie_nom = $request->categorie_nom;

        $categorie->update();
        return redirect('/categories')->with('status', 'La catégorie '.$categorie->categorie_nom. ' a été modifiée avec succès');
        // return redirect('/editer_categorie/'.$request->input('id'));
    }

    public function supprimercategorie($id){
        $categorie = Categorie::find($id);
        $categorie->delete();

        return redirect('/categories')->with('status', 'La catégorie '.$categorie->categorie_nom.' a été supprimée avec succès');
    }
}
