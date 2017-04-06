<?php namespace App\Http\ViewComposers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuComposer
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $routeAction = $this->request->route()->getAction();

        if (array_key_exists('_active_menu', $routeAction)) {
            $view->with('_active_menu', $routeAction['_active_menu']);
        }
    }
}
