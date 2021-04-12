<?php

namespace App\Repositories\Contracts;

interface TermRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllByThemeId($id);
}
