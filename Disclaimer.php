<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
session_start();
extract($_GET);
if (isset($btnLogin)) {
    if(empty($agree)){
        $agreeError = "You must agree to the terms and conditions";
        session_destroy();
    }
    else{
        $_SESSION['agreement'] = "agreed";
        $_SESSION['agree'] = 'agree';
        header("Location: CustomerInfo.php");
        exit();
    }
}
include("header.php");
print <<<EOS
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<h1 class="text-center">Terms and Conditions</h1>
<div class="col-md-10 p-5 m-5">
    I agree to Essentially, a Terms and Conditions agreement is a contract between your business and the user of your website or app - whether they are an individual or a business. You may see Terms and Conditions agreements referred to as Terms of Service (ToS) or Terms of Use (ToU).<br><br>
    There's no practical difference between these terms and companies use them interchangeably. Having a Terms and Conditions agreement is not a legal requirement, but having one is important as they protect your business and create a set of rules that anyone using your app or website must agree to.
    Essentially, a Terms and Conditions agreement is a contract between your business and the user of your website or app - whether they are an individual or a business. <br><br> You may see Terms and Conditions agreements referred to as Terms of Service (ToS) or Terms of Use (ToU). There's no practical difference between these terms and companies use them interchangeably.
    Having a Terms and Conditions agreement is not a legal requirement, but having one is important as they protect your business and create a set of rules that anyone using your app or website must agree to.
    Without a Terms and Conditions agreement your business and customers are lacking clearly defined rights, responsibilities and duties. This could lead to costly disagreements. For example, businesses lacking a payment clause in their Terms and Conditions agreements may receive late payments which affects the business's cash flow and leads to money and time spent on debt collectors.
    In addition, whilst not required by law, Terms and Conditions are a good place to include any disclosures that are required by law.
</div>
<form action="Disclaimer.php" method="get">
<div class="p-5 m-5">
    <div class="error text-danger" role="alert">$agreeError</div><br>
    <input type="checkbox" class="form-check-input" id="agree" name="agree" value="agree">
    <label for="Morning">I have read and agree with terms and conditions </label><br><br>
    <input type='submit' class='btn btn-primary' name='btnLogin' value='Start' />

</div>

</form>
        

EOS;
include("Footer.php");

?>
