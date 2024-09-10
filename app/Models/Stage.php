<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Stage extends Model
{
    use HasFactory;

    protected $table = 'stage'; 

    protected $fillable = ['number', 'date', 'note','departure','arrival','distance','parcour_type','vertical_meters','deleted_at','created_at','updated_at']; 

    use SoftDeletes;

}

