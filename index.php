<?php
include 'includes/header.php';
?>
<title>Inicio - Listagem</title>
    <div class="container">
    <?php include 'includes/navbar.php' ?>
    <?php
    if(isset($_SESSION['mensagem'])) {
        ?>
        <div class="alert alert-info" role="alert">
            <?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?>
        </div>
        <?php
    }
    ?>
    <?php
        include 'conexao/conexao.php';
        $conn = conexaoDB();
        $sql = 'SELECT * FROM clientes';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll();

    ?>
    <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($resultado as $value){ ?>
      <a href="">
    <tr>
        <th scope="row"><?php echo $value['id'];?></th>
        <td><?php echo $value['nome'];?></td>
        <td><?php echo $value['sobrenome'];?></td>
        <td><?php echo $value['email'];?></td>
        <td>
          <a href="cliente.php?id=<?php echo $value['id']?>" class=' btn btn-sm btn-primary'>Editar</a>
          <a href="actions/delete.php?id=<?php echo $value['id']?>" class=' btn btn-sm btn-danger'>Deletar</a>
        </td>
    <?php } ?>
    </tr>
    </a>
  </tbody>
</table>
    </div>

<?php
include 'includes/footer.php'
?>