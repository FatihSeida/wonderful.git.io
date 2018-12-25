<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SearchTrait;

class Wisata extends Model
{
	use SearchTrait;
    protected $table = 'wisata';

    protected $fillable = ['name', 'desc', 'like', 'dislike', 'slug', 'thumbnail', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5', 'photo6', 'photo7', 'photo8', 'photo9', 'lat', 'long', 'created_at', 'updated_at'];

    public function villa() {
    	return $this->hasMany('App\Villa', 'wisata_id');
    }

    public function masukan() {
    	return $this->hasMany('App\Masukan', 'wisata_id');
    }
}
