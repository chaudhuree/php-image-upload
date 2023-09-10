<?php
include "./connect.php";

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $mobile = $_POST['mobile'];
   $image = $_FILES['file'];
//   echo $username;
//   echo $mobile;
//   print_r($image) ;
    $imagefilename = $image['name'];
    $imagefileerror = $image['error'];
    $imagefiletmp = $image['tmp_name'];

    $filename_seperate = explode('.', $imagefilename);
    $file_extention = strtolower($filename_seperate[1]);
    $file_extention_stored = array('png', 'jpg', 'jpeg');

    if(in_array($file_extention, $file_extention_stored)){
        $upload_image = 'images/'.$imagefilename;
        move_uploaded_file($imagefiletmp, $upload_image);
        $sql = "INSERT INTO `registration` (name, mobile, file) VALUES ('$username', '$mobile', '$upload_image')";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "<div class='alert alert-success' role='alert'>Data Uploaded <strong>Successfully</strong></div>";
        }else{
           die(mysqli_error($con));
        }
}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Upload in PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<h1 class="text-center my-4">Displaying Data</h1>

<div class="container d-flex justify-content-center d-flex justify-content-center">
    <table class="table table-bordered w-50 ">
        <thead class="table-dark">
        <tr>
            <th scope="col">Sl no</th>
            <th scope="col">Username</th>
            <th scope="col">Image</th>

        </tr>
        </thead>
        <tbody>

        <?php
        $sql="SELECT * FROM `registration`";
        $result=mysqli_query($con,$sql);

        while ($row=mysqli_fetch_assoc($result)){
            echo '<tr>
            <th>'.$row['id'].'</th>
            <th>'.$row['name'].'</th>
            <th><img src="'.$row['file'].'" width="50px" height="50px"></th>';
        }
        ?>

        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>