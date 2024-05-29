@extends('layouts.appadmin')


@section('titre')
    Ajout slider
@endsection

@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter slider</h4>
                  @if (Session::has('status'))
                      <div class="alert alert-success">{{ Session::get('status') }}</div>
                  @endif

                  @if (count($errors)>0)
                      <div class="alert alert-danger">
                          <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                        </ul>
                      </div>
                  @endif
                    {!!Form::open(['action' => 'SliderController@sauverslider', 'method' => 'post', 'class' => 'cmxform', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
                            {{ csrf_field() }}
                    
                      <div class="form-group">
                        {{ Form::label('', '1ère description', ['for' => 'cname'])}}      
                        {{ Form::text('description1', '', ['class' => 'form-control', 'id' => 'cname']) }} 
                      </div>
                      <div class="form-group">
                        {{ Form::label('', '2ème description', ['for' => 'cname'])}}
                        {{ Form::text('description2', '', ['class' => 'form-control', 'id' => 'cname']) }}
                      </div>
                      <div class="form-group">
                      </div>
                      <div class="form-group">
                        {{ Form::label('', 'Image', ['for' => 'cname'])}}                        
                        {{ Form::file('slider_image', ['class' => 'form-control', 'id' => 'cname']) }}
                        
                      </div>


             
                      {{ Form::submit('Ajouter', ['class' => 'btn btn-primary']) }}
                    {!!Form::close()!!}
                  
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