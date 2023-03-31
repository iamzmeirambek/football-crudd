<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer123 extends Model
{
    use HasFactory;

    protected $table = 'transfer';
    protected $primaryKey = 'id';
    protected $fillable = ['player_id' , 'team_from_id' , 'team_to_id', 'cost'];

    public function teamTo()
    {
        return $this->belongTo(Team::class);
    }
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
