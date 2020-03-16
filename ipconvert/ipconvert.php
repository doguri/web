<html>
<head>
  <title>IP Convert</title>
  <link rel="stylesheet" type="text/css" href="ipconvert.css">
  <script src="ipconvert.js"></script>
</head>
<body>

<?php

#...functions..................................................................

function convertip($value) {
  $num = 0;
  $arr = explode(".", $value);
  foreach ($arr as $key=>$octet) {
    $num += $octet*pow(256,3-$key);
  }
  return $num;
}

function convertnum($value) {
  $ip = "";
  $number = $value;
  for ($i=3; $i>0; $i--) {
    $ip .= floor($number / pow(256,$i)) . ".";
    $number = $number % pow(256,$i);
  }
  $ip .= $number;
  return $ip;
}

#...init.......................................................................

$ip = "";
$num = "";
$mesg = "&nbsp;";

#...process get data...........................................................

foreach ($_GET as $key => $value) {
  eval("\$".$key."=\$_GET['".$key."'];");
}
if ($ip != "" and $num == "") {
  $num = convertip($ip);
  $mesg = "Converted IP to Number";
}
if ($ip == "" and $num != "") {
  $ip = convertnum($num);
  $mesg = "Converted Number to IP";
}

#...html.......................................................................

echo "<form action=".$_SERVER['PHP_SELF']." method=get>";
echo "<table><tr><td colspan=2>";
echo "<a href=ipconvert.php><h2>IP Converter</h2></a>";
echo "</td></tr><tr><td>";
echo "IP:</td><td><input id=ip name=ip value=$ip>";
echo "</td></tr><tr><td>";
echo "Num:</td><td><input id=num name=num value=$num>";
echo "</td></tr><tr><td colspan=2>";
echo "<input type=button value=Clear onclick=\"subclear();\">&nbsp;";
echo "<input type=submit value=Submit>";
echo "</td></tr><tr><td colspan=2>";
echo "<p id=status></p>";
echo "</td></tr></table>";
echo "</form>\n";
echo "<script>subSetStatus('$mesg')</script>\n";

?>
</body>
</html>
