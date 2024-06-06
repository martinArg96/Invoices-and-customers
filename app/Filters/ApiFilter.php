<?php
namespace App\Filters;
use Illuminate\Http\Request;


class ApiFilter{
    protected $safeParameters = [

    ];//sirve para que no se pueda filtrar por los campos que se encuentran en este array
    protected $columnMap = [];
    protected $operatorMap = []; 
    
    
    
    public function transform(Request $request){
        $eloQuery = [];
        foreach($this->safeParameters as $param => $operators){
            $query = $request->query($param);
            if(!isset($query)){
                continue;
            }
            $colum = $this->columnMap[$param] ?? $param;
            foreach($operators as $operator ){
                if(isset($query[$operator])){
                    $eloQuery[] = [$colum, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }


    
}



