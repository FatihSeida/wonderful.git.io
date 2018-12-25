<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $table = 'villa';

    protected $fillable = ['name', 'desc', 'slug', 'like', 'dislike', 'thumbnail', 'price', 'facility', 'address', 'hp', 'lat', 'long', 'photo1', 'photo2', 'photo3', 'wisata_id'];

    public function wisata() {
    	return $this->belongsTo('App\Wisata', 'wisata_id');
    }
}
