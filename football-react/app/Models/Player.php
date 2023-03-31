<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    protected $table = 'player';
    protected $primaryKey = 'id';
    protected $fillable = ['name' , 'number' , 'cost', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function transfer(): HasMany
    {
        return $this->hasMany(Transfer::class, 'player_id', 'id');
    }

    use HasFactory;
}
