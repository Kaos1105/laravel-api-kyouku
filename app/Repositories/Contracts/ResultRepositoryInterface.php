<?php

namespace App\Repositories\Contracts;

interface ResultRepositoryInterface extends BaseRepositoryInterface
{
    public function activation($activation_code);
}
