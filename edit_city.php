<?php
include 'connect.php';
include 'checkLogin.php';
$id = $_GET['idCity']; 

?>
<?php
 if(isset($_POST['sub'])){
    $t=$_POST['city'];
    $i="update city set city='$t' where ID_city=$id";
    mysqli_query($con, $i);
    header('location:viewall_city.php');
 }
     $s="select*from city where ID_city='$id'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 
<form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="city" value="<?php echo $f['city']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
</form>