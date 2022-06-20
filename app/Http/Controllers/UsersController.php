<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
// Model
use App\Models\User;
// Spatie ROLE
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:add user| edit user | delete user | publish user']);
        // theo per
        // $this->middleware('permission:add user', ['only' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // thêm role và thêm per
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish user']);

        
        // $role = Role::find(2);
        // $permission = Permission::find(5);
        // thêm per cho role
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // thêm per mới đè lên per cũ nếu trùng lặp
        //$permission->syncRoles($role);

        // xóa per của role
        //$role->revokePermissionTo($permission);

        // xóa role của per
        //$permission->removeRole($role);

        // gán quyền cho user
        //auth()->user()->assignRole('admin');
        //auth()->user()->assignRole(['admin', 'admin']);
        // dùng cho mutl (Thêm quyền cho user) thay vì dùng dùng assign thì dùng sync (Xóa hết cũ thay bằng mới) cũng được
        // $role->syncPermissions($permissions);
        // $permission->syncRoles($roles);
        //dd(auth()->user());
        // hoặc
        //$user = User::find(2);
        // $user->assignRole('admin')

        // xóa quyền
        //auth()->user()->removeRole('admin');

        //Direct Permissions (quyền trực tiếp) bảng model_has_permissions
        //$user->givePermissionTo('add user');

        // You can also give multiple permission at once
        //$user->givePermissionTo('edit articles', 'delete articles');

        // You may also pass an array
        //$user->givePermissionTo(['edit articles', 'delete articles']);

        // Kiểm tra role
        // $user = User::find(1);
        // if($user->hasRole('admin')){
        //     echo "có";
        // }else{
        //     echo "ko";
        // }

        // Xuất ra mảng vai trò của user
        // $user = User::find(1);
        // $per = $user->getPermissionsViaRoles();
        // dd($per);

        // Xuất ra mảng quyền của user
        // $user = User::find(2);
        // $per = $user->getAllPermissions();
        // dd($per);

        return view('admincp.user.index');
    }

    
    public function usersData()
    {
        $users = User::orderBy('id', 'DESC')->get();
        //dd($users);
        return Datatables::of($users)->addColumn('role', function (User $data) {
            $text = '';
            $roles = $data->getRoleNames();
            foreach($roles as $role){
                $a = '<span class="badge badge-primary">'.$role.'</span> ';
                $text .= $a;
            }
            return $text;
        })->addColumn('action', function (User $data) {
            return '<a href="'. route('users.show', $data->id) .'" class="btn btn-success"><i class="icon md-eye" aria-hidden="true"></i>Xem</a> 
            <a href="'. route('deleteuser', $data->id) .'" class="btn btn-danger"><i class="icon md-delete" aria-hidden="true"></i>Xóa</a>
            <a href="'. route('roleandper', $data->id) .'" class="btn btn-info"><i class="icon md-account" aria-hidden="true"></i>Quyền</a>';
        })->rawColumns(['role','action'])->make(true);
    }

    public function roleAndPer($id){
        $column_roles = Role::all();
        $column_permissions = Permission::all();
        //dd($column_roles);

        $userRolesPers = User::with('roles','permissions')->where('id', $id)->first();

        $user = User::find($id);
        $persUser = $user->getAllPermissions();
        // $rolesUser = $user->getRoleNames();
        // dd($rolesUser);
        return view('admincp.user.roleandper')->with(
            compact([
                'column_roles', 
                'column_permissions',
                'userRolesPers',
                'persUser',
                'user',
            ]));
    }

    public function updateRoleAndPer(Request $request, $id){
        $data = $request;
        $user = User::find($id);

       try {
            // Quyền ADMIN cao nhất
            if(auth()->user()->hasRole('super admin') && $user->id == auth()->user()->id){
                return redirect()->back()->with('success', 'Bạn đã có quyền cao nhất! Không thể chỉnh sửa');
            }elseif ($user->hasRole('super admin')){
                return redirect()->back()->with('fail', 'Bạn không có quyền điều chỉnh người dùng này');
            }else{
                // Xóa vai trò và quyền cũ thay thế bằng mới
                $user->syncPermissions($data['ckPer']);
                $user->syncRoles($data['ckRole']);
                return redirect()->back()->with('success', 'Cập nhật thành công');
            }

       } catch (Exception $e) {
           return redirect()->back()->with('fail', 'Thêm thất bại');
       }
        return redirect()->back();
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
        $data = $request->validate([
            'name' => 'required|max:200|min:8',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Tên không hợp lệ',
            'email.required' => 'Email không hợp lệ',
            'password.required' => 'Mật khẩu không hợp lệ',
        ]); 
        // dd($data);
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->assignRole('user');
            $user->save();

            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (Exception $e) {
             return redirect()->back()->with('fail', 'Thêm thất bại');
        }
        return redirect()->back();
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
        $user = User::find($id);
        return view('admincp.user.show')->with(compact('user'));
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

    public function deleteUser($id)
    {
        //
        
        try {
            $user = User::find($id);
            //delete permission
            if($user->hasRole('super admin')){
                redirect()->back()->with('fail', 'Bạn không thể xóa người dùng này');
            }else{
                $user->syncPermissions([]);
                $user->syncRoles([]);
                $user->delete();
                return redirect()->back()->with('success', 'Xóa thành công');
            }
           
        } catch (Exception $e) {
             return redirect()->back()->with('fail', 'Xóa thất bại');
        }
        return redirect()->back()->with('fail', 'Xóa thất bại');

    }
}
