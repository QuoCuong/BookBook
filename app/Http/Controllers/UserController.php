<?php

namespace Book\Http\Controllers;

use Illuminate\Http\Request;
use Book\User;
use Book\Order;
use Book\Address;
use Book\City;
use Book\District;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('account.index');
    // }
    // public function address()
    // {
    //     return view('account.addresses');
    // }
    // public function vieworders()
    // {
    //     return view('account.vieworders');
    // }
    public function contactById(User $user, Order $orders , Address $addresses )
    {
        $user = Auth::user();
        $orders = $user->orders;
        $addresses = $user->addresses;
        // dd($addresses);
;

        return view('account.index', compact('user' ,'orders','addresses'));
        
    }
    
    public function editOrderStatusById(Order $order){
        // dd($orders);
        $order->status = 'cancelled';
        $order->save();
        return redirect()->back();

    }
    public function addressById(User $user , Address $addresses )
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        // dd($addresses);
;

        return view('account.addresses', compact('user' ,'addresses'));
        
    }
    // public function destroyAddressById($id)
    // {
    //         $address = Address::find($id);
    //         $address->delete();
    //     return redirect()->back();
    // }

    public function destroyAddressById(Address $address)
    {
        // dd($address);
        $address->delete();
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewAddress()
    {
        $cities = City::pluck('name','id');  
        $districts = District::pluck('name', 'id');
        return view('account.create',compact('cities','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewAddress(Request $request)
    {
        $user = Auth::user();
        $user->addresses()->create($request->all());

        return redirect()->route('account.addresses');
        
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
        $cities = City::pluck('name','id');
        $districts = District::pluck('name', 'id');
        $address = Address::find($id);
        return view('account.viewedit',compact('cities','districts','address','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $data= $request->all();        
        $address->update($data);

        return redirect()->route('account.addresses');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
