<?php  
   session_start(); 
   include("php/config.php"); 
?> 
<html> 
  <head> 
    <title>Add Student</title> 
  </head> 
</html> 
<?php  
 
if(isset($_POST['add']))  
{ 
    $roll_no       =  $_POST["roll_no"]; 
    $name          =  $_POST["name"]; 
    $mobile_no     =  $_POST["mobile_no"]; 
    $city          =  $_POST["city"]; 
    $college_name  =  $_POST["college_name"]; 
    $class         =  $_POST["class"]; 
 
    $marathi       =  $_POST["marathi"]; 
    $english       =  $_POST["english"]; 
    $physics       =  $_POST["physics"]; 
    $chemistry     =  $_POST["chemistry"]; 
    $maths         =  $_POST["maths"]; 
     
    if($name != "" && $mobile_no!=""  && $roll_no !="" && $city !="" && $college_name != "" 
&&  $class != "" &&  $marathi != "" &&  $english != "" &&  $physics != "" &&  $chemistry != "" 
&&  $maths != "") { 
 
      if($roll_no > 0 && $roll_no < 200 && $chemistry > 0 && $chemistry < 100 && $physics > 0 
&& $physics < 100 && $marathi > 0 && $marathi < 100 && $english > 0 && $english < 100 && 
$maths > 0 && $maths < 100){ 
 
        $verify_query = mysqli_query($con,"SELECT mobile_no FROM student_data WHERE 
mobile_no='$mobile_no'"); 
 
      if(mysqli_num_rows($verify_query) !=0 ){ 
          echo '<script type="text/javascript"> 
          alert("This mobile no is used, Try another One Please!"); 
          window.location.href = "home.php"; 
        </script>'; 
     } 
     else{ 
      $query = "INSERT INTO Student_data VALUES 
('$roll_no','$name','$mobile_no','$class','$college_name','$city','$marathi','$english','$physics','$c
 hemistry','$maths')"; 
      $data = mysqli_query($con,$query); 
      if($data) { 
        echo '<script type="text/javascript"> 
        alert("Student added successfully."); 
        window.location.href = "home.php"; 
      </script>'; 
    } else { 
      echo '<script type="text/javascript"> 
    alert("Enter Correct details...."); 
    window.location.href = "home.php"; 
  </script>'; 
        } 
      } 
    }  
  } 
} 
?>