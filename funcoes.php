<?php

function formatar_data($data){
    if(!empty($data)){
        return $data= implode("/",array_reverse( explode("-",$data)));}
            else{
            return $data = "Nao cadastrada";};
            }

  function formatar__telefone($telefone){
   
if(empty($telefone)){
    return $telefone  ="nao registrado";
}else{
        // 0 1 2 3 4 5 6 7 8 9 10 11 12 13
        // ( 1 3 ) 9 8 8 4 9 - 1  2  9  1  
           if(strlen($telefone) == 13){
           //ira retornar normalmente pois "parece" que usaram com "()" e "-"
               return $telefone;}
   
               //aqui verifica se o tamanho é 11 e coloca os simbolos necessarios para melhor visualização
               if(strlen($telefone) == 11){
           $ddd= substr($telefone,0,2);
           $parte1=substr($telefone,2,5);
           $parte2= substr($telefone,7);
    return $telefone ="($ddd)$parte1-$parte2";
}}}

function limpartexto($str){
    return preg_replace("/[^0-9]/","",$str);};
    
?>