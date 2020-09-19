<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <style>
    .img {
        border-radius: 10%;
    }
    </style>
</head>
<body>
</body>
</html>
<?php
    include '_dbcon.php';
    $sql = "SELECT * FROM ragistration";
    $result = mysqli_query($conn,$sql);
    echo'<table border="1"  style="background-color: red; color:cyan; align-items: center;   justify-content: center;">
            <tr style="width:50px;">
                <th style="width:50px;">s_no</th>
                <th style="width:187px;">username</th>
                <th style="width:150px;">images</th>
            </tr>
        </table>';
    while ($row = mysqli_fetch_assoc($result)) {  
        echo '
        <table border="1"  style="background-color: aqua; align-items: center; justify-content:center; " >
            <tr>
                <td style="width:50px;">'.$row['sno'].'</td>
                <td style="width:187px;">'.$row['username'].'</td>
                <td style="width:150px;"><img class="img" src="'.$row['images'].'"style="width:150px;"></td>
            </tr>
        </table>';  
    }   
?>
<table style="align-items: center;"></table>