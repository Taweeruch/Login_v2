<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ระบบตรวจจับใบหน้าเข้างาน</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />	
</head>

<body>
    
  <div id="wrapper">
      
    <div id="header"> </div>
      
    <div id="left">
      <div id="logo">
        <h1>ระบบเข้างาน</h1>
        <p>ฺB-COM GROUP</p>
      </div>
        
      <div id="nav">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="important"><a href="index_vee.php">Taweeruch Kongkanon</a></li>
          <li><a href="index_num.php">Piyawan Jamsai</a></li>
          <li><a href="index_hom.php">Chadaporn Inmuern</a></li>
          <li><a href="index_eye.php">Timpatee Peeradum</a></li>
          <li><a>+</a></li>
        </ul>
      </div>
          
    </div>
      <?php
        if(isset($_POST['data'])){
            header("location:www.youtube.com");
        }
      ?>
    <div id="right">
      <h2>Taweeruch Kongkanon</h2>   
      <div id="welcome">
        <img src="images/pic_vee.jpg" width="120" height="120" alt="Pic 1" class="left" />
          <p>Dartment:Computer</p>
          <p>Psition:Admin,Programmer</p>
          <p>Code:6014012630066</p>
          <p>Tel:120</p>
          <p class="more"><a href="https://www.facebook.com/Taweeruch">Contact> </a>
              <p></p>
          <p></p>
      </div>
      <h3></h3>
        
      <div id="profile">   
        <div id="corp">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="GET">
            <input type="hidden" value="6014012630066" name="Emp_id">
             <input type="hidden" value="Taweeruch Kongkanon" name="name">
            <input type="submit" name="check" value="check">
            </form>
            <?php
    if(isset($_GET['check'])){
      $exc_re = FALSE;
            $command = escapeshellcmd('Basic open cv complete.py');
            $output=shell_exec($command);
                  if($output == TRUE){
                      date_default_timezone_set("Asia/Bangkok");

    $con = mysqli_connect('localhost','root','','std_tb')or die('Error'.mysqli_connect_error($con));
    mysqli_query($con,"SET NAMES'utf8'");

    $name = $_GET['name'];
    $Emp_id = $_GET['Emp_id'];                  
    $date = date("Y/m/d");

    $time = date("h:i:sa");

    $sql = "INSERT INTO check_std (empid,Name,Date,Time)
    VALUES ('$Emp_id','$name','$date','$time')";

    $exc = mysqli_query($con,$sql);
    if($exc){
      $exc_re = TRUE;
    }
                  }
        }
            ?>
            <h3><?php  if(isset($exc)){echo'Success';} ?></h3>
          <p></p>
        </div>
        <div id="indu">
          <p></p>
        </div>
        <div class="clear"> </div>
        <p></p>
      </div>    
    </div>
      
    <div class="clear"> </div>
    <div id="spacer"> </div>
      
    <div id="footer">
      <div id="copyright">
        Copyright &copy; 2020 B-COM Company.
      </div>
	  <div id="footerline"></div>
    </div>
	
  </div>
</body>
</html>

