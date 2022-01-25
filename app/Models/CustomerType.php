<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerType extends Model
{
    use HasFactory;

    protected $fillable = [
        'label'
    ];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
