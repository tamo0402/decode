<?php

require_once 'decode_class.php';


/*
 * ��ǃ{�^���������Bthe-awesomeblackhole
 */
if (isset($_POST["decode_sub"])) {
	
	// ���͂��ꂽ�Í����擾�B
	$inputStr = $_POST["input_str"];
	$inputInt = $_POST["input_int"];
	
	$decodeObj = new Decode_Class();
	$decodeString = $decodeObj->getDecodeString($inputStr, $inputInt);
	
	echo $decodeString;
}
?>

<html>
<body>
<form action="./index.php" method="post">
�Í�����<input type="text" name="input_str" value="" />
�Í�����<input type="text" name="input_int" value="" />
<input type="submit" name="decode_sub" value="���" />
</form>
</body>
</html>