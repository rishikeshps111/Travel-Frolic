<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Enquire
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int|null $package_id
 * @property string|null $message
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Package|null $package
 *
 * @package App\Models
 */
class Enquire extends Model
{
	use SoftDeletes;
	protected $table = 'enquires';

	protected $casts = [
		'package_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'package_id',
		'message',
		'status'
	];

	public function package()
	{
		return $this->belongsTo(Package::class);
	}
}
