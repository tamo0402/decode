<?php

ini_set("display_errors", 1);

require_once 'decode_class.php';


/**
 * 解読ボタン押下時。the-awesomeblackhole
 */
if (isset($_POST["decode_sub"])) {

    // 入力された暗号を取得。
    $inputStr = trim($_POST["input_str"]);
    $inputInt = trim($_POST["input_int"]);

    $decodeObj = new Decode_Class($inputStr, $inputInt);
    echo $decodeObj->decode();
}
?>

<html>
<body>
<form action="./index.php" method="post">
暗号文字<input type="text" name="input_str" value="" />
暗号数字<input type="text" name="input_int" value="" />
<input type="submit" name="decode_sub" value="解読" />
</form>
</body>
</html>