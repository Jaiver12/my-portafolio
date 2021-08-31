<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Portafolio
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $image
 * @property $url
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Portafolio extends Model
{
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'image' => 'required',
		'url' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','image','url'];



}
