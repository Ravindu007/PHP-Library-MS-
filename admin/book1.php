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
                <a href="book1.php" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Manage Books</a>
              </li>
              <li class="w-[90%] flex justify-start">
                <a href="requests1.php" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Issue / Return Requests </a>
              </li>
              <li class="w-[90%] flex justify-start">
                <a href="current.php" class="text-2xl hover:translate-x-10 duration-200 hover:bg-black hover:text-white hover:border-1 hover:rounded-3xl hover:px-4 hover:no-underline bg-yellow-300 px-5 py-2 rounded-r-2xl">Currently Issued Books</a>
              </li>
            </ul>
            <p class="px-4">Currently Logged in: <span>ADMIN</span></p>
          </div>


          <!-- Content part of the Student -->
            <div class="col-sm-12 col-md-8 content h-screen flex flex-col">
                  <div class="add-book h-[20%] pb-2 flex items-center justify-between px-5">
                      <h1 class=text-3xl>Book Management</h1>
                      <button class="px-4 h-fit bg-yellow-500 py-2 rounded-md" data-toggle='modal' data-target="#addBookModel">Add a Book</button>
                  </div>
                  <div class="book-list h-[80%] overflow-y-scroll">
                    <?php
                    if(isset($_POST['submit'])){
                        $s=$_POST['title'];
                        $sql="select * from LMS.book where BookId='$s' or Title like '%$s%'";
                    }else
                        $sql="select * from LMS.book";
                        $result=$conn->query($sql);
                        $rowcount=mysqli_num_rows($result);

                    if(!($rowcount))
                        // echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                        echo "<script>window.location.href = 'book1.php';</script>";
                    else{
                    ?>
                    <table class="table" id = "tables">
                        <thead>
                          <tr>
                            <th>Book id</th>
                            <th>Book name</th>
                            <th>Availability</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php             
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];
                            
                            
                            ?>
                                <tr>
                                  <td><?php echo $bookid ?></td>
                                  <td><?php echo $name ?></td>
                                  <td><b><?php echo $avail ?></b></td>
                                    <td><center>
                                        <a href="bookdetails1.php?id=<?php echo $bookid; ?>" class="px-4 py-2 bg-yellow-500 hover:bg-black hover:text-white border-1 rounded-md">Details</a>
                                        <a href="edit_book_details1.php?id=<?php echo $bookid; ?>" class="px-4 py-2 bg-black text-white hover:bg-yellow-500 hover:text-black  border-1 rounded-md">Edit</a>
                                    </center></td>
                                </tr>
                            <?php }
                          }?>
                      </tbody>
                      </table>
                  </div>

          </div>

        </div>
       </div>


      <!-- Model -->
      <div class="modal" tabindex="=-1" role="dialog" id="addBookModel">
        <div class="modal-dialog" role="document">
    
           <div class="modal-content">
            <div class="modal-header">
              <h5>Add a Book</h5>
            </div>
           <div class="modal-body">
              <form class="form-horizontal row-fluid" action="book1.php" method="post">
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="Title"><b>Book Title</b></label>
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Author"><b>Author</b></label>
                              <input type="text" id="author1" name="author1" class="form-control" placeholder="Author 1" required>
                              <input type="text" id="author2" name="author2" class="form-control" placeholder="Author 2">
                              <input type="text" id="author3" name="author3" class="form-control" placeholder="Author 3">
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="Publisher"><b>Publisher</b></label>
                            <input type="text" id="publisher" name="publisher" placeholder="Publisher" class="form-control" required>
                        </div>
                  
                        <div class="form-group">
                                <label class="control-label" for="Year"><b>Year</b></label>
                                <input type="text" id="year" name="year" placeholder="Year" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Availability"><b>Number of Copies</b></label>
                            <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="form-control" required>
                        </div>
                  </div>
                </div>

                  <div class="modal-footer">
                      <button type="submit" name="submit"class="px-4 py-2 border-2 border-yellow-500 rounded-sm hover:bg-yellow-500">Add Book</button> 
                      <button class="px-4 py-2 border-2 border-gray-500 rounded-sm hover:bg-gray-500" data-dismiss="modal">Cancel</button>  
                  </div>

              </form>
            </div>
           </div>
          
        </div>
      </div>
      


<?php
  if(isset($_POST['submit']))
  {
    $title=$_POST['title'];
    $author1=$_POST['author1'];
    $publisher=$_POST['publisher'];
    $year=$_POST['year'];
    $availability=$_POST['availability'];

    $sql1="insert into LMS.book (Title,Publisher,Year,Availability) values ('$title','$publisher','$year','$availability')";

if($conn->query($sql1) === TRUE){
    $sql2="select max(BookId) as x from LMS.book";
    $result=$conn->query($sql2);
    $row=$result->fetch_assoc();
    $x=$row['x'];
    $sql3="insert into LMS.author values ('$x','$author1')";
    $result=$conn->query($sql3);
    if(!empty($author2)){ 
      $sql4="insert into LMS.author values('$x','$author2')";
      $result=$conn->query($sql4);
    }
    if(!empty($author3)){
       $sql5="insert into LMS.author values('$x','$author3')";
       $result=$conn->query($sql5);}
        echo "<script type='text/javascript'>alert('Success')</script>";
        echo "<script>window.location.href = 'book1.php';</script>";
    }else    
    {//echo $conn->error;
    echo "<script type='text/javascript'>alert('Error')</script>";
    }

   
    
}
?>


      </body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>


<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>