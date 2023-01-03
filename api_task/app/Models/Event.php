<?php

namespace App\Models;

use App\Models\Traits\Uuid as TraitsUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Event extends Model
{
    use HasFactory;
    use TraitsUuid;

    public $incrementing=false;
    protected $table='events';
    protected $fillable = ['name', 'slug','start_At','end_at'];
    protected $casts = [
        'start_At' => 'datetime:Y-m-d H:i:s',
        'end_at' => 'datetime:Y-m-d H:i:s',
    ];
    // public static $dates = ['start_At', 'end_at'];

    
    

}
