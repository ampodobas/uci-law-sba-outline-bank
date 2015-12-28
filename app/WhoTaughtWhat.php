<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WhoTaughtWhat extends Model {

	protected $table = 'who_taught_what';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'wtw_value', 'wtw_type', 'created_at', 'updated_at'];
    
}