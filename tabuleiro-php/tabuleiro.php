<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CONEXÃO PHP -->
    <?php require_once 'connect.php'; ?>  
    <title> Backoffice </title>
    
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
                    <li class="nav-item active">
                        <a class="nav-link" href="tabuleiro.php"> Tabuleiro </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/peças-php/peças-crud.php"> Peças </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/icones-php/icones.php"> Icones </a>
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
            <input type='hidden' name='tab_id' value="<?php echo $tab_id; ?> " >
            <div class="form-group">
                <label> Nome do Tabuleiro </label>
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
                placeholder="0"
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
                <button type="submit" class="btn btn-info" name="update"> Editar </button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save"> Salvar </button>
            <?php endif; ?>   
            </div>
        </form>
    </div> 


    <br>
    <br>
 
    <!-- AREA DE EXIBIÇÃO DA TABELA DO BANCO DE DADOS -->
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
            <thead>
                <tr>
                <th> Nome do Tabuleiro </th>
                <th> Descrição </th>
                <th> Valor (R$) </th>
                <th> Imagem </th>
                <th> Id do Plano </th>
                <th> Ações </th>
                </tr>
            </thead>
        
        <?php
        $conn = new mysqli('us-cdbr-east-05.cleardb.net', 'b83571dc6d5fc4', 
        '90ed83fc', 'heroku_8e53453ac7a4cef');
        
        $result = $conn->query("SELECT * FROM tabuleiro") or die( $conn->error() );

        while($row = $result->fetch_assoc() ): 
        
        ?>
        <tr>
            <td> <?php echo $row['nome']; ?> </td>
            <td> <?php echo $row['descricao']; ?> </td>
            <td> <?php echo $row['valor']; ?> </td>
            <td> <img src="<?php echo $row['img']; ?>" width="100" height="100"> </td>
            <td> <?php echo $row['plano_id']; ?> </td>
            <td> 
                <a href="tabuleiro.php?edit=<?php echo $row['tab_id']; ?>"
                class="btn btn-info"> 
                Editar 
                </a> 

                <a href="tabuleiro.php?delete=<?php echo $row['tab_id']; ?>" class="btn btn-danger" > Deletar </a> 
                
            </td>
        </tr> 
        <?php endwhile; ?>

        </table>
      </div>
    </div>
    
    <!-- CODIGOS JAVASCRIPT DO BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
  </body>
</html>