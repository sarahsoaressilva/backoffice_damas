<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <?php require_once 'process.php'; ?>
    <title>Backoffice</title>
    
  </head>
  <body>
      
       <!-- BARRA DE NAVEGAÇÃO -->
    <nav class="navbar stick-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Back Office</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tabuleiro-php/tabuleiro.php"> Tabuleiro </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/peças-php/peças-crud.php"> Peças </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/imagens/imagens.php"> Imagens </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/planos-php/planos.php"> Planos </a>
                    </li>
                 
                </ul>
            </div>
    </nav> 
      
      
    <br>
    <br>  
      
      
    <div class="container">
        <div class="row align-items-start">
        <form action="process.php" method="POST">
          <input type="hidden" name="peca_id" value="<?php echo $peca_id; ?>">
          
          <div class="form-group">
          <label> Nome da Peça </label>
          <input type="text" name="nome" class="form-control" 
                 value="<?php echo $nome; ?>" placeholder="Insira o nome">
          </div>
          <div class="form-group">
          <label> Descrição da Peça </label>
          <input type="text" name="descricao" class="form-control" 
                 value="<?php echo $descricao; ?>" placeholder="Inserir descrição">
          </div>
          <div class="form-group">
          <label> Valor da Peça </label>
          <input type="number" name="valor" class="form-control"
                 value="<?php echo $valor; ?>" placeholder="Valor">
          </div>
          <div class="form-group">
          <label> Link da Imagem da Peça </label>
          <input type="text" name="img" class="form-control" 
                 value="<?php echo $img; ?>" placeholder="Inserir link da imagem">
          </div>
          
          <div class="form-group">
                <label> Id do Plano </label>
                <input type="number" class="form-control" name="plano_id" 
                value="<?php echo $plano_id; ?>" >
          </div> 
          
          
          <div class="form-group">
          <?php 
          if ($update == true):
          ?>
            <button type="submit" class="btn btn-info" name="update"> Editar </button>
          <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save"> Salvar </button>
          <?php endif; ?>
          </div>
        </form>
    </div>
        
    <div class="container">        
        <div class="row justify-content-center">
            <table class="table">
                <thread>
                    <tr>
                        <th> Nome da peça </th>
                        <th> Descrição </th>
                        <th> Valor  </th>
                        <th> Link da imagem </th>
                        <th> Id do Plano </th>
                        <th> Ação </th>
                    </tr>
                </thread>
                
            <?php
                $conn = new mysqli('us-cdbr-east-05.cleardb.net', 'b83571dc6d5fc4', 
                '90ed83fc', 'heroku_8e53453ac7a4cef');

                $result = $mysqli->query("SELECT * FROM pecas") or die($mysqli->error);
                //pre_r($result);
                
                while ($row = $result->fetch_assoc() ): 
                
            ?>
                    <tr>
                        <td><?php echo $row['nome']; ?> </td>
                        <td><?php echo $row['descricao']; ?> </td>
                        <td><?php echo $row['valor']; ?> </td>
                        <td> <img src="<?php echo $row['img']; ?>" width="100" height="100">  </td>
                        <td><?php echo $row['plano_id']; ?></td>
                        <td>
                            <a href="peças-crud.php?edit=<?php echo $row['peca_id']; ?> " 
                            class="btn btn-info">Editar</a>
                            
                            <a href="peças-crud.php?delete=<?php echo $row['peca_id']; ?>" 
                            class="btn btn-danger">Deletar</a>
                        </td>
                    </tr>
            <?php endwhile; ?>
            </table>
        </div>
    </div>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>