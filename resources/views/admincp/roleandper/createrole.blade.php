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

<div class="panel">
  <form action="{{route('saverole')}}" method="POST" autocomplete="off">
    @method('POST')
    @csrf
    <header class="panel-heading">
      <h3 class="panel-title">Thêm vai trò</h3>
    </header>
    <div class="panel-body">
      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputText">TÊN VAI TRÒ (ROLE)</label>
        <input type="text" class="form-control" id="inputText" name="namerole" placeholder="Nhập tên vai trò" value="" 
        />
      </div>
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
                    <input class="selectable-item" type="checkbox" name="ckPer[]"  id="row-619" value="{{$column_permission->name}}">
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
      <div class="h-p20 w-p20 float-left m-10">
        <button class="btn btn-block btn-success waves-effect waves-classic" data-target="#addrole" data-toggle="modal"
        type="button">Thêm quyền</button>
      </div>  

      <div class="h-p15 w-p20 float-right m-10">
        <button type="submit" class="btn btn-block btn-success waves-effect waves-classic">Lưu</button>
      </div>
    </div>
  </form>





  <!-- Modal -->
  <div class="modal fade" id="addrole" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
  role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple">
    <form method="POST" action="{{route('savepermission')}}" class="modal-content">
      @method('POST')
      @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleFormModalLabel">Tạo quyền</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-12 form-group">
            <input type="text" class="form-control" name="name" placeholder="Tên">
          </div>
          <div class="col-md-12 form-group">
            <button class="btn btn-primary  float-right " type="submit">Tạo</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- End Modal -->
</div>
@endsection