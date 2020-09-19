<?php
    include '_dbcon.php';
    #note: UPLODED FOLDER IMAGES MUST SIMILAR TO UPLOAD SCRIPT PHP FILE NAME 
    #FOLDER NU NAME AND PHP FILE NU NAME SAME RAKHVANU IAMGE UPLOAD KARTI VAKHATE.
?>
<html lang="en">

<head>
    <title>RAGISTRATION_WITH_IMAGES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <!-- starting php script from hear -->
    <?php
        if (isset($_POST['ragister'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $img = $_FILES['image'];

            $filename = $img['name'];
            $filepath = $img['tmp_name'];
            $error = $img['error'];
            
            if ($error==0) {
            $destfile = 'index/'.$filename;
            #echo $destfile;
            #move another folder in images with storege database.
            move_uploaded_file($filepath, $destfile);

            $sql = "SELECT * FROM `ragistration` where username = '$username'";
            $result = mysqli_query($conn,$sql);
            $email = mysqli_num_rows($result);
            if ($email>0) {
                echo 'sorry try with another email this email is exists';
            }else{
            if ($password==$cpassword) {
            #insert data into the database
            $sql = "INSERT INTO ragistration(`username`, `password`, `cpassword`, `images`)
                     VALUES ('$username', '$password', '$cpassword', '$destfile')";
            $result = mysqli_query($conn,$sql);
            #print_r($img);
            echo 'Data inserted successfully';
            header('location:display.php');
            }else{
                echo 'Password miss match';
            }
            }
        }

        }
    ?>
    <!-- ragistraton page -->
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">

            <div class="container">
                <h3 class="mb-3">Ragistration</h3>
            </div>

            <div class=" form-group input-group col-md-6 ">
                <div class="input-group-prepend">
                    <span class="input-group-text">email:</span>
                </div>
                <input type="text" name="email" class="form-control" required>
            </div>

            <div class=" form-group input-group col-md-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">password:</span>
                </div>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class=" form-group input-group col-md-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">confirm-pasword:</span>
                </div>
                <input type="password" name="cpassword" class="form-control" required>
            </div>
            <div class="form-group input-group col-md-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">image</span>&nbsp;&nbsp;&nbsp;
                </div>
                <input type="file" name="image" required>
            </div>

            <button type="submit" name="ragister" class="btn btn-primary col-md-6">Submit </button>
            <p>Have An Account? <a href="#" class="">log in</a></p>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>