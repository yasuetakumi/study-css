<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\DatatablesHelper;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialAccount;

class MemberController extends Controller
{
    public function show($param){
        if($param == 'json'){
            $model = Member::with('socialAccounts');
            return (new DatatablesHelper)->instance($model)
                                            ->addColumn('social_accounts', function($model){
                                                $count = $model->socialAccounts->count();
                                                $social_accounts = $model->socialAccounts;
                                                $social_accounts_html = '';
                                                $social_accounts->unique('provider_name')->each(function($social_account, $key) use(&$social_accounts_html, $count){
                                                    $social_accounts_html .= $key === $count - 1 ? strtoupper($social_account->provider_name) : strtoupper($social_account->provider_name) . ', ';
                                                });
                                                // foreach($social_accounts as $key => $social_account){
                                                //     $social_accounts_html .= $key === $count - 1 ? strtoupper($social_account->provider_name) : strtoupper($social_account->provider_name) . ', ';
                                                // }
                                                return '<p class="text-left my-0">' . $social_accounts_html . '</p>';
                                            })
                                            ->rawColumns(['social_accounts', 'action'])
                                            ->toJson();
        }
        abort(404);
    }

    public function index()
    {
        $data['page_title'] = __('label.members') . __('label.list');
        return view('backend.member.index', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = __('label.members') . ' - ' . __('label.edit');
        $data['member'] = Member::find($id);
        return view('backend.member.form', $data);
    }

    public function destroy($id)
    {
        $property = Member::find($id);
        $property->delete();
        // return redirect()->route('backend.member.index')->with('success', __('label.delete_success'));
    }
}
