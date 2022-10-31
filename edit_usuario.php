<?php
    include 'connect.php';
    include 'checkLogin.php';
    $id = $_GET['id'];   
?>

<?php
if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];
    if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
    $i="update regclientestcc set name='$t',username='$u',password='$p',city='$c',gender='$g',image='$img' where id='$id'";
    mysqli_query($con, $i);
    header('location:totalUsuarios.php');
}
     $s="select*from regclientestcc where id='$id'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
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
  <?php include 'Components/mainSidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                <h3 class="profile-username text-center"><?php echo $f['name'];?></h3>

                <p class="text-muted text-center">Usuário</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Cidade</b> <a class="float-right"><?php echo $f['city'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input name="text" type="text" class="form-control" id="inputName" placeholder="Nome" value="<?php echo $f['name']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Usuário</label>
                        <div class="col-sm-10">
                          <input type="text" name="user" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $f['username']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="pass" id="inputName2" placeholder="Senha" value="<?php echo $f['password']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Cidade</label>
                        <div class="col-sm-10">
                        <select name="city">
           <option value=""> Cidade </option>
              <?php
                $sqlCity = mysqli_query($con, "select * from city");

                 while($item = mysqli_fetch_assoc($sqlCity))
                 {
                    $nomeItem = $item["city"];
                    $idCity = $item["ID_city"];
                    echo"
                          <option value=$nomeItem>$nomeItem</option>
                            ";
                 }
                ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Sexo</label>
                        <div class="col-sm-10">
                        <input type="radio"name="gen" id="gen" value="male">Masculino
                        <input type="radio" name="gen" id="gen" value="female">Feminino
                        </div>
                        <div>
                        <img src="<?php echo $f['image']?>" width="100px" height="100px">
                        <input type="file" name="f1">
                        <input type="hidden" name="img1" value="<?php echo $f['image']?>">
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
  
  <!-- Footer -->
  <?php include 'Components/footer.php'; ?>
