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

    public function create()
    {
        $data['page_title'] = __('label.members') . ' - ' . __('label.add');
        $data['page_type'] = 'create';
        $data['form_action'] = route('admin.member.store');
        $data['item'] = new Member();
        $data['notif_statuses'] = [
            Member::ID_DISABLE_NOTIF => Member::ID_DISABLE_NOTIF_LABEL,
            Member::ID_ENABLE_NOTIF => Member::ID_ENABLE_NOTIF_LABEL
        ];
        return view('backend.member.form', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'nullable',
            'name' => 'required',
            'name_kana' => 'nullable',
            'phone_number' => 'nullable|min:11|max:13',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|min:8',
            'is_line_notification_enabled' => 'nullable',
            'is_email_notification_enabled' => 'nullable',
        ]);
        $data['password'] = bcrypt($data['password']);
        $member = Member::create($data);
        return redirect()->route('admin.member.index')->with('success', __('label.SUCCESS_CREATE_MESSAGE'));
    }

    public function edit($id)
    {
        $data['page_title'] = __('label.members') . ' - ' . __('label.edit');
        $data['page_type'] = 'edit';
        $data['form_action'] = route('admin.member.update', $id);
        $data['item'] = Member::find($id);
        $data['notif_statuses'] = [
            Member::ID_DISABLE_NOTIF => Member::ID_DISABLE_NOTIF_LABEL,
            Member::ID_ENABLE_NOTIF => Member::ID_ENABLE_NOTIF_LABEL
        ];
        return view('backend.member.form', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'company_name' => 'nullable',
            'name' => 'required',
            'name_kana' => 'nullable',
            'phone_number' => 'nullable|min:11|max:13',
            'email' => 'required|email|unique:members,email,' . $id,
            'password' => 'nullable|min:8',
            'is_line_notification_enabled' => 'nullable',
            'is_email_notification_enabled' => 'nullable',
        ]);
        $member = Member::find($id);
        if(!empty($member)){
            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }
            $member->update($data);
            return redirect()->route('admin.member.index')->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
        } else {
            return redirect()->route('admin.member.index')->with('errors', __('label.FAILED_UPDATE_MESSAGE'));
        }
    }

    public function destroy($id)
    {
        $property = Member::find($id);
        $property->delete();
        // return redirect()->route('backend.member.index')->with('success', __('label.delete_success'));
    }

    public function cancelLineSns($id)
    {
        $member = Member::find($id);
        if(!empty($member)){
            $member->update([
                'is_line_notification_enabled' => Member::ID_DISABLE_NOTIF,
                'line_id' => null
            ]);
            return redirect()->back()->with('success', __('label.SUCCESS_UPDATE_MESSAGE'));
        } else {
            return redirect()->back()->with('errors', __('label.FAILED_UPDATE_MESSAGE'));
        }
    }
}
