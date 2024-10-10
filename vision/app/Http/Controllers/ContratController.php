<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContratDeleteRequest;
use App\Models\Contrat;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContratSearchRequest;
use App\Http\Requests\ContratRequest;
use App\Http\Requests\ContratUpdateRequest;
use App\Models\Produit_contrat;

class ContratController extends Controller
{

    public function ListContrats(ContratSearchRequest $request){
        if (empty($request->search)) {
            $data = Contrat::with('produits')->get();
            return response()->json(["datas" => "$data"], 200);
         } else {
            $data = Contrat::with('produits')->where('num_contrat','like', '%' . $request->search . '%')->get();
            return response()->json($data,200);
         }
    }    
    public function CreateContrats(ContratRequest $request){
    
        $Newcontrat= new Contrat();
        $idc=$Newcontrat->id=Contrat::max('id')+1;
        $Newcontrat->valeur_totale=$request->valeur_totale;
        $Newcontrat->num_contrat=$request->num_contrat;
        $Newcontrat->nom_client=$request->nom_client;
        $Newcontrat->prenom_client=$request->prenom_client;
        $Newcontrat->categorie=$request->categorie;
        $Newcontrat->user_id=Auth::user()->id;
        $ok=$Newcontrat->save();
        $listeP=$request->Produit;

        foreach ($listeP as $prod) {
            $ContratProduit=new Produit_contrat();
        $ContratProduit->id=Produit_contrat::max("id")+1;
        $ContratProduit->nom_produit =$prod['nom_produit'];
        $ContratProduit->prix = $prod['prix'];
        $ContratProduit->type = $prod['type'];
        $ContratProduit->contrat_id=$idc;
        $ok2=$ContratProduit->save();
            
        }
        
    $data=Produit_contrat::where('contrat_id','=',$idc)->get();
    
        if($ok&&$ok2){
            return response()->json(["datas" =>["infos_contrat"=>$Newcontrat,"produit_contrat"=>$data]], 200);
        }
    
    }
    public function UpdateContrats(ContratUpdateRequest $request){

        $ToUpdatecontrat=Contrat::find($request->id);
        if (empty($request->valeur_totale)==false) {
            $ToUpdatecontrat->valeur_totale=$request->valeur_totale;
        }
        if (empty($request->num_contrat)==false) {
            $ToUpdatecontrat->num_contrat=$request->num_contrat;
                }   
        if (empty($request->nom_client)==false) {
            $ToUpdatecontrat->nom_client=$request->nom_client;
        }
        if (empty($request->prenom_client)==false) {
            $ToUpdatecontrat->prenom_client=$request->prenom_client;
        }
        if (empty($request->categorie)==false) {
            $ToUpdatecontrat->categorie=$request->categorie;
        }
        $ToUpdatecontrat->user_id=Auth::user()->id;
        // $ToUpdatecontrat->updated_at= date('Y-m-d H:i:s');
        $ok=$ToUpdatecontrat->save();

        $listeP=$request->Produit;
        
        foreach ($listeP as $prod) {
            $ContratProduit=Produit_contrat::find($prod["id"]);
        $ContratProduit->nom_produit =$prod['nom_produit'];
        $ContratProduit->prix = $prod['prix'];
        $ContratProduit->type = $prod['type'];
        $ContratProduit->contrat_id=$request->id;
        $ok2=$ContratProduit->save();
            
        }
        $data=Produit_contrat::where('contrat_id','=',$request->id)->get();
    
        if($ok&&$ok2){

            return response()->json(["message"=>"Contrat modifié avec succès","datas" =>["infos_contrat"=>$ToUpdatecontrat,"produit"=>$data]], 200);
        } 
       }




    public function DeleteContrats(ContratDeleteRequest $request){

        $ToDeleteProdContrat=Produit_contrat::where("contrat_id","=",$request->id)->get();

    foreach ($ToDeleteProdContrat as $prod) {
        $prod->delete();
        
    }
        $ToDeleteContrat=Contrat::find($request->id);
        $ToDeleteContrat->delete();
        $data=["contrat_deleted"=>$ToDeleteContrat,"prods_contrat_deleted"=>$ToDeleteProdContrat];
        return response()->json(["message"=>"Contrat supprimé avec succès","datas" =>$data]);
    }
}
