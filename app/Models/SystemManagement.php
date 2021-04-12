<?php

namespace App\Models;

use App\Casts\Base64;
use Illuminate\Database\Eloquent\Model;

class SystemManagement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'system_management';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'manufacturer_name',
        'name',
        'version',
        'credit',
        'policy',
        'contract',
        'logo_img',
        'background_img',
        'character_img',
        'sound',
        'answer_num',
        'limit_time',
        'test_limit_time',
        'exam_limit_time',
        'panel',
        'font_size',
        'category_sort',
        'theme_sort',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
        'login_auth',
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
        'logo_img' => Base64::class,
        'background_img' => Base64::class,
        'character_img' => Base64::class,
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
