@extends('admin.layouts.app')

@section('home')
<div class="container-fluid">
  <div class="fade-in">
    <!-- /.row-->
    <div class="row">
      <div class="col-sm-2">
        <div class="c-callout c-callout-info b-t-1 b-r-1 b-b-1">
          <small class="text-muted">New Clients</small><br>
          <strong class="h4">9,123</strong>
        </div>
      </div><!--/.col-->
      <div class="col-sm-2">
        <div class="c-callout c-callout-danger b-t-1 b-r-1 b-b-1">
          <small class="text-muted">Recuring Clients</small><br>
          <strong class="h4">22,643</strong>
        </div>
      </div><!--/.col-->
      <div class="col-sm-2">
        <div class="c-callout c-callout-warning b-t-1 b-r-1 b-b-1">
          <small class="text-muted">Pageviews</small><br>
          <strong class="h4">78,623</strong>
        </div>
      </div><!--/.col-->
      <div class="col-sm-2">
        <div class="c-callout c-callout-success b-t-1 b-r-1 b-b-1">
          <small class="text-muted">Organic</small><br>
          <strong class="h4">49,123</strong>
        </div>
      </div><!--/.col-->
      <div class="col-sm-2">
        <div class="c-callout b-t-1 b-r-1 b-b-1">
          <small class="text-muted">CTR</small><br>
          <strong class="h4">23%</strong>
        </div>
      </div><!--/.col-->
      <div class="col-sm-2">
        <div class="c-callout c-callout-primary b-t-1 b-r-1 b-b-1">
          <small class="text-muted">Bounce Rate</small><br>
          <strong class="h4">5%</strong>
        </div>
      </div><!--/.col-->
    </div><!--/.row-->
    <!-- /.row-->
    <div class="card">
      <div class="card-header">Employees</div>
      <div class="card-body">
        <table class="table table-responsive-sm table-hover table-outline mb-0">
          <thead class="thead-light">
            <tr>
              <th class="text-center">
                <svg class="c-icon">
                  <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-people"></use>
                </svg>
              </th>
              <th>User</th>
              <th class="text-center">Country</th>
              <th>Usage</th>
              <th class="text-center">Payment Method</th>
              <th>Activity</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">
                <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('core-ui/assets/img/avatars/1.jpg') }}" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
              </td>
              <td>
                <div>Yiorgos Avraamu</div>
                <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
              </td>
              <td class="text-center"><i class="flag-icon flag-icon-us c-icon-xl" id="us" title="us"></i></td>
              <td>
                <div class="clearfix">
                  <div class="float-left"><strong>50%</strong></div>
                  <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>
                </div>
                <div class="progress progress-xs">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td class="text-center">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="assets/icons/brands/brands-symbol-defs.svg#cc-mastercard"></use>
                </svg>
              </td>
              <td>
                <div class="small text-muted">Last login</div><strong>10 sec ago</strong>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
