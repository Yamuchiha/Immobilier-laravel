@extends('layouts.appadmin')

@section('titre')
    Maisons
@endsection

{{ Form::hidden('', $increment = 1)}}
@section('contenu')
        <div class="main-panel">
            <div class="content-wrapper">



            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Maisons</h4>
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
                                <th>Nom de la maison</th>
                                <th>Catégorie de la maison</th>
                                <th>Prix</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maisons as $maison)
                                <tr>
                                    <td>{{ $increment }}</td>
                                    <td><a href="/storage/Uploads/{{ $maison->maison_image}}"><img src="{{ url('/storage/Uploads/'.$maison->maison_image) }}" alt=""></a></td>
                                    <td>{{ $maison->maison_nom }}</td>
                                    <td>{{ $maison->maison_categorie }}</td>
                                    <td>{{ $maison->maison_prix }} Ar</td>
                                    <td>
                                        @if ($maison->status == 1)
                                            <label class="badge badge-success">Activé</label>
                                        @else
                                            <label class="badge badge-danger">Desactivé</label>
                                        @endif
                                    
                                    </td>
                                    <td>
                                    <button class="btn btn-outline-primary" onclick="window.location = '{{ url('/editer_maison/'.$maison->id) }}'">Editer</button>
                                    <a href="{{ url('/supprimermaison/'.$maison->id) }}" class="btn btn-outline-danger" id="delete">Supprimer</a>
                                    @if ($maison->status ==1)
                                        <button class="btn btn-outline-warning" onclick="window.location = '{{ url('/desactive_maison/'.$maison->id) }}'">Désactivé</button>
                                    @else
                                        <button class="btn btn-outline-success" onclick="window.location = '{{ url('/active_maison/'.$maison->id) }}'">Activé</button>
                                    @endif
                                    </td>
                                </tr>
                            {{ Form::hidden('', $increment += 1)}}    
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