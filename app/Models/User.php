<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\UseFlg;
use App\Enums\Status;
use App\Enums\UserRole;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'kubun',
        'status',
        'start_date',
        'end_date',
        'junbi_memo1',
        'junbi_memo2',
        'junbi_memo3',
        'junbi_memo4',
        'junbi_memo5',
        'junbi_kubun1',
        'junbi_kubun2',
        'junbi_kubun3',
        'activation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'activation_code',
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
        'start_date' => 'datetime:Y/m/d',
        'end_date' => 'datetime:Y/m/d',
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
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUse($query)
    {
        return $query->where('use_flg', UseFlg::USING);
    }

    /**
     * Scope a query to only include operation users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query)
    {
        return $query->where('status', '<>', Status::STOP);
    }
}
