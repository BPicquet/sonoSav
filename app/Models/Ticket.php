<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'prior_agreement',
        'customer_id'
    ];

    public function dateFormated(){
        return date_format($this->created_at, 'd/m/Y');
    }

    public function customerTicket()
    {
        // Il faut préciser en deuxième paramètre le nom du champs
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
