<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit_contrat extends Model
{
    use HasFactory;

    public function Contrat(){
        return $this->belongsTo(Contrat::class);
    }
}
