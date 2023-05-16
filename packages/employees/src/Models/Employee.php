<?php

namespace Lifespikes\Employees\Models;

use Illuminate\Database\Eloquent\Model;
use Lifespikes\Contracts\Employees\Employee as EmployeeI;
use Lifespikes\Contracts\Employees\Enums\PayType;
use Lifespikes\Contracts\Employees\Enums\PayFrequency;

class Employee extends Model implements EmployeeI
{
    protected $casts = [
        'pay_type' => PayType::class,
        'pay_frequency' => PayFrequency::class,
    ];

    public function calculateWages(float $hours): float
    {
        if ($this->pay_type === PayType::SALARY) {
            return $this->pay_rate;
        }

        return $this->pay_rate * $hours;
    }
}
