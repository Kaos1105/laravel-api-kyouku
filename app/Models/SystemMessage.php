<?php

namespace App\Models;

use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Enums\UseFlg;

class SystemMessage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'system_message';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'output_flg',
        'register_name',
        'message',
        'start_date',
        'end_date',
        'update_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remark',
        'use_flg',
        'updater',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime:Y/m/d',
        'end_date' => 'datetime:Y/m/d',
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

    /**
     * Scope a query to only include use system message.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUse($query)
    {
        return $query->where('use_flg', UseFlg::USING);
    }

    /**
     * Scope a query to only include output system message.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOutput($query, $output)
    {
        return $query->where('output_flg', $output);
    }

    /**
     * Scope a query to only include display system message.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDisplay($query)
    {
        return $query->whereDate('start_date', '<=', Carbon::now())
                    ->whereDate('end_date', '>=', Carbon::now());
    }
}
