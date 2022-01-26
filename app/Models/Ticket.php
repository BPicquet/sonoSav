<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'number_invoice',
        'purchase_date',
        'category',
        'brand',
        'model',
        'serial_number',
        'breakdown',
        'exchange_type',
        'exchange_number_ticket',
        'price',
        'prioor_agreement',
        'rules_sav',
        'created_by_id'
    ];

    public function dateFormated(){
        return date_format($this->created_at, 'd/m/Y');
    }

    public function customerTicket()
    {
        // Il faut préciser en deuxième paramètre le nom du champs
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function userTicket()
    {
        // Il faut préciser en deuxième paramètre le nom du champs
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
