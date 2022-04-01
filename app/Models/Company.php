<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    const ACTIVE = 'active';
    const PENDING = 'pending';

    protected $fillable = [
        'company_admin_id',
        'company_name',
        'company_name_kana',
        'agent_license_name',
        'agent_license_renewals',
        'agent_license_number',
        'remaining_points',
        'post_code',
        'address',
        'phone',
        'fax',
        'url',
        'status',
    ];

    public function admin(){
        return $this->belongsTo('App\Models\Admin','company_admin_id');
    }

    public function users() {
        return $this->hasMany(User::class, 'belong_company_id');
    }

    public function company_payment_detail()
    {
        return $this->hasOne(CompanyPaymentDetail::class);
    }

}
