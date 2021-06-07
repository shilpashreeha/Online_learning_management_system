$(document).ready(function(){
    // Ajax Call form if Email Already Exists
    $("#stuemail").on("keypress blur", function(){
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,64}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url:'student/addstudent.php',
            method:'POST',
            data:{
                checkemail:"checkmail",
                stuemail : stuemail,
            },
            success:function(data){
                // 
                if(data!=0){
                    $("#statusMsg2").html('<small style="color:red;">Email Already Exists!!</small>');  
                    $("#signup").attr("disabled",true);
                }else if (data==0 && reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:green;">There You Go!!</small>');  
                    $("#signup").attr("disabled",false);
                }else if(!reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:red;">Please Enter valid Email e.g. example@gmail.com !!</small>');
                    $("#signup").attr("disabled",false);
                }
                if(stuemail == ""){
                    $("#statusMsg2").html('<small style="color:red;">Please Enter Email!!</small>');
                }
            },
        });
    });
});

function addStu(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,64}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // checking form fails on submission
    if(stuname.trim()==""){
        $("#statusMsg1").html('<small style="color:red;">Please Enter Your Name!!</small>');
        $("#stuname").focus();
        return false;
    }else if(stuemail.trim()==""){
        $("#statusMsg2").html('<small style="color:red;">Please Enter Your Email!!</small>');
        $("#stuemail").focus();
        return false;
    }else if(stuemail.trim()!= "" && !reg.test(stuemail)){
        $("#statusMsg2").html('<small style="color:red;">Please Enter valid Email r.g. example@mail.com!!</small>');
        $("#stuemail").focus();
        return false;
    }
    else if(stupass.trim()==""){
        $("#statusMsg3").html('<small style="color:red;">Please Enter Password!!</small>');
        $("#stupass").focus();
        return false;
    }else {
        $.ajax({
            url:'student/addstudent.php',
            method: 'POST',
            dataType:"json",
            data:{
                stusignup : "stusignup",
                stuname : stuname,
                stuemail : stuemail,
                stupass : stupass,
            },
            success:function(data){
                console.log(data)
                if (data =="OK") {
                    $('#successMsg').html("<span class = 'alert alert-success'>Registration Successful!</span>");
                    clearStuRegField();
                }else if(data == "Failed"){
                    $('#successMsg').html("<span  class = 'alert alert-danger'>Unable to Register!</span>");
                }
            },
        });
    }
}

// Empty All fields
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html("");
    $("#statusMsg2").html("");
    $("#statusMsg3").html("");
}


//Ajax Call for Student Login Verification
function checkstuLogin(){
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();

    $.ajax({
        url:"student/addstudent.php",
        method: "POST",
       
        data:{
            checkLogemail:"checklogmail",
            stuLogEmail : stuLogEmail,
            stuLogPass : stuLogPass,
        },
        success: function (data){
          if(data == 0){
              $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
          }else if(data == 1){
            $("#statusLogMsg").html('<div class="spinner-border alert-success" role="status"></div>');
            setTimeout(()=>{
                window.location.href = "index.php";
            },1000);
        }
        },
    });
}