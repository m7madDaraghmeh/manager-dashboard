<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manager controll</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      //connect to database
      $host= 'localhost';
      $user= 'root';
      $pass='';
      $db='student';
      $con= mysqli_connect($host,$user,$pass,$db);
      $res= mysqli_query($con,"select * from students");
      $id='';
      $name='';
      $address='';
      
      if(isset($_POST['id'])){
        $id=$_POST['id'];
      }
      if(isset($_POST['name'])){
        $name=$_POST['name'];
      }
      if(isset($_POST['address'])){
        $address=$_POST['address'];
      }
      $sqls='';
      if(isset($_POST['add'])){
        $sqls="insert into students value($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("location: index.php");
      }
      if(isset($_POST['del'])){
        $sqls="delete from students where name='$name'";
        mysqli_query($con,$sqls);
        header("location: index.php");
      }
      
     ?>
    <div id='mother'>
        <form method='post'>
            <aside>
              <div id='div'>
              <img src="manager.jpg" alt="manager logo" width="200px">
                <h3>MANAGER CONTROL PANEL</h3>
                <label>Student ID</label><br>
                <input type='text' name='id' id="id"><br>
                <label>Student name</label><br>
                <input type='text' name='name' id="name"><br>
                <label>Student address</label><br>
                <input type='text' name='address' id="address"><br><br>
                <button name="add" >ADD </button>
                <button name="del">DELETE </button>
              </div> 
            </aside>
        
            <main>
                <table id="tbl">
                    <tr>
                        <th >Student ID</th>
                        <th>Student name</th>
                        <th>Address</th>
                        
                    </tr>
                    
                    <?php
                    //get info from database tabel and show it in page
                    while ($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "</tr>";
                        
                    }
                    ?>
                </table>

            </main>

        </form>

    </div>
</body>
</html>