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
    public function created(OrderDetail $orderDetail)
    {
        $order   = $orderDetail->order;
        $product = $orderDetail->product;

        //update total of order
        $current_total         = $order->total;
        $total_of_order_detail = $product->price * $orderDetail->quantity;

        $data = [
            'total' => $current_total + $total_of_order_detail,
        ];
        $order->update($data);

        //update quantity of product
        $data = [
            'quantity' => $product->quantity - $orderDetail->quantity,
        ];
        $product->update($data);
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
