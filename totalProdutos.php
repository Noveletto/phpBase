<?php
    include 'connect.php';
    include 'checkLogin.php';
    $s="select*from reg where id='$_SESSION[id]'";
    $totalREG="select count(*) as total_registro from produtos";
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
            <h1>Produtos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="reg_produtos.php">Adicionar</a></li>
              <li class="breadcrumb-item"><a href=".\relatorio\gerar_pdf.php">Relatório</a></li>
              <li class="breadcrumb-item active">Produtos</li>
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
          <h3 class="card-title"><?php echo "Total: {$g['total_registro']}"?></h3>

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
                          Nome do Produto
                      </th>
                      <th style="width: 30%">
                          Imagem do Produto
                      </th>
                      <th>
                          Categoria
                      </th>
                      <th style="width: 1%" class="text-center">
                          Preço
                      </th>
                      <th style="width: 10%" class="text-center">
                          Quantidade
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
$sq="select * from produtos";
$qu=mysqli_query($con,$sq);
while($f=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
                      <td>
                      <?php echo $f['id']?>
                      </td>
                      <td>
                          <a>
                          <?php echo $f['nome']?>
                          </a>
                          <br/>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                              <img src="<?php echo $f['imagem'];?>" class="img-circle elevation-2" alt="User Image" height="42" width="42">
                              </li>
                          </ul>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              
                              </div>
                          </div>
                          <small>
                          <?php echo $f['categoria']?>
                          </small>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              
                              </div>
                          </div>
                          <small>
                          R$<?php echo number_format($f['preco'],2,",",".");?>
                          </small>
                      </td>
                      <?php
                      if ($f['estoque'] > 0):
                        ?>
                        <td class="project-state">
                        <span class="badge badge-success"><?php echo $f['estoque']?></span>
                    </td>
                    <?php
                elseif ($f['estoque'] < 1): // Note a combinação das palavras.
                  ?>
                  <td class="project-state">
                  <span class="badge badge-danger"><?php echo $f['estoque']?></span>
              </td>
<?php
endif;
?>
                      
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="edit_produtos.php?id=<?php echo $f['id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          <a class="btn btn-primary btn-sm" href="venda.php?id=<?php echo $f['id']?>">
                              <i class="bi bi-cart">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
                              </i>
                              Vender
                          </a>
                          <a class="btn btn-danger btn-sm" href="delete_produtos.php?id=<?php echo $f['id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Deletar
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
