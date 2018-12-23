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
    public function index()
    {
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

    public function listPending()
    {
        $orders = Order::where('status', 'pending')->orderBy('created_at')->paginate(8);

        return view('admin.orders.pending', ['orders' => $orders]);
    }

    public function listApproved()
    {
        $orders = Order::where('status', 'approved')->orderBy('created_at')->paginate(8);

        return view('admin.orders.approved', ['orders' => $orders]);
    }

    public function listComplete()
    {
        $orders = Order::where('status', 'complete')->orderBy('created_at')->paginate(8);

        return view('admin.orders.complete', ['orders' => $orders]);
    }

    public function listCancelled()
    {
        $orders = Order::where('status', 'cancelled')->orderBy('created_at')->paginate(8);

        return view('admin.orders.cancelled', ['orders' => $orders]);
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

    public function updateStatus(Order $order, $status)
    {
        $order->status = $status;
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
