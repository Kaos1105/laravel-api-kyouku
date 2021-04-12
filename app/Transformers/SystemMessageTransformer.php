<?php

namespace App\Transformers;

use App\Models\SystemMessage;
use Flugg\Responder\Transformers\Transformer;

class SystemMessageTransformer extends Transformer
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
     * @param  \App\SystemMessage $model
     * @return array
     */
    public function transform(SystemMessage $model): array
    {
        return [
            'id' => $model->id,
            'message' => $model->message,
            'update_date' => $model->update_date,
            'type' => 0,
        ];
    }
}
