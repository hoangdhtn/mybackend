@extends('layouts.app')

@section('content')

<!-- Panel Basic -->
@if(Session::has('success'))
    <div class="alert  alert-success alert-dismissible" role="alert">
      <div class="toast toast-just-text toast-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
        
        {{Session::get('success')}}
        @php
        Session::forget('success');
        @endphp
    </div>
  </div>
@endif
@if(Session::has('fail'))
    <div class="alert  alert-danger alert-dismissible" role="alert">
      <div class="toast toast-just-text toast-error">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
        {{Session::get('fail')}}
        @php
        Session::forget('fail');
        @endphp
    </div>
  </div>
@endif
@if ($errors->any())
            @foreach ($errors->all() as $error)
              
              <div class="alert  alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $error }}
                  </div>

            @endforeach
@endif

        <!-- Panel -->
        <div class="panel">
          <form action="{{route('updateroleandper', $user->id)}}" method="POST">
            @method('POST')
            @csrf
          <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-xl-6">
                <!-- Example Table section -->
                <div class="example-wrap">
                  <h4 class="example-title">Vai trò (Roles)</h4>
                  <div class="example">
                    <table class="table table-hover" data-plugin="selectable" data-row-selectable="true">
                      <thead>
                        <tr>
                          <th class="w-50">
                            <span class="checkbox-custom checkbox-primary">
                              <input class="selectable-all" type="checkbox" >
                              <label></label>
                            </span>
                          </th>
                          <th>
                            Id
                          </th>
                          <th>
                            Tên
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($column_roles as $column_role)
                        <tr>
                              <td>
                                <span class="checkbox-custom checkbox-primary">
                                  <input class="selectable-item" type="checkbox"
                          @foreach($userRolesPers->roles as $key => $role)
                            @if($column_role->name == $role->name)
                              checked 
                            @endif
                          @endforeach
                          name="ckRole[]" id="row-{{$column_role->id}}" value="{{$column_role->name}}">
                                  <label for="row-{{$column_role->id}}"></label>
                                </span>
                              </td>
                              <td>{{$column_role->id}}</td>
                              <td class="hidden-sm-down">
                                <span class="badge badge-primary">{{$column_role->name}}</span>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- End Example Table-section -->
              </div>

              <div class="col-xl-6">
                <!-- Example Table Selectable -->
                <div class="example-wrap">
                  <h4 class="example-title">Quyền (Permissions)</h4>
                  <div class="example">
                    <table class="table table-hover" data-plugin="selectable" data-row-selectable="true">
                      <thead>
                        <tr>
                          <th class="w-50">
                            <span class="checkbox-custom checkbox-primary">
                              <input class="selectable-all" type="checkbox">
                              <label></label>
                            </span>
                          </th>
                          <th>
                            Id
                          </th>
                          <th>
                            Tên
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($column_permissions as $column_permission)
                         <tr>
                              <td>
                                <span class="checkbox-custom checkbox-primary">
                                  <input class="selectable-item" type="checkbox"
                          @foreach($persUser as $perUser)
                            @if($column_permission->name == $perUser->name)
                            checked 
                            @endif
                          @endforeach  
                           name="ckPer[]"  id="row-619" value="{{$column_permission->name}}">
                                  <label for="row-619"></label>
                                </span>
                              </td>
                              <td>{{$column_permission->id}}</td>
                              <td class="hidden-sm-down">
                                <span class="badge badge-info">{{$column_permission->name}}</span>
                              </td>
                            </tr>
                        @endforeach         
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- End Example Table Selectable -->
              </div>
            </div>
            <div class="h-p15 w-p20 float-right">
                    <button type="submit" class="btn btn-block btn-success waves-effect waves-classic ">Xác nhận</button>
                  </div>
          </div>
          </form>
        </div>
        <!-- End Panel -->
<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>

@endsection