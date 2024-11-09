<?php  
   session_start(); 
 
   include("php/config.php"); 
   if(!isset($_SESSION['valid'])){ 
    header("Location: index.php"); 
   } 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style\style.css"> 
    <link rel="stylesheet" href="style\home.css"> 
    <title>Home</title> 
</head> 
<body> 
    <div class="nav"> 
        <div class="logo"> 
        <a href="home.php"><img src="logo.jpg" alt=""></a> 
        </div> 
        <div class="right-links"> 
 
        <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM Users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_id = $result['Id'];
            }
            
            ?>
           
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a> 
        </div> 
    </div> 
            <div id="home-main"> 
                <div class="home-up"> 
                    <div class="up-left up"> 
                         <p>Welcome to our website! <span><?php echo "$res_Uname"; ?></span>.</p> 
                    </div> 
                    <div class="up-right up"> 
                         <p>Your email is <span><?php echo $res_Email ?></span>.</p> 
                    </div> 
                </div> 
                <div class="home-down"> 
 
                <img src="header.jpg" alt="" style="width:100%;  margin-bottom:20px; text
align:center;"> 
 
                  <!-- ******************php code operation***************************** --> 
      <?php 
        if(isset($_POST['search_student'])) 
        { 
          ?> 
          <center> 
          <form action="search.php" method="post"> 
          <label for="roll_no">Roll No:</label> 
          <input type="text" name="roll_no" required class="input-bar"> 
          <input type="submit" name="search_by_roll_no_for_search" value="Search" class="button"> 
          </form><br><br> 
          <h4><b><u>Search Student</u></b></h4><br><br> 
          </center> 
          <?php 
        } 
        ?> 
 
    <!-- -------------------------------------Code for edit student details----------------------------> 
    <?php 
      if(isset($_POST['edit_student'])) 
      { 
        ?> 
        <center> 
        <form action="" method="post"> 
        <label for="roll_no">Roll No:</label> 
        <input type="text" name="roll_no" required class="input-bar"> 
        <input type="submit" name="Update" value="Update" class="button"> 
        </form><br><br> 
        <h4><b><u>Update Student's details</u></b></h4><br><br> 
        </center> 
        <?php 
      } 
      ?> 
      <?php 
 
          if(isset($_POST['Update'])) 
            { 
        $query = "select * from student_data where roll_no = $_POST[roll_no]"; 
        $query_run = mysqli_query($con,$query); 
        while ($row = mysqli_fetch_assoc($query_run))  
        { 
          ?> 
          <div class="down-left"> 
          <form action="" method="post"> 
           
          <span>Update Student Details.....</span><br><br> 
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
             
            <label for="roll_no">Roll No:</label><br> 
            <input type="text" name="roll_no"  class="input-bar" value="<?php echo 
$row['roll_no']?>"><br> 
 
            <label for="name">Name:</label><br> 
            <input type="text" name="name" required class="input-bar" value="<?php echo 
$row['name']?>"><br> 
 
            <label for="mobile_no">Mobile No:</label><br> 
            <input type="text" name="mobile_no" required class="input-bar" value="<?php echo 
$row['mobile_no']?>"><br> 
 
            <label for="city">City:</label><br> 
            <input type="text" name="city" required class="input-bar" value="<?php echo 
$row['city']?>"><br> 
 
            <label for="college_name">College Name:</label><br> 
            <input type="text" name="college_name" required class="input-bar" value="<?php echo 
$row['college_name']?>"><br> 
 
            <label for="class">Class:</label><br><select name="class" required class="input-bar" 
value="<?php echo $row['class']?>"> 
                <option value="MCS">MCS</option> 
                <option value="BCS">BCS</option> 
                <option value="MBA">MBA</option> 
                <option value="BBA">BBA</option> 
            </select><br> 
        </div> 
        <div class="down-right"> 
             
            <span>Update Student Marks.....</span><br><br> 
            <label for="marathi">Marathi:</label><br> 
            <input type="number" name="marathi" required class="input-bar" value="<?php echo 
$row['marathi']?>"><br> 
 
            <label for="english">English:</label><br>   
            <input type="number" name="english" required class="input-bar" value="<?php echo 
$row['english']?>"><br> 
 
            <label for="physics">Physics:</label><br> 
            <input type="number" name="physics" required class="input-bar" value="<?php echo 
$row['physics']?>"><br> 
 
            <label for="chemistry">Chemistry:</label><br> 
            <input type="number" name="chemistry" required class="input-bar" value="<?php echo 
$row['chemistry']?>"><br> 
            <label for="maths">Maths:</label><br> 
            <input type="number" name="maths" required class="input-bar" value="<?php echo 
$row['maths']?>"><br> 
 
            <input type="submit" name="new_record" value="Save" class="button"> 
        </div> 
          </form> 
          </div> 
          <?php 
        } 
      } 
    ?> 
 
<?php 
if(isset($_POST['new_record'])) 
{ 
   include("php/config.php"); 
   
    $sqlUpdate = "UPDATE student_data SET name='$_POST[name]', 
mobile_no='$_POST[mobile_no]', city='$_POST[city]', college_name='$_POST[college_name]', 
class='$_POST[class]' , marathi='$_POST[marathi]', english='$_POST[english]', 
physics='$_POST[physics]', chemistry='$_POST[chemistry]', maths='$_POST[maths]' 
WHERE   roll_no ='$_POST[roll_no]'"; 
 
    if ($con->query($sqlUpdate) === TRUE) { 
        echo "Record updated successfully."; 
    } else { 
        echo "Error: " . $sqlUpdate . "<br>" . $con->error; 
    } 
} 
?> 
 
    <!------------------ #Code for Delete student details----------------> 
    <?php 
      if(isset($_POST['deletation'])) 
      { 
        $stud_id = $_POST['roll_no']; 
        echo "<script> 
          alert('Are you sure delete this record'); 
        </script>"; 
        $sql = "DELETE FROM student_data WHERE roll_no = {$stud_id}"; 
        $result = mysqli_query($con,$sql) or die("Query Unsuccessfull"); 

        if ($con->query($sql) === TRUE) { 
          echo "Record Delete successfully."; 
      } else { 
          echo "Error: " . $sql . "<br>" . $con->error; 
      } 
    } 
?> 
    <?php 
      if(isset($_POST['delete_student'])) 
      { 
        ?> 
        <center> 
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
        <label for="roll_no">Roll No:</label> 
        <input type="text" name="roll_no" required class="input-bar"> 
        <input type="submit" name="deletation" value="Delete" class="button"><br> 
        </form><br><br> 
        <h4><b><u>Delete Student details</u></b></h4><br><br> 
        </center> 
        <?php 
      } 
      ?> 
 
    <!------------------ Code for Add student details -----------------> 
     
      <?php  
        if(isset($_POST['add_new_student'])){ 
          ?> 
          <div class="down-left"> 
          <span>Enter Student Details.....</span><br><br> 
          <form action="add_student.php" method="post"> 
             
            <label for="roll_no">Roll No:</label><br> 
            <input type="text" name="roll_no" required class="input-bar"><br> 
 
            <label for="name">Name:</label><br> 
            <input type="text" name="name" required class="input-bar"><br> 
 
            <label for="mobile_no">Mobile No:</label><br> 
            <input type="text" name="mobile_no" required class="input-bar"><br> 
 
            <label for="city">City:</label><br> 
            <input type="text" name="city" required class="input-bar"><br> 
 
            <label for="college_name">College Name:</label><br> 
            <input type="text" name="college_name" required class="input-bar"><br> 
 
            <label for="class">Class:</label><br><select name="class" required class="input-bar"> 
                <option value="MCS">MCS</option> 
                <option value="BCS">BCS</option> 
                <option value="MBA">MBA</option> 
                <option value="BBA">BBA</option> 
            </select><br> 
        </div> 
 
            <div class="down-right"> 
            <span>Enter Student Marks.....</span><br><br> 
            <label for="physics">Physics:</label><br> 
            <input type="number" name="physics" required class="input-bar"><br> 
 
            <label for="chemistry">Chemistry:</label><br> 
            <input type="number" name="chemistry" required class="input-bar"><br> 
 
            <label for="maths">Maths:</label><br> 
            <input type="number" name="maths" required class="input-bar"><br> 
 
            <label for="marathi">Marathi:</label><br> 
            <input type="number" name="marathi" required class="input-bar"><br> 
 
            <label for="english">English:</label><br> 
            <input type="number" name="english" required class="input-bar"><br> 
 
            <input type="submit" name="add" value="Add Student" class="button"> 
        </div> 
          </form> 
          </div> 
          <?php 
        } 
      ?> 
            <div style="text-align:center; margin-top:20px;"> 
               <form action="#" method="POST"> 
               </table> 
                           <input type="submit" name="add_new_student" value="Insert" class="button"> 
                           <input type="submit" name="search_student" value="Search" class="button"> 
                           <input type="submit" name="edit_student" value="Update" class="button" > 
                           <input type="submit" name="delete_student" value="Delete" class="button"> 
                           <input type="submit" name="next" value="Records" class="button"> 
                     </form> 
                     </div> 
                </div> 
            </div> 
  <?php  
   include("footer.php"); 
?> 
</body> 
</html> 
<?php 
if(isset($_POST['next'])){ 
  header("Location: ../OJT_DURGESH_BAGUL/view_data.php"); 
} 
?>