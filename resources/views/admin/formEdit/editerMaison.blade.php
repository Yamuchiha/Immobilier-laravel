@extends('layouts.appadmin')


@section('titre')
    Editer maison
@endsection

@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editer maison</h4>
                  {{-- @if (Session::has('status'))
                  <div class="alert alert-success">{{ Session::get('status') }}</div>
                  <script>
                    swal.fire("Succès", " ", "success");
                  </script>
                  @endif --}}
                  
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                  @endif
                  {{-- <form class="cmxform" id="commentForm" method="get" action="#"> --}}

                    {!!Form::open(['action' => 'MaisonController@modifiermaison', 'method' => 'post', 'class' => 'cmxform', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
                            {{ csrf_field() }}
                        {{ Form::hidden('id', $maison->id) }}
                      <div class="form-group">
                        {{ Form::label('', 'Nom de la maison', ['for' => 'cname'])}}
                        
                        {{ Form::text('maison_nom', $maison->maison_nom, ['class' => 'form-control', 'id' => 'cname']) }}
                      
                      </div>
                      <div class="form-group">
                        {{ Form::label('', 'Prix de la maison', ['for' => 'cname'])}}
                        
                        {{ Form::number('maison_prix', $maison->maison_prix, ['class' => 'form-control', 'id' => 'cname']) }}
                        
                      </div>
                      <div class="form-group">
                        {{ Form::label('', 'Catégorie de la maison', ['for' => 'cname'])}}
                        
                        {{ Form::select('maison_categorie', $categories, $maison->maison_categorie, ['class' => 'form-control', 'id' => 'cname']) }}
                      
                      </div>

                      <div class="form-group">
                        {{ Form::label('', 'Image', ['for' => 'cname'])}}
                       
                        {{ Form::file('maison_image', ['class' => 'form-control', 'id' => 'cname']) }}
                       
                      </div>
                      {{ Form::submit('Modifier', ['class' => 'btn btn-primary']) }}
                    {!!Form::close()!!}
                  {{-- </form> --}}
                </div>
              </div>
            </div>
          </div>
    </div>

</div>
@endsection

@section('script')
    {{-- <script src="backend/js/form-validation.js"></script>
    <script src="backend/js/bt-maxLength.js"></script> --}}
@endsection