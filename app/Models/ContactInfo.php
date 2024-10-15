<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactInfo
 * 
 * @property int $id
 * @property string $company_name
 * @property string $address
 * @property string $phone_1
 * @property string|null $phone_2
 * @property string $email_1
 * @property string|null $email_2
 * @property string|null $location
 * @property Carbon $created_at
 * @property Carbon|null $update_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class ContactInfo extends Model
{
	use SoftDeletes;
	protected $table = 'contact_info';
	public $timestamps = false;

	protected $casts = [
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'company_name',
		'address',
		'phone_1',
		'phone_2',
		'email_1',
		'email_2',
		'location',
		'update_at'
	];
}
