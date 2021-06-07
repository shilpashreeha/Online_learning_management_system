<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
    header("Expires: 0");
    include('./mainInclude/header.php');
    include("./dbConnection.php");

	// following files need to be included
	require_once("./PaytmKit/lib/config_paytm.php");
	require_once("./PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>

<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="images/courses/coursebook.jpg" alt="courses"
        style="height:500px; width:100%; object-fit:cover; box-shadow:10px;">
    </div>
</div>
<!-- End Course Page Banner -->

<!-- Start Main Content -->
<div class="container">
    <h2 class="text-center my-4">Payment Status</h2>
    <form method="post" action="">
        <div class="form-group row">
            <label  class="offset-sm-3 col-form-label">Order ID: </label>
            <div>
            <input class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
            </div>
            <div>
                <input type="submit" class="btn btn-primary mx-4" value="View" onclick="">
            </div>
        </div>
    </form>
</div>

        <div class="container">
        <?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
		  <div class="row justify-content-center">
		    <div class="col-auto">
			  <h2 class="text-center">Payment Receipt</h2>
			  <table class="table table-bordered">
			  <tbody>
			  <?php
				foreach($responseParamList as $paramName => $paramValue) {
                        if(($paramName == "TXNID")||($paramName == "ORDERID")||($paramName == "TXNAMOUNT")||($paramName == "STATUS")){
			  ?>
			  <tr >
				<td><label><?php echo $paramName?></label></td>
				<td><?php echo $paramValue?></td>
			  </tr>
			  <?php
				}}
			  ?>
			  <tr>
              <td></td>
			    <td>
					<button class="btn btn-primary" onclick="javascript:window.print();">Print</button>
					<a href="pdf_gen.php" class="btn btn-success">Download PDF</a>
				</td>
			  </tr>
			</tbody>
		</table>
			</div>
		  </div>
		
	
		<?php
		}
		?>
        </div>
<!-- End Main Content -->

<!-- Start Including contact -->
<div class="mt-5">
<?php
  include('./contact.php');
?>
</div>
<!--End Including contact-->

<!-- Start Including footer -->
<?php
  include('./mainInclude/footer.php');
?>
<!--End Including footer-->