@extends('cashier.layouts.cashier')
@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">
       
       <div class="widget widget-table action-table">
       <div class="widget-header"> <i class="icon-th-list"></i>
       <h3>Product List</h3>
           </div>
           <!-- /widget-header -->
           <div class="widget-content">
           <div class="input-append" style="padding:20px;">
           <form method="post" class="navbar-search pull-right" action="/cashier/product/search">
             <div class="input-append">
                                                 <input class="span2 m-wrap" id="appendedInputButton" type="search" name="q" class="form-control" placeholder="Search...">
                                                 <button class="btn" type="submit" style="margin-top:-10px;">Search</button>
                                               </div>
                               {{ csrf_field() }}
             </form>
           </div>
             <table class="table table-striped table-bordered">
               <thead>
                 <tr>
                   <th>  </th>
                   <th>Product Name</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach($dataProduct as $Product)
                 <tr>
                 <td align="center" style="text-align:center" style="width:100px"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$Product->product->pic}}" width="100px"/> </a> </td>
                   <td> <a href="/cashier/products/{{$Product->prod_id}}">{{$Product->product->product_name}}</a></td>
                   <td><em class="productprice">{{$Product->price}}</em>  </td>
                   <td><em class="productprice">{{$Product->quantity}}</em>  </td>
                   <td class="td-actions" style="width:100px">

                     <a href="javascript:;" class="editPrice btn btn-success btn-small" data-pic="{{$Product->product->pic}}" data-amount="{{$Product->price}}.00" data-quantity="{{$Product->quantity}}.00" data-name="{{$Product->product->product_name}}" data-id="{{$Product->id}}" ><i class="btn-icon-only icon-shopping-cart"> </i><span style="color:#fff;">Update Price</span></a>
                   </td>
                   
                  </tr>
                 @endforeach
                 
                 
               
               </tbody>
             </table>
           </div>
           <!-- /widget-content --> 
         </div>            

      

</div>
        <!-- /span4 --> 
       
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
          <h4 class="modal-title" align="left"></h4>
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group">
  							<div class="col-sm-3">
                  <img src="" alt="product image" id="productimg" width="100">
  								<input type="hidden" class="form-control" id="fid" disabled>
                  <input type="hidden" class="form-control" id="amount" disabled>
  							</div>
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="productedit_name"></p>
                  <p ><strong>Branch Price: </strong></p>
              
  								<input type="number" class="form-control" id="productamount" name="productamount">
  						
  								<!-- <input type="text" class="form-control" id="productedit_name" name="productedit_name"> -->
  							</div>
  						</div>
            
  					</form>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
  						
  					</div>
  				</div>
  			</div>
		  </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/itemscript.js') }}"></script>
@endsection