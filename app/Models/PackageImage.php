<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PackageImage
 * 
 * @property int $id
 * @property string $image
 * @property int $package_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Package $package
 *
 * @package App\Models
 */
class PackageImage extends Model
{
	use SoftDeletes;
	protected $table = 'package_images';

	protected $casts = [
		'package_id' => 'int'
	];

	protected $fillable = [
		'image',
		'package_id'
	];

	public function package()
	{
		return $this->belongsTo(Package::class);
	}
}
