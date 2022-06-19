<?php

    $tab_id = 0;
    $nome = '';
    $descricao = '';
    $valor = 0;
    $img = '';
    $plano_id = 0;
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
        
        //Realiza INSERT das informações na tabela.
        $conn->query("INSERT INTO Tabuleiro (nome, descricao, valor, img, plano_id)
        VALUES ('$nome', '$descricao', '$valor', '$img', '$plano_id') ") or die( $conn->error() );
        
       
        
        header("location: tabuleiro.php");
        
    } //Fim INSERT
    
    // Método de DELETE 
    if ( isset($_GET['delete']) ) {
        $tab_id = $_GET['delete'];
        
        $conn->query("DELETE FROM Tabuleiro WHERE tab_id=$tab_id") or die( $conn->error() );
        
        header("location: tabuleiro.php");
        
    } //Fim DELETE
    
    // Método de EDIT
    if ( isset($_GET['edit']) ) {
        $tab_id = $_GET['edit'];
        
        $update = true;
        
        $result = $conn->query("SELECT * FROM Tabuleiro WHERE tab_id=$tab_id") or die( $conn->error() );
      
        $row = $result->fetch_array();
        
        if( count( array ($result) ) == 1 ) {
            $tab_id = $row['tab_id'];
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $img = $row['img'];
            $plano_id = $row['plano_id'];
        }
        
        header("location: tabuleiro.php");
        
    }    //Fim EDIT
        
    // Método de UPDATE 
    if ( isset($_POST['update']) ) {
        $tab_id = $_POST['tab_id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
            
        $conn->query("UPDATE Tabuleiro SET nome='$nome', descricao='$descricao', valor='$valor', img='$img', plano_id='$plano_id' WHERE tab_id=$tab_id") or die( $conn->error() );
      
        
        header("location: tabuleiro.php");
            
    } //Fim UPDATE
        