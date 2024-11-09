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
 
    <title>Search</title> 
</head> 
<body> 
    <div class="nav"> 
        <div class="logo"> 
        <a href="home.php"><img src="logo.jpg" alt=""></a> 
        </div> 
        <div class="right-links"> 
 
            <?php  
            $id = $_SESSION['id']; 
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id"); 
 
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
                  <!-- ******************php code operation***************************** --> 
                  <?php 
        if(isset($_POST['search_student'])) 
        { 
          ?> 
          <center> 
          <form action="" method="post"> 
          <label for="roll_no">Roll No:</label> 
          <input type="text" name="roll_no" required class="input-bar"> 
          <input type="submit" name="search_by_roll_no_for_search" value="Search" class="button"> 
          </form><br><br> 
          </center> 
          <?php 
        } 
        if(isset($_POST['search_by_roll_no_for_search'])) 
        { 
          $query = "select * from student_data where roll_no = '$_POST[roll_no]'"; 
          $query_run = mysqli_query($con,$query); 
          while ($row = mysqli_fetch_assoc($query_run))  
          { 
            ?> 
            <div class="down-left"> 
            <from method="POST"> 
            <label for="roll_no">Roll No:</label><br> 
            <input type="text"  disabled class="input-bar" value="<?php echo $row['roll_no']?>"><br> 
 
            <label for="name">Name:</label><br> 
            <input type="text" disabled class="input-bar" value="<?php echo $row['name']?>"><br> 
 
            <label for="mobile_no">Mobile No:</label><br> 
            <input type="text" disabled class="input-bar" value="<?php echo $row['mobile_no']?>"><br> 
 
            <label for="class">Class:</label><br><select name="class" disabled class="input-bar" value="<?php echo $row['class']?>"> 
                <option value="MCS">MCS</option> 
                <option value="BCS">BCS</option> 
                <option value="MBA">MBA</option> 
                <option value="BBA">BBA</option> 
            </select><br> 
            <label for="college_name">College Name:</label><br> 
            <input type="text" disabled class="input-bar" value="<?php echo 
$row['college_name']?>"><br> 
 
            <label for="city">City:</label><br> 
            <input type="text" disabled class="input-bar" value="<?php echo $row['city']?>"><br> 
        </div> 
        <div class="down-right"> 
            <label for="physics">Marathi :</label><br> 
            <input type="number" value="<?php echo $row['marathi']?>" disabled class="input-bar"><br> 
 
            <label for="chemistry"> English:</label><br> 
            <input type="number" value="<?php echo $row['english']?>" disabled class="input-bar"><br> 
 
            <label for="maths">Physics:</label><br> 
            <input type="number" value="<?php echo $row['physics']?>" disabled class="input-bar"><br> 
 
            <label for="marathi">Chemistry:</label><br> 
            <input type="number" value="<?php echo $row['chemistry']?>" disabled class="input-bar"><br> 
 
            <label for="english"> Maths:</label><br> 
            <input type="number" value="<?php echo $row['maths']?>" disabled class="input-bar"><br> 
 
            <a href='home.php'><button class='button'>Go Back</button> 
        </div> 
          </form> 
          </div> 
             
          <?php 
        } 
      } 
    ?><button value="Home" class="button" onclick="home()" style="text
align:center;">Home</button> 
                </div> 
            </div>  
    <script type="text/javascript"> 
        function home(){ 
          window.location.href = "home.php"; 
        } 
    </script> 
           
  <?php  
   include("footer.php"); 
  ?> 
</body> 
</html> 
<?php 
if(isset($_POST['home'])){ 
  header("Location: ../OJT_DURGESH_BAGUL/home.php"); 
} 
?>