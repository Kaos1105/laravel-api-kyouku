<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\UseFlg;

class Group extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'user_id',
        'name',
        'kana',
        'admin',
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
