<?php

namespace Lifespikes\Employees\Objects\Requests;

use Spatie\LaravelData\Data;
use Lifespikes\Contracts\Employees\Enums\PayType;
use Lifespikes\Contracts\Employees\Enums\PayFrequency;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class EmployeeData extends Data
{
    public function __construct(
        public string $first_name,
        public ?string $middle_name,
        public string $last_name,
        public PayType $pay_type,
        public float $pay_rate,
        public PayFrequency $pay_frequency,
    ) {
    }
}
