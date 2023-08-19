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
                <a href="requests1.php" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Issue / Return Requests </a>
              </li>
              <li class="w-[90%] flex justify-start">
                <a href="" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Currently Issued Books</a>
              </li>
            </ul>
            <p class="px-4">Currently Logged in: <span>ADMIN</span></p>
          </div>


          <!-- Content part of the Student -->
            <div class="col-sm-12 col-md-8 flex flex-col h-screen">
                    <div class="menu flex justify-around items-center h-[20%]">
                      <?php 
                        $currentFile = basename(__FILE__);
                      ?>
                      <!-- button set -->
                      <a href="requests1.php" class="px-4 py-2 <?php echo $currentFile === 'requests1.php' ? 'bg-black text-white' : 'bg-yellow-500'; ?> rounded-md h-1/3">Issue Requests</a>
                      <a href="requests2.php" class="px-4 py-2 <?php echo $currentFile === 'requests2.php' ? 'bg-black text-white' : 'bg-yellow-500'; ?> rounded-md h-1/3">Return Requests</a>
                      <a href="requests3.php" class="px-4 py-2 <?php echo $currentFile === 'requests3.php' ? 'bg-black text-white' : 'bg-yellow-500'; ?> rounded-md h-1/3">Renew Requests</a>

                    </div>
                    <div class="request-list h-[80%] overflow-y-scroll">
                    <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Roll Number</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Availabilty</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select * from LMS.record,LMS.book where Date_of_Issue is NULL and record.BookId=book.BookId order by Time";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $rollno=$row['RollNo'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];
                            
                                
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php echo $avail ?></td>
                                      <td><center>
                                        <?php
                                        if($avail > 0)
                                        {echo "<a href=\"accept.php?id1=".$bookid."&id2=".$rollno."\" class=\"btn btn-success\">Accept</a>";}
                                         ?>
                                        <a href="reject.php?id1=<?php echo $bookid ?>&id2=<?php echo $rollno ?>" class="btn btn-danger">Reject</a>
                                    </center></td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                        </table>
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