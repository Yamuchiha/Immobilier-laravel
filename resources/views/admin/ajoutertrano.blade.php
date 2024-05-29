@extends('layouts.appadmin')


@section('titre')
    Ajouter maison
@endsection

@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">                
                  <h4 class="card-title">Ajouter maison</h4>
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

                    {!!Form::open(['action' => 'TranoController@sauverTrano', 'method' => 'post', 'class' => 'cmxform', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
                            {{ csrf_field() }}
                    {{-- <fieldset> --}}
                      <div class="form-group">
                        {{ Form::label('', 'Nom de la maison', ['for' => 'cname'])}}                   
                        {{ Form::text('Nom', '', ['class' => 'form-control', 'id' => 'cname']) }}

                        {{ Form::label('', 'Adresse de la maison', ['for' => 'cname'])}}                   
                        {{ Form::text('Adresse', '', ['class' => 'form-control', 'id' => 'cname']) }}

                        {{ Form::label('', 'Categorie de l\'a maison', ['for' => 'cname'])}}                   
                        {{ Form::select('Categorie', $categories, null, ['placeholder' => 'Select categorie', 'class' => 'form-control', 'id' => 'cname']) }}
                        
                        {{ Form::label('', 'Description', ['for' => 'cname'])}}
                        {{ Form::textarea('Description', '', ['class' => 'form-control', 'id' => 'cname'])}}

                        {{ Form::label('', 'Image_vignette', ['for' => 'cname'])}}                   
                        {{ Form::file('Image_Vignette', ['class' => 'form-control', 'id' => 'cname']) }}

                        {{ Form::label('', 'Prix', ['for' => 'cname'])}}                   
                        {{ Form::number('Prix', '', ['class' => 'form-control', 'id' => 'cname']) }}

                        
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