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
	print '<br>Your alkaline phosphatase level is low but it may be OK as in ALS it is dangerous when it rises';
	}

//***********************************
// The normal range of albumin levels is 34 to 54 grams per liter (g/L).
if ($Alb_mostrecent>45) 
	{
	if ($Alb_mostrecent>54) 
		{
		print '<br>Your albumin level is high but it may be OK as in ALS it is dangerous when it lowers';
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

//***********************************
// CK between 60 and 174 IU/L
if ($CK_mostrecent>175) 
	{
	if ($CK_mostrecent>200) 
		{
		print '<br>Your Creatine Kinase level is high but it may be OK as in ALS it is dangerous when it lowers';
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

//***********************************
// BMI should be in the 25-30 range
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
	print '<br>It is urgent to rise your weight above 80 kg ';
	}

//***********************************
// Chloride should be 96 to 107 mEq/L
if ($CL_mostrecent>104) 
	{
	if ($CL_mostrecent>107) 
		{
		print '<br>Your Chloride level is high but it may be OK as in ALS it is dangerous when it lowers';
		}
	else
	// Chloride lower than previously
	if ($CL_mostrecent<(0.95 * $CL_previousvalue))
		{
		print '<br>It is important to rise your Chloride level above '.$CL_previousvalue.' mEq/L ';
		}
	}
else
if ($CL_mostrecent>100 and $CL_mostrecent<=104) 
	{
	// Alb lower than previously
	if ($CL_mostrecent<(0.95 * $CL_previousvalue))
		{
		print '<br>It is urgent to rise your Chloride level above 104 mEq/L ';
		}
	else
		{
		print '<br>It is important to rise your Chloride level above 104 mEq/L ';
		}
	}
else
if ($CL_mostrecent<=100) 
	{
	print '<br>It is urgent to rise your Chloride level above 104 mEq/L ';
	}

//***********************************
// Bicarbonate ranges between 23 and 29 mmol/L
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
/*	else
		{
		print '<br>Your bicarbonate level seems OK ';
		} */
	}

//***********************************
// Gamma Glutamyl Transferase between 0 and 51 U/L
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

//***********************************
// Heart rates are ranging from 48-98 beats per minute
if ($Pulse_mostrecent>75) 
	{
		print '<br>It is urgent to lower your Heart rate, aiming below 75 bpm ';
	}
else
if ($Pulse_mostrecent<=75) 
	{
	// Pulse higher than previously
	if ($Pulse_mostrecent>(1.05 * $Pulse_previousvalue))
		{
		print '<br>It is important to lower your Heart rate below '.$Pulse_previousvalue.' bpm ';
		}
/*	else
		{
		print '<br>Your Heart rate seems OK ';
		} */
	}

//***********************************
// Bilirubin should be lower than 21μmol/l
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
<hr />
</div>
</div>
</body>
</html>
