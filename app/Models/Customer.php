<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\CustomerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'first_name',
        'code_client',
        'customer_type_id',
        'phone',
        'mail',
        'address',
        'postal_code',
        'city'    
    ];

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function ticketCustomer()
    {
        return $this->hasMany(Ticket::class);
    }
}
