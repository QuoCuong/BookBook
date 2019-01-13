<?php

namespace Book\Http\Controllers\Admin;

use Book\Http\Controllers\Controller;
use Book\Http\Requests\UserFormRequest;
use Book\Role;
use Book\User;
use Book\Order;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', '!=', 2)->with('role')->orderBy('created_at','desc')->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function indexUser()
    {
        $users = User::where('role_id', '!=', 1)->with('role')->orderBy('created_at','desc')->paginate(10);
        return view('admin.users.indexuser', ['users' => $users]);
    }

    public function listOrderById(User $user)
    {
        $orders = $user->orders;

        return view('admin.users.list_Order', compact('orders','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data= $request->all();
        $data['password'] = bcrypt($data['password']);
        $user= User::create($data);
        //$user = new User;
        Session::flash('success','Tạo mới thành công!');
        return redirect()->route('admin.user.indexuser');
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
        $roles = Role::pluck('name', 'id');
        $user = User::find($id);
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data= $request->all();
        // $data['password'] = bcrypt($data['password']);
        $user->update($data);
        Session::flash('success','Cập nhật thành công!');

        return redirect()->route('admin.user.indexuser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = User::find($id);
            $user->delete();
            Session::flash('success','Xóa thành công!');
        return redirect()->back();
    }

    public function getSearch(Request $req)
    {
        $user = User::where('last_name', 'like', '%'.$req->key.'%')->get();
                            
        return view('admin.users.search',compact('user'));
        
    }
}
