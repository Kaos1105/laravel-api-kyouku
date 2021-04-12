<?php

namespace App\Repositories\Contracts;

interface ThemeRepositoryInterface extends BaseRepositoryInterface
{
    public function activation($activation_code);
}
