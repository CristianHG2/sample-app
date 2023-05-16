<?php

namespace Lifespikes\Contracts\Employees\Enums;

enum PayType: string
{
    case HOURLY = 'hourly';
    case SALARY = 'salary';
}
