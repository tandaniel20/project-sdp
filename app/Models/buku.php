<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "buku";
    protected $primaryKey = "id";

    public function kategori(){
        return $this->belongsToMany(Kategori::class, "buku_kategori", "id_buku", "id_kategori");
    }
}
