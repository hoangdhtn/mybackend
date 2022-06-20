@extends('layouts.app')

@section('content')

<!-- Panel Basic -->
        <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <h3 class="panel-title">Thông tin người dùng</h3>
          </header>
          <div class="panel-body container-fluid">
          	<form autocomplete="off">
          		<div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Tên người dùng</label>
                    <input type="text" class="form-control" id="inputText" name="inputText" placeholder="Text" value="{{$user->name}}" 
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="{{$user->email}}"
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" value="{{$user->password}}"
                      placeholder="Password" />
                  </div>
                  {{-- <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputFile">File</label>
                    <input type="text" class="form-control" placeholder="Browse.." readonly="" />
                    <input type="file" id="inputFile" name="inputFile" multiple="" />
                  </div> --}}
                  <div class="h-p15 w-p20 float-right">
                  	<button type="submit" class="btn btn-block btn-success waves-effect waves-classic ">Lưu</button>
                  </div>
          	</form>

         </div>
     </div>

@endsection