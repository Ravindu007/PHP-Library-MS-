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
          <div class="col-sm-12 col-md-8 content h-screen flex justify-center items-center">
              <a href="book1.php" class="bg-yellow-500 rounded-md px-4 py-2 mr-5 hover:bg-black hover:text-white border-none">
                  Back
              </a>
              <div class="book-profile w-[50%] border-1 rounded-sm shadow-md shadow-yellow-500 px-4 py-2">
              <?php
                  $x=$_GET['id'];
                  $sql="select * from LMS.book where BookId='$x'";
                  $result=$conn->query($sql);
                  $row=$result->fetch_assoc();    
                            
                      $bookid=$row['BookId'];
                      $name=$row['Title'];
                      $publisher=$row['Publisher'];
                      $year=$row['Year'];
                      $avail=$row['Availability'];

                      echo "<b>Book ID:</b> ".$bookid."<br><br>";
                      echo "<b>Title:</b> ".$name."<br><br>";
                      $sql1="select * from LMS.author where BookId='$bookid'";
                      $result=$conn->query($sql1);
                                
                      echo "<b>Author:</b> ";
                      while($row1=$result->fetch_assoc())
                      {
                          echo $row1['Author']."&nbsp;";
                      }
                      echo "<br><br>";
                      echo "<b>Publisher:</b> ".$publisher."<br><br>";
                      echo "<b>Year:</b> ".$year."<br><br>";
                      echo "<b>Availability:</b> ".$avail."<br><br>";

                                
                        
                           
              ?>
              </div>   
          </div>

        </div>
       </div>


      </body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>


<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>