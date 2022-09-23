<?php

namespace App\Http\Controllers\Auth;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $member = $this->findOrCreateMember($socialUser, $provider);
        auth()->guard('member')->login($member);

        return redirect()->route('home');
    }

    public function findOrCreateMember($socialLite, $provider)
    {
        $socialAccount = SocialAccount::where('provider_id', $socialLite->getId())
    					->where('provider_name', $provider)
    					->first();

        if($socialAccount){
            return $socialAccount->member;
        }else{
            $member = Member::create([
                'name' => $socialLite->getName(),
                'email' => $socialLite->getEmail(),
                'password' => bcrypt($socialLite->getId()),
            ]);

            $member->socialAccounts()->create([
                'provider_id' => $socialLite->getId(),
                'provider_name' => $provider,
            ]);

            return $member;
        }
    }

}
