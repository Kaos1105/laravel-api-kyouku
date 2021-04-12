<?php

namespace App\Transformers;

use App\Models\Notification;
use Flugg\Responder\Transformers\Transformer;

class NotificationTransformer extends Transformer
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
     * @param  \App\Notification $model
     * @return array
     */
    public function transform(Notification $model): array
    {
        return [
            'id' => $model->id,
            'message' => $model->message,
            'update_date' => $model->update_date,
            'type' => 1,
        ];
    }
}
