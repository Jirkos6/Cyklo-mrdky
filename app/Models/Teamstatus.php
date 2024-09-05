<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teamstatus extends Model
{
    use HasFactory;

    protected $table = 'team_status';

    protected $fillable = ['abbreviation','name','level']; 

    use SoftDeletes;
}
