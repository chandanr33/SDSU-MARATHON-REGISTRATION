 	// RAJU, CHANDAN
  //   JADRAN 048
  //   PROJECT 3
  //   FALL 2017 
	function isEmpty(fieldValue) {
        return $.trim(fieldValue).length == 0;    
        } 
    function isValidState(state) {                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == $.trim(state))
                return true;
        return false;
        }  
    var handle = $('input[name="runner_pic"]');
    var size=0;

	function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
        }
	function radio1(gender) {
        return $('[name="gender"]:checked').length == 0;    
        } 
    function radio2(experience_level) {
        return $('[name="experience_level"]:checked').length == 0;    
        } 
    function radio3(category) {
        return $('[name="category"]:checked').length == 0;    
        }  

    function validateDate(mon,day,year) { 
        var month = document.getElementById("month").value;
        var day = document.getElementById("day").value;
        var year = document.getElementById("year").value;
        var day = day;
        var month = mon;
        var year = year;            
        var checkDate = new Date(year, month-1, day);    
        var checkDay = checkDate.getDate();
        var checkMonth = checkDate.getMonth()+1;
        var checkYear = checkDate.getFullYear();    
        if(day == checkDay && month == checkMonth && year == checkYear)
               return true;
        else
               return false;         
        }

    
        
$(document).ready(function() {

	var errorStatusHandle = $('#message_line');
	var $radio=$('input:radio[name="nameRadioButton"]');
	$radio.addClass("validate[required]");
	var elementHandle = new Array(17);
	elementHandle[0] = $('input[name="runner_pic"]');
	elementHandle[1] = $('input[name="fname"]');	   
	elementHandle[2] = $('input[name="lname"]');
	elementHandle[3] = $('input[name="address1"]');			   
	elementHandle[4] = $('input[name="city"]');
	elementHandle[5] = $('input[name="state"]');
	elementHandle[6] = $('input[name="zip"]');
	elementHandle[7] = $('input[name="area_phone"]');
	elementHandle[8] = $('input[name="prefix_phone"]');
	elementHandle[9] = $('input[name="phone"]');
	elementHandle[10] = $('input[name="email"]');
	elementHandle[11] = $('input[name="gender"]');
	elementHandle[12] = $('input[name="month"]');
	elementHandle[13] = $('input[name="day"]');
	elementHandle[14] = $('input[name="year"]');
	elementHandle[15] = $('input[name="experience_level"]');
	elementHandle[16] = $('input[name="category"]');   
///////AJAX//////
    function dup_handler(response) {
    if(response == "dup")
    errorStatusHandle.text("Your record appers to be a duplicate! Try again");
    else if(response == "OK") {
        $('form').serialize();
        $('form').submit();
        }
    else
        alert(response);
    }
///////////////////


/////////////
	function isValidData() {

	$('input[name="runner_pic"]').on('change',function(e) {
        size = this.files[0].size;
        });
        if(size == 0) {
               elementHandle[0].addClass("error");
               errorStatusHandle.text("Please select a picture!"); return false; 
               elementHandle[1].focus();
            }
        else if(size/1000 > 1000) {
                elementHandle[0].addClass("error");
                errorStatusHandle.text("Select a picture less than 1 MB!"); return false; 
                elementHandle[1].focus();
            }



    if(isEmpty(elementHandle[1].val())) {
            elementHandle[1].addClass("error");
            errorStatusHandle.text("Please enter your first name!");
            elementHandle[1].focus();
            return false;
            }
	if(isEmpty(elementHandle[2].val())) {
	            elementHandle[2].addClass("error");
	            errorStatusHandle.text("Please enter your last name!");
	            elementHandle[2].focus();            
	            return false;
	        }
	if(isEmpty(elementHandle[3].val())) {
            elementHandle[3].addClass("error");
            errorStatusHandle.text("Please enter your address!");
            elementHandle[3].focus();            
            return false;
            }
    if(isEmpty(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("Please enter your city!");
            elementHandle[4].focus();            
            return false;
            }
    if(isEmpty(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("Please enter your state!");
            elementHandle[5].focus();            
            return false;
            }
    if(!isValidState(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The state is invalid!");
            elementHandle[5].focus();            
            return false;
            }
    if(isEmpty(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("Please enter your zip code!");
            elementHandle[6].focus();            
            return false;
            }
    if(!$.isNumeric(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The zip code is invalid, "+
            "Numbers only!");
            elementHandle[6].focus();            
            return false;
            }
    if(elementHandle[6].val().length != 5) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The zip code must have exactly five digits")
            elementHandle[6].focus();            
            return false;
            }
    if(isEmpty(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("Please enter your area code!");
            elementHandle[7].focus();            
            return false;
            }            
    if(!$.isNumeric(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The area code is invalid, "+
            "Enter numbers only");
            elementHandle[7].focus();            
            return false;
            }
    if(elementHandle[7].val().length != 3) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The area code must have exactly three digits")
            elementHandle[7].focus();            
            return false;
            }   
    if(isEmpty(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("Please enter your phone number prefix");
            elementHandle[8].focus();            
            return false;
            }           
    if(!$.isNumeric(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number prefix is invalid, "+
            "Enter numbers only");
            elementHandle[8].focus();            
            return false;
            }
    if(elementHandle[8].val().length != 3) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number prefix must have exactly three digits")
            elementHandle[8].focus();            
            return false;
            }
    if(isEmpty(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("Please enter your phone number!");
            elementHandle[9].focus();            
            return false;
            }            
    if(!$.isNumeric(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("The phone number is invalid, "+
            "Enter numbers only!");
            elementHandle[9].focus();            
            return false;
            }
    if(elementHandle[9].val().length != 4) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("The phone number must have exactly four digits!")
            elementHandle[9].focus();            
            return false;
            }  
    if(isEmpty(elementHandle[10].val())) {
            elementHandle[10].addClass("error");
            errorStatusHandle.text("Please enter your email address!");
            elementHandle[10].focus();            
            return false;
            }            
    if(!isValidEmail(elementHandle[10].val())) {
            elementHandle[10].addClass("error");
            errorStatusHandle.text("The email address is invalid!");
            elementHandle[10].focus();            
            return false;
            }                                                                                  
    if(radio1(elementHandle[11].val())) {
            elementHandle[11].addClass("error");
            errorStatusHandle.text("Please select your gender!");
            elementHandle[11].focus();            
            return false;
            }
    if(!validateDate(elementHandle[12].val(), elementHandle[13].val(), elementHandle[14].val() )){
            elementHandle[12].addClass("error");
            errorStatusHandle.text("Please enter a valid date!");
            elementHandle[12].focus();            
            return false;
            }
    if(radio2(elementHandle[15].val())) {
            elementHandle[15].addClass("error");
            errorStatusHandle.text("Please select your experience level!");
            elementHandle[15].focus();            
            return false;
            }
    if(radio3(elementHandle[16].val())) {
            elementHandle[16].addClass("error");
            errorStatusHandle.text("Please select your category!");
            elementHandle[16].focus();            
            return false;
            }
 return true;
        }  
   elementHandle[0].focus();


// handlers
		elementHandle[0].on('blur', function() {
        if(isEmpty(elementHandle[0].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        	});        
    	elementHandle[10].on('blur', function() {
        if(isEmpty(elementHandle[10].val()))
            return;
        if(isValidEmail(elementHandle[10].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
            }
        	});  
        elementHandle[12].on('blur', function() {
        if(isEmpty(elementHandle[12].val()))
            return
        $(this).removeClass("error");
        errorStatusHandle.text("");
            });    
     	elementHandle[13].on('blur', function() {
        if(isEmpty(elementHandle[13].val()))
            return
        $(this).removeClass("error");
        errorStatusHandle.text("");
            });   
    	elementHandle[14].on('blur', function() {
        if(isEmpty(elementHandle[14].val()))
            return
        $(this).removeClass("error");
        errorStatusHandle.text("");
            });   
        elementHandle[12].on('keyup', function() {
        if(elementHandle[12].val().length == 2)
            elementHandle[13].focus();
            });     
    	elementHandle[13].on('keyup', function() {
        if(elementHandle[13].val().length == 2)
            elementHandle[14].focus();
            });    
    	elementHandle[14].on('keyup', function() {
        if(elementHandle[14].val().length == 4)
            elementHandle[15].focus();
            });  
    	elementHandle[5].on('keyup', function() {
        elementHandle[5].val(elementHandle[5].val().toUpperCase());
        });       
    	elementHandle[7].on('keyup', function() {
        if(elementHandle[7].val().length == 3)
            elementHandle[8].focus();
            });            
    	elementHandle[8].on('keyup', function() {
        if(elementHandle[8].val().length == 3)
            elementHandle[9].focus();
            });            
    $(':submit').on('click', function(e) {
        for(var i=0; i < 17; i++)
        elementHandle[i].removeClass("error");
        errorStatusHandle.text("");
        return isValidData();
        });  

    $(':submit').on('click', function(e) {
        e.preventDefault();
        var url = "check_dup.php";
        var email = $('input:text[name=email]').val();
        url += "?email="+email;
        $.get(url, dup_handler);
        });

    $(':reset').on('click', function() {
        for(var i=0; i < 17; i++)
            elementHandle[i].removeClass("error");
        errorStatusHandle.text("");
        });     
    $('input[name="runner_pic"]').on('change',function(e) {
            errorStatusHandle.text("");
        });               
});