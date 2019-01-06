<?php

namespace Book\Observers;

use Book\Category;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \Book\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \Book\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the category "deleting" event.
     *
     * @param  \Book\Category  $category
     * @return void
     */
    public function deleting(Category $category)
    {
        //delete all child
        if (!empty($category->child)) {
            foreach ($category->child as $child) {
                $child->delete();
            }
        }

        //delete all product, product detail, comments and images
        if (!empty($category->products)) {
            foreach ($category->products as $product) {
                if (!empty($product->productDetail)) {
                    $product->productDetail->delete();
                }

                if (!empty($product->comments)) {
                    foreach ($product->comments as $comment) {
                        $comment->delete();
                    }
                }

                if (!empty($product->images)) {
                    foreach ($product->images as $image) {
                        $image->delete();
                    }
                }

                if (!empty($product->orderDetails)) {
                    foreach ($product->orderDetails as $orderDetail) {
                        $orderDetail->delete();
                    }
                }

                $product->delete();
            }
        }
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \Book\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \Book\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \Book\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
