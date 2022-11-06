<?php
    include 'connect.php';
    include 'checkLogin.php';
    $id = $_GET['id'];   
?>

<?php
     $s="select*from pedidos where id='$id'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 

<?php
     $p="select*from produtos where imagem='$f[image]'";
    $qu= mysqli_query($con, $p);
    $pe=mysqli_fetch_assoc($qu);
    ?> 


<?php include 'Components/head.php'; ?>

 <!-- Preloader -->
 <!--- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/LogoTransparente.png" alt="AdminLTELogo" height="300" width="300">
  </div> -->

  <!-- Navbar -->
  <?php include 'Components/navBar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <img src="<?php echo $f['image'];?>" class="profile-user-img img-fluid img-circle">
                </div>

                <h3 class="profile-username text-center"><?php echo $pe['nome'];?></h3>

                <p class="text-muted text-center">R$<?php echo number_format($pe['preco'],2,",",".");?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nome do Cliente</b> <a class="float-right"><?php echo $f['nome'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Endereço</b> <a class="float-right"><?php echo $f['endereco'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Estado</b> <a class="float-right"><?php echo $f['estado'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>País</b> <a class="float-right"><?php echo $f['pais'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>CEP</b> <a class="float-right"><?php echo $f['cep'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telefone</b> <a class="float-right"><?php echo $f['telefone'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $f['email'];?></a>
                  </li>
                </ul>

                <a href="delete_pedido.php?id=<?php echo $f['id']?>" class="btn btn-primary btn-block"><b>Concluir Compra</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- Footer -->
  <?php include 'Components/footer.php'; ?>
