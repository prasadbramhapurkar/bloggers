<?php include 'partials/_connection.php'; ?>
<?php
                   $id = $data['sno'];  
                   $sql = "DELETE FROM blog WHERE sno='$id' ";
                   if ($conn->query($sql) === TRUE) {
                   echo "Record deleted successfully";
                     header('Location:http://localhost/blog/dashboard.php');
                   } 
                   ?>