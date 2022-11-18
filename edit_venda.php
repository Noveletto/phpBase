<?php
    include 'connect.php';
    include 'checkLogin.php';
    $id = $_GET['id'];   
?>

<?php
     $s="select*from vendas where idVenda='$id'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 

<?php
     $p="select*from produtos where imagem='$f[imageProduto]'";
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
            <h1><?php echo $f['funcionario'];?> vendeu para <?php echo $f['nomeCliente'];?></br> no dia <?php echo $f['dataV'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Venda</li>
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
                <img src="<?php echo $f['imageProduto'];?>" class="profile-user-img img-fluid img-circle">
                </div>

                <h3 class="profile-username text-center"> <?php echo $pe['nome'];?></h3>

                <p class="text-muted text-center">Preço total R$<?php echo number_format($f['precoTotal'],2,",",".");?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nome do Cliente</b> <a class="float-right"><?php echo $f['nomeCliente'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telefone</b> <a class="float-right"><?php echo $f['telCliente'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Quantidade</b> <a class="float-right"><?php echo $f['quantidadeProduto'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Preço Unitário</b> <a class="float-right">R$<?php echo number_format($pe['preco'],2,",",".");?></a>
                  </li>
                  
                </ul>
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
