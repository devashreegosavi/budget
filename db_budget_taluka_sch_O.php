<?php
////////////-------------------------start insert part validation---------------------///////// 
 if(isset($_REQUEST['schemecode']))
{
   $schemecode=$_REQUEST['schemecode'];
   
}
else
{
   $schemecode="";
}

if($schemecode == "") 
{
	header("Location:../admin/index.php");
	exit;
}
session_start();
session_name(); 
$a=session_id();
if(isset($a))
{
	$PHPSESSID=$a;
}
else{$PHPSESSID="";	}


if($PHPSESSID =="")
{
   header("Location:../admin/index.php");
}
if(!empty($PHPSESSID)) 
{
	if (preg_match('/[^a-zA-Z0-9]/i', $PHPSESSID)) 
	{
		unset($PHPSESSID); 
		header("Location:../admin/index.php");
	}	
}
if($PHPSESSID)
{

	ob_start();
}

header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION))
{
	header("Location:../admin/index.php");
}
 ////////////-------------------------end insert part validation---------------------///////// 
 header('Content-Type: text/html; charset=UTF-8');
//include("../includes/db_inc.php");
$dbhost1 = "10.153.14.24";
$dbhost2 = "10.153.14.25";
$dbhost3 = "10.153.14.236";
$dbuser = "dripadmin";
$dbpassword = "pmks@am*";
$dbname = "mahdrip";

$link_access1=mysql_connect($dbhost1,$dbuser,$dbpassword);
mysql_set_charset('utf8',$link_access1);
mysql_select_db($dbname,$link_access1);

$link_access2=mysql_connect($dbhost2,$dbuser,$dbpassword);
mysql_set_charset('utf8',$link_access2);
mysql_select_db($dbname,$link_access2);
	
$link_access3=mysql_connect($dbhost3,$dbuser,$dbpassword);
mysql_set_charset('utf8',$link_access3);
mysql_select_db($dbname,$link_access3);	

include("../includes/validation.class.php");
include("../includes/Date_conversion.php"); 
include_once   'csrf-magic.php';

$url=$_SERVER['REQUEST_URI'];

$path=explode('.',$url);

if($path[1] != 'php')
{
		header('Location: frm_budget_taluka_sch_O.php');
}

if(isset($_REQUEST['schemecode']))
{
	$schemecode=mysql_real_escape_string($schemecode);
}

if(isset($_REQUEST['x']))
{
	$x=$_REQUEST['x'];
	$x=mysql_real_escape_string($x);
}

else
{
$x="";
} 

if(isset($_REQUEST['i']))
{
$i=$_REQUEST['i'];
$i=mysql_real_escape_string($i);
}
else
{
$i="";
} 

if(isset($_REQUEST['msg']))
{
$msg=$_REQUEST['msg'];
$msg=mysql_real_escape_string($msg);
}
else
{
$msg="";
} 

if(isset($_REQUEST['displayName']))
{
$displayName=$_REQUEST['displayName'];
$displayName=mysql_real_escape_string($displayName);
}
else
{
$displayName="";
} 
 
if(isset($_REQUEST['budgetid']))
{
$budgetid=$_REQUEST['budgetid'];
$budgetid=mysql_real_escape_string($budgetid);
}
else
{
$budgetid="";
}

if(isset($_REQUEST['reviseid']))
{
$reviseid=$_REQUEST['reviseid'];
$reviseid=mysql_real_escape_string($reviseid);
}
else
{
$reviseid="";
}

if(isset($_REQUEST['schemetypecode']))
{
$schemetypecode=$_REQUEST['schemetypecode'];
$schemetypecode=mysql_real_escape_string($schemetypecode);
}
else
{
$schemetypecode="";
} 



if(isset($_REQUEST['budgetdate']))
{
$budgetdate=$_REQUEST['budgetdate'];
}
else
{
$budgetdate="";
}

if(isset($_REQUEST['revisedate']))
{
$revisedate=$_REQUEST['revisedate'];
}
else
{
$revisedate="";
}

if(isset($_REQUEST['phytarget']))
{
$phytarget=$_REQUEST['phytarget'];
}
else
{
$phytarget="";
}

if(isset($_REQUEST['fintarget']))
{
$fintarget=$_REQUEST['fintarget'];
}
else
{
$fintarget="";
}
if(isset($_REQUEST['fintargetsc']))
{
      $fintargetsc=$_REQUEST['fintargetsc'];
}
else
{
    $fintargetsc="";
}
if(isset($_REQUEST['fintargetst']))
{
      $fintargetst=$_REQUEST['fintargetst'];
}
else
{
    $fintargetst="";
}
if(isset($_REQUEST['fintargetsmf']))
{
      $fintargetsmf=$_REQUEST['fintargetsmf'];
}
else
{
    $fintargetsmf="";
}
if(isset($_REQUEST['fintargetoth']))
{
      $fintargetoth=$_REQUEST['fintargetoth'];
}
else
{
    $fintargetoth="";
}
if(isset($_REQUEST['budget_flag']))
{
	$budget_flag=$_REQUEST['budget_flag'];
}
else
{
     $budget_flag="";
} 

if(isset($_REQUEST['distcode']))
{
$distcode=$_REQUEST['distcode'];
$distcode=mysql_real_escape_string($distcode);
}
else
{
$distcode="";
} 

if(isset($_REQUEST['hidden_taluka_code']))
{
$hidden_taluka_code=$_REQUEST['hidden_taluka_code'];
}
else
{
$hidden_taluka_code="";
} 

if(isset($_REQUEST['hidden_taluka_code11']))
{
$hidden_taluka_code11=$_REQUEST['hidden_taluka_code11'];
}
else
{
$hidden_taluka_code11="";
} 
 
if(isset($_REQUEST['hidden_divison_code']))
{
$hidden_divison_code=$_REQUEST['hidden_divison_code'];
}
else
{
$hidden_divison_code="";
} 

if(isset($_REQUEST['display']))
{
$display=$_REQUEST['display'];
$display=mysql_real_escape_string($display);
}
else
{
$display="";
}

if(isset($_REQUEST['divisioncode']))
{
$divisioncode=$_REQUEST['divisioncode'];
}
else
{
 $divisioncode="";
}

if(isset( $_SESSION['fin_year']))
{
$year=$_SESSION['fin_year'];
}
else
{
$year='';
}

if(isset( $_SESSION['sessiondistrict']))
{
$sessiondistrict=$_SESSION['sessiondistrict'];
}
else
{
$sessiondistrict='';
} 

$obj = new validation(); 
$obj->add_fields($budgetid, 'req', 'Please enter value for Budget Id');
$obj->add_fields($budgetid, 'num', 'Please enter numeric value for Budget Id');
$obj->add_fields($budgetid, 'max=3', 'Please enter Budget Id value in range'); 
$obj->add_fields($budgetid, 'min=0', 'Please enter Budget Id value in range'); 
$obj->add_fields($budgetid, 'maxnum=510', 'Please enter Budget Id value in range'); 

$obj->add_fields($schemecode, 'req', 'Please select micro irrigation scheme');
$obj->add_fields($schemecode, 'num', 'Please enter numeric value for schemecode Number');
$obj->add_fields($schemecode, 'max=3', 'Please enter valid schemecode no');
$obj->add_fields($schemecode, 'min=0', 'Please enter Scheme code value in range');
$obj->add_fields($schemecode, 'maxnum=510', 'Please enter Scheme code value in range');

 
if($x == "delete")

{

$obj->add_fields($display, 'req', 'Please click on Button');

}   

$error = $obj->validate(); 
if($error)

      {

      echo "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

    }

else

      {

foreach ($_REQUEST as $key1 => $value1)

            {

              $vtype = gettype($value1);

              if($vtype=='array')

              {

                for($g=0;$g<count($value1);$g++)

                {

                  $key1 =  mysql_real_escape_string($value1[$g]);

                }

              }

              else

              {

             $key1 =  mysql_real_escape_string($value1);

              }

            }

      

if($schemecode!='' || $schemecode!=0)
{
	$sql2 = "SELECT * FROM m_schmast where display='Y' and schmast_code='$schemecode'";
	$rs2 = mysql_query($sql2,$link_access3) or die(mysql_error());
	$num_rows2 = mysql_num_rows($rs2);
	if($num_rows2 <= 0)
	header('location:../admin/index.php');
}
if($budgetid!='' || $budgetid!=0)
{
	$sql3 = "SELECT * FROM budget where display='Y' and budget_id='$budgetid'";
	$rs3 = mysql_query($sql3,$link_access3) or die(mysql_error());
	$num_rows3 = mysql_num_rows($rs3);
	if($num_rows3 <= 0)
	header('location:../admin/index.php');
}
if($reviseid!='' || $reviseid!=0)
{
	$sql4 = "SELECT * FROM budget where display='Y' and revise_id='$reviseid'";
	$rs4 = mysql_query($sql4,$link_access3) or die(mysql_error());
	$num_rows4 = mysql_num_rows($rs4);
	if($num_rows4 <= 0)
	header('location:../admin/index.php');
}

if($error=='')

{ 

       $budgetdate=Date_convert($budgetdate);

       $revisedate=Date_convert($revisedate);

      if($reviseid==""  and $budgetid!="" )
	  {
		$delete2="Delete  from `budget` where  schmast_code='$schemecode' and fin_year='$year' and budget_id='$budgetid' and dist_code='$sessiondistrict' and taluka_code!=0 and revise_id=' ' " ;
	  }

         if($reviseid!=""  and $budgetid!="" )

             {

                     $delete2="Delete  from `budget` where  schmast_code='$schemecode' and fin_year='$year' and budget_id='$budgetid' and dist_code='$sessiondistrict' and taluka_code!=0 and revise_id='$reviseid' ";

             }

       $rs123 = mysql_query($delete2,$link_access3) or die('Error in query execution1');
	   $rs123_a = mysql_query($delete2,$link_access1) or die('Error in query execution1');
	   $rs123_b = mysql_query($delete2,$link_access2) or die('Error in query execution1');

       $sql_data = "select * from m_schmast  where display = 'Y' and schmast_code ='$schemecode' order by schmast_code";

       $rs_data = mysql_query($sql_data,$link_access3) or die('Error in query execution');

       $row_data = mysql_fetch_array($rs_data);

       for($i=0;$i<sizeof($hidden_taluka_code);$i++)

            { 

             $sql_divison = "select * from  m_district where display = 'Y' and dist_code ='$sessiondistrict' order by dist_code";

            $rs_divison = mysql_query($sql_divison,$link_access3) or die('Error in query execution');

            $row_divison = mysql_fetch_array($rs_divison);

            $divisoncode=$row_divison['division_code'];

             $taluka=$hidden_taluka_code[$i];

               $fintarget[$i]=$fintarget[$i] * 100000;

				 $fintargetsc[$i]=$fintargetsc[$i] * 100000;
				 $fintargetst[$i]=$fintargetst[$i] * 100000;
				 $fintargetsmf[$i]=$fintargetsmf[$i] * 100000;
				 $fintargetoth[$i]=$fintargetoth[$i] * 100000;

                     $sql1 = "insert into ".$dbname.".`budget`(fin_year,schmast_code,division_code, dist_code,taluka_code,budget_id,revise_id,budget_date,revise_date,phy_target,budget_flag,fin_target,fin_target_sc,fin_target_st,fin_target_smf,fin_target_oth,display) values('$year','$schemecode','$divisoncode', '$sessiondistrict', '$taluka', '$budgetid', '$reviseid', '$budgetdate','$revisedate','$phytarget[$i]','$budget_flag','$fintarget[$i]','$fintargetsc[$i]','$fintargetst[$i]','$fintargetsmf[$i]','$fintargetoth[$i]','Y' )";

                $rs = mysql_query($sql1,$link_access3) or die(mysql_error());
				$rs_a = mysql_query($sql1,$link_access1) or die(mysql_error());
				$rs_b = mysql_query($sql1,$link_access2) or die(mysql_error());

       setTotal($year,$schemecode,$sessiondistrict,$taluka,$budgetid,$reviseid,$schemetypecode,$divisoncode,$link_access1,$link_access2,$link_access3); 
       

      }

            $msg="Record Added";

           header("Location:frm_budget_taluka_sch_O.php?msg=$msg");

}
}
function setTotal($year,$schemecode,$dcode,$tcode,$budgetid,$reviseid,$schemetypecode,$divisoncode,$link_access1,$link_access2,$link_access3)

{

      $dcode;

     $bqry="select distinct(budget_id),dist_code from budget where fin_year='$year' AND schmast_code='$schemecode' AND dist_code='$dcode' And taluka_code='$tcode' AND budget_id!=0  group by budget_id";

                  $totft=0;

					$totftsc=0;
					$totftst=0;
					$totftsmf=0;
					$totftoth=0;

                  $totpt=0;

                  $presanc=0;

                  $bqryst=mysql_query($bqry,$link_access3) or die("Cant Execute bqry");

                  while($row=mysql_fetch_array($bqryst))

                        {

                              $bid=$row['budget_id'];

                              $dcode=$row['dist_code'];

                           $q2="select revise_id,phy_target,fin_target,fin_target_sc,fin_target_st,fin_target_smf,fin_target_oth from budget where budget_id=$bid AND schmast_code=$schemecode AND dist_code =$dcode And taluka_code='$tcode' AND fin_year='$year' order by revise_id DESC";

                              $q2st=mysql_query($q2,$link_access3) or die("Error in q2st.");

                              if($r=mysql_fetch_array($q2st))

                              {

                              $totft=$totft+$r['fin_target'];

							  $totftsc=$totftsc+$r['fin_target_sc'];
							  $totftst=$totftst+$r['fin_target_st'];
							  $totftsmf=$totftsmf+$r['fin_target_smf'];
							  $totftoth=$totftoth+$r['fin_target_oth'];

                              $totpt=$totpt+$r['phy_target'];

                              }

                  }

           
  $chk="select dist_code from budget where fin_year='$year' AND schmast_code='$schemecode' AND dist_code='$dcode' And taluka_code='$tcode' AND budget_id=0 AND revise_id=0";

$chkst=mysql_query($chk,$link_access3);

if(mysql_num_rows($chkst)<=0)

{

  $insertqry="insert into `budget`(fin_year,schmast_code,division_code, dist_code,taluka_code,budget_id,revise_id,phy_target,budget_flag,fin_target,fin_target_sc,fin_target_st,fin_target_smf,fin_target_oth,display) values('$year','$schemecode','$divisoncode','$dcode','$tcode','0','0','$totpt','$budget_flag','$totft','$totftsc','$totftst','$totftsmf','$totftoth','Y')";

$insertst=mysql_query($insertqry,$link_access3) or die("cant insert total target");
$insertst_a=mysql_query($insertqry,$link_access1) or die("cant insert total target");
$insertst_b=mysql_query($insertqry,$link_access2) or die("cant insert total target");

}

else
{
    $updateqry="update budget set phy_target='$totpt',fin_target='$totft',fin_target_sc='$totftsc',fin_target_st='$totftst',fin_target_smf='$totftsmf',fin_target_oth='$totftoth' where fin_year='$year' AND schmast_code='$schemecode' AND dist_code='$dcode' And taluka_code='$tcode' AND budget_id=0 AND revise_id=0";
	$updatest=mysql_query($updateqry,$link_access3) or die("cant update total target");
	$updatest_a=mysql_query($updateqry,$link_access1) or die("cant update total target");
	$updatest_b=mysql_query($updateqry,$link_access2) or die("cant update total target");

}

return;

}
	  
?>

<html>

<head><title>db_budget_taluka_sch_O.php</title>

<body>

</body>

</html>