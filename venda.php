<?php
    include 'connect.php';
    include 'checkLogin.php';
    $id = $_GET['id'];   
?>

<?php
$y="select*from produtos where id='$id'";
$qu= mysqli_query($con, $y);
$f=mysqli_fetch_assoc($qu);

if(isset($_POST['sub'])){
    $t=$_POST['nomeCliente'];
    $u=$_POST['telCliente'];
    $c=$_POST['quantidadeProduto'];
    $fun=$_POST['funcionario'];
    
    $i="insert into vendas (nomeCliente,telCliente,nomeProduto,quantidadeProduto,precoTotal, imageProduto, funcionario, dataV) values ('$t','$u','$f[nome]', $c, $c * $f[preco],'$f[imagem]', '$fun', CURRENT_TIMESTAMP);";
    mysqli_query($con, $i);
    header('location:totalProdutos.php');
}
     
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
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Venda do produto de id <?php echo $f['id'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="totalProdutos.php">Home</a></li>
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
                <img src="<?php echo $f['imagem'];?>" class="img-circle elevation-2" alt="User Image" height="42" width="42">
                </div>

                <h3 class="profile-username text-center"><?php echo $f['nome'];?></h3>

                <p class="text-muted text-center">Produto</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Categoria</b> <a class="float-right"><?php echo $f['categoria'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Estoque</b> <a class="float-right"><?php echo $f['estoque'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Preço</b> <a class="float-right">R$<?php echo number_format($f['preco'],2,",",".");?></a>
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
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Dados</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome do Cliente</label>
                        <div class="col-sm-10">
                          <input name="nomeCliente" type="text" class="form-control" id="inputName" placeholder="Nome" value="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                          <input type="text" name="telCliente" class="form-control" id="inputEmail" placeholder="Telefone do Cliente" value="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nome do Funcionário</label>
                        <div class="form-group">
                        <select id="inputStatus" class="form-control custom-select" name="funcionario">
                  <option selected disabled>Selecione o funcionário</option>
              <?php
                $sqlCity = mysqli_query($con, "select * from funcionarios");

                 while($item = mysqli_fetch_assoc($sqlCity))
                 {
                    $nomeItem = $item["NomeFuncionario"];
                    $idCity = $item["idFuncionario"];
                    echo"
                          <option value=$nomeItem>$nomeItem</option>
                            ";
                 }
                ?>
                </div>
                <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nome do Funcionário</label>
                        <div class="col-sm-10">
                        <select name="city">
           <option value="">  </option>
              
                </div>
                        </div>
                      </div>
                      <div>
                      <?php
$sq="select * from produtos where id=$f[id]";
$qu=mysqli_query($con,$sq);
$f=  mysqli_fetch_assoc($qu);
                      if ($f['estoque'] == 0):
                        ?>
                      <div class="form-group">
                <label for="inputStatus">Quantidade</label>
                <select id="inputStatus" class="form-control custom-select" name="quantidadeProduto">
                  <option selected disabled>Selecione a quantidade</option>
                  <option value=0>0</option>
                      </div>
                  <?php
                elseif ($f['estoque'] == 1): // Note a combinação das palavras.
                  ?>
                  <div class="form-group">
                <label for="inputStatus">Quantidade</label>
                <select id="inputStatus" class="form-control custom-select" name="quantidadeProduto">
                  <option selected disabled>Selecione a quantidade</option>
                  <option value=1>1</option>
                  </div>
                  <?php
                elseif ($f['estoque'] == 2): // Note a combinação das palavras.
                  ?>
                  <div class="form-group">
                <label for="inputStatus">Quantidade</label>
                <select id="inputStatus" class="form-control custom-select" name="quantidadeProduto">
                  <option selected disabled>Selecione a quantidade</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  </div>
                  <?php
                elseif ($f['estoque'] == 3): // Note a combinação das palavras.
                  ?>
                  <div class="form-group">
                <label for="inputStatus">Quantidade</label>
                <select id="inputStatus" class="form-control custom-select" name="quantidadeProduto">
                  <option selected disabled>Selecione a quantidade</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  </div>
                  <?php
                elseif ($f['estoque'] == 4): // Note a combinação das palavras.
                  ?>
                  <div class="form-group">
                <label for="inputStatus">Quantidade</label>
                <select id="inputStatus" class="form-control custom-select" name="quantidadeProduto">
                  <option selected disabled>Selecione a quantidade</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  </div>
                  <?php
                elseif ($f['estoque'] == 5): // Note a combinação das palavras.
                  ?>
                  <div class="form-group">
                <label for="inputStatus">Quantidade</label>
                <select id="inputStatus" class="form-control custom-select" name="quantidadeProduto">
                  <option selected disabled>Selecione a quantidade</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
                  </div>
                  <?php
endif;
?>
                      </div>
                      
                      
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" name="sub" value="submit">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Footer -->
  <?php include 'Components/footer.php'; ?>
