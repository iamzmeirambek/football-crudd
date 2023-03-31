<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $fillable = ['name' , 'country'];


    public function players(): HasMany
    {
        return $this->hasMany(Player::class, 'team_id', 'id');
    }

    public function transferTo(): HasMany
    {
        return $this->hasMany(Transfer::class, 'team_to_id', 'id');
    }

    public function transferFrom(): HasMany
    {
        return $this->hasMany(Transfer::class, 'team_from_id', 'id');
    }
}
