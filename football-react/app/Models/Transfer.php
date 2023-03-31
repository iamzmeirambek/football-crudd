<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $table = 'transfer';

    protected $fillable = [
        'player_id',
        'team_from_id',
        'team_to_id',
        'cost'
    ];

}
