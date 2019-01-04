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
        //delete all child of $category
        if (!empty($category->child)) {
            foreach ($category->child as $child) {
                $child->delete();
            }
        }

        //delete all product of $category
        if (!empty($category->products)) {
            foreach ($category->products as $product) {
                $product->delete();
            }
        }

        //delete all order details

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
