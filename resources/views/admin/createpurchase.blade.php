@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th"></i>
              <h3>Out of Stocks</h3>
              <div style="float:right; padding-right:10px;"></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>  </th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($dataProductofStock as $OutofStockProduct)
                  <tr>
                  <td align="center" style="text-align:center"><img src="{{ asset('productimg') }}/{{$OutofStockProduct->pic}}" width="30px"/></td>
                    <td>{{$OutofStockProduct->product_name}}</td>
                    <td><em class="productprice">{{$OutofStockProduct->warehousequantity}}</em>  </td>
                    <td style="width:100px;" class="td-actions"><a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$OutofStockProduct->id}}" ><i class="icon-plus"> </i> Add Request</a> </td>
                 
                   </tr>
                   @empty
                   <tr><td colspan='4'><em>No Data</em></td></tr>
                  @endforelse
                  
                 
                </tbody>
              </table>
            </div>

            <div class="widget-header"> <i class="icon-th"></i>
              <h3>Stocks</h3>
              <div style="float:right; padding-right:10px;"></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>  </th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($dataProduct as $Product)
                  <tr>
                  <td align="center" style="text-align:center"><img src="{{ asset('productimg') }}/{{$Product->pic}}" width="30px"/></td>
                    <td>{{$Product->product_name}}</td>
                    <td><em class="productprice">{{$Product->warehousequantity}}</em>  </td>
                    <td style="width:100px;" class="td-actions"><a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$Product->id}}" ><i class="icon-plus"> </i> Add Request</a> </td>
                 
                   </tr>
                   @empty
                   <tr><td colspan='4'><em>No Data</em></td></tr>
                  @endforelse
                  
                 
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
        </div>        
        </div>

        <!-- Request -->
        <div class="span8">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th"></i>
              <h3>Purchase Request</h3>
              <div style="float:right; padding-right:10px;"></div>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content" style="padding:20px 30px;">
            <h3 style="padding-bottom:20px;">PR #: {{$purchasenumber}}</h3>
            <table class="table table-striped table-bordered" >
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @forelse($dataPurchaseRecord as $Request)
                  <tr>
                 
                    <td>{{$Request->product->product_name}}</td>
                    <td><em class="productprice">{{$Request->quantity}}</em>  </td>
                    <td style="width:100px;" class="td-actions"><a href="javascript:;" class="delete-modal btn btn-mini btn-danger" data-id="{{$Request->id}}" ><i class="icon-minus"> </i>Remove</a> </td>
                 
                   </tr>
                   @empty
                   <tr><td colspan='4'><em>No Data</em></td></tr>
                  @endforelse
                  
                 
                </tbody>
              </table>
              <div style="text-align:right; padding-top:20px;"><a href="javascript:;" class="generate-modal btn btn-mini btn-success" data-purchasenumber="{{$purchasenumber}}"><i class="icon-save"> </i>Generate Purchase Request</a></div>
            </div>
            <!-- /widget-content --> 
        </div>        
        </div>
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
  								<input type="hidden" class="form-control" id="fid" disabled>
                                <input type="hidden" class="form-control" id="addpurchasenumber" name="addpurchasenumber" value="{{$purchasenumber}}">
                                <input type="hidden" class="form-control" id="addpurchasedate" name="addpurchasedate" value="<?php echo date('m/d/Y'); ?>">
  						<div class="form-group">
                            <label class="control-label col-sm-2" for="quantity" >Request Quantity:</label>
  							<div class="col-sm-10">
  								<input type="number" class="form-control" id="quantity" name="quantity">
                            </div>
                        </div>
  					</form>
  					<div class="deleteContent">
  						Are you sure you want to remove this stock request <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
                    <div class="generateContent">
  						Are you sure you want to generate this request order <span class="dname"></span> ? <span
  							class="hidden purchasenumber"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
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
    <div id="CartInfo" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
          <h4 class="modal-title" align="left"></h4>
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					
  				</div>
  				<div class="modal-body">
  					<p>Stock Request Successfully Added!</p>
  					<div class="modal-footer">
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
<script src="{{ asset('js/requestscript.js') }}"></script>
<!-- /main -->
@endsection