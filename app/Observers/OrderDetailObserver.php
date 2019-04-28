<?php

namespace Book\Observers;

use Book\Order;
use Book\OrderDetail;

class OrderDetailObserver
{
    /**
     * Handle the order detail "created" event.
     *
     * @param  \Book\OrderDetail  $orderDetail
     * @return void
     */
    public function creating(OrderDetail $orderDetail)
    {
        $order   = $orderDetail->order;
        $product = $orderDetail->product;

        //update total of order
        $current_order_total = $order->total;
        $order_detail_amount = $product->price * $orderDetail->quantity;

        $order->total = $current_order_total + $order_detail_amount;
        $order->save();

        //update product quantity
        $current_product_quantity = $product->quantity;
        $order_detail_quantity    = $orderDetail->quantity;

        $product->quantity = $current_product_quantity - $order_detail_quantity;
        $product->save();
    }

    /**
     * Handle the order detail "created" event.
     *
     * @param  \Book\OrderDetail  $orderDetail
     * @return void
     */
    public function created(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order detail "updated" event.
     *
     * @param  \Book\OrderDetail  $orderDetail
     * @return void
     */
    public function updated(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order detail "deleted" event.
     *
     * @param  \Book\OrderDetail  $orderDetail
     * @return void
     */
    public function deleted(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order detail "restored" event.
     *
     * @param  \Book\OrderDetail  $orderDetail
     * @return void
     */
    public function restored(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order detail "force deleted" event.
     *
     * @param  \Book\OrderDetail  $orderDetail
     * @return void
     */
    public function forceDeleted(OrderDetail $orderDetail)
    {
        //
    }
}
