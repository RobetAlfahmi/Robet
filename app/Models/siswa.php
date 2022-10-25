<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'foto',
        'about'
    ];

    protected $table = 'siswa';

    public function kontak(){
        return $this->BelongsToMany('App\Models\jenis_kontak')->withPivot('deskripsi', 'id');
    }
    public function projects(){
        return $this->hasMany('App\Models\projects');
    }
}
