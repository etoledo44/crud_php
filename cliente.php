<?php
include 'conexao/conexao.php';
$id = $_GET['id'];
$conn = conexaoDB();
$query = 'SELECT * FROM clientes WHERE id = :id';
$stmt = $conn -> prepare($query);
$stmt ->bindParam('id', $id);
$stmt->execute();
$resultado = $stmt -> fetchAll();
foreach($resultado as $value);
?>

<?php
include 'includes/header.php'
?>
    <title>Atualizar</title>
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
    <h2>Atualizar cadastro</h2>
    <form action="actions/update.php" method="post">
    <div class='form-group mt-3'>
        <input type="hidden" name="id" value="<?php echo $value['id']?>">
        <input type="text" name="nome" placeholder="Nome" class='form-control' value="<?php echo $value['nome']?>">
        <input type="text" name="sobrenome" placeholder="Sobrenome" class='form-control' value="<?php echo $value['sobrenome']?>">
        <input type="email" name="email" placeholder="Email" class='form-control' value="<?php echo $value['email']?>">
        <input type="password" name="antigaSenha" placeholder="Senha antiga" class='form-control'>
        <input type="password" name="senha" placeholder="Senha nova" class='form-control'>
        <input type="submit" value="Salvar" class="btn btn-block btn-success mt-3">
    </div>
    </form>
    </div>

<?php
include 'includes/footer.php'
?>