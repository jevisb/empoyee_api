<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'employee_number',
        'phone',
        'basic_pay',
        'housing_allowance',
        'transport_allowance',
        'gross_pay',
        'net_pay',
        'tax',
        //'created_by',
        //'updated_by',
    ];

    /**
     * Calculate and set gross pay, tax, and net pay.
     * This can be done whenever you save a new employee record.
     */
    public function calculateCompensation()
    {
        $this->gross_pay = $this->basic_pay + $this->housing_allowance + $this->transport_allowance;
        $this->tax = $this->gross_pay * 0.20; // 20% tax
        $this->net_pay = $this->gross_pay - $this->tax;
    }

    // You could also add a boot method to calculate these values automatically on creation or updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            $employee->calculateCompensation();
        });

        static::updating(function ($employee) {
            $employee->calculateCompensation();
        });
    }
}
