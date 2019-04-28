<?php

namespace Book\Observers;

use Book\Address;

class AddressObserver
{
    /**
     * Handle the address "created" event.
     *
     * @param  \Book\Address  $address
     * @return void
     */
    public function created(Address $address)
    {
        //
    }

    /**
     * Handle the address "updated" event.
     *
     * @param  \Book\Address  $address
     * @return void
     */
    public function updated(Address $address)
    {
        //
    }

    /**
     * Handle the address "deleting" event.
     *
     * @param  \Book\Address  $address
     * @return void
     */
    public function deleting(Address $address)
    {
        if (!empty($address->orders)) {
            foreach ($address->orders as $order) {
                $order->delete();
            }
        }
    }

    /**
     * Handle the address "deleted" event.
     *
     * @param  \Book\Address  $address
     * @return void
     */
    public function deleted(Address $address)
    {
        //
    }

    /**
     * Handle the address "restored" event.
     *
     * @param  \Book\Address  $address
     * @return void
     */
    public function restored(Address $address)
    {
        //
    }

    /**
     * Handle the address "force deleted" event.
     *
     * @param  \Book\Address  $address
     * @return void
     */
    public function forceDeleted(Address $address)
    {
        //
    }
}
