<?php

namespace App\Transformers;

use App\Models\DeviceManagement;
use Flugg\Responder\Transformers\Transformer;

class DeviceManagementTransformer extends Transformer
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
     * @param  \App\DeviceManagement $model
     * @return array
     */
    public function transform(DeviceManagement $model): array
    {
        return [
            'id' => $model->id,
            'user_id' => $model->user_id,
            'device_no' => $model->device_no,
            'login_date' => $model->login_date,
            'staff_id' => $model->staff_id,
        ];
    }
}
