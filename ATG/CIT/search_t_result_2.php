<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/style_prac2.css" rel="stylesheet" type="text/css" />
<title>ATG</title>
<style type="text/css">
<!--
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
.style20 {font-family: Georgia, "Times New Roman", Times, serif; font-size: x-small; }
.style21 {font-size: x-small}
.style22 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style30 {font-family: "Courier New", Courier, monospace}
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style31 {color: #330099}
.style32 {	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>
<?php
   include("../includes/session.php");
  require ("../includes/dbconnection.php");

			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
			 header(
			 		"Location: teacher_result.php?pT=". $pT
					."&pSy=". $pSy 
					."&psem=". $psem					
		 		   );				   				   
			}
?>
<body>
<div id="container">
  <div id="header">
    <img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
    <div id="logo_w2"></div>
    <ul class="cssMenu cssMenum">
	<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="../images/homepage.gif" />Home</a></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Search</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="search_teacher.php"><img src="../images/User (1).ico" />Teacher Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_course.php"><img src="../images/user-group.ico" /> Student Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_room.php"><img src="../images/school-icon.png" />Room Schedule</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Add entry</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="faculty-cit.php"><span><img src="../images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="faculty-cit.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="facultylist-cit.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="student-cit.php"><span><img src="../images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="student-cit.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="student-list-cit.php"><img src="../images/folder.ico" />View</a></li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="sched_cit.php">Schedule</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>About us</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="about_sched.php"><img src="../images/scheduling.png" />ATG</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="about_dev.php"><img src="../images/dev.png" />Developer</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="user manual.pdf">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>

  </div>
  <div id="content">
	
		<div id="left">
		
		<form  name="form1" method="post" >
		  <div align="center"><br />
		    <p align="center"><span class="style32">Schedule of Class </span> </p>
            <p>
              <?php 	$pSy =$_REQUEST['pSy'];				
				$result = mysql_query("SELECT * FROM school_yr HAVING year_id='$pSy'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
	
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			
			$sy = MYSQL_RESULT($result,$i,"school_year");
				
				
				}
				$psem=$_REQUEST['psem'];
				$result = mysql_query("SELECT * FROM sem HAVING sem_id='$psem'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
	
			If ($numberOfRows == 0) 
				{
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			
			$sem = MYSQL_RESULT($result,$i,"semester");
				}
				echo $sem.', '. $sy;?>
            </p>
            <table width="651" border="0" align="center">
              <tr>
                <td width="77" height="54"><span class="style32">Teacher:</span></td>
                <td colspan = "4"><span class="style32" >
                  <?php 
				$pT =$_REQUEST['pT'];
				$result1 = mysql_query("SELECT * FROM profile HAVING teacher_id='$pT'");
if (!$result1) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result1);
	
			If ($numberOfRows == 0) 
				{
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			$teacher = MYSQL_RESULT($result1,$i,"teacher_name");
				}			
		echo $teacher; ?>
                </span></td>
                <td colspan = "2">loading:
                  <?php

			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		echo $numberOfRows;
		
	?></td>
              </tr>
              <tr>
                <td>Course</span></td>
                <td width="49" >Subject</span></td>
                <td width="33" >Room</span></td>
                <td width="30">Day </span></td>
                <td width="84" >Starting time</span></td>
                <td width="46" >SY</span></td>
                <td width="140" >&nbsp;</td>
                <?php

			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy' and dept_id = 2
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{		
					if(($i%2)==0) 
						{
							$bgcolor ='#FFFFFF';
						}
					else
						{
							$bgcolor ='@C0C0C0';
						}		
			
			/*SELECT * FROM `sched` WHERE 1`sched_id``room_id``course_id``sub_id``teacher_id``time_s_id``time_e_id``day_id``sem_id``year_id``sched_desc` */
					$sched_id = MYSQL_RESULT($result,$i,"sched_id");
					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
				
					
		?>
              </tr>
              <tr bgcolor="<?php echo $bgcolor; ?>">
                <td nowrap="nowrap" bgcolor="#BEED9E" ><?php echo $hidden_pcourse; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#C5F0FA"><?php echo $hidden_proom; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?>&nbsp;&nbsp;&nbsp;</td>
                <td><a href="sched_del.php?sched_id=<?php echo $sched_id; ?>&amp;pT=<?php echo $pT; ?>&amp;pSy=<?php echo $pSy; ?>&amp;psem=<?php echo $psem; ?>"> <img src='../images/b_drop.png' alt="delete record" width="16" height="16" border="0" onclick="return confirm('<?php echo "Are you sure you want to delete file #". $sched_id. "?";
			 ?>');" /></a></td>
              </tr>
              <?php 	
			$i++;		
			}
		}	
		
	?>
              <?php

			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy' and dept_id = 1
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{		
					if(($i%2)==0) 
						{
							$bgcolor ='#FFFFFF';
						}
					else
						{
							$bgcolor ='@C0C0C0';
						}		
			
			/*SELECT * FROM `sched` WHERE 1`sched_id``room_id``course_id``sub_id``teacher_id``time_s_id``time_e_id``day_id``sem_id``year_id``sched_desc` */
					$sched_id = MYSQL_RESULT($result,$i,"sched_id");
					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
				
					
		?>
     
              <tr bgcolor="<?php echo $bgcolor; ?>">
                <td nowrap="nowrap" bgcolor="#BEED9E" ><?php echo $hidden_pcourse; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#C5F0FA"><?php echo $hidden_proom; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?>&nbsp;&nbsp;&nbsp;</td>
                <td></td>
              </tr>
              <?php 	
			$i++;		
			}
		}	
		
	?>
              <?php

			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy' and dept_id = 3
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{		
					if(($i%2)==0) 
						{
							$bgcolor ='#FFFFFF';
						}
					else
						{
							$bgcolor ='@C0C0C0';
						}		
			
			/*SELECT * FROM `sched` WHERE 1`sched_id``room_id``course_id``sub_id``teacher_id``time_s_id``time_e_id``day_id``sem_id``year_id``sched_desc` */
					$sched_id = MYSQL_RESULT($result,$i,"sched_id");
					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
				
					
		?>
           
              <tr bgcolor="<?php echo $bgcolor; ?>">
                <td nowrap="nowrap" bgcolor="#BEED9E" ><?php echo $hidden_pcourse; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#C5F0FA"><?php echo $hidden_proom; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?>&nbsp;&nbsp;&nbsp;</td>
                <td></td>
              </tr>
              <?php 	
			$i++;		
			}
		}	
		
	?>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
      
            </table>
        
		  </div>
		
		   <table width="708" border="1" align="center">
            <tr>
              <td width="99"><div align="center">TIME</div></td>
              <td width="113"><div align="center">MONDAY</div></td>
              <td width="115"><div align="center">TUESDAY</div></td>
              <td width="109"><div align="center">WEDNESDAY</div></td>
              <td width="117"><div align="center">THURSDAY</div></td>
              <td width="115"><div align="center">FRIDAY</div></td>
            </tr>
            <tr>
              <td><div align="center">7:30 - 8:30  <br />
  &nbsp;&nbsp; </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 1){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 1){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 1){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 1){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 1){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">8:30 - 9:30  <br />
  &nbsp;&nbsp; </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 3){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              &nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday ==2 && $hidden_pstime == 3){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 3){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 3){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 3){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">9:30 - 10:30 <br />
  &nbsp;&nbsp; </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 5){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 5){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 5){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 5){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 5){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">10:30 - 11:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 7){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 7){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 7){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy' 
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 7){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 7){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">11:30 - 12:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 9){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 9){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 9){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 9){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 9){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">12:30 - 1:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 11){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 11){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 11){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 11){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 11){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">1:30 - 2:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 13){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 13){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 13){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 13){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 13){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">2:30 - 3:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 15){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 15){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 15){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 15){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 15){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">3:30 - 4:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 17){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 17){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 17){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 17){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 17){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">4:30 - 5:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 19){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 19){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 19){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 19){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 19){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">5:30 - 6:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 21){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 21){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 21){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 21){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 21){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">6:30 - 7:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 23){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 23){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 23){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 23){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 23){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
            <tr>
              <td><div align="center">7:30 - 8:30 <br />
  &nbsp;&nbsp;</div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 25){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 25){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

		$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 25){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 25){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
              <td><div align="center">
                <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{			

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 25){	
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
              </div></td>
            </tr>
          </table>
		  <p>&nbsp;</p>
		  <p align="center">
		    <label>
		    <input type="submit" name="cmdSubmit" value="Report" />
		    </label>
		  </p>
		  <p>&nbsp;</p>
		</form>
		  <h1>&nbsp;</h1>
			
	</div>
		<div id="program"></div>
		<div id="right">
		  <p>&nbsp;</p>
	</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div id="footerline">
		  <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">ATG</a>| <a href="contact.php">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>
	</div>
  </div>
	
	<div id="footer">Copyright � 2009 </div>	
</div>
</body>
</html>

