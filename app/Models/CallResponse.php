<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallResponse extends Model
{
    use HasFactory,HasUuids;
    protected $primaryKey = "uuid";

    protected $fillable = [
        'response',
        'called_uuid',
        'user_uuid',
    ];

}
