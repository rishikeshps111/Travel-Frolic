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
 * Class Destination
 * 
 * @property int $id
 * @property string $place_name
 * @property string $state
 * @property string $country
 * @property string|null $description
 * @property string|null $image
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Gallery[] $galleries
 * @property Collection|Package[] $packages
 *
 * @package App\Models
 */
class Destination extends Model
{
	use SoftDeletes;
	protected $table = 'destination';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'place_name',
		'state',
		'country',
		'description',
		'image',
		'status'
	];

	public function galleries()
	{
		return $this->hasMany(Gallery::class);
	}

	public function packages()
	{
		return $this->hasMany(Package::class);
	}
}
