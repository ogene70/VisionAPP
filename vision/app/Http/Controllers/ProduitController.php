<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class ProduitController extends Controller
{
    public function ListProduits(ProduitRequest $request 
    ){
        if (empty($request->search)) {
            $data = Produit::get();
            return response()->json(["datas" => "$data"], 200);
         } else {
            $data = Produit::with('produits')->where('nom','like', '%' . $request->search . '%')->get();
            return response()->json($data,200);
         }
    }
    public function CreateProduit(ProduitRequest $request){
        $NewProd= new Produit();
        $NewProd->id=$request->id;
        $nom=$NewProd->nom=$request->nom;
        $NewProd->type=$request->type;
        $NewProd->categorie=$request->categorie;
        $NewProd->user_id=$request->user_id;
        $verif= Produit::where("nom", "=" ,"$nom")->get();
        if($verif==true){
            $NewProd->save();
            return response()->json(["message"=>"ce produit a été crée avec succèes"],201);

        }else{
            return response()->json(["message"=>"ce produit existe déjà"],401);
        }

    }
   public  function UpdateProduit(ProduitRequest $request){
    
        $Produit=Produit::find($request->id);
        if($Produit==true){
            $Produit->nom=$request->nom;
            $Produit->type=$request->type;
            $Produit->categorie=$request->categorie;
            $Produit->user_id=$request->user;
            $ok=$Produit->save();
            if ($ok) {
                return response()->json(["message"=>"produit "+$request->id+" modifié avec succès"],200);
            }
        }else{
            return response()->json(["message"=>"ce produit n'existe pas"],404);
        }
    }
    public function DeleteProduit(ProduitRequest $request){
        $Produit=Produit::find($request->id);
        $ok=$Produit->delete();
        
        if ($ok) {
            return response()->json(["message"=>"le produit"." ".$request->id."a été supprimé avec succès"],404);
        }else{
            return response()->json(["message"=>"ce produit n'existe pas,erreur de supression"],404);

        }

    }
}
