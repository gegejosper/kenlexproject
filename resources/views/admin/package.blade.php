@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget-content">
                @foreach($dataPackage as $Package)
                <p>Package Name: <strong> {{$Package->packagename}} </strong></p>
                <p>Description: <strong> {{$Package->description}} </strong></p>
                <p>Package Price: <strong> {{$Package->packageprice}} </strong></p>
                @endforeach
                </div>
            </div>
        </div>
        <div style="padding-top:20px;"></div>
      <div class="row">
        
        <div class="span4">
            
            <div class="widget widget-table action-table">
                    <div class="widget-header"><i class="icon-plus"></i><h3>Add Package Items </h3>
                    </div>
                    
                    
                    <form enctype="multipart/form-data" action="{{ route('addpackageitem') }}" method="post">
                        
                        <div class="widget-content" style="padding:20px;">
                        {{ csrf_field() }}                                       
                          
                                <div class="span3">
                                    <div class="widget"> 
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                        Session::forget('success');
                                        @endphp
                                    </div>
                                    @endif
                                        <label for="Product Name">Product Name</label> 
                                        <select name="productid" id="productid">
                                        @foreach($dataProduct as $Product)
                                                <option value="{{$Product->id}}">{{$Product->product_name}}</option>
                                        @endforeach
                                        </select>
                                        <label for="Product Quantity">Quantity</label> 
                                        <input type="number" name="productquantity">
                                        <input type="hidden" value="{{$packageid}}" name="packageid">
                                    </div> <!-- /widget -->   
                                </div>
                               
                                <div class="span12"><button class="btn btn-sm btn-primary " type="submit" id="add">Add Item</button></div>    
                                        
                        </div>
                       
                    </form>
            </div>
        </div>

        <!-- /span4 -->
        <div class="span8">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Products</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Product Picture </th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th class="td-actions"> Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataPackageItem as $ProductDetail)
                  <tr class="item{{$ProductDetail->productidd}}">
                  <td align="center" style="text-align:center" width="100px"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$ProductDetail->product->pic}}" width="50px"/></a> </td>
                    <td style="width:100px;"><a href="/admin/products/{{$ProductDetail->productid}}">{{$ProductDetail->product->product_name}}</a></td>
                    <td style="width:100px;">{{$ProductDetail->quantity}}</td>
                    <td style="width:100px;" class="td-actions"><a href="/admin/products/{{$ProductDetail->productid}}" class="btn btn-mini btn-info"  ><i class="icon-search"> </i>View</a></td>
                    
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
<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="supplier_name" >Product Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="productedit_name" name="productedit_name">
  							</div>
                <label class="control-label col-sm-2" for="description" >Description:</label>
  							<div class="col-sm-10">
  							
                 
                  <textarea name="editdescription" id="editdescription" cols="30" rows="10"></textarea>
  							</div>
                          </div>
            
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
  						<button type="button" class="btn btn-warning" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/branchpackagescript.js') }}"></script>
<!-- /main -->
@endsection