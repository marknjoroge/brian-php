<?php
session_start();
$username = "";
$email = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'login');
//register user
if (isset($_POST['register_user']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(!empty($username) && !empty($password) && !is_numeric($username))
    {
        
      $query = "insert into users(username, email, password) values('$username', '$email', '$password')";
  
      mysqli_query($db, $query);
  
      
      echo "<script type='text/javascript'> alert('successfully registered')</script>";
    
    }
    else
    {
      echo "<script type='text/javascript'> alert('please enter some valid information')</script>";
    }
    
  }
//login user
if (isset($_POST['login_user'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(!empty($susername) && !empty($password) && !is_numeric($username))
  {
  
$query = "select * from users where username = '$username' limit 1";
  $result = mysqli_query($db, $query);
  
    if($result)
  {
    if($result && mysqli_num_rows($result) > 0)
    {
      $user_data = mysqli_fetch_assoc($result);
      if($user_data['password'] === $password)
      {
        $_SESSION['user_id'] = $user_data['id']; 
        header("location: index.php");
        die;
  
      }
    }
  } 
  echo "<script type='text/javascript'> alert('wrong username or password')</script>";
  
  
  }
  else
  {
    echo "<script type='text/javascript'> alert('wrong username or password')</script>";
  
  }
  }
?> 