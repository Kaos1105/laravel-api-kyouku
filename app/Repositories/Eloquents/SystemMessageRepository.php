<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\SystemMessageRepositoryInterface;
use App\Models\SystemMessage;
use App\Enums\OutputFlg;

class SystemMessageRepository extends BaseRepository implements SystemMessageRepositoryInterface
{
    public function __construct(SystemMessage $model)
    {
        parent::__construct($model);
    }

    public function getAllMessage()
    {
        return $this->model->output(OutputFlg::TABLET)
            ->display()
            ->use()
            ->get();
    }
}
