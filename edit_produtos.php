<?php
    include 'connect.php';
    include 'checkLogin.php';
    $id = $_GET['id'];   
?>

<?php
if(isset($_POST['sub'])){
    $t=$_POST['nome'];
    $u=$_POST['descricao'];
    $p=$_POST['categoria'];
    $c=$_POST['estoque'];
    $w=$_POST['preco'];
    if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
    $i="update produtos set nome='$t',descricao='$u',categoria='$p',estoque='$c',imagem='$img', preco='$w' where id='$id'";
    mysqli_query($con, $i);
    header('location:totalProdutos.php');
}
     $y="select*from produtos where id='$id'";
    $qu= mysqli_query($con, $y);
    $f=mysqli_fetch_assoc($qu);
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
            <h1>Produto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="totalProdutos.php">Home</a></li>
              <li class="breadcrumb-item active">Produto</li>
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
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
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
                        <label for="inputName" class="col-sm-2 col-form-label">Nome do Produto</label>
                        <div class="col-sm-10">
                          <input name="nome" type="text" class="form-control" id="inputName" placeholder="Nome" value="<?php echo $f['nome']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                          <input type="text" name="descricao" class="form-control" id="inputEmail" placeholder="Descrição" value="<?php echo $f['descricao']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Estoque</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="estoque" id="inputName2" placeholder="Estoque" value="<?php echo $f['estoque']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="preco" id="inputName2" placeholder="Preço" value="<?php echo $f['preco']?>">
                        </div>
                      </div>
                      <div class="form-group">
                <label for="inputStatus">Categoria</label>
                <select id="inputStatus" class="form-control custom-select" name="categoria">
                  <option selected disabled>Selecione a categoria</option>
                  <?php
                $sqlCity = mysqli_query($con, "select * from categoria");

                 while($item = mysqli_fetch_assoc($sqlCity))
                 {
                    $nomeCategoria = $item["categoria"];
                    $idCategoria = $item["id_categoria"];
                    echo"
                          <option value=$nomeCategoria>$nomeCategoria</option>
                            ";
                 }
                ?>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Sexo</label>
                        <div class="col-sm-10">
                        <input type="radio" name="gen" id="gen" value="male">
                        <input type="radio" name="gen" id="gen" value="female">
                        </div>
                        <div>
                        <img src="<?php echo $f['imagem']?>" width="100px" height="100px">
                        <input type="file" name="f1">
                        <input type="hidden" name="img1" value="<?php echo $f['imagem']?>">
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
