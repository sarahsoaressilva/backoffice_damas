<?php

    $servername = "localhost";
    $username = "root";
    $password = "dev@22";
    $database = "damas";
    
    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $database);
    
    $peca_id = 0;
    $update = false;
    $nome = '';
    $descricao = '';
    $valor = 0;
    $img = '';
    $plano_id = 0;
    
    if (isset($_POST['save'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
        
        $mysqli->query("INSERT INTO Pecas (nome, descricao, valor, img, plano_id) 
        VALUES('$nome',  '$descricao', '$valor', '$img', '$plano_id') ") or die($mysqli->error () );
        
        header("location: peças-crud.php");
        
        
    }
    
    if ( isset($_GET['delete']) ) {
        $peca_id = $_GET['delete'];
        $mysqli->query("DELETE FROM Pecas WHERE peca_id=$peca_id") or die($mysqli->error());
      
        //perguntar o pq ta dando erro aqui quando tenta deletar
        //CORRIGIDO
        
        header("location: peças-crud.php");
    }
    
    //CORRIGIDO
    //perguntar pq nao está indo para editar a peça
    if ( isset($_GET['edit']) ) {
        $peca_id = $_GET['edit'];
        
        $update = true;
        
        $result = $mysqli->query("SELECT * FROM Pecas WHERE peca_id=$peca_id") or die( $mysqli->error() );
        
        if ( count( array($result) ) == 1) {
            $row = $result->fetch_array();
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $img = $row['img'];
            $plano_id = $row['plano_id'];
        }
    
    }
    
    //CORRIGIDO
    //pergunta pq n ta fazendo update
    if ( isset($_POST['update']) ){
        $peca_id = $_POST['peca_id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $img = $_POST['img'];
        $plano_id = $_POST['plano_id'];
        
        $mysqli->query("UPDATE Pecas SET nome='$nome', descricao='$descricao', valor='$valor', img='$img', plano_id='$plano_id' WHERE peca_id=$peca_id") or die( $mysqli->error() );
        
        header("location: peças-crud.php");
    }