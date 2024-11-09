<?php  
   session_start(); 
 
   include("php/config.php"); 
   $id = $_GET["id"]; 
    $sql = "SELECT * FROM student_data WHERE roll_no = '$id'"; 
    $result = mysqli_query($con, $sql); 
 
    while($row = mysqli_fetch_assoc($result)){ 
        $res_roll = $row['roll_no']; 
        $res_name = $row['name']; 
        $res_mobile = $row['mobile_no']; 
        $res_class = $row['class']; 
        $res_college = $row['college_name']; 
        $res_city = $row['city']; 
        $res_marathi = $row['marathi']; 
        $res_english = $row['english']; 
        $res_physics = $row['physics']; 
        $res_chemistry = $row['chemistry']; 
        $res_maths = $row['maths']; 
    } 
 
     $totalMarks= $res_marathi + $res_english + $res_physics+$res_chemistry+$res_maths; 
     $percentage = ($totalMarks /500) *100 ; 
 
    if($percentage < 35){ 
        $grade ="Fail"; 
    }elseif($percentage >= 35 && $percentage < 50){ 
        $grade ="D"; 
    }elseif($percentage >= 50 && $percentage < 60){ 
        $grade ="C"; 
    }elseif($percentage >= 60 && $percentage <= 75){ 
        $grade ="B"; 
    }elseif($percentage >= 75 && $percentage <= 100){ 
      $grade ="A"; 
    }else{ 
      $grade =" - "; 
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
    <style> 
      .table-data{ 
        border:none; 
        width:30%; 
      } 
      .table-da{ 
        border:none; 
      } 
    </style> 
    <title>Result</title> 
</head> 
<body id="source"> 
    <div class="nav"> 
    <div class="logo"> 
        <a href="home.php"><img src="logo.jpg" alt=""></a> 
        </div> 
 
        <div class="right-links"> 
      <a href="php/logout.php"> <button class="btn">Log Out</button> </a> 
        </div> 
    </div> 
    <main> 
       <div class="main-box top"> 
          <div class="bottom"> 
            <div class="box" style="margin-top:-25px" id="data"> 
              <img src="header.jpg" alt="" style="height:80px"> 
            <h2 style="text-align:center; font-size:25px; margin-bottom:10px;"><u>Result 2023
24</u></h2> 
              <table> 
                <tr> 
                  <td class="table-da"><b>Name :-</b> &nbsp;<?php echo $res_name; ?></td> 
                  <td class="table-data"><b>Roll No :-</b>&nbsp; <?php echo $res_roll?></td> 
                </tr> 
                <tr> 
                  <td class="table-da"><b>Class :- </b>&nbsp; <?php echo $res_class; ?></td> 
                  <td class="table-data"><b>Grade :-</b>&nbsp; <?php echo $grade; ?></td> 
                </tr> 
                </table><hr> 
                <table> 
                <tr><td class="table-data">Marathi:</td><td class="table-da"><?php echo 
$res_marathi; ?></td></tr> 
                <tr><td class="table-data">Englishh:</td><td class="table-da"><?php echo 
$res_english; ?></td></tr> 
                <tr><td class="table-data">Physics:</td><td class="table-da"><?php echo 
$res_physics; ?></td></tr> 
                <tr><td class="table-data">Chemistry:</td><td class="table-da"><?php echo 
$res_chemistry; ?></td></tr> 
                <tr><td class="table-data">Mathematics:</td><td class="table-da"><?php echo 
$res_maths; ?></td></tr> 
              </table><hr> 
              <table><tr> <th class="table-data">Total Marks: </th> 
                <td class="table-da"><?php echo $totalMarks; ?></td></tr> 
                <tr> <th class="table-data">Percentage: </th> 
                <td class="table-da"><?php echo $percentage; ?>%</td> 
              </tr> 
                <tr> </tr> 
              </table> 
              </table> 
              <div>  
                <button value="Print" class="button" onclick="printpage()">Print</button> 
                <button value="Home" class="button" onclick="home()">Home</button> 
              </div> 
        </form> 
            </div> 
          </div> 
       </div> 
<script type="text/javascript"> 
      function printpage(){ 
        var print = document.getElementById('data').innnerHTML; 
        window.print('print'); 
         
      } 
      function home(){ 
        window.location.href = "home.php"; 
      } 
</script> 
 
    </main> 
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