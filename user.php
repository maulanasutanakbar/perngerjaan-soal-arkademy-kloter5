<?php
include_once 'koneksi.php';
if(isset($_POST['btn-save']))
{
 $nama = $_POST['nama'];

 if($biodata->createprogrammer($nama))
            {
             header("Location: user.php?inserted");
            }
            else{
             header("Location: user.php?failure");
            }
       
}
if(isset($_POST['btn-save2']))
{
 $name_skill = $_POST['name_skill'];
 $id_user = $_POST['id_user'];

 if($biodata->createskill($name_skill,$id_user))
            {
             header("Location: user.php?inserted");
            }
            else{
             header("Location: user.php?failure");
            }
       
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>tutut book store</title>

    <!-- Bootstrap core CSS -->
    <link href="part/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="part/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="part/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .yogs{
            margin-top:100px;
        }
        .imago{
          width:400px;
          height:300px;
          margin-left:20%;
        }
        .yogi{
            width:100px;
            height:50px;
        }
        .navbar{
          background:#0e21ef;
          color:white;
        }
        .navbar-fearless{
            margin-left:5%;
            margin-right:5%;
        }
        .tuppel{
            margin-top:50px;
            height:400px;
            background-image: linear-gradient(to right top, #1772f9, #4b88fa, #6d9dfa, #8db2f9, #acc6f6);
        }
        .btn-azek{
            background-color:white;
        }
        .image{
          width:150px;
          height:150px;
        }
        .kentut{
            margin-top:100px;
            color:white;
        } 
        .event{
          margin-bottom:100px;
        }
        .ahoy img{
          width:100px;
          height:50px;
        }
    </style>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="ahoy"><img src="logo.png"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        
          <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php" style="color:white">Dashboard</a></li>
            <li><a href="hargabuku.php" style="color:white">User and skill</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="yogs container-fluid">
<div class="row">
<h1 class="event text-center">Biodata programmer</h1>
<div class="container">
<form method="POST" action="" enctype="multipart/form-data"/>
<div class="col-md-6"/>
<input type="text" class="form-control" name="nama" id="nama" placeholder="nama programmer"/> 
</div>
<div class="col-md-6">
<button type="submit" class="btn btn-primary" name="btn-save">
    <span class="glyphicon glyphicon-plus"></span> Tambah programmer
</button> 
</div>
</form>
</div>
<section class="section fantastis">
<div class="container-fluid">
<table class="table">
<tbody>
    <?php
    require_once 'koneksi.php';
      try
      {
          $stmt = $dbconfig->query('SELECT * from user');
          while($row = $stmt->fetch()){
        ?>
            <tr>
            <td colspan="2">Nama user &nbsp;&nbsp;<?php echo $row['nama']?></td>
            </tr>
            <tr>
            <td>
            <?php
            try{
            $id = $row['id_user'];               
            $sql = "SELECT * FROM skill WHERE id_user=:id";
            $query = $dbconfig->prepare($sql);
            $query->execute(array(':id' => $id));
             while($row2 = $query->fetch()){
                ?>
                &nbsp;&nbsp;<?php echo $row2['name_skill'];?>
                <?php
             }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            ?>
            </td>
            <td>
            <form method="POST" action="" enctype="multipart/form-data"/>
<div class="col-md-6"/>
<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user']?>"/> 
<input type="text" class="form-control" name="name_skill" id="name_skill" placeholder="nama skill"/> 
</div>
<div class="col-md-6">
<button type="submit" class="btn btn-primary" name="btn-save2">
    <span class="glyphicon glyphicon-plus"></span> Tambah skill
</button> 
</div>
</form>
            </td>
            </tr>
        <?php
          }
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    ?>
    </tbody>
    </table>
    </div>
</section>
</div>
</div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="part/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="part/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
