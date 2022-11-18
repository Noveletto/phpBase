<?php
    include 'connect.php';
    include 'checkLogin.php';
    $s="select*from reg where id=1";
    $totalREG="select count(*) as total_registro from regclientestcc";
    $totalPRO="select count(*) as total_produtos from produtos";
    $totalPED="select count(*) as total_produtos from pedidos";
    $totalVEN="select count(*) as total_produtos from vendas";
    $totalFUN="select count(*) as total_produtos from funcionarios";
    $totalPRE = "SELECT sum(estoque * preco) as valor_vendas from produtos";
    $qu= mysqli_query($con, $s);
    $tr= mysqli_query($con,$totalREG);
    $f=mysqli_fetch_assoc($qu);
    $g=mysqli_fetch_assoc($tr);
    $tp= mysqli_query($con,$totalPRO);
    $p=mysqli_fetch_assoc($tp);
    $tpr= mysqli_query($con,$totalPRE);
    $t=mysqli_fetch_assoc($tpr);
    $tpe= mysqli_query($con,$totalPED);
    $tped=mysqli_fetch_assoc($tpe);
    $tve= mysqli_query($con,$totalVEN);
    $tven=mysqli_fetch_assoc($tve);
    $tf= mysqli_query($con,$totalFUN);
    $tfun=mysqli_fetch_assoc($tf);
    
?>

<?php include 'Components/head.php'; ?>

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/LogoTransparente.png" alt="AdminLTELogo" height="300" width="300">
  </div> 

  <!-- Navbar -->
  <?php include 'Components/navBar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'Components/mainSidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $p["total_produtos"] ?></h3>

                <p>Produtos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="totalProdutos.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><sup style="font-size: 20px">R$</sup><?php echo number_format($t["valor_vendas"],2,",",".");?></h3>

                <p>Total em estoque</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="./relatorio/gerar_pdf.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $g["total_registro"] ?></h3>

                <p>Usuários Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="totalUsuarios.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $tped["total_produtos"] ?></h3>

                <p>Pedidos feitos</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="totalPedidos.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
          
          <!-- ./col -->
        </div>

        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $tven["total_produtos"] ?></h3>

                <p>VENDAS</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="totalVendas.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $tfun["total_produtos"] ?></h3>

                <p>Funcionários Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="totalFuncionarios.php" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- Footer -->
  <?php include 'Components/footer.php'; ?>
