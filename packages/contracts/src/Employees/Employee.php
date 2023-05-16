<?php

namespace Lifespikes\Contracts\Employees;

interface Employee
{
    public function calculateWages(float $hours): float;
}
