<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Illustration;
use App\Trano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TranoController extends Controller
{

    public function ajoutertrano(){
        $categories = Categorie::get()->pluck('categorie_nom', 'categorie_nom');
        return view('admin.ajoutertrano')->with('categories', $categories);

    }


    public function sauverTrano(Request $request){
        $this->validate($request, ['Nom' => 'required',
                                    'Adresse' => 'required',
                                    'Categorie' => 'required',
                                    'Description' => 'required',
                                    
                                    'Prix' => 'required']);

        if($request->hasFile('Image_Vignette')){
            //prendre l'ensemble du nom de fichier
            $image_ensemble = $request->file('Image_Vignette')->getClientOriginalName();
            // //prendre uniquement le nom de fichier
            $image_nom = pathinfo($image_ensemble, PATHINFO_FILENAME);
            // //prendre uniquement l'extension de fichier
            $extension = $request->file('Image_Vignette')->getClientOriginalExtension();
            // //creation du nom de fichier à enregistrer dans la base et dans le fichier
            $image_enr = $image_nom.'_'.time().'.'.$extension;
            $path = $request->file('Image_Vignette')->storeAs('public/Trano_vignette', $image_enr);
            // print($image_enr);
        }else{
            $image_enr = 'noimage.jpg';
        }
        $trano = new Trano();

        $trano->Nom = $request->Nom;
        $trano->Adresse = $request->Adresse;
        $trano->Categorie = $request->Categorie;
        // $description = '<pre>'.$request->Description.'</pre>';
        $trano->Description = $request->Description;
        $trano->Image_Vignette = $image_enr;
        $trano->Prix = $request->Prix;
        $trano->status = 1;
        $trano->save();

        return redirect('/ajoutTrano')->with('status', 'La maison '. $trano->Nom.' a été ajoutée avec succès');
        print($request->Categorie);
    }

    public function trano(){
        $tranos = Trano::get();
        return view('admin.tranos')->with('tranos', $tranos);
    }

    public function ajouterIllustration($image){
        $vignette = $image;
        return view('admin.ajouterIllustration')->with('vignette', $vignette);
    }

    public function sauverillustration(Request $request){
        $this->validate($request, ['Illustration' => 'image|nullable']);

        if($request->hasFile('Illustration')){
            //prendre l'ensemble du nom de fichier
            $image_ensemble = $request->file('Illustration')->getClientOriginalName();
            // //prendre uniquement le nom de fichier
            $image_nom = pathinfo($image_ensemble, PATHINFO_FILENAME);
            // //prendre uniquement l'extension de fichier
            $extension = $request->file('Illustration')->getClientOriginalExtension();
            // //creation du nom de fichier à enregistrer dans la base et dans le fichier
            $image_enr = $image_nom.'_'.time().'.'.$extension;
            $path = $request->file('Illustration')->storeAs('public/Illustration', $image_enr);
            // print($image_enr);
        }else{
            $image_enr = 'noimage.jpg';
        }

        $illustration = new Illustration();
        $illustration->Image_vignette = $request->vignette;
        $illustration->Illustration = $image_enr;
        $illustration->save();
        return redirect('/ajouterIllustration/'.$illustration->Image_vignette)->with('status', 'L\'image d\'illustration a été ajoutée avec succès');
    }

    public function voirIllustration($image){
        $illustrations = Illustration::where('Image_Vignette', $image)->get();
        return view('admin.illustrations')->with('illustrations', $illustrations);
    }

    public function editer_trano($id){
        $categories = Categorie::get()->pluck('categorie_nom', 'categorie_nom');
        $trano = Trano::find($id);

        return view('admin.formEdit.editerTrano')->with('trano', $trano)->with('categories', $categories);
    }

    public function modifiertrano(Request $request){
        
         $this->validate($request, ['Nom' => 'required',
                                    'Adresse' => 'required',
                                    'Categorie' => 'required',
                                    'Description' => 'required',
                                    
                                    'Prix' => 'required']);
            $trano = Trano::find($request->id);
            
            $trano->Nom = $request->Nom;
            $trano->Adresse = $request->Adresse;
            $trano->Categorie = $request->Categorie;
            // $description = '<pre>'.$request->Description.'</pre>';
            $trano->Description = $request->Description;
            
            $trano->Prix = $request->Prix;
            
            
        if($request->hasFile('Image_Vignette')){
            $image_ensemble = $request->file('Image_Vignette')->getClientOriginalName();
          
            $image_nom = pathinfo($image_ensemble, PATHINFO_FILENAME);
          
            $extension = $request->file('Image_Vignette')->getClientOriginalExtension();
           
            $image_enr = $image_nom.'_'.time().'.'.$extension;
            $path = $request->file('Image_Vignette')->storeAs('public/Trano_vignette', $image_enr);
            
            if($trano->Image_Vignette != 'noimage.jpg'){
                $illustrations = Illustration::where('Image_vignette', $trano->Image_Vignette)->get();
                foreach ($illustrations as $illustration) {
                    Storage::delete('public/Illustration/'.$illustration->Illustration);
                }
                $illustrationSup = Illustration::where('Image_vignette', $trano->Image_Vignette)->delete();
                Storage::delete('public/Trano_vignette/'.$trano->Image_Vignette);
            }
            $trano->Image_Vignette = $image_enr;

        }
        $trano->update();
       

        return redirect('/tranos')->with('status', 'La maison '. $trano->Nom.' a été modifiée avec succès');
    }

    public function supprimertrano($id){
        
           $trano = Trano::find($id);      
           
           
           if($trano->Image_Vignette != 'noimage.jpg'){
               $illustrations = Illustration::where('Image_vignette', $trano->Image_Vignette)->get();
               foreach ($illustrations as $illustration) {
                   Storage::delete('public/Illustration/'.$illustration->Illustration);
               }
               $illustrationSup = Illustration::where('Image_vignette', $trano->Image_Vignette)->delete();
               Storage::delete('public/Trano_vignette/'.$trano->Image_Vignette);
           }
          
           $trano->delete();

      

       return redirect('/tranos')->with('status', 'La maison '. $trano->Nom.' a été supprimée avec succès');
    }

    public function desactive_trano($id){
        $trano = Trano::find($id);

        $trano->status = 0;
        $trano->update();
        return redirect('/tranos')->with('status', 'La maison '.$trano->Nom.' a été désactivé avec succès'); 
    }

    public function active_trano($id){
        $trano = Trano::find($id);

        $trano->status = 1;
        $trano->update();
        return redirect('/tranos')->with('status', 'La maison '.$trano->Nom.' a été activé avec succès'); 
    }
}
