<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerInquiry extends Model
{
    use SoftDeletes;
	public $timestamps = true;
	protected $appends = ['ja'];

	protected $casts = [
		'id' => 'int',
		'property_id' => 'int',
		'contact_us_type_id' => 'int',
		'flag' => 'bool',
		'is_finish' => 'bool'
	];

	protected $fillable = [
		'property_id',
		'contact_us_type_id',
		'subject',
		'text',
		'flag',
		'is_finish',
		'person_in_charge',
		'note',
		'name',
		'email',
        'phone',
		'company_name'
	];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function contact_us_type()
    {
        return $this->belongsTo(ContactUsType::class);
    }

    // ----------------------------------------------------------------------
	// Get Japanese formatted timestamps
	// ----------------------------------------------------------------------
	public function getJaAttribute()
	{
		$result = new \stdClass;
		$format = "Y年m月d日 H:i";
		if (!empty($this->created_at)) $result->created_at = Carbon::parse($this->created_at)->format($format);
		if (!empty($this->updated_at)) $result->updated_at = Carbon::parse($this->updated_at)->format($format);
		return $result;
	}
}
