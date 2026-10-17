<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'tax_number',
        'company_type',
        'email',
        'phone',
        'city',
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
