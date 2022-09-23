<?php

namespace App\Http\Controllers\Auth;

use App\Models\Member;
use Illuminate\Support\Str;
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
            // check if same email exists
            $member = Member::where('email', $socialLite->getEmail())->first();
            $randomPassword = Str::random(8);
            if(!$member){
                // if email not available from sociallite use name as email
                if($socialLite->getEmail() == null || $socialLite->getEmail() == ''){
                    $member = Member::create([
                        'name' => $socialLite->getName(),
                        'email' => $socialLite->getName(),
                        'password' => bcrypt($randomPassword),
                    ]);
                }else{
                    // else create as it is
                    $member = Member::create([
                        'name' => $socialLite->getName(),
                        'email' => $socialLite->getEmail(),
                        'password' => bcrypt($randomPassword),
                    ]);
                }
            }
            $member->socialAccounts()->create([
                'provider_id' => $socialLite->getId(),
                'provider_name' => $provider,
            ]);

            // also store the user id, if member login using line
            // if($provider == 'line'){
            //     $getMember = Member::find($member->id);
            //     if($getMember->line_id == null){
            //         $getMember->update([
            //             'line_id' => $socialLite->getId()
            //         ]);
            //     }
            // }

            return $member;
        }
    }

}
