<?php
    include 'connect.php';
    include 'checkLogin.php';
    $s="select*from reg where id='$_SESSION[id]'";
    

    $totalREG="select count(*) as total_registro from reg";
    $qu= mysqli_query($con, $s);
    $tr= mysqli_query($con,$totalREG);
    $f=mysqli_fetch_assoc($qu);
    $g=mysqli_fetch_assoc($tr);
    
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Funcionários</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="register.php">Adicionar</a></li>
              <li class="breadcrumb-item"><a href="relatorioClientes/gerar_pdf.php">Gerar Relatório</a></li>
              <li class="breadcrumb-item active">Funcionários</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Funcionários | Vendas</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Nome do Funcionário
                      </th>
                      <th style="width: 30%">
                          Total de VENDAS
                      </th>
                      
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
$sq="select * from funcionarios";
$qu=mysqli_query($con,$sq);

while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
                      <td>
                      <?php echo $f['idFuncionario']?>
                      </td>
                      <td>
                          <a>
                          <?php echo $f['NomeFuncionario']?>
                          </a>
                          <br/>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              
                              </div>
                          </div>
                          <?php
$tv="select count(*) as total_produtos from vendas where funcionario = '$f[NomeFuncionario]'";
$tvf=mysqli_query($con,$tv);
while($funv=  mysqli_fetch_assoc($tvf)){
    ?>
                          <small>
                          <?php echo $funv['total_produtos']?>
                          </small>
                          <?php
}
?>
                      </td>
                      
                      <td class="project-actions text-right">
                          
                      <a class="btn btn-primary btn-sm" href="edit_funcionarios.php?id=<?php echo $f['idFuncionario']?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-danger btn-sm" href="delete_funcionarios.php?id=<?php echo $f['idFuncionario']?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <tr>
                      <td>
    <?php
}
?>
              </tbody>
          </table>
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  <!-- Footer -->
  <?php include 'Components/footer.php'; ?>
