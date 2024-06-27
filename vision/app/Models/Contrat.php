<?php

namespace App\Models;

use App\Http\Requests\ContratRequest;
use App\Http\Requests\ContratSearchRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contrat extends Model
{
    use HasFactory;
    public function user(){
       return $this->belongsTo(User::class) ;
    }
    public function produits(){
        return $this->hasMany(Produit_contrat::class);
    }


}
