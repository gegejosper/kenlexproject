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
        <div class="span8">
            <div class="widget widget-table action-table">
                <div class="widget-header"> <i class="icon-sitemap"></i>
                <h3>Branch Dealers</h3>
                </div>
                <div class="widget-content">
                <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                   
                    <th>Full Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dataDealer as $User)
                  <tr class="item{{$User->id}}">
                    <td> <a href="/admin/dealers/{{$User->id}}" class="name">{{$User->fname}} {{$User->lname}}</a> </td>
                    <td>{{$User->contactnum}}</td> 
                    <td>{{$User->address}}</td> 
                    <td>{{$User->email}}</td> 
                    <td class="td-actions"><a href="/admin/dealers/{{$User->id}}" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"> </i>View</a></td>
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