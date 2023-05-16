<?php

namespace Lifespikes\Employees;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Lifespikes\Contracts\Employees\Employee;

class EmployeesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/employees.php');
    }

    public function boot(): void
    {
        Route::bind('employee', fn ($id) => Models\Employee::findOrFail($id));

        $this->app->bind(Employee::class, Models\Employee::class);
    }
}
