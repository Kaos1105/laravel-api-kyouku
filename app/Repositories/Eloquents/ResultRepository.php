<?php

namespace App\Repositories\Eloquents;

use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class ResultRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function activation($activation_code)
    {
        return $this->model->where(DB::raw('BINARY `activation_code`'), '=', $activation_code)
            ->use()
            ->first();
    }
}
