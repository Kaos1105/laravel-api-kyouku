<?php

namespace App\Models;

use App\Casts\Base64;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'theme';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        'code',
        'name',
        'explain',
        'image',
        'url',
        'passed_img',
        'answer_num',
        'answer_time',
        'pass_score',
        'test',
        'exam',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
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
        'image' => Base64::class,
        'passed_img' => Base64::class,
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
