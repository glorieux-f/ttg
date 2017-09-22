<?php
header('Content-type: text/html; charset=utf-8');
$text = '';
echo '
Tester TreeTagger
<form name="tokenize" style="width: 100%;" method="POST">
   <textarea name="text" style="width: 100%; height: 10em;">' . $text . '</textarea>
   <input type="submit"/>
</form>
';
if (!isset($_REQUEST['text'])) exit();
$text = $_REQUEST['text'];
$tempnam = tempnam(null, "ttg");
file_put_contents($tempnam, $text);
$cmd = "cat $tempnam | /var/www/obvil-dev.paris-sorbonne.fr/ttg/cmd/tree-tagger-french 2>&1";
echo "<pre>\n";
passthru($cmd);
echo "\n</pre>\n";
exit();
?>
