// before login index

$(document).ready(function() {

  
  
	

  /*signup*/
    $("#submitSignUp").click(function(){
         
          var name = $('#name').val();
          var email = $('#signupEmail').val();
          var password = $('#pwd').val();
          var confirmPassword = $('#confirmPwd').val();


          $.ajax({  url: baseUrl+'api/register',
                    type: 'POST',
                    data: {
                      name:name,
                      email:email,
                      password:password,
                      confirm_password:confirmPassword},
                    success: function(detail){
                        $('#name_error').html('');
                        $('#email_error').html('');
                        $('#pass_error').html('');
                        $('#cof_pass_error').html('');
                      //alert(detail);
                        $('#signupModal').modal('toggle');
                       
                        localStorage.setItem( 'token', detail.success.token);
                        localStorage.setItem( 'id' , detail.success.id);
              
                        
                          window.location.href = "get_code.php";   
                      
                          
                         
                      
                      
                    },
                    error: function(data ){
                    
                        $('#name_error').html('');
                        $('#email_error').html('');
                        $('#pass_error').html('');
                        $('#cof_pass_error').html('');

                       var errors = data.responseJSON;

                       $.each(errors, function(key, value){
                        
                          
                          if(key == 'name'){
                           
                            $('#name_error').html(value);
                          }
                          if(key=='email'){
                          
                            $('#email_error').html(value);
                          }
                          if(key=='password'){
                           
                            $('#pass_error').html(value);
                          }
                          if(key='confirm_password'){
                            
                            $('#cof_pass_error').html(value);
                          }

                          
                       });

                    }
          });
       
    });

    
     //Login
     $("#submitLogin").click(function(){
       
        var email = $('#loginEmail').val();
        var password = $('#loginPwd').val();
        /*var email = "setechuok@gmail.com";
        var password = "123";*/
        
        
        $.ajax({
            url: baseUrl +'api/login',
            type: 'POST',
            data: {
              email:email,
              password:password
            },
            success: function(detail){

                $('#email_log_error').html('');
                $('#pass_log_error').html('');
                $('#cred_error').html('');
                $('#verification_error').html('');

               
              
              localStorage.setItem( 'token', detail.success.token);
              
              if(localStorage.getItem('token') == null){
                    window.location.href = "index.php";
              }else{
                    window.location.href = "views/pages/home.php";
              }

            },
            error: function(data){
                      
                $('#email_log_error').html('');
                $('#pass_log_error').html('');
                $('#cred_error').html('');
                $('#verification_error').html('');

               var errors = data.responseJSON;

               $.each(errors, function(key, value){
                  
                  if( key =='email'){
                  
                    $('#email_log_error').html(value);
                  }
                  if(key =='password'){
                   
                    $('#pass_log_error').html(value);
                  }
                  if(key =='error'){
                    $('#cred_error').html(value);
                  }
                  if(key == 'verification'){
                    $('#verification_error').html(value);
                  }
               });
            }
         
        });

    
       // event.preventDefault();
        // event.unbind();
     });

    /*$("#loginForm").submit(function(event) {

    
      });
*/

//code submit
     $("#code-submit").click(function(){
       //alert('senc code clicked')
        var code = $('#code').val();
       // alert(code);
        //var password = $('#loginPwd').val();
        /*var code = "setechuok@gmail.com";
        var password = "123";*/
        var id = localStorage.getItem('id');
        //alert(id)

        //alert(localStorage.getItem('token'));
        /*if(localStorage.getItem('token') == null){
            window.location.href = "www.lankabrains.lk";
        }*/
          $.ajax({
            url: baseUrl +'api/verify',
            Accept: "application/json",
            ContentType:"application/json",
            type: 'POST',
            headers: {"Authorization": 'Bearer '+localStorage.getItem('token')},
            data: {
              code:code,
              id:id
            },
            success: function(detail){

                
              //alert('got response');
               
                
              //localStorage.setItem( 'token', detail.success.token);
              if(localStorage.getItem('token') == null){
                    window.location.href = "index.php";
              }else{
                  window.location.href = "views/pages/home.php";
              }
            }/*,
            error: function(data){
                      
               

               var errors = data.responseJSON;
               alert("errors");
            
            }*/
         
        });
        
        

       
     });






      $('#fb, #fb1').on('click',function(){
          mywindow = window.open(baseUrl+"api/login/facebook", "mywindow",
          "location=1,status=1,scrollbars=1, width=500,height=700%");
          mywindow.moveTo(0, 0);
        $.ajax({
          url: baseUrl+'login/facebook',
          type: 'GET',
          success: function(data){
            alert(data[0].fname);
          // //called when successful sent those data  to profile page
            mywindow.close();
          // $('#ajaxphp-results').html(data);
          // },
          // error: function(e) {

          }
        });
      });
 


      $('#gp, #gp1').on('click',function(){
        mywindow = window.open(baseUrl+"api/login/google", "mywindow",
        "location=1,status=1,scrollbars=1, width=500,height=700");
        mywindow.moveTo(0, 0);

        $.ajax({

          url: baseUrl+'login/google',
          type: 'GET',
         
          success: function(data) {
          //called when successful sent those data  to profile page
          alert(data);

          $('#ajaxphp-results').html(data);
          },
          error: function(e) {

          }
        });

      });

      $('#ln, #ln1').on('click',function(){

        mywindow = window.open(baseUrl+"api/login/linkedin", "mywindow",
        "location=1,status=1,scrollbars=1, width=500,height=700");
        mywindow.moveTo(0, 0);

        $.ajax({   
          url: baseUrl+'login/linkedin',
          type: 'GET',
          success: function() {
          //called when successful sent those data  to profile page
            $('#ajaxphp-results').html(data);
          },
          error: function(e) {

          }
        });
      });



 
});


  