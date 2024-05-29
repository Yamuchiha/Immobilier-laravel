@extends('layouts.app1')

@section('titre')
    Panier
@endsection
@section('contenu')
	
		
		<div class="hero-wrap hero-bread" style="background-image: url('storage/Slider_image/{{ $sliders->slider_image }}');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span> <span></span></p>
				<h1 class="mb-0 bread">Mon panier</h1>
			</div>
			</div>
		</div>
		</div>


    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Maison</th>
						        <th>Prix</th>
						        {{-- <th>Quantity</th> --}}
						        <th>Total</th>
						      </tr>
						    </thead>

                            @if (Session::has('panier'))
                                
                                    <tbody>

                                        @foreach ($tranos as $trano)
                                            <tr class="text-center">
                                                <td class="product-remove"><a href="/retirer_maison/{{ $trano['trano_id'] }}"><span class="ion-ios-close"></span></a></td>
                                                
                                                <td class="image-prod"><div class="img" style="background-image:url(storage/Trano_vignette/{{ $trano['trano_image']}});"></div></td>
                                                
                                                <td class="product-name">
                                                    <h3>{{ $trano['trano_nom' ]}}</h3>
													<p></p>
                                                    {{-- <p>Far far away, behind the word mountains, far from the countries</p> --}}
                                                </td>
                                                
                                                <td class="price">{{ $trano['trano_prix']}}.00 Ar</td>
                                                {{-- <form action="">
                                                    <td class="quantity">
                                                        <div class="input-group mb-3">
                                                        <input type="number" name="quantity" class="quantity form-control input-number" value="" min="1" max="100">
                                                    </div>
                                                </form>
                                                --}}
                                                    
                                            </td>
                                                
                                                <td class="total">{{ $trano['trano_prix'] }}.00 Ar</td>
                                            </tr><!-- END TR-->
                                        @endforeach
                                

                                    
                                    </tbody>
                            @endif
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
{{-- 				
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    			</div> --}}


    			{{-- <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimate shipping and tax</h3>
    					<p>Enter your destination to get a shipping estimate</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Country</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">State/Province</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Zip/Postal Code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
    			</div> --}}

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Totals Panier</h3>
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
    				<p><a href="/payer" class="btn btn-primary py-3 px-4">Procéder au payement</a></p>
    			</div>
    		</div>
			</div>
		</section>
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
@endsection    
