<?php

namespace Book\Http\Controllers\Admin;

use Book\Http\Controllers\Controller;
use Book\Http\Requests\UserFormRequest;
use Book\Role;
use Book\User;
use Book\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', '!=', 2)->with('role')->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function indexUser()
    {
        $users = User::where('role_id', '!=', 1)->with('role')->paginate(10);
        return view('admin.users.indexuser', ['users' => $users]);
    }

    public function listOrderById(User $user)
    {
        $orders = $user->orders;

        return view('admin.users.list_Order', compact('orders'));
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
        $user = new User;

        $user->email      = $request->email;
        $user->password   = bcrypt($request->password);
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->birthday   = $request->birthday;
        $user->sex        = $request->sex;
        $user->role_id    = $request->role_id;

        $user->save();
        return redirect()->route('admin.user.index');
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
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->email      = $request->email;
        $user->password   = $request->password;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->birthday   = $request->birthday;
        $user->sex        = $request->sex;
        $user->role_id    = $request->role_id;
        $user->save();

        return redirect()->route('admin.user.index');
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

        return redirect()->back();
    }
}
