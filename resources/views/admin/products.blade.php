@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">
        <div class="span4">
            <div class="widget widget-nopad">
            
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Add Product Basic Info</h3>
                </div>
                
                <!-- /widget-header -->
                <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <div id="big_stats" class="cf">
                        <div class="control-group padding-20">	
                        <form enctype="multipart/form-data" action="{{ route('addproducts') }}" method="post">
                        {{ csrf_field() }}     
                        <label for="Product Name">Product Image</label> 
                        <input data-preview="#preview" name="input_img" type="file" id="imageInput" required>
                                                <img class="col-sm-6" id="preview"  src="" ></img>
                            <label for="Product Name">Product Name</label>
                            <input type="text" class="form-control" placeholder="Product Name"  name="product_name">
                            <label class="control-label" for="Description">Description</label>
                                                <div class="controls">
                                                <textarea name="description" id="description" cols="50" rows="10" placeholder="Description" style="width:90%;"></textarea>			
                                                </div>   
                            <label for="Brand Name">Brand</label>
                                <select name="brand_id" id="brand_id">
                                    @foreach($dataBrand as $Brand)
                                        <option value="{{$Brand->id}}">{{$Brand->brand_name}}</option>
                                    @endforeach
                                </select>
                                <div class="control-group">											
                                            <label for="Category">Category</label>
                                            <select name="category_id" id="category_id">
                                                @foreach($dataCategory as $Category)
                                                    <option value="{{$Category->id}}">{{$Category->cat_name}}</option>
                                                @endforeach
                                            </select>
                                        
								</div> 
                                <div class="control-group">											
                                    <label for="Warehouse Quantity">Warehouse Quantity</label>
                                    <input type="number" class="form-control" placeholder="Warehouse Quantity"  name="warehousequantity">      
								</div> 
                                
                                <button class="btn btn-large btn-primary " type="submit" id="add" >Save</button>      
                        </form>
                        </div>  <!-- .stat --> 
                    </div>
                    </div>
                    <!-- /widget-content --> 
                </div>
                </div>
            </div>
        </div>
        <div class="span8">
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Product List</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <div class="widget big-stats-container">
                        <div class="widget-content">
                        
                            <div id="big_stats" class="cf">
                                <div class="control-group padding-20">	
                                    <table class="table table-striped table-bordered" id="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Warehouse Quantity</th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dataProduct as $Product)
                                        <tr class="item{{$Product->id}}">
                                            <!-- <td style="width:100px;">{{$Product->id}}</td> -->
                                            <td> <a href="/admin/products/{{$Product->id}}" class="name">{{$Product->product_name}}</a> </td>
                                            <td>{{$Product->category->cat_name}}</td>
                                            <td>{{$Product->warehousequantity}}</td>
                                            <td style="width:100px;" class="td-actions"><a href="/admin/products/{{$Product->id}}" class="btn btn-mini btn-info" ><i class="icon-search"> </i></a><a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$Product->id}}" data-name="{{$Product->product_name}}" data-description="{{$Product->description}}"><i class="icon-pencil"> </i></a>  </td>
                                        
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>          
                                </div>      
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
   
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
<script src="{{ asset('js/productscript.js') }}"></script>
<!-- /main -->
@endsection