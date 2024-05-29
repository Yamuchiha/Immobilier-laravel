@extends('layouts.appadmin')


@section('titre')
    Ajout catégorie
@endsection

@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">                
                  <h4 class="card-title">Ajouter apprenant</h4>
                  @if (Session::has('status'))
                      <div class="alert alert-success">{{ Session::get('status') }}</div>
                      <script>
                        swal.fire("Succès", " ", "success");
                      </script>
                  @endif

                  @if (count($errors)> 0)
                    <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                    </div>
                  @endif
                  {{-- <form class="cmxform" id="commentForm" method="get" action="#"> --}}

                    {!!Form::open(['action' => 'CategoryController@sauvercategorie', 'method' => 'post', 'class' => 'cmxform', 'id' => 'commentForm'])!!}
                            {{ csrf_field() }}
                    {{-- <fieldset> --}}
                      <div class="form-group">
                        {{ Form::label('', 'Nom de la catégorie', ['for' => 'cname'])}}
                        {{-- <label for="cname">Name (required, at least 2 characters)</label> --}}
                        {{ Form::text('categorie_nom', '', ['class' => 'form-control', 'id' => 'cname']) }}
                        {{-- <input id="cname" class="form-control" name="name" minlength="2" type="text" required> --}}
                      </div>


                      {{-- <div class="form-group">
                        <label for="cemail">E-Mail (required)</label>
                        <input id="cemail" class="form-control" type="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="curl">URL (optional)</label>
                        <input id="curl" class="form-control" type="url" name="url">
                      </div>
                      <div class="form-group">
                        <label for="ccomment">Your comment (required)</label>
                        <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                      </div> --}}
                      {{-- <input class="btn btn-primary" type="submit" value="Submit"> --}}
                    {{-- </fieldset> --}}
                      {{ Form::submit('Ajouter', ['class' => 'btn btn-primary']) }}
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