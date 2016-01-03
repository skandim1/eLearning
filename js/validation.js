    		function LoginValidation()
             {
            	 var uname = document.login.username;
            	 var passwd = document.login.password;
            	 if(username_validation(uname))
            		 {
            		     if(password_validation(passwd))
            		    	 {
            		    	 	//display message 
            		    	    return true;
            		    	 }
            		 }
            	 return false;
             }
             function SignUpValidation()
             {
            	 debugger;
            	 var fname = document.SignUp.fname;
            	 var lname = document.SignUp.lname;
            	 var uname = document.SignUp.uname;
            	 var uname1 = document.SignUp.uname1;
            	 var passwd = document.SignUp.passwd;	 
            	 
            	 var sex = document.SignUp.sex;
            	 
            	 
            	 if(allletter(fname,lname))
            		 {
            	 if(username_validation(uname))
        		 {
            		 if(uname1.value != uname.value)
            			 {
            			    uname1.focus();
            			    return false;
            			 }
        		     if(password_validation(passwd))
        		    	 {
        		    	    if(validsex(sex))
        		    	    	{
        		    	    	    return true;
        		    	    	}
        		    	 }
        		 }
            		 }
        	 return false;
             }
             function allletter(fname,lname)
             {
            	 var letters = /^[A-Za-z]+$/;
            	 if(fname.value.match(letters))
            		 {
            		 if(lname.value.match(letters))
            			 {
            			 return true;
            			 }
            		 else
            			 {
            			 alert('Last Name must have alphabet characters only');
            			 lname.focus();
            			 return false;
            			 }
            		 }
            	 else {
        			 alert('First Name must have alphabet characters only');
        			 fname.focus();
        			 return false;
            		 
            	 }
             }
             function username_validation(uname)
             {
            	 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            	 if(uname.value.match(mailformat))
            		 {
            		 return true;
            		 }
            	 else
            		 {
            		 alert("Invalid Username");
            		 uname.focus();
            		 return false;
            		 }
             }
             function password_validation(passwd)
             {
                 var passwd_len = passwd.value.length;
            	 if(passwd_len == 0)
            		 {
            		 alert("Invalid Password");
            		 passwd.focus();
            		 return false;
            		 }
            	 else
            	 {
            		return true; 
            	 }
            	
             }
             function validsex(sex)
             {
            	 if(!(sex.value == 'male' || sex.value == 'female'))
            		 {
            		 alert("select Male/Female");
            		 return false;
            		 }
            	 else
            		 {
            		 alert("Successfully Signed Up");
            		 window.location.reload();
            		 return true;
            		 }
             }