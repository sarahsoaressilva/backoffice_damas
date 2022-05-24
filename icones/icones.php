<!doctype html>
<html lang="en">
        <title>Backoffice</title>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CONEXÃO PHP -->
    <?php require_once 'connect.php'; ?>  

  </head>
  <body>
      
    <!-- BARRA DE NAVEGAÇÃO -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
        <a class="navbar-brand" href="#"> Back Office </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tabuleiro-php/tabuleiro.php"> Tabuleiro </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/peças-php/peças-crud.php"> Peças </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="icones.php"> Icones </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/planos-php/planos.php"> Planos </a>
                    </li>
                 
                </ul>
            </div>
    </nav>   
    
    <br>
    <br>
    
    <!-- FORMULÁRIO -->
    <div class="container">
        <div class="row align-items-start">
            
        <form action="connect.php" method="POST">
            <input type='hidden' name='icones_id' value='<?php echo $icones_id ?>' >
            
            <div class="form-group">
                <label> Nome do Icone </label>
                <input type="text" class="form-control form-control-sm" name="nome" 
                value="<?php echo $nome; ?>" >
            </div>
            
            <div class="form-group">
                <label> Descrição </label>
                <input type="text" class="form-control" name="descricao" 
                value="<?php echo $descricao; ?>" >
            </div>
            
            <div class="form-group">
                <label> Valor </label>
                <input type="number" step='0.01' class="form-control" name="valor" 
                value="<?php echo $valor; ?>" >
            </div> 
    
            <div class="form-group">
                <label> Link da Imagem </label>
                <input type="blob" class="form-control" 
                name="img" value="<?php echo $img; ?>" >
            </div>
            
            <div class="form-group">
                <label> Id do Plano </label>
                <input type="number" class="form-control" name="plano_id"
                value="<?php echo $plano_id; ?>" >
            </div> 
    
            <div class="form-group">
                
            <?php
            if($update == true):
            ?>
                <button type="submit" name="update" class="btn btn-info"> Editar </button>
            <?php else: ?>
                <button type="submit" name="save" class="btn btn-primary"> Salvar </button>
            <?php endif; ?>
            
            </div>
        </form>
        </div> 
    </div>
    
    <br>
    <br>
    
    <!-- AREA DE MENSAGEM -->
 
    <!-- AREA DE EXIBIÇÃO DO BANCO DE DADOS -->
    <div class="container">
    <?php
      $conn = new mysqli('localhost', 'root', 
      'dev@22', 'damas');;
      
      $result = $conn->query("SELECT * FROM Icones") or die( $conn->error() );
    ?>
     <div class="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th> Id do Icone </th>
              <th> Nome do Icone </th>
              <th> Descrição </th>
              <th> Valor (R$) </th>
              <th> Imagem </th>
              <th> Id do Plano </th>
              <th> Ações </th>
            </tr>
          </thead>
    <?php
      while($row = $result->fetch_assoc() ): ?>
      <tr>
        <td> <?php echo $row['icones_id']; ?> </td>
        <td> <?php echo $row['nome']; ?> </td>
        <td> <?php echo $row['descricao']; ?> </td>
        <td> <?php echo $row['valor']; ?> </td>
        <td> <img src="<?php echo $row['img']; ?>" width="100" height="100"> </td>
        <td> <?php echo $row['plano_id']; ?> </td>
        <td> 
            <a href="icones.php?edit=<?php echo $row['icones_id']; ?>"
            class="btn btn-info"> Editar </a> 
            
            <a href="icones.php?delete=<?php echo $row['icones_id']; ?>"
            class="btn btn-danger"> Deletar </a> 
        </td>
      </tr> 
    <?php endwhile; ?>
        </table>
      </div>
      
    </div>
  </body>
</html>