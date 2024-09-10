<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Race extends Model
{
    use HasFactory;

    protected $table = 'race'; 

    protected $fillable = ['default_name', 'link ', 'country','type']; 

    use SoftDeletes;
}
