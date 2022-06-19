<?php

    $icones_id = 0;
    $nome = '';
    $descricao = '';
    $valor = 0;
    $img = '';
    $update = false;
    
    
    $servername = "localhost";
    $username = "id18872188_damas_backoffice";
    $password = "Z1R0J6m4e<1Y?F";
    $database = "id18872188_damas";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Método de INSERT 
    if ( isset($_POST['save']) ) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
        
        $conn->query("INSERT INTO Icones (nome, descricao, valor, img, plano_id)
        VALUES ('$nome', '$descricao', '$valor', '$img', '$plano_id') ") or die( $conn->error() );
        
        if($plano_id > 0) {
            $icones_id = $_POST['icones_id']+1;

            $conn->query("INSERT INTO Planos_Itens (fk_id_item, fk_id_plano, fk_nome_item, tipo_item)
            VALUES ('$icones_id', '$plano_id', '$nome', 'icone') ") or die( $conn->error() );
        }
        
        header("location: icones.php");
        
    } //Fim INSERT
    
    // Método de DELETE 
    if ( isset($_GET['delete']) ) {
        $icones_id = $_GET['delete'];
        
        $conn->query("DELETE FROM Icones WHERE icones_id=$icones_id") or die( $conn->error() );
        
        $conn->query("DELETE FROM Planos_Itens WHERE fk_id_item=$icones_id ") or die( $conn->error() );
        
        header("location: icones.php");
        
    } //Fim DELETE
    
    // Método de EDIT
    if ( isset($_GET['edit']) ) {
        $icones_id = $_GET['edit'];
        $update = true;
        
        $result = $conn->query("SELECT * FROM Icones WHERE icones_id=$icones_id") or die( $conn->error() );
      
        $row = $result->fetch_array();
        
        if( count( array ($result) ) == 1 ) {
            $icones_id = $row['icones_id'];
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $img = $row['img'];
            $plano_id = $row['plano_id'];
        }
        
        header("location: icones.php");
        
    }    //Fim EDIT
        
    // Método de UPDATE 
    if ( isset($_POST['update']) ) {
        $icones_id = $_POST['icones_id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
            
        $conn->query("UPDATE Icones 
        SET nome='$nome', descricao='$descricao', valor='$valor', img='$img', plano_id='$plano_id' 
        WHERE icones_id=$icones_id") or die( $conn->error() );
        
        if($plano_id > 0) {
            $conn->query("UPDATE Planos_Itens SET fk_nome_item='$nome' WHERE fk_id_item=$icones_id ") or die( $conn->error());
        }

        header("location: icones.php");
            
    } //Fim UPDATE