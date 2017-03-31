<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderByComposer
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
        $view->with('_sort_by', $this->request->has('sort_by') ? $this->request->get('sort_by') : null);
        $view->with('_sort_order', $this->request->has('sort_order') ? $this->request->get('sort_order') : null);
        $view->with('_sort_route', $this->request->route()->getName());
    }
}
