<?php
error_reporting(0);
// $containString = "/\b('sometext')\b/";
// $containEmail = "/\b([A-Za-z0-9._%+-]{2,})+@([A-Za-z0-9._]{2,})+\.[A-Za-z]{2,6}\b/";
// $containPhone = "/^(\+(998))+\-([0-9]{2})+\-([0-9]{3})+\-([0-9]{4})/";
$pattern = "";
$text = "The quick brown fox";
$replaceText = "";
$replacedText = "";
$remWhiteSpace = "The quick ' ' brown fox";
$remNonNumChars = "123,34.00A";
$remNewLineChars = "Twinkle, twinkle, little star,\nHow I wonder what you are.\nUp above the world so high,\nLike a diamond in the sky.";
$textParan = "The quick brown [fox].";
$match = "Not checked yet.";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pattern = $_POST['pattern'];
	$text = $_POST["text"];
	$replaceText = $_POST["replaceText"];
	$remWS = $_POST["remWS"];
	$remNNumChar = $_POST["remNNumChar"];
	$remNewLineChars = $_POST["remNewLineChars"];
	$textParan = $_POST["textParan"];
	$replacedText = preg_replace($pattern, $replaceText, $text);
	if (preg_match($pattern, $text)) {
		$match = "Match!";
	} else {
		$match = "Does not match!";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Valid Form</title>
</head>

<body>
    <h1>Validation Tests</h1>
    <h3>Copy & Paste the Pattern:</h3>

    <h4>
        <code>
            <ul>
                <li>containString --> /\b(quick)\b/</li>
                <li>containEmail --> /\b([A-Za-z0-9._%+-]{2,})+@([A-Za-z0-9._]{2,})+\.[A-Za-z]{2,8}\b/</li>
                <li>containPhone --> /^(\+(998))+\-([0-9]{2})+\-([0-9]{3})+\-([0-9]{4})/</li>
            </ul>
        </code>
    </h4>
    <!-- <?php  ?> -->


    <form action="regex_valid_form.php" method="post">

        <dl>
            <dt>Pattern</dt>
            <dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

            <dt>Text (Ex.)</dt>
            <dd><input type="text" name="text" value="<?= $text ?>"></dd>

            <dt>Replace Text</dt>
            <dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

            <dt>Output Text</dt>
            <dd><?= $match ?></dd>

            <dt>Replaced Text</dt>
            <dd> <code><?= $replacedText ?></code></dd>

            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Check"></dd>

            <dt>&nbsp;</dt>


            <h3>Removes The Whitespaces From A String:</h3>
            <dd>Enter: (Ex:) <input type="text" name="remWS" value="<?= $remWhiteSpace ?>"></dd>
            <dt>&nbsp;</dt>

            <dt>Output Text</dt>
            <dd>
                <?php
				$remWS_Pattern = "/\s+/";
				echo preg_replace($remWS_Pattern, '', $remWS) . "\n";
				?>
            </dd>
            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Remove"></dd>


            <dt>&nbsp;</dt>
            <h3>Non-Numerics Characters Removed (except for dot and comma):</h3>
            <dd>Enter: (Ex:) <input type="text" name="remNNumChar" value="<?= $remNonNumChars ?>"></dd>
            <dt>&nbsp;</dt>

            <dt>Output Text</dt>
            <dd>
                <?php
				$remNonNum_Pattern = "/[^0-9\.\,]*/";
				echo preg_replace($remNonNum_Pattern, '', $remNNumChar) . "\n";
				?>
            </dd>
            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Remove"></dd>


            <dt>&nbsp;</dt>
            <h3>Remove New Lines (Characters) From a String:</h3>

            <dd>
                Enter: (Ex:)
                <textarea rows="8" cols="35" name="remNewLineChars" value="<?= $remNewLineChars ?>">
					<?= $remNewLineChars ?>
				</textarea></dd>
            <dt>&nbsp;</dt>

            <dt>Output Text</dt>
            <dd>
                <?php
				$remNewLine_Pattern = "/\s+/";
				echo preg_replace($remNewLine_Pattern, ' ', trim($remNewLineChars)) . "\n";
				?>
            </dd>
            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Remove"></dd>


            <dt>&nbsp;</dt>
            <h3>Extract Text (Within Parentheses) From A String:</h3>

            <dd>Enter: (Ex:) <input type="text" name="textParan" value="<?= $textParan ?>"></dd>
            <dt>&nbsp;</dt>

            <dt>Output Text</dt>
            <dd>
                <?php
				$extractText_Pattern = "#\[(.*?)\]#";
				preg_match($extractText_Pattern, $textParan, $match) . "\n";
				print($match[1] . "\n");
				?>
            </dd>
            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Extract"></dd>
        </dl>
    </form>


</body>

</ html>