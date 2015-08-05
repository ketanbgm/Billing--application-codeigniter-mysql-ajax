<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
 
class Numbertowords {
 
/*function convert_number($number) {
if (($number < 0) || ($number > 999999999)) {
throw new Exception("Number is out of range");
}
 
$Gn = floor($number / 1000000);
$number -= $Gn * 1000000;
$kn = floor($number / 1000);
$number -= $kn * 1000;
$Hn = floor($number / 100);
$number -= $Hn * 100;
$Dn = floor($number / 10);
$n = $number % 10;
 
$res = "";
 
if ($Gn) {
$res .= $this->convert_number($Gn) . "Million";
}
 
if ($kn) {
$res .= (empty($res) ? "" : " ") .$this->convert_number($kn) . " Thousand";
}
 
if ($Hn) {
$res .= (empty($res) ? "" : " ") .$this->convert_number($Hn) . " Hundred";
}
 
$ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
 
if ($Dn || $n) {
if (!empty($res)) {
$res .= " and ";
}
 
if ($Dn < 2) {
$res .= $ones[$Dn * 10 + $n];
} else {
$res .= $tens[$Dn];
 
if ($n) {
$res .= "-" . $ones[$n];
}
}
}
 
if (empty($res)) {
$res = "zero";
}
 
return $res;
}*/
 
 
public function convert_number($number)
{
	$denom= array('crore','lakh','thousand','hundred');
	$denom1 = array('one','two','three','four','five','six','seven','eight','nine');
	$denom10 = array('ten','twenty','thirty','fourty','fifty','sixty','seventy','eighty','ninty');
	$denom11 = array('eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');
	$i=1;$output='';$abc=0;
	if($number == 0)
	{
		return 'zero';
	}
	while(round($number) > 0)
	{
		$digit1 = fmod($number ,10);
		$number = floor($number / 10);
		$dummy = $number;
		if($i > 10)
		{
			return 'Number Exceeded Computation Limits';
		}
		if($i==1 || $i==4 || $i==6 || $i==8)
		{
			$digit2= fmod($dummy ,10);;
			if($digit2 == 1)
			{
				if($digit1 != 0)
				$number = floor($number / 10);
			}
		}
		if($digit1 == 0)
		{
			 
			$i++;
			$test='';
			continue;
		}
		switch($i)
		{
			case 1:if (intval($digit2) == 1)
					{
						$output = $denom11[intval($digit1)-1].' '.$output;
						$digit2 =0;
						$i++;
					}
					else
					{
						$output = $denom1[intval($digit1)-1].' '.$output;
					}
					 
					break;
			case 2:$output = $denom10[intval($digit1)-1 ].' '.$output;
					 
					break;
			 
			case 3:$output = $denom1[intval($digit1)-1].' '.$denom[3].' '.$output;
				break;
			 
			case 4:if (intval($digit2) == 1)
					{       
						$output = $denom11[intval($digit1)-1].' '.$denom[2].' '.$output;

						$i++;
					}
					else if($digit2 == 0)
					{
						$output = $denom1[intval($digit1)-1].' '.$denom[2].' '.$output;
					}
					else
						$test = $denom1[intval($digit1)-1];
						 
					break;
			case 5:$output = $denom10[intval($digit1)-1].' '.$test.' '.$denom[2].' '.$output;
					break;

			case 6:if (intval($digit2) == 1)
					{       
						$output = $denom11[intval($digit1)-1].' '.$denom[1].' '.$output;

						$i++;
					}
					else if($digit2 == 0)
					{
						$output = $denom1[intval($digit1)-1].' '.$denom[1].' '.$output;
					}
					else
						$test = $denom1[intval($digit1)-1];break;
			case 7:$output = $denom10[intval($digit1)-1].' '.$test.' '.$denom[1].' '.$output;break;

			case 8:if (intval($digit2) == 1)
					{       
						$output = $denom11[intval($digit1)-1].' '.$denom[0].' '.$output;

						$i++;
					}
					else if($digit2 == 0)
					{
						$output = $denom1[intval($digit1)-1].' '.$denom[0].' '.$output;
					}
					else
						$test = $denom1[intval($digit1)-1];break;
			case 9:$output = $denom10[intval($digit1)-1].' '.$test.' '.$denom[0].' '.$output;break;
			case 10:$output = $denom1[intval($digit1)-1].' '.$denom[3].' '.$output; break;
			 
		}
		$i++;
	}
	return $output;
			 
} 
}
?>