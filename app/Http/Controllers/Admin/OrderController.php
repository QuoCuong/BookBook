<?php

namespace Book\Http\Controllers\Admin;

use Book\Http\Controllers\Controller;
use Book\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status;

        if ($status) {

            $orders = Order::where('status', $status)->orderBy('id')->paginate(8);

            return view('admin.orders.status', [
                'status' => $status,
                'orders' => $orders,
            ]);
        } else {

            $numberOfOrders          = Order::count();
            $numberOfPendingOrders   = Order::where('status', 'pending')->count();
            $numberOfApprovedOrders  = Order::where('status', 'approved')->count();
            $numberOfCompleteOrders  = Order::where('status', 'complete')->count();
            $numberOfCancelledOrders = Order::where('status', 'cancelled')->count();

            return view('admin.orders.index', [
                'numberOfOrders'          => $numberOfOrders,
                'numberOfPendingOrders'   => $numberOfPendingOrders,
                'numberOfApprovedOrders'  => $numberOfApprovedOrders,
                'numberOfCompleteOrders'  => $numberOfCompleteOrders,
                'numberOfCancelledOrders' => $numberOfCancelledOrders,
            ]);
        }
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
    public function show(Order $order)
    {
        $user         = $order->user;
        $address      = $order->address;
        $orderDetails = $order->orderDetails;

        return view('admin.orders.show', ['order' => $order, 'user' => $user, 'address' => $address, 'orderDetails' => $orderDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', ['order' => $order]);
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

    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();

        return redirect()->back();
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
