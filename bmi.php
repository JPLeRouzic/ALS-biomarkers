<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALS biomarkers and progression</title>
</head>

<body>
<div id="container">
<div id="content">

<?php
// Alkaline phosphatase
$AP_previousvalue = $_REQUEST['AP_previousvalue'];
$AP_mostrecent = $_REQUEST['AP_mostrecent'];

// Albumin
$Alb_previousvalue = $_REQUEST['Alb_previousvalue'];
$Alb_mostrecent = $_REQUEST['Alb_mostrecent'];

// Creatine Kinase
$CK_previousvalue = $_REQUEST['CK_previousvalue'];
$CK_mostrecent = $_REQUEST['CK_mostrecent'];

// Weight
$Weight_previousvalue = $_REQUEST['Weight_previousvalue'];
$Weight_mostrecent = $_REQUEST['Weight_mostrecent'];

// Chloride
$CL_previousvalue = $_REQUEST['CL_previousvalue'];
$CL_mostrecent = $_REQUEST['CL_mostrecent'];

// Bicarbonate
$Bic_previousvalue = $_REQUEST['Bic_previousvalue'];
$Bic_mostrecent = $_REQUEST['Bic_mostrecent'];

// Gamma Glutamyl Transferase
$GGT_previousvalue = $_REQUEST['GGT_previousvalue'];
$GGT_mostrecent = $_REQUEST['GGT_mostrecent'];

// Pulse
$Pulse_previousvalue = $_REQUEST['Pulse_previousvalue'];
$Pulse_mostrecent = $_REQUEST['Pulse_mostrecent'];

// Bilirubin
$Bil_previousvalue = $_REQUEST['Bil_previousvalue'];
$Bil_mostrecent = $_REQUEST['Bil_mostrecent'];

/* Something is wrong
 if ($poids<=0 or $hauteur<=0 or strlen($hauteur)==0 or strlen($poids)==0){ echo 'Something went wrong, please click here ', print( '<a href="index.html">OVDE</a>' );
die();
 }
*/

// print '<br>Bic_previousvalue: '.$Bic_previousvalue ;
// print '<br>Bic_mostrecent: '.$Bic_mostrecent.'<br>' ;

// If some missing value, we fill in it with some innocuous value, as the user may not know it
if (strlen($AP_mostrecent)==0) {
$AP_previousvalue = 60;
$AP_mostrecent = 60;
}
if (strlen($Alb_mostrecent)==0) {
$Alb_previousvalue = 48;
$Alb_mostrecent = 48;
}
if (strlen($CK_mostrecent)==0) {
$CK_previousvalue = 190;
$CK_mostrecent = 190;
}
if (strlen($Weight_mostrecent)==0) {
$Weight_previousvalue = 85;
$Weight_mostrecent = 85;
}
if (strlen($CL_mostrecent)==0) {
$CL_previousvalue = 104;
$CL_mostrecent = 104;
}
if (strlen($Bic_mostrecent)==0) {
$Bic_previousvalue = 25;
$Bic_mostrecent = 25;
}
if (strlen($GGT_mostrecent)==0) {
$GGT_previousvalue = 25;
$GGT_mostrecent = 25;
}
if (strlen($Pulse_mostrecent)==0) {
$Pulse_previousvalue = 70;
$Pulse_mostrecent = 70;
}
if (strlen($Bil_mostrecent)==0) {
$Bil_previousvalue = 8;
$Bil_mostrecent = 8;
}

//***********************************
// The normal value for alkaline phosphatase is 53 to 128 U/L 
print '<br>You report that your alkaline phosphatase level is: '.$AP_mostrecent.' U/L '; ;
if ($AP_mostrecent>75) 
	{
		print '<br>It is urgent to lower your alkaline phosphatase level, aiming below 75 U/L ';
	}
else
if ($AP_mostrecent>53 and $AP_mostrecent<=75) 
	{
	// AP higher than previously
	if ($AP_mostrecent>(1.05 * $AP_previousvalue))
		{
		print '<br>It is important to lower your alkaline phosphatase level below '.$AP_previousvalue.' U/L ';
		}
/*	else
		{
		print '<br>Your alkaline phosphatase level seems OK ';
		} */
	}
else
if ($AP_mostrecent<53) 
	{
	print '<br>Your alkaline phosphatase level is too low, (min: 53 U/L) , but it may be OK as in ALS it is dangerous when it rises';
	}
?>
<br>
<img src="./pictures/Alkaline_Phosphatase.png" width="825" height="600">

<?php
//***********************************
// The normal range of albumin levels is 34 to 54 grams per liter (g/L).
print '<br>You report that your albumin level is: '.$Alb_mostrecent.' g/L '; ;
if ($Alb_mostrecent>45) 
	{
	if ($Alb_mostrecent>54) 
		{
		print '<br>Your albumin level is too high (max: 54 g/L) but it may be OK as in ALS it is dangerous when it lowers';
		}
	else
	// Albumin lower than previously
	if ($Alb_mostrecent<(0.95 * $Alb_previousvalue))
		{
		print '<br>It is important to rise your albumin level above '.$Alb_previousvalue.' g/L ';
		}
	}
else
if ($Alb_mostrecent>34 and $Alb_mostrecent<=45) 
	{
	// Alb lower than previously
	if ($Alb_mostrecent<(0.95 * $Alb_previousvalue))
		{
		print '<br>It is urgent to rise your albumin level above 45 g/L ';
		}
	else
		{
		print '<br>It is important to rise your albumin level above 45 g/L ';
		}
	}
else
if ($Alb_mostrecent<34) 
	{
	print '<br>It is important to rise your albumin level above 45 g/L ';
	}
?>
<br>
<img src="./pictures/Albumin.png" width="825" height="600">

<?php
//***********************************
// CK between 60 and 174 IU/L
print '<br>You report that your Creatine Kinase is: '.$CK_mostrecent.' IU/L '; ;
if ($CK_mostrecent>175) 
	{
	if ($CK_mostrecent>200) 
		{
		print '<br>Your Creatine Kinase level is too high (max: 200 IU/L) but it may be OK as in ALS it is dangerous when it lowers';
		}
	else
	// Creatine Kinase lower than previously
	if ($CK_mostrecent<(0.95 * $CK_previousvalue))
		{
		print '<br>It is important to rise your Creatine Kinase level above '.$CK_previousvalue.' IU/L ';
		}
	}
else
if ($CK_mostrecent<=175) 
	{
	// CK lower than previously
	if ($CK_mostrecent<(0.95 * $CK_previousvalue))
		{
		print '<br>It is urgent to rise your Creatine Kinase level above 175 IU/L ';
		}
	else
		{
		print '<br>It is important to rise your Creatine Kinase level above 175 IU/L ';
		}
	}
?>
<br>
<img src="./pictures/CreatineKinase.png" width="825" height="600">

<?php
//***********************************
// BMI should be in the 25-30 range
print '<br>You report that your weight is: '.$Weight_mostrecent.' kg '; ;
if ($Weight_mostrecent>80) 
	{
	if ($Weight_mostrecent<(0.95 * $Weight_previousvalue))
		{
		print '<br>It is urgent to rise your weight above '.(1.05 * $Weight_previousvalue).' kg ';
		}
	else
		{
		print '<br>It is important to keep your weight above '.(1.05 * $Weight_previousvalue).' kg ';
		}
	}
else
if ($Weight_mostrecent<=80) 
	{
	print '<br>It is urgent to rise your weight above 80 kg, as it is a statistically significant treshhold ';
	}
?>
<br>
<img src="./pictures/Weight.png" width="825" height="600">

<?php
//***********************************
// Chloride should be 95 to 105 mEq/L
print '<br>You report that your chloride level is: '.$CL_mostrecent.' mEq/L '; ;
if ($CL_mostrecent>105) 
	{
	// Chloride lower than previously
	if ($CL_mostrecent<(0.95 * $CL_previousvalue))
		{
		print '<br>It is important to rise your chloride level above '.$CL_previousvalue.' mEq/L ';
		}
	else
		{
		print '<br>Your chloride level is too high (max: 105) but it may be OK as in ALS it is dangerous when it lowers';
		}
	}
else
if ($CL_mostrecent>100 and $CL_mostrecent<=105) 
	{
	// Alb lower than previously
	if ($CL_mostrecent<(0.95 * $CL_previousvalue))
		{
		print '<br>It is urgent to rise your chloride level above 105 mEq/L ';
		}
	else
		{
		print '<br>It is important to rise your chloride level above 105 mEq/L ';
		}
	}
else
if ($CL_mostrecent<=100) 
	{
	print '<br>It is urgent to rise your chloride level above 105 mEq/L ';
	}
?>
<br>
<img src="./pictures/Chloride.png" width="825" height="600">

<?php
//***********************************
// Bicarbonate ranges between 23 and 29 mmol/L
print '<br>You report that your bicarbonate level is: '.$Bic_mostrecent.' mmol/L '; ;
if ($Bic_mostrecent>26) 
	{
		print '<br>It is urgent to lower your bicarbonate level, aiming below 25 mmol/L ';
	}
else
if ($Bic_mostrecent<=26) 
	{
	// Bic higher than previously
	if ($Bic_mostrecent>(1.05 * $Bic_previousvalue))
		{
		print '<br>It is important to lower your bicarbonate level below '.$Bic_previousvalue.' mmol/L ';
		}
	else
		{
		if ($Bic_mostrecent<=18) 
			{
			print '<br>It is important to rise your bicarbonate level higher than 18, but below 26 mmol/L ';
			}
		else 
			{
			print '<br>Your bicarbonate level seems OK ';
			}
		} 
	}
?>
<br>
<img src="./pictures/Bicarbonate.png" width="825" height="600">

<?php
//***********************************
// Gamma Glutamyl Transferase between 0 and 51 U/L
print '<br>You report that your Gamma Glutamyl Transferase level is: '.$GGT_mostrecent.' U/L '; ;
if ($GGT_mostrecent>35) 
	{
		print '<br>It is urgent to lower your Gamma Glutamyl Transferase level, aiming below 35 U/L ';
	}
else
if ($GGT_mostrecent<=35) 
	{
	// GGT higher than previously
	if ($GGT_mostrecent>(1.05 * $GGT_previousvalue))
		{
		print '<br>It is important to lower your Gamma Glutamyl Transferase level below '.$GGT_previousvalue.' U/L ';
		}
/*	else
		{
		print '<br>Your Gamma Glutamyl Transferase level seems OK ';
		} */
	}
?>
<br>
<img src="./pictures/Gamma-GT.png" width="825" height="600">

<?php
//***********************************
// Heart rates are ranging from 48-98 beats per minute
print '<br>You report that your heart rate is: '.$Pulse_mostrecent.' bpm '; ;
if ($Pulse_mostrecent>75) 
	{
		print '<br>It is urgent to lower your heart rate, aiming below 75 bpm ';
	}
else
if ($Pulse_mostrecent<=75) 
	{
	// Pulse higher than previously
	if ($Pulse_mostrecent>(1.05 * $Pulse_previousvalue))
		{
		print '<br>It is important to lower your heart rate below '.$Pulse_previousvalue.' bpm ';
		}
	else
		{
		if ($Pulse_mostrecent<=48) 
			{
			print '<br>Your heart rate seems too slow, it should be higher than 48 bpm ';
			}
		else
			print '<br>Your heart rate seems OK ';
		} 
	}
?>
<br>
<img src="./pictures/Pulse.png" width="825" height="600">

<?php
//***********************************
// Bilirubin should be lower than 21μmol/l
print '<br>You report that your bilirubin level is: '.$Bil_mostrecent.' μmol/L '; ;
if ($Bil_mostrecent>10) 
	{
		print '<br>It is urgent to lower your bilirubin, aiming below 10 μmol/l ';
	}
else
if ($Bil_mostrecent<=10) 
	{
	// Pulse higher than previously
	if ($Bil_mostrecent>(1.05 * $Bil_previousvalue))
		{
		print '<br>It is important to lower your bilirubin below '.$Bil_previousvalue.' μmol/l ';
		}
/*	else
		{
		print '<br>Your bilirubin seems OK ';
		} */
	}
?>
<br>
<img src="./pictures/Bilirubin.png" width="825" height="600">

<hr/>
</div>
</div>
</body>
</html>
