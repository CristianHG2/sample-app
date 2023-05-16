<?php

namespace Lifespikes\Support\Http\Requests;

abstract class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return mixed[]
     */
    abstract public function rules(): array;
}
