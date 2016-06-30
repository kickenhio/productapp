<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'currency', 'slug', 'ean'
    ];
    
     /**
     * Related attributes
     *
     * @var array
     */
    public function attributes()
    {
	    return $this->hasMany('App\Attribute');
    }
}
