<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="author" content="Alessandra Galvão"/>
        <title>Website Teste Desenvolvedor Jr</title>
        <link href="css/bootstrap.css" rel="stylesheet">		
    
        <link href="css/personalizado.css" rel="stylesheet">
    </head>
    
    <body > 
		<!-- Inicio Menu -->
        <nav class="navbar navbar-inverse navbar-static-top header-menu">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="imagens/logo2.png"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="contato.php">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Fim Menu -->
<div class="espaco-topo"></div>
<div class="panel-title1">FALE CONOSCO</div>

<div class="espaco-topo-cont">
    <div class="container">
          
           <div class='row'>
          <div class="col-sm-offset-1 col-md-12">
                      
             <form class="form-horizontal" method="post" action="envia_email.php" id="formulario">
                 <div id="mensagem" class=""></div>
                <div class="form-group">
                  
                   <div class="col-sm-10">
                       <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu Nome" required>
                   </div>
                </div>
                <div class="form-group">
                   
                   <div class="col-sm-10">
                       <input type="email" class="form-control" id="email" name="email" placeholder="Informe seu E-mail" required>
                   </div>
                </div>
                <div class="form-group">
                
                   <div class="col-sm-10">
                       <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Informe o Telefone" required>
                   </div>
                </div>
                <div class="form-group">
                   
                   <div class="col-sm-10">
                       <textarea class="form-control2" id='mensagem' name="mensagem"  placeholder="Digite sua mensagem" required></textarea>
                   </div>
                </div>
                <div class="form-group">
                   <div class="col-sm-offset-1 col-sm-10">
                       <input type="submit" class="btn btn-primary" name="enviar" value="Enviar E-mail">
                   </div>
                </div>
             </form>
          </div>
       </div>
      
    </div>
 </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
     <script src="jquery-2.1.4.min.js"></script>
       <script src="jquery.validate.min.js"></script>
       <script>
             $(function(){
                    $("#formulario").validate();
             });
       </script>
    <script>
        $(document).ready(function () {
 
            $('#formulario').submit(function() {
                var dados = $('#formulario').serialize();
 
                $.ajax({
                    type : 'POST',
                    url  : 'envia_email.php',
                    data : dados,
                    dataType: 'json',
                    success :  function(response){
                        $('#mensagem').css('display', 'block')
                            .removeClass()
                            .addClass(response.tipo)
                            .html('')
                            .html('<p>' + response.mensagem + '</p>');
                    }
                });
 
                return false;
            });
        });
    </script>
    <div>
    
    </div>
</body>
 <!-- footer content -->
       <?php include('rodape.php'); ?>
        <!-- /footer content -->  
</html>