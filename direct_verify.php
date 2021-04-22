<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <link href="style3.css" rel="stylesheet"/>
</head>
<body>

<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-white">Verification PORTAL</h1>
      <p class="leading-relaxed mt-4"></p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-white text-lg font-medium title-font mb-5">Verfiy Here</h2>
      <form action="direct_verify.php" method="post">
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Event-ID</label>
        <input type="text" id="full-name" name="event_id" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Your Name</label>
        <input type="text" id="email" name="y_name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Verify</button>
      <p class="text-xs mt-3">*Sports club All rights Reserved*</p>
    </div>
    </form>
  </div>
</section>

<header class="text-gray-400 bg-gray-900 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">IIITG SPORTS CLUB</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <!-- <a class="mr-5 hover:text-white">First Link</a>
      <a class="mr-5 hover:text-white">Second Link</a>
      <a class="mr-5 hover:text-white">Third Link</a>
      <a class="mr-5 hover:text-white">Fourth Link</a> -->
    </nav>
    <form action="index.php" method="post">
    <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">HOME
    <form>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

<?php
$host="localhost";
$user="root";
$password="";


$conn=mysqli_connect($host,$user,$password,"match");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1=mysqli_connect($host,$user,$password,"co-ordinator");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }

 session_start();

if(isset($_POST['event_id'])){
    
    $event_id=$_POST['event_id'];
    $y_name=$_POST['y_name'];
    
    
    $sql="SELECT * FROM match_details WHERE coord_name='".$y_name."'AND event_id='".$event_id."' limit 1";
   
    $result=$conn->query($sql);
   // $result1=$conn->query("SELECT sports1 from registration_details where username='".$uname."'AND password='".$password."'");
    //$sports1=$result1->fetch_assoc();
    if($result)
    {
    if(mysqli_num_rows($result)==1){
        
       // $_SESSION['sports1']=$sports1[1];

       echo"Successfully verified";
       $sql="SELECT sports FROM coordinator_reg WHERE Name='$y_name'";
       $result=$conn1->query($sql);
       if ($result->num_rows > 0) 
       {
           while($row = $result->fetch_assoc())
           {
               if($row['sports']=='Cricket')
               {  
                   $_SESSION['event_id']=$event_id;
                   echo "<script> window.location.assign('toss.php'); </script>";
               }
               if($row['sports']=='Carrom')
               {
                $_SESSION['event_id']=$event_id;
                echo "<script> window.location.assign('carrom_play_details.php'); </script>";
               }
               if($row['sports']=='Football')
               {  
                   $_SESSION['event_id']=$event_id;
                   echo "<script> window.location.assign('football_play_details.php'); </script>";
               }
               if($row['sports']=='Batminton')
               {  
                   $_SESSION['event_id']=$event_id;
                   echo "<script> window.location.assign('batminton_play_details.php'); </script>";
               }
               if($row['sports']=='Table-tennis')
               {  
                   $_SESSION['event_id']=$event_id;
                   echo "<script> window.location.assign('tt_play_details.php'); </script>";
               }
               if($row['sports']=='Volleyball')
               {  
                   $_SESSION['event_id']=$event_id;
                   echo "<script> window.location.assign('voll_play_details.php'); </script>";
               }

           }
       
       }
    }
    else{
        echo " <p class='login_wrong'>You Have Entered Incorrect Event_id or Name<p>";
        exit();
    }
        
}

}
?>