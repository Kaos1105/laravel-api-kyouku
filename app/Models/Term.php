<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\Base64;
use App\Enums\UseFlg;

class Term extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'term';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'theme_id',
        'code',
        'name',
        'explain',
        'image',
        'url',
        'grade',
        'question_text',
        'question_img',
        'question_url',
        'answer_correct',
        'answer_explain',
        'answer_img',
        'answer_a',
        'image_a',
        'answer_b',
        'image_b',
        'answer_c',
        'image_c',
        'answer_d',
        'image_d',
        'answer_e',
        'image_e',
        'test',
        'exam',
        'text_use_flg',
        'text_img_vertical',
        'text_img_horizontal',
        'text_img_size',
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
        'question_img' => Base64::class,
        'answer_img' => Base64::class,
        'image_a' => Base64::class,
        'image_b' => Base64::class,
        'image_c' => Base64::class,
        'image_d' => Base64::class,
        'image_e' => Base64::class,
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

    /**
     * Scope a query to only include test terms.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTest($query)
    {
        return $query->where('test', UseFlg::USING);
    }

    /**
     * Scope a query to only include exam terms.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExam($query)
    {
        return $query->where('exam', UseFlg::USING);
    }

    /**
     * Scope a query to only include garde terms.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGrade($query, $grade)
    {
        return $query->where('grade', $grade);
    }
}
