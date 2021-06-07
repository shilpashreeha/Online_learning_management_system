<!-- Start Including header -->
<?php
  include('./mainInclude/header.php');
?>
<!--End Including header-->

<div class="container mt-4" id="Contact">    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact Us</h2>  <!--Contact Us heading-->
    <div class="row"> <!--Start Contact us Row-->
        <div class="col-md-8"> <!--Start Contact us 1st Column-->
            <form action="" method="post">
                <input type="text" class="form-control" name="name" placeholder="Name"><br>
                <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
                <textarea class="form-control" name="message" placeholder="How Can We help You" cols="15" rows="5"  style="height = 150px;"></textarea>
                <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
            </form>
        </div> <!--End Contact us 1st Column-->
        <div class="col-md-4 stripe text-white text-center"> <!--Start Contact us 2nd Column-->
            <h4>I-Educate</h4>
            <p>I-Educate,
                Near Modi Hospital, Manjunathnagar,
                Bengaluru - 560010 <br />
                Phone: 9876543210 <br />
                www.ieducate.com
            </p>
        </div> <!--End Contact us 2nd Column-->
    </div> <!--End Contact us Row-->
  </div> <!--End Contact us Container-->
  
