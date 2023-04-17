
<?php
   session_start();
   include("connection.php");
   include("functions.php");

   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    //something was posted
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    if(!empty($user_name) && !empty($password))
    {
     
      $query="select * from users where user_name='$user_name' limit 1";
      $result=mysqli_query($con,$query);

      if($result)
      {
        if($result && mysqli_num_rows($result)>0)
        {
          $user_data=mysqli_fetch_assoc($result);
          if($user_data['password']===$password)
          {
            $_SESSION['user_id']=$user_data['user_id'];
            header("Location:start.html");
            die;
          }
        }
      }
      echo'<script>
         window.alert("Wrong user-name or password!") </script> ';
    }
    else
    {
      echo '<script> window.alert("Register then login") </script> ';
    }
   }

   


   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    //something was posted
    $user_name=$_POST['uname'];
    $password=$_POST['pswd'];
    if(!empty($user_name) && !empty($password))
    {
      $user_id=random_num(50);
      //save to database
      $query="insert into users(user_id,user_name,password) values ('$user_id','$user_name','$password') ";
      mysqli_query($con,$query);
      header("Location:index.php");
      die;
    }
    else
    {
     echo"Please enter some valid information!";
    }
   }
?>
