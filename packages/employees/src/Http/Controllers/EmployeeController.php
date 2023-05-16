<?php

namespace Lifespikes\Employees\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Lifespikes\Employees\Models\Employee;
use Lifespikes\Support\Http\Controllers\Controller;
use Lifespikes\Employees\Objects\Requests\EmployeeData;

class EmployeeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Employees/Index', [
            'employees' => Employee::all()
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Employees/Create');
    }

    public function store(EmployeeData $data): Response
    {
        return $this->show(Employee::create($data->toArray()));
    }

    public function show(Employee $employee): Response
    {
        return Inertia::render('Employees/Show', [
            'employee' => $employee,
        ]);
    }

    public function update(Employee $employee, EmployeeData $data)
    {
    }

    public function destroy(Employee $employee)
    {
    }
}
