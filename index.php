<?php 
    $insert=false;
    if(isset($_POST['name'])){
        $server="localhost";
        $username="root";
        $password= "";

        $con = mysqli_connect($server,$username,$password);
        if(!$con){
            die("connection to database failed due to".mysqli_connect_error());
        }
        $name=$_POST['name'];
        $depname=$_POST['department'];
        $number=$_POST['number'];
        $desc=$_POST['desc'];

        $sql="INSERT INTO `trip`.`trip` (`name`, `depname`, `number`, `other`, `dt`) VALUES ('$name', '$depname', '$number', '$desc', current_timestamp())";
        
        if($con->query($sql) == true){
            $insert=true;
        }else{
            echo "ERROR: $sql <br> $con->error";
        }
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel form, Please fill on Urgent Basis...</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <img class="bg" src="background.jpg" alt="" />
    <div class="container1">
      <h2>
        Welcome to Chandigarh University,<br />Travel form for Mumbai Trip
      </h2>
      <p>Please Enter the Required Details to confirm the participation: </p>
      <?php 
        if($insert == true)
        {
            echo '<script>alert("Submitted Successfully")</script>';
        }
      ?>
    </div>
    <div class="container2">
      <form action="index.php" method="post">
        <input
          type="name"
          name="name"
          id="name"
          placeholder="Enter your Full Name here: "
        />
        <input
          type="name"
          name="department"
          id="department"
          placeholder="Enter your Department Name here: "
        />
        <input
          type="number"
          name="number"
          id="number"
          placeholder="Enter your WhatsApp Number: "
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter Other information: "
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>

    <script src="index.js"></script>
  </body>
</html>
