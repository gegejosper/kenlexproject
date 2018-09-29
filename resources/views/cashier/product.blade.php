@extends('cashier.layouts.cashier')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
					<div class="widget widget-nopad">
						@foreach($dataProductquantity as $Product)
							<div class="row">

									<div class="span4">
									<img class="img-fluid" src="{{ asset('productimg') }}/{{$Product->product->pic}}" alt="" width="300px;">
									</div>

									<div class="span8">
									<h3 class="my-3">Product Name: {{$Product->product->product_name}}</h3>
									<br>
									<br>
									<div class="product-item">
									<h4 class="my-3">Product Description</h4>
									<p>{{$Product->product->description}}</p>
									</div>
									<h5 class="my-3">Product Details</h5>
									<ul>
											<li>Quantity : {{$Product->quantity}}</li>
									</ul>
								</div>
							</div> 
						</div>
        		@endforeach
        	</div>
      	</div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/productscript.js') }}"></script>
<!-- /main -->
@endsection