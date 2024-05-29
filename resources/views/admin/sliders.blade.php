@extends('layouts.appadmin')

@section('titre')
    Sliders
@endsection

{{ Form::hidden('', $increment = 1) }}
@section('contenu')
        <div class="main-panel">
            <div class="content-wrapper">



            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Sliders</h4>
                @if (Session::has('status'))
                    <div class="alert alert-success">{{ Session::get('status') }}</div>
                @endif
                <div class="row">
                    <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Ordre</th>
                                <th>Image</th>
                                <th>1ère descripiton</th>
                                <th>2ème descripiton</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                
                                <tr>
                                    <td>{{ $increment }}</td>
                                    <td><a href="/storage/Slider_image/{{ $slider->slider_image }}"><img src="/storage/Slider_image/{{ $slider->slider_image }}" alt=""></a></td>
                                    <td>{{ $slider->description1 }}</td>
                                    <td>{{ $slider->description2 }}</td>
                                    <td>
                                       @if ($slider->status == 1)
                                        <label class="badge badge-success">Activé</label>
                                       @else
                                       <label class="badge badge-danger">Désactivé</label>
                                       @endif 
                                   
                                    </td>
                                    <td>
                                    <button class="btn btn-outline-primary" onclick="window.location ='{{ url('/editer_slider/'.$slider->id) }}'">Editer</button>
                                    <a class="btn btn-outline-danger" href="{{ url('/supprimerslider/'.$slider->id)}}" id="delete">Supprimer</a>
                                    @if ($slider->status == 1)
                                        <button class="btn btn-outline-warning" onclick="window.location ='{{ url('/desactive_slider/'.$slider->id) }}'">Désactiver</button>
                                    @else
                                        <button class="btn btn-outline-success" onclick="window.location ='{{ url('/active_slider/'.$slider->id) }}'">Activer</button>
                                    @endif
                                    </td>
                                </tr>
                                {{ Form::hidden('', $increment +=1) }}
                            @endforeach
                            
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>



            </div>
        </div>
@endsection

@section('script')
    <script src="backend/js/data-table.js"></script>
@endsection