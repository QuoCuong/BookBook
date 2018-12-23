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
        //
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
