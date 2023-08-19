<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
  ?>

      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/adminCss.css">
        <title>Document</title>
      </head>
      <body>
    	 <div class="container1">
        <div class="row">
          <!-- Navigation -->
          <div class="col-sm-12 col-md-4 navbar h-screen shadow-2xl">
            <ul class="nav-links h-[80%] w-full flex flex-col justify-between py-">
              <li class="w-[90%] flex justify-start">
                <a href="student1.php" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Manage Students</a>
              </li>
              <li class="w-[90%] flex justify-start">
                <a href="" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Manage Books</a>
              </li>
              <li class="w-[90%] flex justify-start">
                <a href="" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Issue / Return Requests </a>
              </li>
              <li class="w-[90%] flex justify-start">
                <a href="" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Currently Issued Books</a>
              </li>
            </ul>
            <p class="px-4">Currently Logged in: <span>ADMIN</span></p>
          </div>


          <!-- Content part of the Student -->
          <div class="col-sm-12 col-md-8 content h-screen overflow-y-scroll flex justify-center items-center">
            <a href="student1.php" class="bg-yellow-500 rounded-md px-4 py-2 mr-5 hover:bg-black hover:text-white border-none">
              Back
            </a>
            <div class="profile w-[50%] h-fit px-4 py-4 border-1 border-yellow-300 shadow-md shadow-yellow-500">
                <?php
                $rno=$_GET['id'];
                $sql="select * from LMS.user where RollNo='$rno'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();    
                                
                      $name=$row['Name'];
                      $category=$row['Category'];
                      $email=$row['EmailId'];
                      $mobno=$row['MobNo'];

                      echo "<b><u>Name:</u></b> ".$name."<br><br>";
                      echo "<b><u>Category:</u></b> ".$category."<br><br>";
                      echo "<b><u>Roll No:</u></b> ".$rno."<br><br>";
                      echo "<b><u>Email Id:</u></b> ".$email."<br><br>";
                      echo "<b><u>Mobile No:</u></b> ".$mobno."<br><br>"; 
                ?>
            </div>    
          </div>

        </div>
       </div>
      </body>
      </html>


<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>