<?php 

 $var = 'Peter Kariuki';
 echo $var;
 echo "<br>";
 echo date("Y-m-d");
 echo "<br>";
 echo date("h:i:s");
 echo "<br>";
 echo date("h:i a");

 $pass = 'peter kariuki';
 echo "<br>";
 echo $pass;

 $pass = md5($pass);
 echo "<br>";
 echo "Hashed PASS: " .$pass;
 $pass2 = 'peterkariuki';
 $pass2 = md5($pass2);
 echo "<br>New Hash: ".$pass2;

 $con = mysqli_connect("localhost","root","","lab_test1");
 if($con){
     echo "<br> Connection Successful";
 }
 else{
     echo "<br> Could Not Connect to DB !";
 }
 
  $username = 'raulmenendez67';
  $email = 'raulmenendez@gmail.com';
  $password = 'raulmenendez';
  $password = md5($password);

//   $sql = "Insert into users (username, email, password) values ('$username', '$email', '$password')";
//   mysqli_query($con, $sql);
// $sql = "select * from users where username = '$username' AND password = '$password'";
// if (mysqli_query($con, $sql))
// {
//     echo '<br> this guy exists';
// }
// else {
//     echo 'we must be dealing with a ghost ';
// }
?>
<html>

    <title></title>
    <link rel="stylesheet" href="bootsrap.min.css" >
     <body>
         <table class = 'table table-striped' style = "width:50%;">
             <tr>
                 <th>ID</th>
                 <th>username</th>
                 <th>email</th>
                 <th>update</th>
                 <th>Delete</th>
             </tr>

             <?php 
             $query1 = 'SELECT * FROM users';
             $result = mysqli_query($con, $query1);
             while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo '<tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td> 
                    <td><button class="btn btn-success">Update</button></td>
                    <td><button class="btn btn-danger">Delete</button></td> 
                    
                </tr>';
             }
             
            ?>
         </table>
         <form class = "form-group" method = "post" action = "phpsql.php">
             
             <label> Email </label>
             <input type = "email" name = "email"/>
             <label> Username </label>
             <input type = "text" name = "username"/>
             <label> Password </label>
             <input type = "password" name = "password"/>
             <button class = "btn btn-primary" type = "submit" name = "register"> Register </button>


         </form>
         <?php
                
                if (isset($_POST ['register']))
                {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $Password = $_POST['Password'];
                    $Password = md5($Password);

                    $sql1 = "INSERT into users (username, email, password)
                                    VALUES ('$username', '$email', '$Password')";
                    mysqli_query($con, $sql1);
                }
         ?>
     </body>
     

</html>