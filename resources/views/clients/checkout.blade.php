@extends('layouts.app1')


@section('titre')
    Payer
@endsection 
@section('contenu')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('storage/Slider_image/Miyakojima-Okinawa-Japon-03_1682237031.jpg') }});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span> <span></span></p>
            <h1 class="mb-0 bread">Payement</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">

			<form action="{{ url('/validation_payement')}}" id="checkout-form" method="post" class="billing-form">
				{{ csrf_field() }}
				<h3 class="mb-4 billing-heading">Détail de facturation</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Nom</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Prénom</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Etat / Pays</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="" id="" class="form-control">
							<option value="">Madagascar</option>
		                  	<option value="">France</option>
		                    <option value="">Italy</option>
		                    <option value="">Philippines</option>
		                    <option value="">South Korea</option>
		                    <option value="">Hongkong</option>
		                    <option value="">Japan</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Adresse de rue</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  {{-- <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)"> --}}
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Villel / Cité</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">code postale / couriel *</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
	              </div>

				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Nom de la carte</label>
	                  <input type="text" class="form-control" placeholder="" id="card-name">
	                </div>
	            </div>

				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Numéro de la carte</label>
	                  <input type="text" class="form-control" placeholder="" id="card-number">
	                </div>
	            </div>

				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Mois d'expiration</label>
	                  <input type="text" class="form-control" placeholder="" id="card-expiry-month">
	                </div>
	            </div>

				
				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Année d'expiration</label>
	                  <input type="text" class="form-control" placeholder="" id="card-expiry-year">
	                </div>
	            </div>

				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">CVC</label>
	                  <input type="text" class="form-control" placeholder="" id="card-cvc">
	                </div>
	            </div>

	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Adresse Email</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio"> Créer un compte? </label>
										  {{-- <label><input type="radio" name="optradio"> Ship to different address</label> --}}
										</div>
									</div>
                </div>
				<input type="submit" class="btn btn-success" value="Poster">
	            </div>
				
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Totals Panier</h3>
	          			<p class="d-flex">
		    						<span>Soustotal</span>
		    						<span>{{ Session::has('panier')?Session::get('panier')->totalPrice - 200:''}}.00 Ar</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Remise</span>
		    						<span>2%</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Escompte</span>
		    						<span>2%</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>{{ Session::has('panier')?Session::get('panier')->totalPrice:''}}.00 Ar</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Methode de Payement</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Virement bancaire</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Vérification payement</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> J'ai lu et accepte les termes et les conditions d'utilisation</label>
											</div>
										</div>
									</div>
									<p><a href="/validation_payement"class="btn btn-primary py-3 px-4">Valider</a></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
@endsection
	
@section('script')   
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('src/js/payement.js') }}"></script>
@endsection    