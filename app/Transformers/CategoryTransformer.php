<?php

namespace App\Transformers;

use App\Models\Category;
use Flugg\Responder\Transformers\Transformer;

class CategoryTransformer extends Transformer
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
     * @param  \App\Category $model
     * @return array
     */
    public function transform(Category $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'explain' => $model->explain,
            'image' => $model->image,
            'base_img' => $model->base_img,
            'pdf_file' => $model->pdf_file,
        ];
    }
}
