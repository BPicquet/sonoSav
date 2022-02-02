<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function dateFormated(){
        return date_format($this->created_at, 'd/m/Y');
    }

    public function ticketState()
    {
        return $this->hasMany(Ticket::class);
    }
}
