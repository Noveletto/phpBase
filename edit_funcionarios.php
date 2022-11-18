<?php
    include 'connect.php';
    include 'checkLogin.php';
    $id = $_GET['id'];   
?>

<?php
     $s="select*from funcionarios where idFuncionario ='$id'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

    $totalVEN = "SELECT sum(precoTotal) as valor_vendas from vendas where funcionario = '$f[NomeFuncionario]'";
    $tpr= mysqli_query($con,$totalVEN);
    $t=mysqli_fetch_assoc($tpr);


    

    
    ?> 

<?php
$tv="select count(*) as total_produtos from vendas where funcionario = '$f[NomeFuncionario]'";
$tvf=mysqli_query($con,$tv);
$vpf=mysqli_fetch_assoc($tvf);
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
            <h1><?php echo $f['NomeFuncionario'];?> fez <?php echo $vpf['total_produtos'];?> vendas no mês</h1>
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
                

                <h3 class="profile-username text-center"> <?php echo $f['NomeFuncionario'];?></h3>

                <p class="text-muted text-center">Valor total das vendas: R$<?php echo number_format($t['valor_vendas'],2,",",".");?></p>
                <?php
$totalCLI = "SELECT dataV, nomeProduto, nomeCliente, precoTotal,quantidadeProduto from vendas where funcionario = '$f[NomeFuncionario]'";
$tcl= mysqli_query($con,$totalCLI);
while($tc=  mysqli_fetch_assoc($tcl)){
    ?>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nome do Cliente</b> <a class="float-right"><?php echo $tc['nomeCliente'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Produto Vendido</b> <a class="float-right"><?php echo $tc['nomeProduto'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Quantidade do Produto</b> <a class="float-right"><?php echo $tc['quantidadeProduto'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Data da Venda</b> <a class="float-right"><?php echo $tc['dataV'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Preço pago pelo Cliente</b> <a class="float-right">R$<?php echo number_format($tc['precoTotal'],2,",",".");?></a>
                  </li>
                  
                </ul> ---------------------------------------------------------------------
                <?php } ?>
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
