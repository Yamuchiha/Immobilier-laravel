@extends('layouts.appadmin')

@section('titre')
    Illustrations
@endsection

{{ Form::hidden('', $increment = 1) }}
@section('contenu')
        <div class="main-panel">
            <div class="content-wrapper">



            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Illustrations</h4>
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
                                <th>Image_Vignette</th>
                                <th>Image d'illustration</th>
                            
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($illustrations as $illustration)
                            <tr>
                                <td>{{ $increment }}</td>
                                <td><img src="{{ url('/storage/Trano_vignette/'.$illustration->Image_vignette)}}" alt=""></td>
                                <td><img src="{{ url('/storage/Illustration/'.$illustration->Illustration)}}" alt=""></td>
                            
                                {{-- <td>
                                <label class="badge badge-info">On hold</label>
                                </td> --}}
                                <td>
                                <button class="btn btn-outline-primary" onclick="window.location ='{{ url('/editer_categorie/'.$illustration->id)}}'">Editer</button>
                                <a href="{{ url('supprimercategorie/'.$illustration->id) }}" class="btn btn-outline-danger" id="delete">Supprimer</a>
                                </td>
                            </tr>
                            {{ Form::hidden('', $increment += 1) }}
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
    <script src="{{ asset('backend/js/data-table.js') }}"></script>
@endsection