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
                                <th>Image_Vignette</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Catégorie de la maison</th>
                                <th>Prix</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tranos as $trano)
                                <tr>
                                    <td>{{ $increment }}</td>
                                    <td><a href="/storage/Trano_vignette/{{ $trano->Image_Vignette}}"><img src="{{ url('/storage/Trano_vignette/'.$trano->Image_Vignette) }}" alt=""></a></td>
                                    <td>{{ $trano->Nom }}</td>
                                    <td>{{ $trano->Adresse }}</td>
                                    <td>{{ $trano->Categorie }}</td>
                                    <td>{{ $trano->Prix }} Ar</td>
                                    <td>
                                        @if ($trano->status == 1)
                                            <label class="badge badge-success">Activé</label>
                                        @else
                                            <label class="badge badge-danger">Desactivé</label>
                                        @endif
                                    
                                    </td>
                                    <td>
                                    <button class="btn btn-outline-primary" onclick="window.location = '{{ url('/editer_trano/'.$trano->id) }}'">Editer</button>
                                    <a href="{{ url('/supprimertrano/'.$trano->id) }}" class="btn btn-outline-danger" id="delete">Supprimer</a>
                                    <button class="btn btn-outline-secondary" onclick="window.location = '{{ url('/ajouterIllustration/'.$trano->Image_Vignette) }}'">Ajouter Illustration</button>
                                    <button class="btn btn-outline-secondary" onclick="window.location = '{{ url('/voirIllustration/'.$trano->Image_Vignette) }}'">Voir Illustration</button>
                                    @if ($trano->status ==1)
                                        <button class="btn btn-outline-warning" onclick="window.location = '{{ url('/desactive_trano/'.$trano->id) }}'">Désactivé</button>
                                    @else
                                        <button class="btn btn-outline-success" onclick="window.location = '{{ url('/active_trano/'.$trano->id) }}'">Activé</button>
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
    <script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection