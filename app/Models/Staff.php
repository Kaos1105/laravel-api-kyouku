<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staff';

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'staff_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'group_id',
        'kana',
        'password',
        'position',
        'kubun',
        'admin',
        'remark',
        'use_flg',
        'creator',
        'create_date',
        'updater',
        'update_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'create_date' => 'datetime:Y/m/d',
        'update_date' => 'datetime:Y/m/d',
    ];

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->create_date = $model->freshTimestamp();
            $model->update_date = $model->freshTimestamp();
        });
        static::updating(function ($model) {
            $model->update_date = $model->freshTimestamp();
        });
    }
}
