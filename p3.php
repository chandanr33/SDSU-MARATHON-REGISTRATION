<?php

function validate_data($params) {

    $msg = "";
   if(strlen($params[0]) == 0) {
        $msg .= "Please enter the first name!<br />";        
   }
    if(strlen($params[1]) == 0) {
        $msg .= "Please enter the last name!<br />";    
    }
    if(strlen($params[2]) == 0){
        $msg .= "Please enter the address!<br />";     
    }
   if(strlen($params[3]) == 0) {  
      $msg .= "Please enter the city!<br />";      
         }
    if(strlen($params[4]) == 0)
    {    $msg .= "Please enter the state!<br />";    
         }     
    if(strlen($params[5]) == 0)
    {    $msg .= "Please enter the zip code!<br />";    
         }
    elseif(!is_numeric($params[5])) {
        $msg .= "Zip code may contain only numeric digits!<br />";   
         }   
    elseif(!preg_match("/[0-9]{5}/",$params[5]))
    {    $msg .= "Please enter valid zip code<!br />"; 
         }
    if(strlen($params[6]) == 0)
    {    $msg .= "Please enter the area code of you phone number!<br />";   
         }
    elseif(!is_numeric($params[6])) {
        $msg .= "Area code may contain only numeric digits!<br />";  
         }
    elseif(!preg_match("/[0-9]{3}/",$params[6]))
    {    $msg .= "Area code of your phone number must contain exactly 3 digits!<br />";
         }    
    if(strlen($params[7]) == 0)
    {    $msg .= "Please enter prefix of your phone number!<br />";   
         }
    elseif(!is_numeric($params[7])) {
        $msg .= "Prefix phone may contain only numeric digits!<br />";   
         }
    elseif(!preg_match("/[0-9]{3}/",$params[7]))
    {    $msg .= "Prefix of your phone number must contain exactly 3 digits!<br />";   
         }   
    if(strlen($params[8]) == 0)
    {    $msg .= "Please enter the last four digits of your phone number!<br />";   
         }
    elseif(!is_numeric($params[8])) {
        $msg .= "Phone number may contain only numeric digits!<br />"; 
         }
    elseif(!preg_match("/[0-9]{4}/",$params[8]))
    {    $msg .= "Phone number must contain exactly 4 digits!<br />";   
         }   
    if(strlen($params[9]) == 0) {
        $msg .= "Please enter email!<br />";        
    }
    elseif(!filter_var($params[9], FILTER_VALIDATE_EMAIL)) {
        $msg .= "Your email appears to be invalid!<br/>";      
         }  
    if(strlen($params[10]) == 0) {
        $msg .= "Please select your gender!<br />";   
    }
    if(strlen($params[11]) == 0) {
        $msg .= "Please enter the month of your date of birth!<br />";         
    }
    if(strlen($params[12]) == 0) {
        $msg .= "Please enter the day of your date of birth!<br />";        
    }
    if(strlen($params[13]) == 0) {
        $msg .= "Please enter the year of your date of birth!<br />";         
    }
    if(!checkdate($params[11],$params[12],$params[13])) {
       $msg .= "Please enter valid date of birth!<br />";       
    }  
    if(empty($_POST["experience_level"])) {
        $msg .= "Please select your experience level!<br />";      
    }
    if(strlen($params[15]) == 0) {
        $msg .= "Please select your category!<br />";
    } 
      if($msg) {
        write_form_error_page($msg);
        exit;
        }   
}

function write_form_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_form();
    write_footer();
    }  
     
function write_form() {
    print <<<ENDBLOCK
	<div id="div2">
        <fieldset>
        <form 
              onsubmit="return validate_form()"
              action="process_request.php"
              method="post">
              <h2>Sign Up!</h2>
              <hr>
        <ul id="sec">
            
            <li><label >First Name:</label>
                <input type="text" name="fname"  id="fname" value="$_POST[fname]" size="20" /></li>  
                <li><label >Middle Name:</label>
                <input type="text" name="mname"  id="mname" value="$_POST[mname]" size="20" /></li>                   
            <li><label >Last Name:</label>
                <input type="text" name="lname"  id="lname" value="$_POST[lname]" size="20" /></li> 
            <li><label >Address 1:</label>
                <input type="text" name="address1"  id="address1" value="$_POST[address1]" size="40" /></li>
            <li><label >Address 2:</label>
                <input type="text" name="address2"  id="address2" value="$_POST[address2]" size="40" /></li>      
            <li><label >City:</label>
                <input type="text" name="city"  id="city" value="$_POST[city]" size="18" /> 
                <label >State:</label>  
                <input type="text" name="state"  id="state" value="$_POST[state]" size="2" maxlength="2"/>                     
                <label >Zip:</label>
                <input type="text" name="zip" id="zip" value="$_POST[zip]" size="5" maxlength="5" /></li>      
            <li><label >Phone:</label>
                (<input type="text" name="area_phone" id="phone" value="$_POST[area_phone]" size="3" maxlength="3" />)  &nbsp;&nbsp;
                 <input type="text" name="prefix_phone" value="$_POST[prefix_phone]" size="3" maxlength="3" /> &nbsp;-&nbsp;
                <input type="text" name="phone" value="$_POST[phone]" size="4" maxlength="4" /></li> 
            <li><label >EMail:</label>
                <input type="text" name="email" id="email" value="$_POST[email]" size="25" placeholder=" name@example.com"/></li>
            <li><label >Gender:</label>
                <input type="radio" name="gender" value="Male" checked> Male
                <input type="radio" name="gender" value="Female" > Female
                <input type="radio" name="gender" value="Other" > Other</li>
            <li><label >DOB:</label>
                <input type="text" name="month" id="month" value="$_POST[month]" size="2" maxlength="2" placeholder=" mm" />  &nbsp;/&nbsp;
                 <input type="text" name="day" id="day" value="$_POST[day]" size="2" maxlength="2" placeholder=" dd"/> &nbsp;/&nbsp;
                <input type="text" name="year" id="year" value="$_POST[year]" size="4" maxlength="4" placeholder=" yyyy"/></li>
            <li><textarea rows="5" cols="45"  placeholder=" Have you ever had any medical conditions?"></textarea></li>
            <li><label >Experience Level:</label>
                <input type="radio" name="experience_level" value="Expert" checked> Expert
                <input type="radio" name="experience_level" value="Experienced" > Experienced
                <input type="radio" name="experience_level" value="Novice" > Novice</li> 
            <li><label >Category:</label>
                <input type="radio" name="category" value="Teen" checked/> Teen
                <input type="radio" name="category" value="Adult"/> Adult
                <input type="radio" name="category" value="Senior"/> Senior</li>
                <li><label >Runner's Image</label>
                <input type="file" name="runner_pic" id="runner_pic" enctype="multipart/form-data" accept="image/*"/></li>
            
        </ul>
        <hr>
        <div id="message_line">&nbsp;</div> 
        <hr>
        <div id="button_panel">  

            <input type="reset" value="Clear" class="button" />
            <input type="submit" value="Submit" id="fbut"  class="button" /> 
        </div>              
        </form>
        </fieldset>        
    </div>    
ENDBLOCK;
}                        

function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['fname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['month']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['day']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['year']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['experience_level']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['category']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['runner_pic']));

    return $params;
    }

function store_data_in_db($params) {
    # get a database connection
    $current_year="2017";
    $age="$current_year"-"$params[13]";

    $db = get_db_handle();  ## method in helpers.php+
    
    ##############################################################
    $sql = "SELECT * FROM person WHERE ".
       // "lname = '$params[1]' AND ".
    // "fname='$params[0]' AND ".
    // "address1 = '$params[2]' AND ".
    // "city = '$params[3]' AND ".
    // "state = '$params[4]' AND ".
    // "zip = '$params[5]' AND ".
    // "area_phone = '$params[6]' AND ".
    // "prefix_phone = '$params[7]' AND ".
    // "phone = '$params[8]' AND ".
    "email='$params[9]' ;";
    
##echo "The SQL statement is ",$sql;   
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate! Try again');
        
        }

$UPLOAD_DIR = 'images/';
    $COMPUTER_DIR = '/home/jadrn048/public_html/proj3/images/';
    $fname = $_FILES['runner_pic']['name'];
    $message = "";

        
    if($_FILES['runner_pic']['error'] > 0) {
        $err = $_FILES['runner_pic']['error'];  
        $message .= "Error Code: $err ";
        }     
             
    else {
        move_uploaded_file($_FILES['runner_pic']['tmp_name'], "$UPLOAD_DIR".$fname);
        $message = "Success! Your file has been uploaded to the server</br >\n";
    }         
    echo $message;       
##OK, duplicate check passed, now insert
    $sql = "INSERT INTO person(lname,fname,email,age,experience_level,category,runner_pic) ".
    "VALUES('$params[1]','$params[0]','$params[9]','$age','$params[14]','$params[15]','$params[16]');";
    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    echo("There were $how_many rows affected");
    // print sql_error
    close_connector($db);

    }
        
?>   