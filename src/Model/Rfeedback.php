<?php

namespace Anwar\Rfeedback\Model;

use Illuminate\Database\Eloquent\Model;

class Rfeedback extends Model {
	//
	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email',
		'name',
		'url',
		'comment',
	];
}
