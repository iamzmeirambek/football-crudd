<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StorageM extends Model
{
    use HasFactory;

    protected $table = 'file';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'path',
        'hash',
        'size',
        'extension'
    ];
}
