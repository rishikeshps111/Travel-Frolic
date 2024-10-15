<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gallery
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string|null $description
 * @property int $destination_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Destination $destination
 *
 * @package App\Models
 */
class Gallery extends Model
{
	use SoftDeletes;
	protected $table = 'gallery';

	protected $casts = [
		'destination_id' => 'int'
	];

	protected $fillable = [
		'name',
		'image',
		'description',
		'destination_id'
	];

	public function destination()
	{
		return $this->belongsTo(Destination::class);
	}
}
