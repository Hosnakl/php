<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
session_start();
if (!isset($_SESSION['agreement'])) {
    header("Location: Disclaimer.php");
    exit();
}

$_SESSION['correction'] = "";


$_SESSION['days'] = array();
$dayTime = array();
$error = false;
$email_checker = "";
$email = $phone = $postal = $new_error = $name = "";
$name_error = $contact_error = $postal_error = $phone_error = $email_error = "";

function ValidateName($name) {
    $_SESSION['name'] = "";
    $name = trim($name);
    if (empty($name)) {
        $GLOBALS['error'] = true;
        $GLOBALS['name_error'] = "Name is Required";
        return;
    } else {
        $_SESSION['name'] = $name;
    }
}

function ValidatePostal($postal) {
    $_SESSION['postal'] = "";
    if (empty($postal)) {
        $GLOBALS['error'] = true;
        return $GLOBALS['postal_error'] = "Enter your postal code";
    } else {
        $reg = "/^[a-zA-Z][0-9][a-zA-Z] ?[0-9][a-zA-Z][0-9]$/";
        if (!preg_match($reg, $postal)) {
            $GLOBALS['error'] = true;
            return $GLOBALS['postal_error'] = "Follow the rule | XnX nXn XnX";
        } else {
            $_SESSION['postal'] = $postal;
        }
    }
}

function ValidatePhone($phone) {
    $_SESSION['phone'] = "";
    if (empty($phone)) {
        $GLOBALS['error'] = true;
        return $GLOBALS['phone_error'] = "Enter your phone number";
    } else {
        $reg = "/^[2-9][0-9]{2}[-][2-9][0-9]{2}[-][0-9]{4}$/";
        if (!preg_match($reg, $phone)) {
            $GLOBALS['error'] = true;
            return $GLOBALS['phone_error'] = "Incorrect format | (000-000-0000)";
        } else {
            $_SESSION['phone'] = $phone;
        }
    }

}

function ValidateEmail($email, $email_checker) {
    if (empty($email)) {
        $GLOBALS['error'] = true;
        return $GLOBALS['email_error'] = "Enter your email";
    } else {
        $reg = "/^[a-zA-Z\.\d]+[@][a-zA-Z\.]+\.[a-zA-Z]{2,4}$/";
        if (!preg_match($reg, $email)) {
            $GLOBALS['error'] = true;
            return $GLOBALS['email_error'] = "No number | Domain between 2-4 letters";
        } else {
            $_SESSION['email'] = $email;
        }
    }

   
}

if (isset($_POST['next'])) {
    unset($_SESSION['morning']);
    unset($_SESSION['afternoon']);
    unset($_SESSION['evening']);
    $time = isset($_POST['time']);
    $dayTime = array();
    $name = ValidateName($_POST['name']);
    $postal = ValidatePostal($_POST['code']);
    $phone = ValidatePhone($_POST['number']);
    $email = ValidateEmail($_POST['mail'], $email_checker);
    if (empty($_POST['contact'])) {
        $GLOBALS['error'] = true;
        $contact_error = "Choose your method of contact";
    }

    if (empty($_POST['contact'])) {
        $GLOBALS['error'] = true;
        $contact_error = "Choose your method of contact";
    }

    if (isset($_POST['contact']) && $_POST['contact'] == "phone") {
        $_SESSION["contact"] = "phone";
        if (!$time) {
            $GLOBALS['error'] = true;
            $new_error = "You must select contact time for us to call you";
        } else {
            foreach ($_POST['time'] as $x) {
                array_push($dayTime, $x);
                $_SESSION[$x] = $x;
                array_push($_SESSION['days'], $x);
            }
        }
    } else {
        unset($_SESSION['morning']);
        unset($_SESSION['afternoon']);
        unset($_SESSION['evening']);
    }

    if (isset($_POST['contact']) && $_POST['contact'] == "email") {
        $_SESSION["contact"] = "email";
    }

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['code'])) {
        $postal = $_POST['code'];
    }
    if (isset($_POST['number'])) {
        $phone = $_POST['number'];
    }

    if (isset($_POST['mail'])) {
        $email = $_POST['mail'];
    }

    if ($error == null) {
        $_SESSION['correction'] = "correct";
        header("Location: DepositCalculator.php");
        exit();
    }
}

include("header.php");
include("Footer.php");
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<div class="container">
    <h2 class="text-center m-4">Customer Information</h2>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

        <div class="form-group row xx">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5 yy">
                <input type="text" name="name" id="name" class="form-control" value="<?= empty($_SESSION['name']) ? $name : $_SESSION['name'] ?>">
<?php $name_error ? print("<P class='error text-danger'>$name_error</p>") : "" ?>
            </div>
        </div>
        <div class="form-group row xx">
            <label for="code" class="col-sm-2 col-form-label">Postal Code</label>
            <div class="col-sm-5 yy">
                <input type="text" name="code" id="code" class="form-control" value="<?= empty($_SESSION['postal']) ? $postal : $_SESSION['postal'] ?>">
<?php $postal_error ? print("<P class='error text-danger'>$postal_error</p>") : "" ?>
            </div>
        </div>
        <div class="form-group row xx">
            <label for="number" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-5 yy">
                <input type="text" name="number" id="number" class="form-control" value="<?= empty($_SESSION['phone']) ? $phone : $_SESSION['phone'] ?>">
<?php $phone_error ? print("<P class='error text-danger'>$phone_error</p>") : "" ?>
            </div>
        </div>
        <div class="form-group row xx">
            <label for="mail" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-5 yy">
                <input type="text" name="mail" id="mail" class="form-control" value="<?= empty($_SESSION['email']) ? $email : $_SESSION['email'] ?>">
<?php $email_error ? print("<P class='error text-danger'>$email_error</p>") : "" ?>
            </div>
        </div><br><br>
        <div class="form-group row xx">
            <p class="col-md-4"><strong>Preferred Contact Method: </strong> </p>
            <div class="col-md-5 form-check">
                <label class="form-check-label col-3"> <input class="m-1" type="radio" name="contact" value="phone" <?php if (isset($_SESSION['contact']) && $_SESSION['contact'] == "phone") echo ("checked = checked") ?>>Phone</label>
                <label class="form-check-label col-3"><input class="m-1" type="radio" name="contact" value="email" <?php if (isset($_SESSION['contact']) && $_SESSION['contact'] == "email") echo ("checked = checked") ?>>Email</label>

            </div>
<?php $contact_error ? print("<P class='error text-danger'>$contact_error</p>") : "" ?>
<?php $new_error ? print("<P class='error text-danger'>$new_error</p>") : "" ?>
        </div>
        <hr />
        <div class="form-group row xx">
            <p class="col-md-4"><strong>If Phone is selected when we can contact you?</strong></p>
            <div>
                <label class="checkbox-inline"> <input type="checkbox" class="checkbox-inline m-1" name="time[]" value="morning" <?php if (isset($_SESSION['morning'])) echo ("checked = checked") ?> />Morning</label><br>
                <label class="checkbox-inline"><input type="checkbox" class="checkbox-inline m-1" name="time[]" value="afternoon" <?php if (isset($_SESSION['afternoon'])) echo ("checked = checked") ?> />Afternoon</label><br>
                <label class="checkbox-inline"><input type="checkbox" class="checkbox-inline m-1" name="time[]" value="evening" <?php if (isset($_SESSION['evening'])) echo ("checked = checked") ?> />Evening</label><br>
            </div>
        </div><br>
        <div class="btn btn-primary">
            <input type="submit" value="Next" name="next" class="click btn btn-primary m-1" />
        </div><br><br><br><br><br>
    </form>
</div>