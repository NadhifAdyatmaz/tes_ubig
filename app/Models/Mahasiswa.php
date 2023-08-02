<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primarykey= 'id';
    protected $fillable= [
        'id', 'nim', 'nama', 'tanggal_lahir', 'jeniskelamin', 'kota_id'
    ];

    public function kotas()
    {
        return $this->belongsTo(Kota::class,'kota_id');
    }
}
