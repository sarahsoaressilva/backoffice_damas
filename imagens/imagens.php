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
                        <a class="nav-link" href="imagens.php"> Icones </a>
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
            <input type='hidden' name='icones_id' value='<?php echo $fundo_id ?>' >
            
            <div class="form-group">
                <label> Nome do Icone </label>
                <input type="text" class="form-control form-control-sm" name="nome" 
                value="<?php echo $nome; ?>" placeholder="Icone Neymar">
            </div>
            
            <div class="form-group">
                <label> Descrição </label>
                <input type="text" class="form-control" name="descricao" 
                value="<?php echo $descricao; ?>" placeholder="Icone Neymar">
            </div>
            
            <div class="form-group">
                <label> Valor </label>
                <input type="number" step='0.01' class="form-control" name="valor" 
                value="<?php echo $valor; ?>" >
            </div> 
    
            <div class="form-group">
                <label> Link da Imagem </label>
                <input type="blob" class="form-control" 
                name="img" value="<?php echo $img; ?>" placeholder="https://..." >
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
      <div class="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th> Nome do Plano de Fundo </th>
              <th> Descrição </th>
              <th> Valor </th>
              <th> Imagem </th>
              <th> Id do Plano </th>
              <th> Ações </th>
            </tr>
          </thead>
    <?php
        $conn = new mysqli('us-cdbr-east-05.cleardb.net', 'b83571dc6d5fc4', 
            '90ed83fc', 'heroku_8e53453ac7a4cef');

        $result = $conn->query("SELECT * FROM imagens_fundo") or die( $conn->error() );
            
        while($row = $result->fetch_assoc() ): 
    ?>
    
      <tr>
        <td> <?php echo $row['nome']; ?> </td>
        <td> <?php echo $row['descricao']; ?> </td>
        <td> <?php echo $row['valor']; ?> </td>
        <td> <img src="<?php echo $row['img']; ?>" width="100" height="100"> </td>
        <td> <?php echo $row['plano_id']; ?> </td>
        <td> 
            <a href="imagens.php?edit=<?php echo $row['fundo_id']; ?>"
            class="btn btn-info"> Editar </a> 
            
            <a href="imagens.php?delete=<?php echo $row['fundo_id']; ?>"
            class="btn btn-danger"> Deletar </a> 
        </td>
      </tr> 
    <?php endwhile; ?>
        </table>
      </div>
      
    </div>
  </body>
</html>