<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kontak extends Model
{
    use HasFactory;
    protected $guarded =[
        'id'
    ];
    protected $table = 'jenis_kontak';
    
    public function siswa(){
        return $this->belongsToMany('App\Models\siswa');
    }

}
