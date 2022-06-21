<?php

    $servername = "us-cdbr-east-05.cleardb.net";
    $username = "b83571dc6d5fc4";
    $password = "90ed83fc";
    $database = "heroku_8e53453ac7a4cef";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    $fundo_id = 0;
    $valor = 0;
    $plano_id = 0;
    $update = false;

    // Método de INSERT 
    if ( isset($_POST['save']) ) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
        
        $conn->query("INSERT INTO imagens_fundo (nome, descricao, valor, img, plano_id)
        VALUES ('$nome', '$descricao', '$valor', '$img', '$plano_id') ") or die( $conn->error() );
        
        header("location: imagens.php");
        
    } //Fim INSERT
    
    // Método de DELETE 
    if ( isset($_GET['delete']) ) {
        $fundo_id = $_GET['delete'];
        
        $conn->query("DELETE FROM imagens_fundo WHERE fundo_id=$fundo_id") or die( $conn->error() );
                
        header("location: imagens.php");
        
    } //Fim DELETE
    
    // Método de EDIT
    if ( isset($_GET['edit']) ) {
        $fundo_id = $_GET['edit'];
        $update = true;
        
        $result = $conn->query("SELECT * FROM imagens_fundo WHERE fundo_id=$fundo_id") or die( $conn->error() );
      
        if( count( array ($result) ) == 1 ) {
            $row = $result->fetch_array();
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $img = $row['img'];
            $plano_id = $row['plano_id'];
        }
        
        
    }    //Fim EDIT
        
    // Método de UPDATE 
    if ( isset($_POST['update']) ) {
        $fundo_id = $_POST['fundo_id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
            
        $conn->query("UPDATE imagens_fundo 
        SET nome='$nome', descricao='$descricao', valor='$valor', img='$img', plano_id='$plano_id' 
        WHERE fundo_id=$fundo_id") or die( $conn->error() );
        
        header("location: imagens.php");
            
    } //Fim UPDATE