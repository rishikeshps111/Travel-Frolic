<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Duration
 * 
 * @property int $id
 * @property int $days
 * @property int $nights
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Package[] $packages
 *
 * @package App\Models
 */
class Duration extends Model
{
	use SoftDeletes;
	protected $table = 'duration';

	protected $casts = [
		'days' => 'int',
		'nights' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'days',
		'nights',
		'status'
	];

	public function packages()
	{
		return $this->hasMany(Package::class);
	}
}
