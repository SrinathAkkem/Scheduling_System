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
.style30 {font-family: "Courier New", Courier, monospace}
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<?php
include("../includes/session.php");
  require ("../includes/dbconnection.php");

   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
		if (trim($_POST['txtfaculty_name']) == ""){ $flagfaculty_name = 'Required Field.';}	
	
if (($flagfaculty_name == "") && ($flagdept == ""))
{
		$faculty_name= $_POST['txtfaculty_name'];
			$dept= 1;
			
			mysql_query ("INSERT INTO profile(teacher_name, dept_id)
			VALUES('$faculty_name', '$dept')") or die(mysql_error()); 
					echo "Your file has been saved in the database..";
									 header(
			 	"Location: facultylist-educ.php");
}


}
	
			
?>
<body>
<div id="container">
	<div id="header"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
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
		<li class=" cssMenui"><a class="  cssMenui" href="faculty-educ.php"><span><img src="../images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="faculty-educ.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="facultylist-educ.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="student-educ.php"><span><img src="../images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="student-educ.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="student-list-educ.php"><img src="../images/folder.ico" />View</a></li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	 

	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>About us</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="about_sched.php"><img src="../images/scheduling.png" />ATG</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="about_dev.php"><img src="../images/dev.png" />Developer</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="help.php">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>
  </div>
	<div id="content">
	
		<div id="left">
		<form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form1" method="post" >
		  <div align="center">
		    <p><strong>College of Education</strong></p>
		    <p><strong>Add Teacher</strong><br />
	        </p>
		    <table border="0" align="center" >
              <tr >
                <td width="114" height="34" ><div align="right" class="style3">Faculty Name </div></td>
                <td width="190" ><input type="text" name="txtfaculty_name" id="txtfaculty_name" value="<?php echo $faculty_name; ?>" /></td>
                <td width="163"><span class="style20"><?php echo $flagfaculty_name; ?>&nbsp;</span></td>
                <td width="15">&nbsp;</td>
              </tr>
              <tr >
                <td height="9" colspan="4" ></td>
              </tr>
              <tr >
                <td height="42" colspan="3"><div align="center"><span class="style30">
                    <input type="submit" name="cmdSubmit" value="Submit" />
                  &nbsp;
                  <input type="submit" name="cmdClear" value="Clear" />
                </span></div></td>
                <td >&nbsp;</td>
              </tr>
            </table>
		    </div>
		  </form>
		  </div>
		<div id="program"></div>
		<div id="right">
		  <p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
	  </div>
		<div id="footerline">
		  <div align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">ATG</a>| <a href="contact.php">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></div>
		  <p>&nbsp;</p>
	  </div>
	</div>
	
	<div id="footer">Copyright � 2009 </div>	
</div>
</body>
</html>

<script language="javascript" >
/*		function SubmitForm(form)
		{			
			var form = document.forms[0];		
			if ((form.pLName.value.length <1) ||
				(form.pFName.value.length <1) ||
				(form.pMIName.value.length <1)) 
				{						
				 return false; 		
				}				 									
			else
				{	
				  return true;
				}
		}
*/		
		function optionList_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pdept');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_dept_id_ValueObj = document.getElementById('hidden_dept_id');
			var hidden_dept_TextObj = document.getElementById('hidden_dept');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_dept_id_ValueObj.value = selObj.options[selIndex].value;
			hidden_dept_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		//Limitng Max number on textboxes	
		//Source: http://javascript.internet.com/forms/limit-textarea.html
		function textCounter(field, countfield, maxlimit) 
		{
			if (field.value.length > maxlimit) // if too long...trim it!
				field.value = field.value.substring(0, maxlimit);
			else 
				countfield.value = maxlimit - field.value.length;
		}
	
	  //Number only on Keypress		
	  function isNumberKey(evt)
	  {
		 var charCode = (evt.which) ? evt.which : event.keyCode
		 if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;	
		 return true;
	  }	 
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pdept.value = ("<?PHP echo $_POST['hidden_dept_id']; ?>");
	
	//alert (form.pCityM.value);				
</script>