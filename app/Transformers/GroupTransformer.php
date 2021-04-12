<?php

namespace App\Transformers;

use App\Models\Group;
use Flugg\Responder\Transformers\Transformer;

class GroupTransformer extends Transformer
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
     * @param  \App\Group $model
     * @return array
     */
    public function transform(Group $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
        ];
    }
}
