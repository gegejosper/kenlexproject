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
                <h3>Branch Subscribers</h3>
                </div>
                <div class="widget-content">
                <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                   
                    <th>Full Name</th>
                    <th>Box ID</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dataCustomer as $User)
                  <tr class="item{{$User->boxId}}">
                    <td> <a href="/cashier/subscribers/{{$User->boxId}}" class="name">{{$User->fname}} {{$User->lname}}</a> </td>
                    <td>{{$User->boxId}}</td> 
                    <td>
                    <?php 
                     if($User->status == 0){
                      echo "Not Activated";
                     }
                     elseif($User->status == 1){
                      echo "Activated";
                     }
                     else {
                      echo "Unknown";
                     }
                    ?>
                   </td> 
                    <td class="" style="width:150px;"><a href="javascript:;" class="activate-modal btn btn-small btn-success" data-id="{{$User->id}}" data-name="{{$User->fname}} {{$User->lname}}"><i class="btn-icon-only icon-pencil"> </i> Activate</a><a href="/cashier/subscribers/{{$User->boxId}}" class="btn btn-info btn-small" data-id="{{$User->id}}"><i class="btn-icon-only icon-search"> </i> View</a></td>
                   </tr>
                @endforeach
                
                
                </tbody>
              </table>
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/branchpackagescript.js') }}"></script>
<!-- /main -->
@endsection