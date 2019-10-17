<?php

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  //filter inout valid the data from the form

  if(!empty($username))
  {
    if(!empty($password))
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "form";

        //create a connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if(!$conn)
        {
          die('Connection Error (' .mysqli_connect_error(). ')'.mysqli_connect_error());
        }
        else
        {
          $sql = "INSERT INTO account(username, password)
          values ('$username', '$password')";
          if($conn->query($sql))
          {
            echo "New record is inserted successfully";
          }
          else
          {
            echo "error: ".$sql . "<br>" .$conn->error;
          }
          $conn->close();
        }
    }
    else
    {
      echo "Password shouldnot be empty";
      die();
    }

  }
  else
  {
    echo "Username shouldnot be empty";
    die();
  }


 ?>
