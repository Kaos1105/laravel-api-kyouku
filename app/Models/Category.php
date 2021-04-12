<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\Base64;
use App\Enums\UseFlg;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'code',
        'name',
        'explain',
        'image',
        'base_img',
        'pdf_file',
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
        'update_date'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => Base64::class,
        'base_img' => Base64::class,
        'create_date' => 'datetime:yyyy/mm/dd',
        'update_date' => 'datetime:yyyy/mm/dd',
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

    /**
     * Scope a query to only include active terms.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUse($query)
    {
        return $query->where('use_flg', UseFlg::USING);
    }
}
