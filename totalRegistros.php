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
            <h1>Usuários</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="register.php">Adicionar</a></li>
              <li class="breadcrumb-item active">Usuários</li>
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
          <h3 class="card-title">Administradores</h3>

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
                          Nome de Usuário
                      </th>
                      <th style="width: 30%">
                          Imagem de Perfil
                      </th>
                      <th>
                          Cidade
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
$sq="select * from reg";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
                      <td>
                      <?php echo $f['id']?>
                      </td>
                      <td>
                          <a>
                          <?php echo $f['name']?>
                          </a>
                          <br/>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                              <img src="<?php echo $f['image'];?>" class="img-circle elevation-2" alt="User Image" height="42" width="42">
                              </li>
                          </ul>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              
                              </div>
                          </div>
                          <small>
                          <?php echo $f['city']?>
                          </small>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Success</span>
                      </td>
                      <td class="project-actions text-right">
                          
                          <a class="btn btn-info btn-sm" href="edit_perfil.php?id=<?php echo $f['id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="delete_perfil.php?id=<?php echo $f['id']?>">
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
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  <!-- Footer -->
  <?php include 'Components/footer.php'; ?>
