<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Testimonial
 * 
 * @property int $id
 * @property string $user_name
 * @property string $message
 * @property string|null $image
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Testimonial extends Model
{
	use SoftDeletes;
	protected $table = 'testimonials';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'user_name',
		'message',
		'image',
		'status'
	];
}
