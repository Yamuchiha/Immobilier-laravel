@extends('layouts.app1')

@section('titre')
    Achats
@endsection    
@section('contenu')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('frontend/images/destination-nagoya-japan-1170x700.jpg') }});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span> <span></span></p>
            <h1 class="mb-0 bread">Achats</h1>
          </div>
        </div>
      </div>
    </div>

	@if (Session::has('status'))
		<script>
			swal.fire('Echec', 'Vous ne pouvez pas acheter la même maison plusieurs fois', 'error');
		</script>
	@endif

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="{{ URL::to('/acheter') }}" class="{{ (request()->is('acheter')?'active':'') }}">Tout</a></li>

						@foreach ($categories as $categorie)							
    						<li><a href="/selection_Categorie/{{ $categorie->categorie_nom }}" class="{{ (request()->is('selection_Categorie/'.$categorie->categorie_nom)?'active':'') }}">{{ $categorie->categorie_nom }}</a></li>
						@endforeach
    				
    				</ul>
    			</div>
    		</div>
    		<div class="row">

				@foreach ($tranos as $trano)
					
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="{{ url('/Detail/'.$trano->Image_Vignette.'/'.$trano->id) }}" class="img-prod"><img class="img-fluid" src="{{ asset('storage/Trano_vignette/'.$trano->Image_Vignette)}}" alt="Colorlib Template">
								{{-- <span class="status">30%</span> --}}
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#">{{ $trano->Nom }}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><!--span class="mr-2 price-dc">$120.00</span--><span class="price-sale">{{ $trano->Prix }}.00 Ar</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										{{-- <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a> --}}
										<a href="/ajouter_au_panier/{{ $trano->id }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<a href="#" class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach



    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
@endsection
		