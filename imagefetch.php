<?php
$con = mysqli_connect("localhost","root","","image");

    if(isset($_POST['upload']))
    {
        $file = $_FILES['image']['name'];

        $query = "INSERT INTO upload(image) VALUES('$file')";
        $res = mysqli_query($con, $query);
        if($res)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], "$file");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-mid-6">
                    <h3 class="text-center">UPLOAD IMAGE</h3>

                    <form class = "my-5" method = "post" enctype = "multipart/form-data"> 
                        <input type="file" name="image" class="form-control">
                        <input type="submit" name="upload" value="UPLOAD" class="btn btn-succes my-3">
                    </form>
                </div>
                <div class="col-md-6">
                <h3 class="text-center">DISPLAY IMAGE</h3>
                <div class="my-3"></div>
                <?php
                        $sel = "SELECT image FROM upload";
                        $que = mysqli_query($con, $sel);
        
                        $output = "";
        
                        if(mysqli_num_rows($que)<1)
                        {
                            $output .= "<h3 class = 'text-center'>No image uploaded</h3>";
                        }
                        else
                        {
                            echo "hehe";
                            while($row = mysqli_fetch_assoc($que))
                            {
                                $temp = $row['image'];
                                ?>
                                <img src="$temp" class='my-3' style = 'width:400px;height:400px;'>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>
</html>