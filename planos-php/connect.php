<?php

    $plano_id = 0;
    $nome = '';
    $descricao = '';
    $tipo = '';
    $valor = 0;
    $update = false;
    
    $servername = "us-cdbr-east-05.cleardb.net";
    $username = "b83571dc6d5fc4";
    $password = "90ed83fc";
    $database = "heroku_8e53453ac7a4cef";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Método de INSERT 
    if ( isset($_POST['save']) ) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $tipo = $_POST['tipo'];
        $valor = $_POST['valor'];
        
        
        $conn->query("INSERT INTO Planos (nome, descricao, valor, tipo)
        VALUES ('$nome', '$descricao', $valor, '$tipo') ") or die( $conn->error() );
        
        header("location: planos.php");
        
    } //Fim INSERT
    
    // Método de DELETE 
    if ( isset($_GET['delete']) ) {
        $plano_id = $_GET['delete'];
        
        $conn->query("DELETE FROM Planos WHERE plano_id=$plano_id") or die( $conn->error() );
        
        $conn->query("DELETE FROM Planos_Itens WHERE fk_id_plano=$plano_id") or die( $conn->error() );
        
        header("location: planos.php");
        
    } //Fim DELETE
    
    // Método de EDIT
    if ( isset($_GET['edit']) ) {
        $plano_id = $_GET['edit'];
        $update = true;
        
        $result = $conn->query("SELECT * FROM Planos WHERE plano_id=$plano_id") or die( $conn->error() );
      
        $row = $result->fetch_array();
        
        if( count( array ($result) ) == 1 ) {
            $plano_id = $row['plano_id'];
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $tipo = $row['tipo'];
        }
        
        header("location: planos.php");
        
    }    //Fim EDIT
        
    // Método de UPDATE 
    if ( isset($_POST['update']) ) {
        $plano_id = $_POST['plano_id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo'];
            
        $conn->query("UPDATE Planos SET nome='$nome', descricao='$descricao', tipo='$tipo', valor=$valor WHERE
        plano_id=$plano_id") or die( $conn->error() );

        header("location: planos.php");
            
    } //Fim UPDATE
    
    
    
    
    
    
    
    
    
    // Ao apertar o botão Ver Itens, essa função é acionada.
    if ( isset($_GET['itens']) ) {
      $plano_id = $_GET['itens'];

      header("location: exibe.php");
      // ---------------------------------------- Tabuleiros
     
      
      $imprimir = " 
        <div class='container'>
           <h4> Tabuleiro </h4>
        <div class='row justify-content-center'>
          
          <div class='table-resposive'>
            <table class='table table-striped'>
              <thead>
                  <tr>
                      <th> Tab_Id </th>
                      <th> Nome do Tabuleiro </th>
                      <th> Descrição </th>
                      <th> Valor </th>
                      <th> Imagem </th>
                      <th> Plano_id </th>
                  </tr>
              </thead>
      ";

      echo $imprimir;

      // Consulta do Tabuleiro
      $sql = " SELECT * FROM tabuleiro WHERE plano_id=$plano_id";
      $result = $conn->query($sql) or die( $conn->error() );

      // Imprime dados do Tabuleiro
      echo '<br>';
      while( $row = $result->fetch_assoc() ) {

        $imprimir = "
          <tr>
            <td> $row[tab_id] </td>
            <td> $row[nome] </td>
            <td> $row[descricao] </td>
            <td> $row[valor] </td>
            <td> <img src='$row[img]' width='100' height='100'> </td>
            <td> $row[plano_id] </td>
          </tr>
        ";

        echo $imprimir;
      }

      $imprimir = '
          </table>
        </div> 
      </div>
      ';

      echo $imprimir;
      
      // ---------------------------------------- Peças
      $imprimir = " 
        <h4> Peças </h4>
        <div class='row justify-content-center'>
          
          <div class='table-resposive'>
            <table class='table table-striped'>
              <thead>
                  <tr>
                      <th> Peca_Id </th>
                      <th> Nome da Peça </th>
                      <th> Descrição </th>
                      <th> Valor </th>
                      <th> Imagem </th>
                      <th> Plano_id </th>
                  </tr>
              </thead>
      ";

      echo $imprimir;

      // Consulta das Peças
      $sql = " SELECT * FROM Pecas WHERE plano_id=$plano_id";
      $result = $conn->query($sql) or die( $conn->error() );

      echo '<br>';
      // Imprime dados do Tabuleiro
      while( $row = $result->fetch_assoc() ) {
        $imprimir = "
          <tr>
            <td> $row[peca_id] </td>
            <td> $row[nome] </td>
            <td> $row[descricao] </td>
            <td> $row[valor] </td>
            <td> <img src='$row[img]' width='100' height='100'> </td>
            <td> $row[plano_id] </td>
          </tr>
        ";

        echo $imprimir;
      }

      $imprimir = '
          </table>
        </div> 
      </div>
      ';

      echo $imprimir;

      // ---------------------------------------- Icones

      $imprimir = " 
        <h4> Icones </h4>
        <div class='row justify-content-center'>
          
          <div class='table-resposive'>
            <table class='table table-striped'>
              <thead>
                  <tr>
                      <th> Icon_Id </th>
                      <th> Nome do Icone </th>
                      <th> Descrição </th>
                      <th> Valor </th>
                      <th> Imagem </th>
                      <th> Plano_id </th>
                  </tr>
              </thead>
      ";

      echo $imprimir;

      // Consulta das Icones
      $sql = " SELECT * FROM Icones WHERE plano_id=$plano_id";
      $result = $conn->query($sql) or die( $conn->error() );

      echo '<br>';

      // Imprime dados dos Icones
      while( $row = $result->fetch_assoc() ) {
        $imprimir = "
          <tr>
            <td> $row[icones_id] </td>
            <td> $row[nome] </td>
            <td> $row[descricao] </td>
            <td> $row[valor] </td>
            <td> <img src='$row[img]' width='100' height='100'> </td>
            <td> $row[plano_id] </td>
          </tr>
        ";

        echo $imprimir;
      }

      $imprimir = '
          </table>
        </div> 
      </div>
      ';

      echo $imprimir;
    } 
  