<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Status extends Enum
{
    const STOP = 0; //停止
    const OPERATION = 1; //稼働
    const TRIAL = 2; //試用
}