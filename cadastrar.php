<?php
include 'includes/header.php'
?>
<title>Cadastro</title>
    <div class="container">
    <?php
        include 'includes/navbar.php'
    ?>
    <?php
    if(isset($_SESSION['mensagem'])) {
        ?>
        <div class="alert alert-info" role="alert">
            <?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?>
        </div>
        <?php
    }
    ?>
    
    <form action="actions/create.php" method="POST" id="form_cliente" class="form">
    <h2>Cadastrar novo cliente</h2>
    <div class='form-group mt-3'>
        <input type="text" name="nome" placeholder="Nome" class='form-control' required>
        <input type="text" name="sobrenome" placeholder="Sobrenome" class='form-control' required>
        <input type="email" name="email" placeholder="Email" class='form-control' required>
        <input type="password" name="senha" placeholder="Senha" class='form-control' required >
        <input type="submit" value="Salvar" class="btn btn-block btn-success mt-3">
    </div>
    </form>
    </div>

    <script>
        $("#form_cliente").validate({
            rules : {
                nome:{
                    required:true,
                    minlength:3
                },
                sobrenome:{
                    required: true,
                    minlength:3
                },
                email:{
                    required:true
                },
                senha:{
                    required: true,
                    maxlength: 6
                }                              
            },
            messages:{
                nome:{
                    required:"Acho que você esqueceu seu nome",
                    minlength:"O nome deve ter pelo menos 3 caracteres"
                },
                sobrenome:{
                    required:'Não esqueça seu sobrenome'
                },
                email:{
                    required:"É necessário informar um email"
                },
                senha:{
                    required: 'Você não pode esquecer da senha',
                    maxlength: 'A senha não pode passar de 6'
                }
            }
        });
    </script>
<?php
include 'includes/footer.php'
?>