<?php

namespace App\Models;

use App\Casts\Base64;
use Illuminate\Database\Eloquent\Model;

class GroupCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'group_id',
        'category_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updater',
        'update_date'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'update_date' => 'datetime:Y/m/d',
    ];

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->update_date = $model->freshTimestamp();
        });
        static::updating(function ($model) {
            $model->update_date = $model->freshTimestamp();
        });
    }
}
