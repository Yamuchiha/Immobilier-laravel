@extends('layouts.appadmin')

@section('titre')
    Catégories
@endsection

{{ Form::hidden('', $increment = 1) }}
@section('contenu')
        <div class="main-panel">
            <div class="content-wrapper">



            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Catégories</h4>
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
                                <th>Nom de la catégorie</th>
                            
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                            <tr>
                                <td>{{ $increment }}</td>
                                <td>{{ $categorie->categorie_nom }}</td>
                            
                                {{-- <td>
                                <label class="badge badge-info">On hold</label>
                                </td> --}}
                                <td>
                                <button class="btn btn-outline-primary" onclick="window.location ='{{ url('/editer_categorie/'.$categorie->id)}}'">Editer</button>
                                <a href="{{ url('supprimercategorie/'.$categorie->id) }}" class="btn btn-outline-danger" id="delete">Supprimer</a>
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
    <script src="backend/js/data-table.js"></script>
@endsection