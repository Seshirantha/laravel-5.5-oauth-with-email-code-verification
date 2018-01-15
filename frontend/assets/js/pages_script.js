$("#get-data").click(function(){

	
		$.ajax({
			url:'http://127.0.0.1:8000/api/get-details',
			contentType: "application/json",
			type:'post',
			headers: {"Authorization": 'Bearer '+localStorage.getItem('token')},
			
		    success: function( response ) {
		        alert(response);
		    },
		    error:function(errors){
		    	///var errors = data.responseJSON;
		    	
		    	
		    	 $.each(errors, function(key, value){
		    	 	
		    	 });
		    }
		});
	});




	//Logout  
$("#logout").click(function(e){

        /*if(localStorage.getItem('token') == null){
            window.location.href = "www.lankabrains.lk";
        }
*/
       $.ajax({
            url:baseUrl+'api/logout',
            Accept:'application/json',
            type:'post',
            headers: {"Authorization": 'Bearer '+localStorage.getItem('token')},
            
            success: function( response ) {
                alert(response);
                localStorage.setItem('token', null);
                localStorage.setItem('userId', null);
                
                window.location.href = "../../";
            },
            error:function(error){

            }
        });
    });