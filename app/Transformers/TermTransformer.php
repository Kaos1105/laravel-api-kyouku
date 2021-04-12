<?php

namespace App\Transformers;

use App\Models\Term;
use Flugg\Responder\Transformers\Transformer;

class TermTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * A list of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Term $model
     * @return array
     */
    public function transform(Term $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'explain' => $model->explain,
            'image' => $model->image,
            'url' => $model->url,
            'grade' => $model->grade,
            'text_img_vertical' => $model->text_img_vertical,
            'text_img_horizontal' => $model->text_img_horizontal,
            'text_img_size' => $model->text_img_size,
        ];
    }
}
