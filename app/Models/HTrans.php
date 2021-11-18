<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HTrans extends Model
{
    use HasFactory;

    protected $table = "h_trans";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $incrementing = true;
}
