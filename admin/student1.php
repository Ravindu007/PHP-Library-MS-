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
                <a href="student.php" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Manage Students</a>
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
          <div class="col-sm-12 col-md-8 content h-screen overflow-y-scroll">
            <h1 class="flex w-full justify-start text-3xl py-2">Manage Students</h1>
            <table class="w-full border-2 border-black">
            <?php
                if (isset($_POST['submit'])) {
                    $s = $_POST['title'];
                    $sql = "select * from LMS.user where (RollNo='$s' or Name like '%$s%') and RollNo<>'ADMIN'";
                } else
                    $sql = "select * from LMS.user where RollNo<>'ADMIN'";
                    $result = $conn->query($sql);
                    $rowcount = mysqli_num_rows($result);

                if (!($rowcount))
                    echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                else {
            ?>
                <table class="table" id = "tables">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email id</th>                                      
                            <th>Roll No.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      //$result=$conn->query($sql);
                      while ($row = $result->fetch_assoc()) {

                      	  $email = $row['EmailId'];
                          $name = $row['Name'];
                          $rollno = $row['RollNo'];
                                                                                                                                                        ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>                                      
                            <td><?php echo $rollno ?></td>
                            <td>
                                <center>
                                    <a href="studentdetails.php?id=<?php echo $rollno; ?>" class="px-4 bg-yellow-500 hover:bg-black hover:text-white py-2 rounded-md ">Details<a>                                             
                                </center>
                            </td>
                        
                        </tr>
                        <?php } } ?>
                    </tbody>
              </table>
          </div>

        </div>
       </div>
      </body>
      </html>


<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>