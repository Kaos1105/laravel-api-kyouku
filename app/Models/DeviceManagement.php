<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceManagement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'device_management';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'staff_id',
        'device_no',
        'login_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'login_date' => 'datetime:Y/m/d',
    ];
}
