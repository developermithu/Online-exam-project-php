$(document).ready(function(){

//==========  For User Registration  ===========//
$("#submitBtn").click(function(){
    var name         = $("#name").val();
    var email         = $("#email").val();
    var password = $("#password").val();
    var institute    = $("#institute").val();
    var division    = $("#division").val();
    var dataString = 'name=' +name+ '&email=' +email+ '&password=' +password+ '&institute=' +institute+ '&division=' +division;

    $.ajax({
        url: "ajax/getregister.php",
        type: "POST",
        data: dataString,
        success: function(data){
            $("#showmsg").html(data);
        }
    });
    return false; //na dile msg auto hide thake
    
}); 



//==========  For User Login Another way  ===========//
$('#loginBtn').click(function(){
    var em     = $("#email").val();
    var pwd   = $("#password").val();

    $.ajax({
        url: "ajax/getlogin.php",
        type: "POST",
        data:{ email:em, password:pwd},
        success: function(data){

            if ( $.trim(data) == "empty" ) {
                $('.empty').show();

               setTimeout(function(){
                $('.empty').fadeOut();
               }, 2500);

            }
            else if ( $.trim(data) == "error" ) {
                $('.error').show();

                setTimeout(function(){
                    $('.error').fadeOut();
                   }, 2500);

            }else{
                window.location = "exam.php";
            }

        }
    });
    return false;     //must be used
});


}); //ready  function