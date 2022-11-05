<!DOCTYPE html>
<html>
<head>
<title>Store and retrieve image</title>
</head>
<body>
  

  <form method="POST" action="index.php" enctype="multipart/form-data">
  	  	
  	  <input type="file" name="image">  	
  	  <button type="submit" name="upload">Upload Image</button>
  	
  </form>
  
  <?php
  // database connection
  $conn = mysqli_connect("localhost", "root", "", "agrowculture");
    
  if (isset($_POST['upload'])) {
	  
  	// Get name of images
  	$Get_image_name = $_FILES['image']['name'];
  	
  	// image Path
  	$image_Path = "images/".basename($Get_image_name);

  	$sql = "INSERT INTO student_table (imagename, contact) VALUES ('$Get_image_name', 'USA')";
  	
	// Run SQL query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)) {
  		echo "Your Image uploaded successfully";
  	}else{
  		echo  "Not Insert Image";
  	}
    }
  
  
    // Fetch image from database
	$img = mysqli_query($conn, "SELECT * FROM student_table");
     while ($row = mysqli_fetch_array($img)) {     
		
      	echo "<img src='images/".$row['imagename']."' style = 'width:400px;height:400px;' >";   
      
    }     
?>
</body>
</html>