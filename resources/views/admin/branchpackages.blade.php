@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
        <div class="row">
        <div class="span12">
            <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-sitemap"></i>
                    <h3>Settings for Branch  @foreach($dataBranch as $Branch)
                                                        {{$Branch->branch_name}}
                                                @endforeach</h3>
                    </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <div class="shortcuts"> 
                    @foreach($dataBranch as $Branch)
                        <a href="/admin/branch/stocks/{{$Branch->id}}" class="shortcut reportshortcut" ><i class="shortcut-icon icon-sitemap"></i><span class="shortcut-label">Stocks</span> </a>
                        <a href="/admin/branch/packages/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-qrcode"></i><span class="shortcut-label">Packages</span> </a>
                        <a href="/admin/branch/users/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Users</span> </a>
                        <a href="/admin/branch/subscribers/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Subscribers</span> </a>
                        <a href="/admin/branch/dealers/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Dealers</span> </a>
                        <a href="/admin/report/branch/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-list-alt"></i> <span class="shortcut-label">Report</span> </a>
                    @endforeach
                    </div>
                <!-- /shortcuts --> 
                </div>
                <!-- /widget-content --> 
            </div>
            </div>
        </div>
      <div class="row">
        <div class="span5">
            <div class="widget widget-table action-table">
                <div class="widget-header"> <i class="icon-sitemap"></i>
                <h3>Packages Not Available on Branch</h3>
                </div>
                <div class="widget-content">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Package Name</th>
                    <th>Status</th>
                    <th class="td-actions">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($arrayPackage as $Package)
                  <tr class="item{{$Package->id}}">
                    <td style="width:100px;"><a href="/admin/packages/{{$Package->id}}">{{$Package->packagename}}</a></td>
                    <td><em>Not Available on Branch</em></td>
                    <td style="width:100px;" class="td-actions"><a href="/admin/branch/packages/add/{{$dataBranchId}}/{{$Package->id}}" class="btn btn-mini btn-info">Add Package</a> </td>
                   </tr>
                   @empty
                   <tr><td colspan="3"><em>All Packages are available on the Branch</em></td></tr>
                   @endforelse
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
            </div>
        </div>
        <div class="span7">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Packages Available on Branch</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Package Name</th>
                    <th>Price</th>
                    <th class="td-actions">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataBranchPackage as $BranchPackage)
                  <tr class="item{{$BranchPackage->id}}">
                    <td ><a href="/admin/packages/{{$BranchPackage->id}}">{{$BranchPackage->package->packagename}}</a></td>
                    <td>{{$BranchPackage->price}}</td>
                    <td style="width:250px;" class="td-actions"><a href="/admin/product/{{$BranchPackage->id}}" class="edit-modal btn btn-mini btn-info"  ><i class="icon-search"> </i>View</a> <a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$BranchPackage->id}}" data-name="{{$BranchPackage->package->packagename}}" data-price="{{$BranchPackage->price}}"><i class="icon-pencil"> </i>Update Price</a>  </td>
                    
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
  						<div class="form-group" style="display:none;">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="hidden" class="form-control" id="fid">
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="package_name" >Package Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="packageedit_name" name="packageedit_name" readonly>
  							</div>
                <label class="control-label col-sm-2" for="Package Price" >Package Price:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="packagepriceedit" name="packagepriceedit">
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