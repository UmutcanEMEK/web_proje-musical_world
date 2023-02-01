<?php
    session_start();
    if(!isset($_SESSION['email_address']))
		header('location:index.php');
	
	include('connection.php');

	$username = $_SESSION['username'];
	$sql = "SELECT * FROM user WHERE username = '$username' ";
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result);
	$user_id = $row['user_id'];

	if(isset($_POST['upload_kannada'])){

        $audio_file = $_FILES['audio_file']['name'];
		$song_name = mysqli_real_escape_string($conn,$_POST['song_name']);
        $song_format = mysqli_real_escape_string($conn,$_POST['song_format']);
        $song_image = $_FILES['song_image']['name'];
        $singer_name = mysqli_real_escape_string($conn,$_POST['singer_name']);
        $movie_name = mysqli_real_escape_string($conn,$_POST['movie_name']);        
		
		if(isset($_FILES['audio_file'])){
			$file_name = $_FILES['audio_file']['name'];
			$file_size = $_FILES['audio_file']['size'];
			$file_tmp = $_FILES['audio_file']['tmp_name'];
			$file_type = $_FILES['audio_file']['type'];
			
			move_uploaded_file($file_tmp,"songs/kannada_songs/".$file_name);
         }
         
         if(isset($_FILES['song_image'])){
			$file_name = $_FILES['song_image']['name'];
			$file_size = $_FILES['song_image']['size'];
			$file_tmp = $_FILES['song_image']['tmp_name'];
			$file_type = $_FILES['song_image']['type'];
			
			move_uploaded_file($file_tmp,"songs/kannada_songs/img/".$file_name);
		 }

		$sql = "INSERT INTO kannada_albums(`song_name`,`song_format`,`singer_name`,`movie_name`,`song_image`,`audio_file`) VALUES('$song_name','$song_format','$singer_name','$movie_name','$song_image','$audio_file')";
		$result = mysqli_query($conn,$sql);
		if($result){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Uploaded"," <b>Successfully uploaded '.$song_name.'</b>","success");';
				echo '}, 500);</script>';
		}else{
			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops..."," Error while uploading.Please check your internet coonection!","error");';
            echo '}, 500);</script>';
		}

    }
    
    if(isset($_POST['upload_hindi'])){

        $audio_file = $_FILES['audio_file']['name'];
		$song_name = mysqli_real_escape_string($conn,$_POST['song_name']);
        $song_format = mysqli_real_escape_string($conn,$_POST['song_format']);
        $song_image = $_FILES['song_image']['name'];
        $singer_name = mysqli_real_escape_string($conn,$_POST['singer_name']);
        $movie_name = mysqli_real_escape_string($conn,$_POST['movie_name']);        
		
		if(isset($_FILES['audio_file'])){
			$file_name = $_FILES['audio_file']['name'];
			$file_size = $_FILES['audio_file']['size'];
			$file_tmp = $_FILES['audio_file']['tmp_name'];
			$file_type = $_FILES['audio_file']['type'];
			
			move_uploaded_file($file_tmp,"songs/hindi_songs/".$file_name);
         }
         
         if(isset($_FILES['song_image'])){
			$file_name = $_FILES['song_image']['name'];
			$file_size = $_FILES['song_image']['size'];
			$file_tmp = $_FILES['song_image']['tmp_name'];
			$file_type = $_FILES['song_image']['type'];
			
			move_uploaded_file($file_tmp,"songs/hindi_songs/img/".$file_name);
		 }

		$sql = "INSERT INTO hindi_albums(`song_name`,`song_format`,`singer_name`,`movie_name`,`song_image`,`audio_file`) VALUES('$song_name','$song_format','$singer_name','$movie_name','$song_image','$audio_file')";
		$result = mysqli_query($conn,$sql);
		if($result){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Uploaded"," <b>Successfully uploaded '.$song_name.'</b>","success");';
				echo '}, 500);</script>';
		}else{
			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops..."," Error while uploading.Please check your internet coonection!","error");';
            echo '}, 500);</script>';
		}
    }
    
    if(isset($_POST['upload_english'])){

        $audio_file = $_FILES['audio_file']['name'];
		$song_name = mysqli_real_escape_string($conn,$_POST['song_name']);
        $song_format = mysqli_real_escape_string($conn,$_POST['song_format']);
        $song_image = $_FILES['song_image']['name'];
        $singer_name = mysqli_real_escape_string($conn,$_POST['singer_name']);
        $movie_name = mysqli_real_escape_string($conn,$_POST['movie_name']);        
		
		if(isset($_FILES['audio_file'])){
			$file_name = $_FILES['audio_file']['name'];
			$file_size = $_FILES['audio_file']['size'];
			$file_tmp = $_FILES['audio_file']['tmp_name'];
			$file_type = $_FILES['audio_file']['type'];
			
			move_uploaded_file($file_tmp,"songs/english_songs/".$file_name);
         }
         
         if(isset($_FILES['song_image'])){
			$file_name = $_FILES['song_image']['name'];
			$file_size = $_FILES['song_image']['size'];
			$file_tmp = $_FILES['song_image']['tmp_name'];
			$file_type = $_FILES['song_image']['type'];
			
			move_uploaded_file($file_tmp,"songs/english_songs/img/".$file_name);
		 }

		$sql = "INSERT INTO english_albums(`song_name`,`song_format`,`singer_name`,`movie_name`,`song_image`,`audio_file`) VALUES('$song_name','$song_format','$singer_name','$movie_name','$song_image','$audio_file')";
		$result = mysqli_query($conn,$sql);
		if($result){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Uploaded"," <b>Successfully uploaded '.$song_name.'</b>","success");';
				echo '}, 500);</script>';
		}else{
			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("Oops..."," Error while uploading.Please check your internet coonection!","error");';
            echo '}, 500);</script>';
		}
    }
    
    $sql = "SELECT * FROM kannada_albums ORDER BY song_id ASC";
	$result = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_array($result)){
		$song_id = $rows['song_id'];
		if(isset($_POST[$song_id])){

			$sql = "SELECT * FROM kannada_albums WHERE song_id = '$song_id' ";
			$results = mysqli_query($conn,$sql);

			$row = mysqli_fetch_array($results);
			$song_id = $row['song_id'];
			$song_name = $row['song_name'];

			$sql = "DELETE FROM kannada_albums WHERE song_name = '$song_name' ";
			$results = mysqli_query($conn,$sql);

			if($results){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Deleted"," <b>Song '.$song_name.' is deleted from kannada albums</b>","success");';
				echo '}, 500);</script>';
			}else{
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while deleting.Please check your internet coonection!</b>","error");';
            	echo '}, 500);</script>';
			}
        }
    }

    $sql = "SELECT * FROM hindi_albums ORDER BY song_id ASC";
	$result = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_array($result)){
		$song_id = $rows['song_id'];
		if(isset($_POST[$song_id])){

			$sql = "SELECT * FROM hindi_albums WHERE song_id = '$song_id' ";
			$results = mysqli_query($conn,$sql);

			$row = mysqli_fetch_array($results);
			$song_id = $row['song_id'];
			$song_name = $row['song_name'];

			$sql = "DELETE FROM hindi_albums WHERE song_name = '$song_name' ";
			$results = mysqli_query($conn,$sql);

			if($results){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Deleted"," <b>Song '.$song_name.' is deleted from hindi albums</b>","success");';
				echo '}, 500);</script>';
			}else{
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while deleting.Please check your internet coonection!</b>","error");';
            	echo '}, 500);</script>';
			}
        }
    }

    $sql = "SELECT * FROM english_albums ORDER BY song_id ASC";
	$result = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_array($result)){
		$song_id = $rows['song_id'];
		if(isset($_POST[$song_id])){

			$sql = "SELECT * FROM english_albums WHERE song_id = '$song_id' ";
			$results = mysqli_query($conn,$sql);

			$row = mysqli_fetch_array($results);
			$song_id = $row['song_id'];
			$song_name = $row['song_name'];

			$sql = "DELETE FROM english_albums WHERE song_name = '$song_name' ";
			$results = mysqli_query($conn,$sql);

			if($results){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Deleted"," <b>Song '.$song_name.' is deleted from english albums</b>","success");';
				echo '}, 500);</script>';
			}else{
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while deleting.Please check your internet coonection!</b>","error");';
            	echo '}, 500);</script>';
			}
        }
    }

    $sql = "SELECT * FROM upload_albums ORDER BY song_id ASC";
	$result = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_array($result)){
		$song_id = $rows['song_id'];
		if(isset($_POST[$song_id])){

			$sql = "SELECT * FROM upload_albums WHERE song_id = '$song_id' ";
			$results = mysqli_query($conn,$sql);

			$row = mysqli_fetch_array($results);
			$song_id = $row['song_id'];
			$song_name = $row['song_name'];

			$sql = "DELETE FROM upload_albums WHERE song_name = '$song_name' ";
			$results = mysqli_query($conn,$sql);

			if($results){
				echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Deleted"," <b>Song '.$song_name.' is deleted from uploaded songs</b>","success");';
				echo '}, 500);</script>';
			}else{
				echo '<script type="text/javascript">';
            	echo 'setTimeout(function () { sweetAlert("Oops...","<b> Error while deleting.Please check your internet coonection!</b>","error");';
            	echo '}, 500);</script>';
			}
        }
    }

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Admin panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="icon" href="images/i1.png" />
    <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- //Custom Theme files -->
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<!--//webfonts-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
</head>

<body>
	<!-- header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="#">
					Müzik dünyası
                </a>
                <pre>                 </pre>
                <li class="nav-item">
                    <p style="color:blue;">| Admin Sayfası |</p>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="logout.php">           <b>çıkış yap</b></a>
                </li>
			</nav>
		</div>
	</header>
	<!-- //header -->
	
   <br> <div class="alert alert-primary" role="alert">
    </div>
    <?php 

        include('connection.php');

        $sql = "SELECT * FROM user order by user_id";
        $result = mysqli_query($conn,$sql);

        echo "
            <div class='card'>
                <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>kullanıcılar</h3>
                <div class='card-body'>
                    <div id='table' class='table-editable'>
                        <table class='table table-bordered table-responsive-md table-striped text-center'>
                            <tr>
                                <th class='text-center'>Kullanıcı id</th>
                                <th class='text-center'>Kullanıcı adı</th>
                                <th class='text-center'>Email Adresi</th>
                                <th class='text-center'>Telefon Numarası</th>
                                <th class='text-center'>Şifre</th>
                                <th class='text-center'>Katkı</th>
                                <th class='text-center'>Onay Durumu</th>
                            </tr>
            ";
            while($row = mysqli_fetch_array($result)){

                echo "
                        <tr>
                            <td class='pt-3-half' >".$row['user_id']."</td>
                            <td class='pt-3-half' >".$row['username']."</td>
                            <td class='pt-3-half' >".$row['email_address']."</td>
                            <td class='pt-3-half' >".$row['mobile_number']."</td>
                            <td class='pt-3-half' >".$row['password']."</td>
                            <td class='pt-3-half' >".$row['contributions']."</td>
                            <td class='pt-3-half' >".$row['confirm_status']."</td>
                        </tr>      
                ";
            }
        echo "
                </table>
            </div>
        </div>
    </div><br>
";

?>

    <div class="alert alert-primary" role="alert">
         <center><b>Arabesk</b></center>
    </div>

<form method="post" action="admin_page.php" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="audio_file" required>
			</div>
		</div>		

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form1" class="form-control validate" name="song_name" required>
				<label data-error="wrong" data-success="right" for="form1">Şarkı Adı</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form2" class="form-control validate" name="song_format" required>
				<label data-error="wrong" data-success="right" for="form2">Şarkı Formatı</label>
			</div>
		</div>
    </div>

	<div class="form-row">

         <div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="song_image" required>
			</div>
		</div>

        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form3" class="form-control validate" name="singer_name" required>
				<label data-error="wrong" data-success="right" for="form3">Şarkıcı Adı</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form4" class="form-control validate" name="movie_name" required>
				<label data-error="wrong" data-success="right" for="form4">Film Adı</label>
			</div>
		</div>
		
		<div class="col">
			<div class="text-center">
				<button type="submit" name="upload_kannada" class="btn btn-default btn-rounded mb-4">yükle <i class="fa fa-upload"></i></button>
			</div>
		</div>
	</div>	
</form>

<?php 

    include('connection.php');

    $sql = "SELECT * FROM kannada_albums order by song_id";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Arabesk</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
                            <th class='text-center'>Şarkı id</th>
                            <th class='text-center'>Şarkı Adı</th>
                            <th class='text-center'>Şarkı formatı</th>
                            <th class='text-center'>Şarkıcı Adı</th>
                            <th class='text-center'>Film Adı </th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $song_id = $row['song_id'];
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['song_id']."</td>
                        <td class='pt-3-half' >".$row['song_name']."</td>
                        <td class='pt-3-half' >".$row['song_format']."</td>
                        <td class='pt-3-half' >".$row['singer_name']."</td>
                        <td class='pt-3-half' >".$row['movie_name']."</td>
                        <td>
                            <span><button type='submit' name='$song_id' class='btn btn-danger btn-rounded btn-sm my-0'>Delete Song <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr>
                </form>      
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?>

<div class="alert alert-primary" role="alert">
     <center><b>Rap</b></center>
</div>


<form method="post" action="admin_page.php" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile3" aria-describedby="fileHelp" name="audio_file" required>
			</div>
		</div>		

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form5" class="form-control validate" name="song_name" required>
				<label data-error="wrong" data-success="right" for="form5">Şarkı Adı</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form6" class="form-control validate" name="song_format" required>
				<label data-error="wrong" data-success="right" for="form6">Şarkı Formatı</label>
			</div>
		</div>
    </div>

	<div class="form-row">

         <div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile4" aria-describedby="fileHelp" name="song_image" required>
			</div>
		</div>

        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form7" class="form-control validate" name="singer_name" required>
				<label data-error="wrong" data-success="right" for="form7">Şarkıcı Adı</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form8" class="form-control validate" name="movie_name" required>
				<label data-error="wrong" data-success="right" for="form8">Film Adı</label>
			</div>
		</div>
		
		<div class="col">
			<div class="text-center">
				<button type="submit" name="upload_hindi" class="btn btn-default btn-rounded mb-4">yükle <i class="fa fa-upload"></i></button>
			</div>
		</div>
	</div>	
</form>

<?php 

    include('connection.php');

    $sql = "SELECT * FROM hindi_albums order by song_id";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Rap</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
						<th class='text-center'>Şarkı id</th>
						<th class='text-center'>Şarkı Adı</th>
						<th class='text-center'>Şarkı formatı</th>
						<th class='text-center'>Şarkıcı Adı</th>
						<th class='text-center'>Film Adı </th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $song_id = $row['song_id'];
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['song_id']."</td>
                        <td class='pt-3-half' >".$row['song_name']."</td>
                        <td class='pt-3-half' >".$row['song_format']."</td>
                        <td class='pt-3-half' >".$row['singer_name']."</td>
                        <td class='pt-3-half' >".$row['movie_name']."</td>
                        <td>
                            <span><button type='submit' name='$song_id' class='btn btn-danger btn-rounded btn-sm my-0'>Delete Song  <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr>  
                </form>    
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?>

<div class="alert alert-primary" role="alert">
    <center><b>Pop</b></center>
</div>


<form method="post" action="admin_page.php" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile4" aria-describedby="fileHelp" name="audio_file" required>
			</div>
		</div>		

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form9" class="form-control validate" name="song_name" required>
				<label data-error="wrong" data-success="right" for="form9">Şarkı Adı</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form10" class="form-control validate" name="song_format" required>
				<label data-error="wrong" data-success="right" for="form10">Şarkı Formatı</label>
			</div>
		</div>
    </div>

	<div class="form-row">

         <div class="col">
			<div class="form-group btn btn-primary">
				<input type="file" class="form-control-file" id="exampleInputFile5" aria-describedby="fileHelp" name="song_image" required>
			</div>
		</div>

        <div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form11" class="form-control validate" name="singer_name" required>
				<label data-error="wrong" data-success="right" for="form11">Şarkıcı Adı</label>
			</div>
		</div>

		<div class="col">
			<div class="md-form mb-4">
				<input type="text" id="form12" class="form-control validate" name="movie_name" required>
				<label data-error="wrong" data-success="right" for="form12">Film Adı</label>
			</div>
		</div>
		
		<div class="col">
			<div class="text-center">
				<button type="submit" name="upload_english" class="btn btn-default btn-rounded mb-4">yükle <i class="fa fa-upload"></i></button>
			</div>
		</div>
	</div>	
</form>

<?php 

    include('connection.php');

    $sql = "SELECT * FROM english_albums order by song_id";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Pop</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
						<th class='text-center'>Şarkı id</th>
						<th class='text-center'>Şarkı Adı</th>
						<th class='text-center'>Şarkı formatı</th>
						<th class='text-center'>Şarkıcı Adı</th>
						<th class='text-center'>Film Adı </th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $song_id = $row['song_id'];
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['song_id']."</td>
                        <td class='pt-3-half' >".$row['song_name']."</td>
                        <td class='pt-3-half' >".$row['song_format']."</td>
                        <td class='pt-3-half' >".$row['singer_name']."</td>
                        <td class='pt-3-half' >".$row['movie_name']."</td>
                        <td>
                            <span><button type='submit' name='$song_id' class='btn btn-danger btn-rounded btn-sm my-0'>Delete Song  <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr> 
                </form>     
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?>

<br><div class="alert alert-primary" role="alert">
         <center><b>Uploaded Songs</b></center>
    </div>

<?php 

    include('connection.php');

    $sql = "SELECT * FROM upload_albums order by song_id";
    $result = mysqli_query($conn,$sql);

    echo "
        <div class='card'>
            <h3 class='card-header text-center font-weight-bold text-uppercase py-4'>Yüklenen Şarkılar</h3>
            <div class='card-body'>
                <div id='table' class='table-editable'>
                    <table class='table table-bordered table-responsive-md table-striped text-center'>
                        <tr>
						<th class='text-center'>Şarkı id</th>
						<th class='text-center'>Şarkı Adı</th>
						<th class='text-center'>Şarkı formatı</th>
						<th class='text-center'>Şarkıcı Adı</th>
						<th class='text-center'>Film Adı </th>
                        </tr>
        ";
        while($row = mysqli_fetch_array($result)){
            $song_id = $row['song_id'];
            $audio_file = $row['audio_file'];
            echo "
                <form method='post' action=admin_page.php>
                    <tr>
                        <td class='pt-3-half' >".$row['song_id']."</td>
                        <td class='pt-3-half' >".$row['song_name']."</td>
                        <td class='pt-3-half' >".$row['song_format']."</td>
                        <td class='pt-3-half' >".$row['singer_name']."</td>
                        
                        <td class='pt-3-half' ><audio class='embed-responsive-item' controls='' preload='none'> <source src='songs/uploaded_songs/$audio_file' type='audio/mp3'></audio></td>
                        <td>
                            <span><button type='submit' name='$song_id' class='btn btn-danger btn-rounded btn-sm my-0'>Şarkıyı Sil  <i class='fa fa-trash'></i></button></span>
                        </td>
                    </tr> 
                </form>     
            ";
        }
        echo "
                </table>
            </div>
        </div>
    </div>
";
?>
	<!-- copyright -->
	<div class="cpy-right text-center">
		<p>hazanmut</p>
	</div>
    <!-- //copyright -->
    <!-- js-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- js-->
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js "></script>
    <script src="js/easing.js "></script>
    <script src="js/SmoothScroll.min.js "></script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
	<!-- //Bootstrap Core JavaScript -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
</body>

</html>