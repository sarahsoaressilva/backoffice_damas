<?php

    $servername = "us-cdbr-east-05.cleardb.net";
    $username = "b83571dc6d5fc4";
    $password = "90ed83fc";
    $database = "heroku_8e53453ac7a4cef";
        
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
        
        if($plano_id > 0) {
           $mysqli->query("INSERT INTO Planos_Itens (fk_id_item, fk_id_plano, fk_nome_item, tipo_item)
            VALUES ('$peca_id', '$plano_id', '$nome', 'peça') ") or die( $mysqli->error() );
        }
        
        header("location: peças-crud.php");
        
        
    }
    
    if ( isset($_GET['delete']) ) {
        $peca_id = $_GET['delete'];
        $mysqli->query("DELETE FROM Pecas WHERE peca_id=$peca_id") or die($mysqli->error());
        
        $mysqli->query("DELETE FROM Planos_Itens WHERE fk_id_item=$peca_id ") or die( $mysqli->error() );
        
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
        
        if($plano_id > 0) {
            $mysqli->query("UPDATE Planos_Itens SET fk_nome_item='$nome' WHERE fk_id_item=$peca_id ") 
            or die( $mysqli->error() );
        }
        
        header("location: peças-crud.php");
    }