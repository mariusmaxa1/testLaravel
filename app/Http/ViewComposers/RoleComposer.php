<?php namespace App\Http\ViewComposers;

use Auth;
use App\User;
use Illuminate\Contracts\View\View;

class RoleComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
	if ( Auth::user()) {
            $role = Auth::user()->role->alias;	
            
            $view->with('role', $role);
        }

		
    }
}


