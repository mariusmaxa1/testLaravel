<?php

namespace App\Http\Controllers\Front\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Config\Repository;
use Laravel\Socialite\Contracts\Factory;
use Auth;
use App\UsersSocial;
use App\Http\Requests\Front\Patient\UpdateRemoveSocialRequest;
use App\Http\Requests\Front\Patient\UpdatePasswordRequest;
use Notification;

class AccountController extends Controller
{
    /**
     * @var \Laravel\Socialite\Contracts\Factory
     */
    protected $socialite;
    
    /**
     * @var \Illuminate\Config\Repository
     */
    protected $config;
    
        /**
     * Init.
     * @param Factory $socialite
     * @param Repository $config
     */
    public function __construct(Factory $socialite, Repository $config)
    {
        $this->socialite = $socialite;
        $this->config = $config;
        $this->middleware('auth');
    }
    
    
    public function edit()
    {      
        $user = Auth::user();
        $social = [];
        if ($user->social != null ) {
            foreach ($user->social as $socialAccount) {               
                $social[$socialAccount->provider] = $socialAccount;
            }           
        }

        
        return view('front.patient.account.edit', [
            'user' => $user,
            'social' => $social,
        ]);
    }
    
    
    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getSocialAssociate($provider)
    {
        if (!$provider) {
            abort(404);
        }

        $user = Auth::user();

        if ($user->social()->where('provider', strtolower($provider))->count() >= 1) {
            Notification::info("Asociat! ");
            return redirect()->route('patient.account.edit');
        }

        $this->config->set('services.'.$provider.'.redirect', route('patient.update.social.associate.handle', $provider));

        return $this->socialite->driver($provider)->redirect();
    }
    
    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getSocialAssociateHandle($provider)
    {
        if (!$provider) {
            abort(404);
        }

        $currentSetting = $this->config->get('services.'.$provider.'.redirect');

        $this->config->set('services.'.$provider.'.redirect', route('patient.update.social.associate.handle', $provider));

        $user = Auth::user();

        $providerUser = $this->socialite->driver($provider)->user();

        $user->social()->save(new UsersSocial([
            'social_id' => $providerUser->getId(),
            'provider' => strtolower($provider),
        ]));

        Notification::success("trans('user.controllers.notifications.social.associated')");

        $this->config->set('services.'.$provider.'.redirect', $currentSetting);

        return redirect()->route('patient.account.edit');
    }
    
    /**
     * @param UpdateRemoveSocialRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postSocialRemove(UpdateRemoveSocialRequest $request)
    {
        $user = Auth::user();

        $social = $user->social()->findOrFail($request->get('social_id'));

        $social->delete();

        Notification::success("Social sters.");

        return redirect()->route('patient.account.edit');
    }
    
    public function postPassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        $user->password = bcrypt($request->get('password'));

        $user->save();

        Notification::success("Succes! ");

        return redirect()->route('patient.account.edit');
    }
}
