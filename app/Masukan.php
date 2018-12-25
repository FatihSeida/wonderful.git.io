<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masukan extends Model
{
    protected $table = 'masukan';

    protected $fillable = ['text', 'wisata_id'];

    public function wisata() {
    	return $this->belongsTo('App\Wisata', 'wisata_id');
    }
}
