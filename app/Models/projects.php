<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $guarded =[
        'siswa_id',
        'nama_projects',
        'deskripsi',
        'tanggal'
    ];
    protected $table ='projects';

    public function siswa(){
        return $this->Belongsto('app\models\siswa','id');
    }
}
