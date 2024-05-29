<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function ajouterSlider(){
        
        return view('admin.ajouterslider');
    }

    public function sauverslider(Request $request){
        $this->validate($request, ['description1' => 'required',
                                    'description2' => 'required',
                                    'slider_image' => 'image|nullable|max:1999']);
        
        if($request->hasFile('slider_image')){
            $image_nomcomplet = $request->file('slider_image')->getClientOriginalName();
            $image_nom = pathinfo($image_nomcomplet, PATHINFO_FILENAME);
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            
            $image_enr = $image_nom.'_'.time().'.'.$extension;
            
            $path = $request->file('slider_image')->storeAs('public/Slider_image', $image_enr);
        }
        else{
            $image_enr = 'noimage.jpg';
        }
        
        $slider = new Slider();
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->slider_image = $image_enr;
        $slider->status = 1;
        
        $slider->save();

        return redirect('/ajoutSlider')->with('status', 'Le slider a été ajouté avec succès');
        // print($request->description1);
    }

    public function sliders(){
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders', $sliders);
    }

    public function editer_slider($id){
        $slider = Slider::find($id);

        return view('admin.formEdit.editerSlider')->with('slider', $slider);
    }

    public function modifierslider(Request $request){

        $this->validate($request, ['description1' => 'required',
                                    'description2' => 'required',
                                    'slider_image' => 'image|nullable|max:1999']);
        
        $slider = Slider::find($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');

        if($request->hasFile('slider_image')){
            $image_nomcomplet = $request->file('slider_image')->getClientOriginalName();
            $image_nom = pathinfo($image_nomcomplet, PATHINFO_FILENAME);
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            
            $image_enr = $image_nom.'_'.time().'.'.$extension;
            
            $path = $request->file('slider_image')->storeAs('public/Slider_image', $image_enr);
            if($slider->slider_image != 'noimage.jpg'){
                Storage::delete('public/Slider_image/'.$slider->slider_image);
            }
            $slider->slider_image = $image_enr;
        }
        $slider->update();
        
        return redirect('/sliders')->with('status', 'Le slider a été modifié avec succès');
    }

    public function supprimerslider($id){
        
        $slider = Slider::find($id);

        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/Slider_image/'.$slider->slider_image);
        }
        $slider->delete();
        
        return redirect('/sliders')->with('status', 'Le slider a été supprimé avec succès');
    }

    public function desactive_slider($id){
        
        $slider = Slider::find($id);

        $slider->status = 0;

        $slider->update();

        return redirect('/sliders')->with('status', 'Le slider a été désactivé avec succès');
    }

    public function active_slider($id){
        
        $slider = Slider::find($id);

        $slider->status = 1;

        $slider->update();

        return redirect('/sliders')->with('status', 'Le slider a été activé avec succès');
    }
}
