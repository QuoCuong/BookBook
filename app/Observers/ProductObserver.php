<?php

namespace Book\Observers;

use Book\Product;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \Book\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \Book\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the product "deleting" event.
     *
     * @param  \Book\Product  $product
     * @return void
     */
    public function deleting(Product $product)
    {
        $productDetail = $product->productDetail;
        $images = $product->images;

        if (!empty($productDetail)) {
            $productDetail->delete();
        }
        
        if (!empty($images)) {
            foreach ($images as $image) {
                $image->delete();
            }
        }

        
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \Book\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \Book\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \Book\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
