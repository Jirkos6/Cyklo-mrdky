<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = ['actual_name']; 

    use SoftDeletes;
    public function teamYears()
    {
        return $this->hasMany(TeamYear::class, 'id_team');
    }
}
