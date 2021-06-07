//Ajax Call for Admin Login Verification
function checkadminLogin(){
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();

    $.ajax({
        url:"Admin/admin.php",
        method: "POST",
       
        data:{
            checkLogemail:"checklogmail",
            adminLogEmail : adminLogEmail,
            adminLogPass : adminLogPass,
        },
        success: function (data){
          if(data == 0){
              $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
          }else if(data == 1){
              $("#statusAdminLogMsg").html('<small class="alert alert-Success">Logged in Successfully !</small>');
            setTimeout(()=>{
                window.location.href = "Admin/admindashboard.php";
            },1000);
        }
        },
    });
}