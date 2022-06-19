<?php

    $servername = "us-cdbr-east-05.cleardb.net";
    $username = "b83571dc6d5fc4";
    $password = "90ed83fc";
    $database = "heroku_8e53453ac7a4cef";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    $tab_id = 0;
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
        
        //Realiza INSERT das informações na tabela.
        $conn->query("INSERT INTO tabuleiro (nome, descricao, valor, img, plano_id)
        VALUES ('$nome', '$descricao', '$valor', '$img', '$plano_id') ") or die( $conn->error() );
        
        header("location: tabuleiro.php");
        
    } //Fim INSERT
    
    // Método de DELETE 
    if ( isset($_GET['delete']) ) {
        $tab_id = $_GET['delete'];
        
        $conn->query("DELETE FROM tabuleiro WHERE tab_id=$tab_id") or die( $conn->error() );
        
        header("location: tabuleiro.php");
        
    } //Fim DELETE
    
    // Método de EDIT
    if ( isset($_GET['edit']) ) {
        $tab_id = $_GET['edit'];
        
        $update = true;
        
        $result = $conn->query("SELECT * FROM tabuleiro WHERE tab_id=$tab_id") or die( $conn->error() );
        
        if( count( array ($result) ) == 1 ) {
            $row = $result->fetch_array();
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $img = $row['img'];
            $plano_id = $row['plano_id'];
        }
        
        //header("location: tabuleiro.php");
        
    }    //Fim EDIT
        
    // Método de UPDATE 
    if ( isset($_POST['update']) ) {
        $tab_id = $_POST['tab_id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
            
        $conn->query("UPDATE tabuleiro SET nome='$nome', descricao='$descricao', valor='$valor', img='$img', plano_id='$plano_id' WHERE tab_id=$tab_id") or die( $conn->error() );
      
        
        header("location: tabuleiro.php");
            
    } //Fim UPDATE
        