<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;
use \Auth;

class CategoryComposer
{
    public $categories;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $user = \Auth::user();
        $this->categories = $user->categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', end($this->categories));
    }
}