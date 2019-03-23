
<?php
error_reporting(0);
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$date = $_REQUEST["date"];
$gender = $_REQUEST["gender"];
$mar_status = $_REQUEST["mar_status"];
$address = $_REQUEST["address"];
$city = $_REQUEST["city"];
$post_code = $_REQUEST["post_code"];
$home_phone = $_REQUEST["home_phone"];
$mob_phone = $_REQUEST["mob_phone"];
$card_num = $_REQUEST["card_num"];
$card_date = $_REQUEST["card_date"];
$salary = $_REQUEST["salary"];
$url = $_REQUEST["url"];
$gpa = $_REQUEST["gpa"];
$isPost = $_SERVER["REQUEST_METHOD"] == "POST";
$isGet = $_SERVER["REQUEST_METHOD"] == "GET";
$isNameError = $isPost && !preg_match('/^[\S^0-9.]{2,}$/', $name);
$isEmailError = $isPost && !preg_match('/^\b([A-Za-z0-9._%+-]{2,})+@([A-Za-z0-9._]{2,})+\.[A-Za-z]{2,6}\b$/', $email);
$isUsernameError = $isPost && !preg_match('/^[\S]{5,}$/', $username);
$isPasswordError = $isPost && !preg_match('/^(?=.*[a-z])(?=.*[A-Z]{3,})(?=.*\d)[a-zA-Z\d]{6,10}$/', $password);
$isDateError = $isPost && !preg_match('/^([0-2][0-9]|(3)[0-1])(\.)(((0)[0-9])|((1)[0-2]))(\.)\d{4}$/', $date);
$isGenderError = $isPost && !preg_match('/^(Male|Female)$/i', $gender);
$isMarStatusError = $isPost && !preg_match('/^(Single|Married|Divorced|Widowed)$/i', $mar_status);
$isPostCodeError = $isPost && !preg_match('/^\d{6}$/i', $post_code);
$isHomePhoneError = $isPost && !preg_match('/^([0-9]{2})+[\s]?+([0-9]{7})$/', $home_phone);
$isMobPhoneError = $isPost && !preg_match('/^([0-9]{2})+[\s]?+([0-9]{7})$/', $mob_phone);
$isCardNumError = $isPost && !preg_match('/^(\d{4}\s\d{4}\s\d{4}\s\d{4})$/', $card_num);
$isCardDateError = $isPost && !preg_match('/^([0-2][0-9]|(3)[0-1])(\.)(((0)[0-9])|((1)[0-2]))(\.)\d{4}$/', $card_date);
$isSalaryError = $isPost && !preg_match('/^((UZS)\s\d{3}[,]\d{3}[.]\d{2})$/', $salary);
$isUrlError = $isPost && !preg_match('/^((http:\/\/))[a-zA-Z0-9._-]+\.[a-zA-Z.]{2,8}$/', $url);
$isGpaError = $isPost && !preg_match('/^((0|1|2|3|4)\.(0|1|2|3|4|5))$/', $gpa);
$isFormError = $isNameError || $isEmailError || $isPasswordError || $isAddressError    || $isCityError || $isCityError
    || $isPostCodeError || $isHomePhoneError || $isMobPhoneError || $isCardNumError || $isCardDateError
    || $isSalaryError || $isUrlError || $isGpaError;
//echo $city." ".$state." ".$zip;
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <style media="screen">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Registration Form</h1>

    <p>
        This form validates user input and then displays "Thank You" page.
    </p>

    <hr />

    <?php if ($isGet || $isFormError) { ?>

    <form action="index.php" method="post">
        <h2>Please, Fill Below Fields Correctly</h2>
        <div class="container">
            <dl>
                <dt>Name <span class="error"><?= $isNameError ? "Please, Enter Your Name Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="name" value="<?= $name ?>">
                </dd>
                <dt>Email <span class="error"><?= $isEmailError ? "Please, Enter Your E-mail Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="email" value="<?= $email ?>">
                </dd>
                <dt>Username <span class="error"><?= $isUsernameError ? "Please, Enter Your Username Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="username" value="<?= $username ?>">
                </dd>
                <dt>Password <span class="error"><?= $isPasswordError ? "Please, Enter Your Password Here" : "" ?></span></dt>
                <dd>
                    <input type="password" name="password" value="<?= $password ?>">
                </dd>
                <dt>Confirm Password <span class="error"><?= $isPasswordError ? "Please, Enter Confirm Your Password Here" : "" ?></span></dt>
                <dd>
                    <input type="password" name="password" value="<?= $password ?>">
                </dd>
                <dt>Date of Birth (dd.MM.yyyy) <span class="error"><?= $isDateError ? "Please, Enter Your Date of Birth Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="date" value="<?= $date ?>">
                </dd>
                <dt>Gender (Male, Female) <span class="error"><?= $isGenderError ? "Please, Enter Your Gender Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="gender" value="<?= $gender ?>">
                </dd>
                <dt>Marital Status (Single, Married, Divorced, Widowed) <span class="error"><?= $isMarStatusError ? "Please, Enter Your Gender Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="mar_status" value="<?= $mar_status ?>">
                </dd>
                <dt>Address</dt>
                <dd>
                    <input type="text" name="address" value="<?= $address ?>">
                </dd>
                <dt>City</dt>
                <dd>
                    <input type="text" name="city" value="<?= $city ?>">
                </dd>
                <dt>Postal Code <span class="error"><?= $isPostCodeError ? "Please, Enter Your Postal Code Here" : "" ?></span></dt>
                <dd>
                    <input type="number" name="post_code" value="<?= $post_code ?>">
                </dd>
                <dt>Home Phone <span class="error"><?= $isHomePhoneError ? "Please, Enter Your Home Phone Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="home_phone" value="<?= $home_phone ?>">
                </dd>
                <dt>Mobile Phone <span class="error"><?= $isMobPhoneError ? "Please, Enter Your Mobile Phone Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="mob_phone" value="<?= $mob_phone ?>">
                </dd>
                <dt>Credit Card Number <span class="error"><?= $isCardNumError ? "Please, Enter Your Credit Card Number Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="card_num" value="<?= $card_num ?>">
                </dd>
                <dt>Credit Card Expiry Date <span class="error"><?= $isCardDateError ? "Please, Enter Your Credit Card Expiry Date Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="card_date" value="<?= $card_date ?>">
                </dd>
                <dt>Monthly Salary <span class="error"><?= $isSalaryError ? "Please, Enter Monthly Salary Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="salary" value="<?= $salary ?>">
                </dd>
                <dt>Web Site URL <span class="error"><?= $isUrlError ? "Please, Enter Your Web Site URL Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="url" value="<?= $url ?>">
                </dd>
                <dt>Overall GPA <span class="error"><?= $isGpaError ? "Please, Enter Your Overall GPA Here" : "" ?></span></dt>
                <dd>
                    <input type="text" name="gpa" value="<?= $gpa ?>">
                </dd>

                <!-- Write other fiels similar to Name as specified in lab6.pdf -->
            </dl>
        </div>

        <div>
            <input type="submit" value="Register">
        </div>
    </form>
    <?php
} else { ?>
    <h1>Thank you for your Registration.</h1>
    <?php
} ?>

</body>

</html>