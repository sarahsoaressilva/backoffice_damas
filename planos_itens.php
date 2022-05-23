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

  </head>
  <body>

   <!-- CONEXÃO PHP -->
   <?php require_once 'connect.php'; ?>
      
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
                    <li class="nav-item">
                        <a class="nav-link" href="/peças-php/peças-crud.php"> Peças </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/icones-php/icones.php"> Icones </a>
                    </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="/planos-php/planos.php"> Planos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/show-db/show-db.php"> Planos_Itens </a>
                    </li>
                </ul>
            </div>
    </nav>

    <br>

    
    <!-- CODIGOS JAVASCRIPT DO BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
  </body>
</html>