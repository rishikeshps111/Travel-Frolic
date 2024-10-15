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
 * Class Package
 * 
 * @property int $id
 * @property string $package_name
 * @property int $destination_id
 * @property int $duration_id
 * @property string|null $description
 * @property float $price
 * @property int $rating
 * @property array|null $daywise_details
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Destination $destination
 * @property Duration $duration
 * @property Collection|Enquire[] $enquires
 * @property Collection|PackageImage[] $package_images
 *
 * @package App\Models
 */
class Package extends Model
{
	use SoftDeletes;
	protected $table = 'packages';

	protected $casts = [
		'destination_id' => 'int',
		'duration_id' => 'int',
		'price' => 'float',
		'rating' => 'int',
		'daywise_details' => 'json',
		'status' => 'bool'
	];

	protected $fillable = [
		'package_name',
		'destination_id',
		'duration_id',
		'description',
		'price',
		'rating',
		'daywise_details',
		'status'
	];

	public function destination()
	{
		return $this->belongsTo(Destination::class);
	}

	public function duration()
	{
		return $this->belongsTo(Duration::class);
	}

	public function enquires()
	{
		return $this->hasMany(Enquire::class);
	}

	public function package_images()
	{
		return $this->hasMany(PackageImage::class);
	}
}
