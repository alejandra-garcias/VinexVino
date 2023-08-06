<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests\BarRequest;


class BarController extends Controller
{   /*
    private static $bares= [
        [1,"Le Vignoble Parisien","Parisian elegance and select wines in harmony."],
        [2, "Il Barolo D'Oro","Parisian elegance and select wines in harmony."],
        [3,"Le Bistro du Vin","French charm, oenological delight."],
        [4,"La Toscana Vinoteca","French charm, oenological delight."],
        [5,"Le Cellier Romantique","Love and wines in a corner."],
        [6,"Vinoteca Éclat","Brilliant selection, exquisite delight."],
        [7,"VinoVerso","Verses of wine, shared passion."],
        [8,"Vinópolis","City of wines, discover its essence."],
        [9,"El Rincón de los Sentidos","Captivating flavors, emotions in wines."],
        [10, "El Sabor del Terroir", "Essence of the land."],
        [11,"Cava del Ocaso", "Sunset and wines."],
        [12,"Vinoteca Euforia","Euphoria in glasses."]

    ];*/

    function index (Request $request){
       $bares = DB::table('bars')->get();//get encuentra esa tabla
        return view ('bars.index',compact('bares'));//["bares" =>$bares]);
    }
    public function show($id){

    /* 
        $aux = -1;
        $i=0;
       // dd($bares[$i]);
        while (($aux<0) && ($i < count(self ::$bares))){
            if ($id ==self ::$bares[$i][0]){
                $aux=$i;
            }
            $i++;
        }
    */
    $bar =DB::table('bars')->find($id);//find busca por id

    if ($bar == null){
    return redirect ()-> route ('bars.index')->with('code','304')->with('message',"Sorry, we couldn't find that bar, try something different.");
        }
    
        return view ('bars.show',compact('bar'));//["bar" => $bar]); ESTO SE USARIA SI LA CLAVES NO FUERAN IGUAL
    }


    //CREAR BAR
    public function create(){
        return view ('bars.create');
    }


    //GUARDAR BAR
    public function store(BarRequest $request){


        DB::table('bars')->insert(['name'=>$request->name,'description'=>$request->description]);//pide un array asociativo, hay que añadir los nombres de las columnas
        return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Congratulations! Your bar was uploaded successfully.");
    }


    //MODIFICAR
    public function edit($id){
        $bar =DB::table('bars')->find($id);
        if ($bar == null){
            return redirect ()-> route ('bars.index')->with('code','304')->with('message',"Sorry, we couldn't find that bar, try something different.");
    }
    return view('bars.edit', compact('bar'));
}
    public function update(BarRequest $request, $id){
        DB::table('bars')->where ('id',$id) ->update(['name' => $request -> name,'description' => $request -> description]);

        return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Congratulations! Your info was updated successfully.");

    }

    //BORRAR
    public function delete ($id){
        DB::table('bars')->delete($id);
        return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Your bar was deleted successfully.");
    }
}
