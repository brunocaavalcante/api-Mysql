<?php
use config;

header('content-type:application/json');

$actionName = $_POST["actionName"];

    if($actionName == "selectPost"){
        //Fazendo consulta no banco
        $query = "SELECT * FROM usuarios";
        //Atribuindo o resltado da consulta na variavel
        $result = mysqli_query($con, $query);
        //Contando quantas linhas foram retornadas
        $rowCount = mysqli_num_rows($result);

        if($rowCount > 0){
            //Declarando a Variavel que Receberá os Dados
            $postData = array();
            while($row = mysqli_fetch_assoc($result)){
                $postData[] = $row;
            }
            $resultData = array('status'=> true, 'postData' => $postData);

        }else{
            $resultData = array('status'=> false, 'messagem' => 'Erro ao fazer a busca');
        }

        echo json_encode($resultData);
    }
?>