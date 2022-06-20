<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
// Model
use App\Models\User;
// Spatie ROLE
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPerController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:add role| edit role | delete role | publish user | add permission| delete permission']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Page list Role
    public function index()
    {
        //
        $column_permissions = Permission::all();
        return view('admincp.roleandper.index')->with(compact('column_permissions'));
    }

    // Page list Permission
    public function pagePermission()
    {
        //
        return view('admincp.roleandper.showper');
    }

    // Page add Role
    public function addRole()
    {
        //
        $column_permissions = Permission::all();
        return view('admincp.roleandper.createrole')->with(compact('column_permissions'));
    }

    // Page edit Role
    public function editRole($id){
        $role = Role::find($id);
        $persRole = $role->permissions;
        $column_permissions = Permission::all();

        return view('admincp.roleandper.editrole')->with(compact([
            'role',
            'persRole',
            'column_permissions',
        ]));
    }

    // Save Permission
    public function savePermission(Request $request){
        $data = $request->validate([
            'name' => 'required|max:200',
        ], [
            'name.required' => 'Tên không hợp lệ',
        ]);

        try {
            $permission = Permission::create(['name' => strtolower($data['name'])]);
            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Thêm thất bại');
        } 
        return redirect()->back();
    }

    // Save Role
    public function saveRole(Request $request){
        $data = $request->validate([
            'namerole' => 'required|max:200',
            'ckPer' => 'required',
        ], [
            'namerole.required' => 'Tên không hợp lệ',
            'ckPer.required' => 'Quyền không hợp lệ',
        ]);

        try {
            $role = new Role();
            $role->name = $data['namerole'];
            $role->syncPermissions($data['ckPer']);
            $role->save();


            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Thêm thất bại');
        } 
        return redirect()->back();
    }

    // Update Role
    public function updateRole(Request $request, $id){
        $data = $request;

        try {
            $role = Role::find($id);
            if($role->name == 'super admin'){
                return redirect()->back()->with('fail', 'Quyền cao nhất không thể chỉnh sửa');
            }
            $role->syncPermissions($data['ckPer']);
            $role->update();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Cập nhật thất bại');
        } 
        return redirect()->back();
    }

    // Delete Role
    public function deleteRole($id){
        try {
            $role = Role::find($id);
            if($role->name == 'super admin'){
                return redirect()->back()->with('fail', 'Quyền cao nhất không thể xóa');
            }
            $role->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Xóa thất bại');
        }
        return redirect()->back()->with('fail', 'Xóa thất bại');
    }

    // Delete Permission
    public function deletePer($id){
        try {
            $per = Permission::find($id);
            $per->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Xóa thất bại');
        }
        return redirect()->back()->with('fail', 'Xóa thất bại');
    }

    // Data Role for Datatable
    public function rolesData()
    {
        $roles = Role::all();
        return Datatables::of($roles)->addColumn('per', function (Role $data) {
            $text = '';
            $pers = $data->permissions;
            $count = 0;
            foreach($pers as $per){

                $a = '<span class="badge badge-primary">'.$per->name.'</span> ';
                $text .= $a;
                $count++;
                if($count == 3){
                    $text .= '</br>';
                    $count = 0;
                }
            }
            return $text;
        })->addColumn('action', function (Role $data) {
            return '<a href="'. route('editrole', $data->id)  .'" class="btn btn-success"><i class="icon md-eye" aria-hidden="true"></i>Chỉnh sửa</a> 
            <a href="'. route('deleterole', $data->id) .'" class="btn btn-danger"><i class="icon md-delete" aria-hidden="true"></i>Xóa</a>';
        })->rawColumns(['per','action'])->make(true);
    }

    // Data Permission for Datatable
    public function persData()
    {
        $permissions = Permission::all();
        return Datatables::of($permissions)->addColumn('action', function (Permission $data) {
            return '<a href="'. route('deleteper', $data->id) .'" class="btn btn-danger"><i class="icon md-delete" aria-hidden="true"></i>Xóa</a>';
        })->rawColumns(['action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
