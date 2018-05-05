<?php
	header("Pragma:public");
	header("Expires:0");
	header("Cache-control:must-revalidate,Post-check=0,Pre-check=0");
	header("Cache-control:private",false);

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
	include("../includes/validsession.php");
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
	include("../includes/validation.js");
	include("../includes/dateadd.inc");
	include("../includes/Date_conversion.php");
	include("../includes/msglist3.php");
	include("update_functions.php");
	include_once 'csrf-magic.php';
	
	if(isset($_SESSION['sessionflow']))
	{
		$sessionflow=$_SESSION['sessionflow'];
	}
	else
	{
		$sessionflow='';
	}
	
	if(isset($_SESSION['fin_year']))
	{
		$year=$_SESSION['fin_year'];
	}
	else
	{
		$year='';
	}
	
	if(isset($_REQUEST['msg']))
	{
		$msg=$_REQUEST['msg'];
	}
	else
	{
		$msg="";
	}

	if(isset($_REQUEST['flag']))
	{
		$flag=$_REQUEST['flag'];
	}
	else
	{
		$flag="";
	}

	if(isset($_REQUEST['radio1']))
	{
		$radio1=$_REQUEST['radio1'];
	}
	else
	{
		$radio1="";
	}
	if(isset($_REQUEST['radio2']))
	{
		$radio2=$_REQUEST['radio2'];
	}
	else
	{
		$radio2="";
	}

	if(isset($_REQUEST['j']))
	{
		$j=$_REQUEST['j'];
	}
	else
	{
		$j="";
	}

	if(isset($_REQUEST['displayName']))
	{
		$displayName=$_REQUEST['displayName'];
	}
	else
	{
		$displayName="";
	}

	if(isset($_REQUEST['x']))
	{
		$x=$_REQUEST['x'];
	}
	else
	{
		$x="";
	}
	
	if(isset($_REQUEST['i']))
	{
		$i=$_REQUEST['i'];
	}
	else
	{
		$i="";
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

	if(isset($_REQUEST['schemecode']))
	{
		$schemecode=$_REQUEST['schemecode'];
	}
	else
	{
		$schemecode="";
	}

	if(isset($_REQUEST['division_code']))
	{
		$division_code=$_REQUEST['division_code'];
	}
	else
	{
		$division_code="";
	}
	
	if(isset($_REQUEST['budgetid']))
	{
		$budgetid=$_REQUEST['budgetid'];
	}
	else
	{
		$budgetid="";
	}
	
	if(isset($_REQUEST['hidden_dist_code']))
	{
		$hidden_dist_code=$_REQUEST['hidden_dist_code'];
	}
	else
	{
		$hidden_dist_code="";
	}
	
	if(isset($_REQUEST['hidden_dist_code11']))
	{
		$hidden_dist_code11=$_REQUEST['hidden_dist_code11'];
	}
	else
	{
		$hidden_dist_code11="";
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
	
	if(isset($_REQUEST['display']))
	{
		$display=$_REQUEST['display'];
	}
	else
	{
		$display="";
	}
	
	if(isset($_REQUEST['distname']))
	{
		$distname=$_REQUEST['distname'];
	}
	else
	{
		$distname="";
	}
	
	if(isset($_REQUEST['finyear']))
	{
		$finyear=$_REQUEST['finyear'];
	}
	else
	{
		$finyear="";
	}
	
	if(isset($_REQUEST['total']))
	{
		$total=$_REQUEST['total'];
	}
	else
	{
		$total="";
	}
	
	if(isset($_REQUEST['total1']))
	{
		$total1=$_REQUEST['total1'];
	}
	else
	{
		$total1="";
	}

	if(isset($_REQUEST['reviseid']))
	{
		$reviseid=$_REQUEST['reviseid'];
	}
	else
	{
		$reviseid="";
	}

	if(isset($_REQUEST['phytargettotal']))
	{
		$phytargettotal=$_REQUEST['phytargettotal'];
	}
	else
	{
		$phytargettotal="";
	}

	if(isset($_REQUEST['fintargettotal']))
	{
		$fintargettotal=$_REQUEST['fintargettotal'];
	}
	else
	{
		$fintargettotal="";
	}

	if($finyear!='' && $schemecode!='' && $budgetid=='')
	{
		//update_budget_taluka_zero($schemecode,$finyear);
		//update_budget_taluka_notzero($schemecode,$finyear);
	}
	?>

	<html>
		<head>
			<title>Districtwise Action Plan</title>
			<!-- script language="JavaScript" type="text/javascript" src="ajax_search_filing.js"></script -->
			<link rel="stylesheet" href="../includes/style.css" type="text/css">
			<link rel="stylesheet" href="../includes/styles/calendar.css" type="text/css">
			<script type="text/javascript">
				window.history.forward();
				function noBack(){ window.history.forward(); }
			</script>
			<script language="JavaScript" src="../includes/javascript/simplecalendar_m.js" type="text/javascript"></script>
			<STYLE type="text/css">
				hr
				{
					width:90%;
				}

				#actionplan
				{
					font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
					width:700px;
					border-collapse:collapse;
					margin-left:auto;
					margin-right:auto;
					position:relative;
					top:95px;
				}

				#actionplan td, #actionplan th
				{
					font-size:0.77em;
					border:1px solid gray;
					padding:2px 5px 2px 5px;
				}

				#actionplan td
				{
					width:40px;
					background:#F8F8FF;
				}

				#actionplan th
				{
					font-size:0.75em;
					text-align:center;
					padding-top:5px;
					padding-bottom:4px;
					background-color:gray;
					border:1px solid white;
					color:#ffffff;
				}

				#actionplan tr.alt td
				{
					color:black;
					background-color:#F1F1F1;
				}

				#actionplan tr.total,#actionplan tr.total td
				{
					background-color:#BFBFBF;
					color:black;width:40px;
				}

				#actionplan input
				{
					text-align:right;
				}

				#actionplan .dist
				{
					text-align:left;
					text-transform:capitalize;
					background:#C1C1C1;
					color:#010101;
					border:1px thin black;
				}

				.divsn
				{
					margin-left:68px;font-size:15px; 
				}
			</STYLE> 
		</head>
		<script language="javascript"> 
			function printPage()
			{
				window.print();
			}

			function addition()
			{
				with(document.frm_budget_sch)
				{
					x.value="add";
					action="frm_budget_sch_o.php";
					submit();
				}
			} 

			function modify()
			{
				with(document.frm_budget_sch)
				{
					x.value="modify";
					action="frm_budget_sch_o.php";
					submit();
				}
			}

			function deletion()
			{
				with(document.frm_budget_sch)
				{
					x.value="delete";
					action="frm_budget_sch_o.php";
					submit();
				}
			}

			function IsNumeric(sText)
			{
				var ValidChars = "0123456789.";
				var IsNumber=true;
				var Char; 
				for (i = 0; i < sText.length && IsNumber == true; i++)
				{
					Char = sText.charAt(i);
					if (ValidChars.indexOf(Char) == -1)
					{
						IsNumber = false;
					}
				}
				return IsNumber;
			}

			function validate()
			{
				with(document.frm_budget_sch)
				{
					if(finyear.options[finyear.selectedIndex].value == "")
					{
						alert('<?php print $mg13;?>');
						finyear.focus();
						return false;
					}
					
					if(schemecode.options[schemecode.selectedIndex].value == "")
					{
						alert('<?php print $mg14;?>');
						schemecode.focus();
						return false;
					}
					
					if(budgetdate.value == "")
					{
						alert('<?php print $mg15;?>');
						budgetdate.focus();
						return false;
					}

					if(x.value=='delete')
					{
						if(display.checked==false)
						{
							alert('<?php print $mg8;?>');
							display.focus();
							return false;
						}
					}
				}
			} 

			function submitForm()
			{
				with(document.frm_budget_sch)
				{
					action = "frm_budget_sch_o.php";
					submit();
				}
			}

			var temp =0 ; 

			function addToDivision(target,textid,index,flag)
			{
				//alert("yes");
				//alert("target - "+target+" text id - "+textid+" index - "+index+" flag - "+flag);
				var total=0.00;
				var x=0;
				var task = "<?php echo $x; ?>";
				while (document.frm_budget_sch[textid][x])
				{
					if(IsNumeric(document.frm_budget_sch[textid][x].value))
					{
						total=total+((document.frm_budget_sch[textid][x].value)*1);
					}
					else
					{
						break;
					}
					x++;
				}
				
				//document.getElementById(target).firstChild.nodeValue=total.toFixed(2);
				document.getElementById(target).firstChild.nodeValue=total;
				var p=0.00,ftot=0.00,fsc=0.00,fst=0.00,fwsm=0.00,f=0.00;
				var division=[];

				<?php

					//$sql="Select division_code from m_division where display='Y' order by division_code ASC;";
					$sql="SELECT DISTINCT (md.division_code), division_name FROM `m_district` d, m_division md WHERE d.display = 'Y' AND md.display = 'Y' AND d.division_code = md.division_code AND dist_code IN (  SELECT dist_code FROM m_distfinyr WHERE fin_year = '$year' AND display = 'Y' ) ORDER BY md.division_code ASC";
					$rst=mysql_query($sql,$link_access3);
					$i=0;
					while($rec = mysql_fetch_array($rst))
					{
						echo "\ndivision['$i']='$rec[0]';\n";
						$i++;
					}
				?>
				var tg="";
				var j=0;
				while(division[j])
				{
					x=0;
					
					tg='dphy'+division[j]; 
					if(document.getElementById(tg).firstChild.nodeValue*1)
					p=(p*1)+(document.getElementById(tg).firstChild.nodeValue*1);
					else
					document.getElementById(tg).firstChild.nodeValue='0.00';
					
					ttot='dfintot'+division[j];
					if(document.getElementById(ttot).firstChild.nodeValue*1)
					ftot=(ftot*1)+(document.getElementById(ttot).firstChild.nodeValue*1);
					else
					document.getElementById(ttot).firstChild.nodeValue='0.00';

					tsc='dfinsc'+division[j];
					if(document.getElementById(tsc).firstChild.nodeValue*1)
					fsc=(fsc*1)+(document.getElementById(tsc).firstChild.nodeValue*1);
					else
					document.getElementById(tsc).firstChild.nodeValue='0.00';
					
					tst='dfinst'+division[j]; 
					if(document.getElementById(tst).firstChild.nodeValue*1)
					fst=(fst*1)+(document.getElementById(tst).firstChild.nodeValue*1);
					else
					document.getElementById(tst).firstChild.nodeValue='0.00';
					
					twsm='dfinwsm'+division[j]; 
					if(document.getElementById(twsm).firstChild.nodeValue*1)
					fwsm=(fwsm*1)+(document.getElementById(twsm).firstChild.nodeValue*1);
					else
					document.getElementById(twsm).firstChild.nodeValue='0.00';
					
					t='dfin'+division[j]; 
					if(document.getElementById(t).firstChild.nodeValue*1)
					f=(f*1)+(document.getElementById(t).firstChild.nodeValue*1);
					else
					document.getElementById(t).firstChild.nodeValue='0.00';
					j++;
				}

				/*
				document.getElementById('phytargettotal').value=p.toFixed(2);
				document.getElementById('fintargettotal').value=ftot.toFixed(2);
				document.getElementById('finsctargettotal').value=fsc.toFixed(2);
				document.getElementById('finsttargettotal').value=fst.toFixed(2);
				document.getElementById('finwsmtargettotal').value=fwsm.toFixed(2);
				document.getElementById('finothtargettotal').value=f.toFixed(2);
				*/
				
				document.getElementById('phytargettotal').value=p;
				document.getElementById('fintargettotal').value=ftot;
				document.getElementById('finsctargettotal').value=fsc;
				document.getElementById('finsttargettotal').value=fst;
				document.getElementById('finwsmtargettotal').value=fwsm;
				document.getElementById('finothtargettotal').value=f;
			}
			
			function convertDecimal(id)
			{
				if((document.getElementById(id).value*1)<=0)
				{
					document.getElementById(id).value='';
				}
				else if(document.getElementById(id).value!="")
				{
					//var amt =/^[0-9]+(\.[0-9])?$/;
					var retflag = IsNumeric(document.getElementById(id).value);
					//if(! amt .test(document.getElementById(id).value))
					if(retflag==false)
					{
						alert("Please enter valid entry.");
						document.getElementById(id).value="";
						document.getElementById(id).focus();
						return false;
					}
					else
					{
						var temp=new Number(document.getElementById(id).value);
					}
				}
				else
				{
					//alert('Please enter  valid entry.');
				}
			}

			function chkamount (id,flag)
			{
				var x=0; 
				if(flag==0)
				{
					if(document.getElementById(id).value!="")
					{ 
						//var amt = /^((\$\d*)|(\$\d*\.\d{2,10})|(\d*)|(\d*\.\d{1,2}))$/;
						var retflag = IsNumeric(document.getElementById(id).value);
						//if(! amt .test(document.getElementById(id).value))
						if(retflag==false)
						{
							//alert("Please enter valid amount \n\r-----------\n\r For example 45.00\n\r-----------\n\r");
							alert("Please enter numeric value.");
							document.getElementById(id).value="";
							document.getElementById(id).focus();
							return false;
						}
						else
						{ 
							var temp=new Number(document.getElementById(id).value);
							document.getElementById(id).value=temp; 
						}
					}
				}
				else
				{
					while(document.frm_budget_sch[id][x])
					{
						if(document.frm_budget_sch[id][x].value!="")
						{ 
							//var amt = /^((\$\d*)|(\$\d*\.\d{2,10})|(\d*)|(\d*\.\d{1,2}))$/;
							var retflag = IsNumeric(document.getElementById(id).value);
							//if(! amt .test(document.frm_budget_sch[id][x].value))
							if(retflag==false)
							{
								//alert("Please enter valid amount \n\r-----------\n\r For example 45.00\n\r-----------\n\r");
								alert("Please enter numeric value.");
								document.frm_budget_sch[id][x].focus();
								document.frm_budget_sch[id][x].value="";
								return false;
							}
							else
							{
								var temp=new Number(document.frm_budget_sch[id][x].value);
								document.frm_budget_sch[id][x].value=temp; 
							}
						}
						x++;
					}
				}
			}

			function getXMLHTTP() 
			{ 
				var xmlhttp=false;	
				try
				{
					xmlhttp=new XMLHttpRequest();
				}
				catch(e)	
				{		
					try
					{			
						xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e)
					{
						try
						{
							xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch(e1)
						{
							xmlhttp=false;
						}
					}
				}
				return xmlhttp;
			}
			
			function getdatavalid(oldtotval,oldval,fintarget,budgetid,division_code,dist_code,finyear,schemecode,idd)
			{
				//alert(idd);
				var strURL="aj_getdatavalid.php?fintarget="+fintarget+"&budgetid="+budgetid+"&division_code="+division_code+"&dist_code="+dist_code+"&schemecode="+schemecode+"&finyear="+finyear;
			//	alert(strURL);
				var req = getXMLHTTP();
				if (req) 
				{
					req.onreadystatechange = function()
					{
						if (req.readyState == 4)
						{
							if (req.status == 200)
							{	
								var status=req.responseText;
								//alert(status);
								if(status=="true")
								{
									alert("You Can not reduce target");
									
									var idtot='fintot'+dist_code;
									document.getElementById(idtot).value = oldtotval;
									document.getElementById(idd).value = oldval;
									document.getElementById(idd).focus();
								}
							} 
							else 
							{
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}		
					}				
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
		</script>

		<?php
			if($x == "add")
			{
				$displayName = "(Addition)";
				if($flag==2)
				{
					$distcode ="";
					$finyear ="";
					$schemecode ="";
					$phytarget ="";
					$fintarget ="";
					$budgetdate ="";
					$revisedate = "";
					$budgetid ="";
					$reviseid ="";
				}
				$flag=1;
			}
			
			if($x == "modify")
			{
				$displayName = "(Modification)";
				$distcode ="";
				$phytarget ="";
				$fintarget ="";
				$budgetdate ="";
				$revisedate ="";
				$flag=2;
			}

			if($x == "delete")
			{
				$displayName = "(Deletion)";
				$display="";
			}

			if($radio1=="1" )
			{
				if($x=="modify" || $x=="delete")
				{
					if($budgetid!="")
					{
						$st="select * from budget where schmast_code='$schemecode' and fin_year='$finyear' and budget_id='$budgetid' and revise_id=0 and taluka_code=0 and display='Y' ";
						$rs = mysql_query($st,$link_access3) or die(mysql_error());
						$row = mysql_fetch_array($rs);
						$schemecode = $row['schmast_code'];
						$finyear = $row['fin_year'];
						$distcode = $row['dist_code'];
						$phytarget = $row['phy_target'];
						$budgetdate = $row['budget_date'];
						$budgetid= $row['budget_id'];
						$reviseid= $row['revise_id'];
						$fintarget = $row['fin_target'];
						$display=$row['display'];
						$budget_flag=$row['budget_flag'];
					}
				}
			}

			if($radio1=="2" )
			{
				if($x=="modify" || $x=="delete")
				{
					if($reviseid!="")
					{

						$st = "select * from budget where  schmast_code='$schemecode' and fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' and taluka_code=0 and display='Y'";
						$rs = mysql_query($st,$link_access3) or die(mysql_error());
						$row = mysql_fetch_array($rs);
						$schemecode = $row['schmast_code'];
						$finyear = $row['fin_year'];
						$distcode = $row['dist_code'];
						$phytarget = $row['phy_target'];
						$fintarget = $row['fin_target'];
						$budgetid= $row['budget_id'];
						$reviseid= $row['revise_id'];
						$budgetdate = $row['budget_date'];
						$revisedate = $row['revise_date'];
						$display=$row['display'];
						$budget_flag=$row['budget_flag'];
					}
				}
			}

			function getPhyTarget($division,$district,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$phy='';
				$sql="SELECT phy_target from budget where division_code=$division and dist_code=$district and  schmast_code='$schemecode' and taluka_code=0  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' And display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$phy=$rec[0];
				}
				if($phy)
				{
					//return number_format($phy,2,'.','');
					return $phy;
				}
				else
				{
					$phy=""; 
				}
			}

			function getFinTarget($division,$district,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT fin_target from budget where division_code=$division and dist_code=$district and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' And display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				if($fin)
				{
					//return number_format($fin,2,'.','');
					return $fin;
				}
				else
				{
					$fin=""; 
				}
			}
			
			function getFinTargetsc($division,$district,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT fin_target_sc from budget where division_code=$division and dist_code=$district and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' And display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				if($fin)
				{
					//return number_format($fin,2,'.','');
					return $fin;
				}
				else
				{
					$fin=""; 
				}
			}
			
			function getFinTargetst($division,$district,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT fin_target_st from budget where division_code=$division and dist_code=$district and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' And display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				if($fin)
				{
					//return number_format($fin,2,'.','');
					return $fin;
				}
				else
				{
					$fin=""; 
				}
			}
			
			function getFinTargetwsm($division,$district,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT fin_target_smf from budget where division_code=$division and dist_code=$district and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' And display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				if($fin)
				{
					//return number_format($fin,2,'.','');
					return $fin;
				}
				else
				{
					$fin=""; 
				}
			}
			
			function getFinTargetoth($division,$district,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT fin_target_oth from budget where division_code=$division and dist_code=$district and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' And display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				if($fin)
				{
					//return number_format($fin,2,'.','');
					return $fin;
				}
				else
				{
					$fin=""; 
				}
			}

			function getName($dist_code,$link_access3)
			{
				$dname="";
				$sql="SELECT dist_name from m_district where dist_code=$dist_code And display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$dname=$rec[0];
				}
				return $dname;
			}

			function getDivisionPhyTarget($division,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$phy='';
				$sql="SELECT sum( phy_target )FROM budget WHERE division_code='$division' AND dist_code !=0 and taluka_code=0 AND  schmast_code ='$schemecode' AND  fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$phy=$rec[0];
				}
				//return number_format($phy,2,'.','');
				return $phy;
			}

			function getDivisionFinTarget($division,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin=''; 
				$sql="SELECT sum(fin_target)FROM budget WHERE division_code ='$division' AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid'  AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				} 
				//return number_format($fin,2,'.','');
				return $fin;
			}
			
			function getDivisionFinTargetsc($division,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin=''; 
				$sql="SELECT sum(fin_target_sc)FROM budget WHERE division_code ='$division' AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid'  AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				} 
				//return number_format($fin,2,'.','');
				return $fin;
			}
			
			function getDivisionFinTargetst($division,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin=''; 
				$sql="SELECT sum(fin_target_st)FROM budget WHERE division_code ='$division' AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid'  AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				} 
				//return number_format($fin,2,'.','');
				return $fin;
			}
			
			function getDivisionFinTargetwsm($division,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin=''; 
				$sql="SELECT sum(fin_target_smf)FROM budget WHERE division_code ='$division' AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid'  AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				} 
				//return number_format($fin,2,'.','');
				return $fin;
			}
			function getDivisionFinTargetoth($division,$finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin=''; 
				$sql="SELECT sum(fin_target_oth)FROM budget WHERE division_code ='$division' AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid'  AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				} 
				//return number_format($fin,2,'.','');
				return $fin;
			}

			function getDivisionName($division,$link_access3)
			{
				$dName='';
				$sql="SELECT division_name FROM m_division where division_code='$division' and display='Y';";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$dName=$rec[0];
				}
				return $dName;
			}

			function getSchemePhy($finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$phy='';
				$sql="SELECT sum( phy_target )FROM budget WHERE division_code !=0 AND dist_code !=0 and taluka_code=0 AND  schmast_code ='$schemecode' AND  fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$phy=$rec[0];
				}
				//return number_format($phy,2,'.',''); 
				return $phy;
			}

			function getSchemeFin($finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT sum( fin_target )FROM budget WHERE division_code !=0 AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				//return number_format($fin,2,'.',''); 
				return $fin;
			}
			
			function getSchemeFinsc($finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT sum( fin_target_sc )FROM budget WHERE division_code !=0 AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				//return number_format($fin,2,'.',''); 
				return $fin;
			}
			
			function getSchemeFinst($finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT sum( fin_target_st )FROM budget WHERE division_code !=0 AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				//return number_format($fin,2,'.',''); 
				return $fin;
			}
			
			function getSchemeFinwsm($finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT sum( fin_target_smf )FROM budget WHERE division_code !=0 AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				//return number_format($fin,2,'.','');
				return $fin;
			}
			
			function getSchemeFinoth($finyear,$schemecode,$budgetid,$reviseid,$link_access3)
			{
				$fin='';
				$sql="SELECT sum( fin_target_oth )FROM budget WHERE division_code !=0 AND dist_code !=0 and taluka_code=0 AND   schmast_code ='$schemecode'  AND fin_year='$finyear' and budget_id='$budgetid' and revise_id='$reviseid' AND display ='Y'";
				$rst=mysql_query($sql,$link_access3);
				while($rec=mysql_fetch_array($rst))
				{
					$fin=$rec[0];
					$fin=$fin/100000;
				}
				//return number_format($fin,2,'.',''); 
				return $fin;
			}
		?>

		<body id="tab" bgcolor ="#FFFAF0">
			<center>
				<form style="Width:100% ; Height:130% ; background-color:#FFFAF0" name="frm_budget_sch" method="post" action="db_budget_sch_o.php" onSubmit="return validate();">
					<div id="test"></div>
					<table border="0"  width="800" cellpadding="2" cellspacing="3">
						<input type="hidden" name="x" value="<?php print $x; ?>" />
						<input type="hidden" name="flag" value="<?php print htmlentities($flag); ?>" />
						<tr>
							<td colspan="2" align="center">
								<input type="button" name="cmdAdd" value="Add" class="buttonn"  onClick="javascript:addition();" />
								<input type="button" name="cmdModify" value="Modify" class="buttonn"  onClick="javascript:modify();" />
								<input type="hidden" name="cmdDelete" value="Delete" class="buttonn" onClick="javascript:deletion();" />
							</td>
						</tr>
						<tr>
							<td colspan="4" align="center" valign="top">
								<div align="center">
									<font face="Arial" size="2"><b><span class="heading">Districtwise Action Plan<?php print htmlentities($displayName);?></span></b></font>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="4" align="right" valign="top">
								<div align="right">
									<font face="Arial, Arial, Helvetica, sans-serif" size="2"><span class="error">* Mandatory </span></font>
								</div>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td colspan="2" align="center">
							
								<input type="radio" name="radio1" value="1" <?php if($radio1 == "" || $radio1 == "1"){ print "checked"; }?> onchange="javascript:submitForm();" style="opacity: 0;" /><span class="labeltext" style="opacity: 0;" >New </span>&nbsp;&nbsp;&nbsp;
								<!--input type="radio" name="radio1" value="2" <?php if( $radio1 == "2") { print "checked"; }?> onchange="javascript:submitForm();" /><span class="labeltext ">Revise</span-->
								<span class="labeltext">Budget Entry - </span>
								<?php  if($budget_flag) { $radio2=$budget_flag; } ?>
								<input type="radio" name="radio2" value="1" <?php if($radio2 == "" || $radio2 == "1"){ print "checked"; }?> onchange="javascript:submitForm();" /><span class="labeltext">All </span>
								<input type="radio" name="radio2" value="2" <?php if($radio2 == "2"){ print "checked"; }?> onchange="javascript:submitForm();" /><span class="labeltext">Category-wise</span>
							</td>
						</tr> 
					</table>
<?php
	if($radio1 == "1" || $x==" ")
	{
		if($x=="add" || $x=="")
		{
			if($x=="add")
			{
				$s = "select max(budget_id) as budget  from budget where fin_year='$finyear' and schmast_code='$schemecode' and display='Y' order by budget_id ";
				$rs = mysql_query($s,$link_access3) or die(mysql_error());
				$row = mysql_fetch_array($rs);
				$maxbudget1 = $row['budget'];
				$budget=$maxbudget1 + 1;
			}
?>
			<fieldset  align="center" style="width:50px;">
				<legend>
					<font face="Arial" size="2" color="purple"><b>Budget details:</b></font>
				</legend>
				<table  width="800" align ="center" cellspacing ="0" cellpadding ="0" border ="0">
					<tr>
						<td width="200" align="right"><span class="labeltext ">Financial Year </span><span class="error">*</span></td>
						<td width="600" align="left">
							<select name="finyear"  OnChange="javascript:submitForm();" <?php if($x=="") { ?> disabled <?php } ?>>
								<option value="<?php print htmlentities($finyear); ?>">Select</option>
								<?php
								//$sql = "SELECT distinct(fin_year) FROM `m_counter` where display='Y'"; 
								$sql = "SELECT distinct(fin_year) FROM `m_finyear` where display='Y' and fin_year='$year'"; 
								$rs = mysql_query($sql,$link_access3) or die('Error in query execution');
								while($row = mysql_fetch_array($rs))
								{
									$cyr = $row['fin_year'];
									if($year == $cyr)
									{
										print "<option value=".htmlentities($row['fin_year'])." selected>".htmlentities($row['fin_year'])."</option>";
									}
									else
									{
										print "<option value=".htmlentities($row['fin_year']).">".htmlentities($row['fin_year'])."</option>";
									}
								}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td width="200" align="right"><span class="labeltext ">Scheme </span><span class="error">*</span></td>
						<td	width="600" align="left">
							<select name="schemecode" OnChange="javascript:submitForm();" <?php if($x=="") { ?> disabled  <?php } ?>>
								<option value="">Select</option>
								<?php
									$sql = "select * from m_schmast where  display = 'Y' order by schmast_code ";
									$rs= mysql_query($sql,$link_access3) or die('Error in query execution');
									while($row = mysql_fetch_array($rs))
									{
										$scd = $row['schmast_code'];
										if($schemecode==$scd)
										{
											print "<option value=".htmlentities($row['schmast_code'])." selected>".htmlentities($row['schmast_name'])."</option>";
										}
										else
										{
											print "<option value=".htmlentities($row['schmast_code']).">".htmlentities($row['schmast_name'])."</option>";
										}
									}
								?>
							</select>
						</td>
					</tr>
				</table>
			</fieldset>

			<fieldset align="center" style="width:50px;">
				<table  width="800" align ="center" cellspacing ="0" cellpadding ="0" border ="0">
					<tr>
						<td width="200" align="right"><span class="labeltext ">Budget Id </span><span class="error" >*</span></td>
						<td width="600" >
							<INPUT name="budgetid" id="budgetid" type="text" autocomplete="off" size="5" maxlength="8"   value="<?php if($schemecode!=""){ print htmlentities($budget); }?> " <?php if($x=="add" ) { ?> readonly <?php } ?> <?php if($x=="") { ?> disabled  <?php } ?> />
						</td>
					</tr>
					<?php $budgetdate=date('d-m-Y'); ?>
					<tr>
						<td align="right"><span class="labeltext ">Budget Date</span></td>
						<td align="left">
							<input type="text" autocomplete="off" name="budgetdate"  size="10" value="<?php if($schemecode!=""){ print $budgetdate; }?>" readonly class="alttext" />
							<a href="javascript: void(0);" onmouseover="if (timeoutId) clearTimeout(timeoutId);window.status='Show Calendar';return true;" onmouseout="if (timeoutDelay) calendarTimeout();window.status='';" onclick = "g_Calendar.show(event,'frm_budget_sch.budgetdate',true,'dd-mm-yyyy'); return false;"> 
								<img src="../images/calendar.gif" TABINDEX=5 name="imgCalendar" width="34" height="21" border="0" alt="">
							</a>
						</td>
					</tr>
				</table>
				<BR>
				<table id="actionplan">
					<tr>						<th align="Center" width="60" rowspan="2">District</th>
						<th align="Center" rowspan="2">Physical Target(Area in Ha.)</th>
						<th align="Center" rowspan="2">Total</th>
						<th align="Center" colspan="4">Distribution of Financial Target(Lakhs)</th>
					</tr>
					<tr>						
						<th align="Center">SC</th>
						<th align="Center">ST</th>
						<th align="Center">Women/Small/Marginal</th>
						<th align="Center">Other</th>
					</tr>
		<?php
			$i=0;
			$hidden_dist_code=array(); 
			//$sql_div = "select * from m_division  where  display ='Y' order by division_code";
			$sql_div="SELECT DISTINCT (md.division_code), division_name FROM `m_district` d, m_division md WHERE d.display = 'Y' AND md.display = 'Y' AND d.division_code = md.division_code AND dist_code IN (  SELECT dist_code FROM m_distfinyr WHERE fin_year = '$year' AND display = 'Y' ) ORDER BY md.division_code";
			$rs_div = mysql_query($sql_div,$link_access3) or die('Error in query execution');
			while($row_div = mysql_fetch_array($rs_div))
			{
				$division_code=$row_div['division_code'];
				$division_name=$row_div['division_name'];
		?>
					<tr>						<th style="text-align:left"> <?php echo $division_name; ?> Divison </th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
					</tr>
		
			<?php
				$index=0;
				//$sql = "select * from m_district where display ='Y' and division_code='$division_code'  order by division_code";
				$sql = "SELECT * FROM `m_district` where display='Y' and division_code='$division_code' and dist_code IN (select dist_code from m_distfinyr where fin_year='$year' and display='Y') order by division_code";
				$rs = mysql_query($sql,$link_access3) or die('Error in query execution');
				while($row = mysql_fetch_array($rs))
				{
					$dist_code1 = $row['dist_code'];
					$hidden_dist_code[$i]=$dist_code1;
					$dist_name = $row['dist_name'];
			?> 
					<tr rowspan='4' class='distrows' id='<?php echo $dist_code1; ?>'>
						<th class="dist" align="center"><?php print $dist_name;?></th> 
						<td width="30" align="center">
							<input type="text"   autocomplete="off" style="text-align:right" id="phy<?php echo $division_code;?>[]" name="phytarget[]"  size="11" maxlength="11" onblur="convertDecimal(this.id)" onchange="chkamount(this.id,1); addToDivision('<?php echo 'dphy'.$division_code;?>',this.id,'<?php echo $division_code;?>',0);"  value="" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ){ print "onFocus='blur();'";} ?> />
						</td>
						<td width="30" align="center">
							<input type="text" autocomplete="off" style="text-align:right" class="fintot distribute" id="fintot<?php echo $division_code;?>[]" name="fintarget[]"  size="11" maxlength="13"onblur="convertDecimal(this.id)" onchange="chkamount(this.id,1); addToDivision('<?php echo 'dfintot'.$division_code;?>',this.id,'<?php echo $division_code;?>',0);"  value="" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ){ print "onFocus='blur();'";} ?> <?php if($radio2=='2'){echo "readonly";}?> />
						</td>						<td width="30" align="center">
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal sc" id="finsc<?php echo $division_code;?>[]" name="fintargetsc[]"  size="11" maxlength="13" onblur="convertDecimal(this.id)" onchange="chkamount(this.id,1); addToDivision('<?php echo 'dfinsc'.$division_code;?>',this.id,'<?php echo $division_code;?>',0);"  value="" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ){ print "onFocus='blur();'";} ?> <?php if($radio2=='1' || $radio2==''){echo "readonly"; } ?> />
						</td>
						<td width="30" align="center">
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal st" id="finst<?php echo $division_code;?>[]" name="fintargetst[]"  size="11" maxlength="13"onblur="convertDecimal(this.id)" onchange="chkamount(this.id,1); addToDivision('<?php echo 'dfinst'.$division_code;?>',this.id,'<?php echo $division_code;?>',0);"  value="" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ){ print "onFocus='blur();'";} ?> <?php if($radio2=='1' || $radio2==''){echo "readonly";}?> />
						</td>
						<td width="30" align="center">
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal wsm" id="finwsm<?php echo $division_code;?>[]" name="fintargetwsm[]"  size="11" maxlength="13"onblur="convertDecimal(this.id)" onchange="chkamount(this.id,1); addToDivision('<?php echo 'dfinwsm'.$division_code;?>',this.id,'<?php echo $division_code;?>',0);"  value="" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ){ print "onFocus='blur();'";} ?> <?php if($radio2=='1' || $radio2==''){echo "readonly";}?> />
						</td>
						<td width="30" align="center">
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal other" id="finoth<?php echo $division_code;?>[]" name="fintargetoth[]"  size="11" maxlength="13"onblur="convertDecimal(this.id)" onchange="chkamount(this.id,1); addToDivision('<?php echo 'dfin'.$division_code;?>',this.id,'<?php echo $division_code;?>',0);"  value="" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ){ print "onFocus='blur();'";} ?> <?php if($radio2=='1' || $radio2==''){echo "readonly";}?> />
						</td>
						<input type="hidden" name="hidden_dist_code[]" size="11" value="<?php print htmlentities($hidden_dist_code[$i]); ?>"  <?php if($x=="") { ?> disabled  <?php } ?>  />

			<?php
					$index = $index+1;
					$i = $i+1; 
				}
			?>
					<tr>
						<th style="text-align:left">Total</th>
						<th><div class="divsn" id="dphy<?php echo $division_code;?>">0.00</div></th>
						<th><div class="divsn" id="dfintot<?php echo $division_code; ?>">0.00</div></th>
						<th><div class="divsn" id="dfinsc<?php echo $division_code; ?>">0.00</div></th>
						<th><div class="divsn" id="dfinst<?php echo $division_code; ?>">0.00</div></th>
						<th><div class="divsn" id="dfinwsm<?php echo $division_code; ?>">0.00</div></th>
						<th><div class="divsn" id="dfin<?php echo $division_code; ?>">0.00</div></th>
					</tr>
					<?php 
			}

		?>
					</tr>
					<tr class="total">
						<th style="text-align:left"> Total</th>
		<?php
			$total=0;
			$total1=0;
			for($t=0;$t<count($phytarget);$t++)
			{
				if(!empty($phytarget[$t]))
				{
					$phytarget[$t];
				}
				else
				{
					$phytarget[$t]="0.00";
				}
				$phytarget1=$phytarget[$t];
				//$total = number_format(($total+$phytarget1),2,'.','');
				$total = $total+$phytarget1;
				
			} 
			for($t=0;$t<count($fintarget);$t++)
			{
				if(!empty($fintarget[$t]))
				{
					$fintarget[$t];
				}
				else
				{
					$fintarget[$t]="0.00";
				}
				$fintarget1=$fintarget[$t];
				//$total1	= number_format(($total1+$fintarget1),2,'.','');
				$total1	= $total1+$fintarget1;
			}
		?>
						<th align="center" colspan="1">
							<input 	type="text" autocomplete="off" style="text-align:right" id="phytargettotal" name="phytargettotal" size="11" value="<?php print $total;?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="fintargettotal" name="fintargettotal" size="11" value="<?php print $total1;?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="finsctargettotal" name="finsctargettotal" size="11" value="<?php print $total1sc;?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="finsttargettotal" name="finsttargettotal" size="11" value="<?php print $total1st;?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="finwsmtargettotal" name="finwsmtargettotal" size="11" value="<?php print $total1wsm;?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="finothtargettotal" name="finothtargettotal" size="11" value="<?php print $total1oth;?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
					</tr>
				</table>
	<?php
		}
		if($x=="modify" || $x=="delete")
		{
	?>
			<fieldset  align="center" style="width:50px;">
				<legend><font face="Arial" size="2" color="purple"><b>Budget Details:</b></font></legend>
				<table  width="800" align ="center" cellspacing ="0" cellpadding ="0" border ="0">
					<tr>
						<td width="200" align="right"><span class="labeltext ">Financial Year </span><span class="error">*</span></td>
						<td width="600" align="left">
							<select name="finyear" id="finyear" <?php if($x=="") { ?> disabled  <?php } ?>>
								<option value="">Select</option>
								<?php
								$sql = "SELECT DISTINCT(`fin_year`) FROM `budget` where display='Y' and fin_year='$year' order by fin_year"; 
								$rs = mysql_query($sql,$link_access3) or die('Error in query execution');
								while($row = mysql_fetch_array($rs))
								{
									$cyr = $row['fin_year'];
									if($finyear == $cyr)
									{
										print "<option value=".htmlentities($row['fin_year'])." selected=\"selected\">".htmlentities($row['fin_year'])."</option>";
									}
									else
									{
										print "<option value=".htmlentities($row['fin_year']).">".htmlentities($row['fin_year'])."</option>";
									}
								}
								?>
							</select>
						</td>
					</tr>
					<tr> 
						<td width="200" align="right"><span class="labeltext ">Scheme </span><span class="error">*</span></td>
						<td width="600" align="left">
							<select name="schemecode" id="schemecode" OnChange="javascript:submitForm();" <?php if($x=="") { ?> disabled  <?php } ?>>
								<option value="">Select</option>
								<?php
								$sql = "select * from m_schmast where  display = 'Y' order by schmast_code ";
								$rs = mysql_query($sql,$link_access3) or die('Error in query execution');
								while($row = mysql_fetch_array($rs))
								{
									$scd = $row['schmast_code'];
									if($schemecode == $scd)
									{
										print "<option value=".htmlentities($row['schmast_code'])." selected>".htmlentities($row['schmast_name'])."</option>";
									}
									else
									{
										print "<option value=".htmlentities($row['schmast_code']).">".htmlentities($row['schmast_name'])."</option>";
									}
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="200" align="right"><span class="labeltext">Budget Id </span><span class="error" >*</span></td>
						<td width="600" align="left">
							<select name="budgetid" id="budgetid" onChange="javascript:submitForm();">
								<option value="">Select</option>
								<?php
								if($year=='2017-2018')
								{
									//$sql = "SELECT distinct(budget_id) FROM  budget where schmast_code='$schemecode' and fin_year='$finyear' and revise_id=0 AND budget_id!=0 AND budget_id!=4 and display='Y' order by budget_id";
									$sql = "SELECT distinct(budget_id) FROM  budget where schmast_code='$schemecode' and fin_year='$finyear' and revise_id=0 AND budget_id!=0  and display='Y' order by budget_id";
								}
								else
									$sql = "SELECT distinct(budget_id) FROM  budget where schmast_code='$schemecode' and fin_year='$finyear' and revise_id=0 AND budget_id!=0 and display='Y' order by budget_id";
									$rs = mysql_query($sql,$link_access3) or die('Error in query execution');
									while($row = mysql_fetch_array($rs))
									{
										$b_id = $row['budget_id'];
										if($budgetid == $b_id)
										{
											print "<option value=".htmlentities($row['budget_id'])." selected>".htmlentities($row['budget_id'])."</option>";
										}
										else
										{
											print "<option value=".htmlentities($row['budget_id']).">".htmlentities($row['budget_id'])."</option>";
										}
									}
								?>
							</select>
						</td>
					</tr>
				</table>
			</fieldset>
			<?php
				$budgetdate=Date_convert($budgetdate);
				$dy=substr($budgetdate,0,4);
				$dm=substr($budgetdate,5,2)-1;
				$dd=substr($budgetdate,8,2);
				$from_caldt = $dy.",".$dm.",".$dd; 
				$to_caldate = mktime(0,0,0,date("m"),date("d"),date("Y"));
				$tdt = Date("d" , $to_caldate);
				$tm = Date("m" , $to_caldate)-1;
				$ty = Date("Y" , $to_caldate);
				$to_caldt = $ty.",".$tm.",".$tdt; 
				if($budgetdate=="")
				{
					$from_caldt=$to_caldt;
				}
			?>

			<fieldset align="center" style="width:50px;">
				<table  width="800" align ="center" cellspacing ="0" cellpadding ="0" border ="0">
					<tr>
						<td width="200" align="right"><span class="labeltext">Budget Date </span><span class="error" >*</span></td>
						<td width="600" align="left">
							<input type="text" autocomplete="off" name="budgetdate"  size="10" value="<?php print htmlentities($budgetdate); ?>" readonly class="alttext" />
							<a href="javascript: void(0);" onmouseover="if (timeoutId) clearTimeout(timeoutId);window.status='Show Calendar';return true;"onmouseout="if (timeoutDelay) calendarTimeout();window.status='';" onclick ="g_Calendar.show(event, 'frm_budget_sch.budgetdate', true, 'dd-mm-yyyy', new Date(<?php echo $from_caldt;?>), new Date(<?php echo $to_caldt;?>)); return false;" />
							<img src="../images/calendar.gif" TABINDEX=5 name="imgCalendar" width="34" height="21" border="0" alt="">
						</td>
					</tr>
				</table>
				<br />
			 <?php
				$division=array(); 
				//$sql_div = "select division_code from m_division  where display ='Y'  order by division_code";
				$sql_div="SELECT DISTINCT (md.division_code), division_name FROM `m_district` d, m_division md WHERE d.display = 'Y' AND md.display = 'Y' AND d.division_code = md.division_code AND dist_code IN (  SELECT dist_code FROM m_distfinyr WHERE fin_year = '$year' AND display = 'Y' ) ORDER BY md.division_code";
				$rs_div = mysql_query($sql_div,$link_access3) or die('Error in query execution');
				while($row_div = mysql_fetch_array($rs_div))
				{
					$division[]=$row_div['division_code'];
				}
			?> 
				<table id="actionplan">
					<tr>
						<th align="Center" width="60" rowspan="2">District</th>
						<th align="Center" rowspan="2">Physical Target(Area in Ha.)</th>
						<?php
							if($sessionflow=='P' && $budgetid=='')
							{
						?>
						<th align="Center" rowspan="2">Total Target</th>
						<?php
							}
							else{
						?>
						<th align="Center" rowspan="2">Total Target for budget ID <?php echo $budgetid; ?></th>
						<?php
							}
						?>
						<th align="Center" colspan="4">Distribution of Financial Target(Lakhs)</th>
						<?php
						if($sessionflow=='P' && $budgetid!='')
						{
						?>
						<th align="Center" rowspan="2">Total Target excluding budget ID <?php echo $budgetid; ?></th>
						<th align="Center" rowspan="2">Total Target for all budget ID</th>
						<?php
						}
						?>
			
						<th align="Center" rowspan="2">Presanction Total (Lakhs)</th>
			
					</tr>
					<tr>
						<th align="Center">SC</th>
						<th align="Center">ST</th>
						<th align="Center">Women/Small/Marginal</th>
						<th align="Center">Other</th>
					</tr>
			<?php
				$index=0;
				while($index<sizeof($division))
				{ 
					$district=array(); 
					//$sql="select dist_code from m_district where division_code=$division[$index] and display='Y' order by division_code,dist_code;";
					$sql = "SELECT dist_code FROM `m_district` where display='Y' and division_code=$division[$index] and dist_code IN (select dist_code from m_distfinyr where fin_year='$year' and display='Y') order by division_code,dist_code";
					$rst=mysql_query($sql,$link_access3);
					while($rec=mysql_fetch_array($rst))
					{
						$district[]=$rec['dist_code'];
						$dist_name = $row['dist_name']; 
					}
					$sqld = "select division_name from m_division   where division_code=$division[$index] and display ='Y'  order by division_code";
					$rsd = mysql_query($sqld,$link_access3) or die('Error in query execution');
					$rowd = mysql_fetch_array($rsd);
					$division_name=$rowd['division_name'];
			?>
					<tr>
						<th  style="text-align:left"> <?php echo $division_name; ?> Divison </th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<?php
						if($sessionflow=='P' && $budgetid!='')
						{
						?>
						<th style="text-align:left">&nbsp;</th>
						<th style="text-align:left">&nbsp;</th>
						<?php
						}
						?>
			
						<th style="text-align:left">&nbsp;</th>
			
					</tr>
			<?php
					$dindex=0;
					$i=0;
					while($dindex<sizeof($district))
					{
						$nnd=$district[$dindex];
						$sql3_a = "select * from m_district where dist_code='$nnd'";
						$rs3_a = mysql_query($sql3_a,$link_access3) or die(mysql_error());
						$fe_rows3_a = mysql_fetch_array($rs3_a);
						$divcd=$fe_rows3_a['newdiv_code'];
						////////for budget id=0 //////////////////////////////////////////////////////////////////
						$sqlforz="SELECT phy_target from budget where division_code='$division[$index]' and dist_code='$district[$dindex]' and  schmast_code='$schemecode' and taluka_code=0  AND fin_year='$finyear' and budget_id='0' and revise_id='0' And display='Y';";
						$rstforz=mysql_query($sqlforz,$link_access3);
						$recforz=mysql_fetch_array($rstforz);
						$phyforz=$recforz['phy_target'];
						$phyforz=$phyforz/100000;

						$sqlforz1="SELECT fin_target, fin_target_sc, fin_target_st, fin_target_smf from budget where division_code='$division[$index]' and dist_code='$district[$dindex]' and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id='0' and revise_id='0' And display='Y';";
						$rstforz1=mysql_query($sqlforz1,$link_access3);
						$recforz1=mysql_fetch_array($rstforz1);
						
						$finforz1=$recforz1['fin_target'];
						$finforz1=$finforz1/100000;
						$finscforz1=$recforz1['fin_target_sc'];
						$finscforz1=$finscforz1/100000;
						$finstforz1=$recforz1['fin_target_st'];
						$finstforz1=$finstforz1/100000;
						$finsmfforz1=$recforz1['fin_target_smf'];
						$finsmfforz1=$finsmfforz1/100000;
						$finothforz1=$recforz1['fin_target_oth'];
						$finothforz1=$finothforz1/100000;
						
						//////////// target excluding current budget id ////////////
						$sqlvv="SELECT sum(fin_target) from budget where division_code='$division[$index]' and dist_code='$district[$dindex]' and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id!='$budgetid' and budget_id!='0' And display='Y';";
						$rstvv=mysql_query($sqlvv,$link_access3) or die(mysql_error());
						$recvv=mysql_fetch_array($rstvv);
						$fint=$recvv[0];
						$tottgt=$fint/100000;
						
						
						/////////////////////////////////////////////////////////////////
						
			?>
					<tr rowspan='4' class='distrows' id='<?php echo $district[$dindex]; ?>'>
						<th class="dist"><?php echo getName($district[$dindex],$link_access3);?></th> 
						<td  align="center">
							<input type="text"  autocomplete="off" style="text-align:right" id="phy<?php echo $division[$index];?>" onblur="convertDecimal(this.id)" onchange="chkamount(this.id,1);" name="phytarget[]" size="11" maxlength="11" onkeyup="addToDivision('<?php echo 'dphy'.$division[$index];?>',this.id,'<?php echo $division[$index];?>',0);"   value="<?php if($budgetid){ echo getPhyTarget($division[$index],$district[$dindex],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);} else {  echo number_format($phyforz,2,'.','');} ?>" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ){ print "onFocus='blur();'"; } ?> />
						</td>

						<td  align="center">
							<?php
							$abc1=getFinTarget($division[$index],$district[$dindex],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);
							?>
							<input type="text" autocomplete="off" style="text-align:right" class="fintot distribute" id="fintot<?php echo $district[$dindex];?>" name="fintarget[]" onblur="getdatavalid(<?php echo $abc1; ?>,<?php echo $abc1; ?>,this.value,budgetid.value,'<?php echo $division[$index]?>','<?php echo $district[$dindex]?>','<?php echo $finyear?>','<?php echo $schemecode?>',this.id); convertDecimal(this.id);" onchange="chkamount(this.id,1); addToDivision('<?php echo 'dfintot'.$division[$index];?>',this.id,'<?php echo $division[$index];?>',0);" size="11" maxlength="13" value="<?php if($budgetid) { echo $abc1; } else { echo $finforz1; /*echo number_format($finforz1,2,'.','');*/ } ?>" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ) { print "onFocus='blur();'"; } ?> <?php if($radio2=='2'){ echo "readonly"; }?> />
						</td>
						<td  align="center">
							<?php
							$dispsc=getFinTargetsc($division[$index],$district[$dindex],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);
							?>
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal sc" id="finsc<?php echo $district[$dindex];?>" name="fintargetsc[]" onblur="convertDecimal(this.id)" onchange="getdatavalid(<?php echo $abc1; ?>,<?php echo $dispsc; ?>,fintot<?php echo $district[$dindex];?>.value,budgetid.value,'<?php echo $division[$index]?>','<?php echo $district[$dindex]?>','<?php echo $finyear?>','<?php echo $schemecode?>',this.id); chkamount(this.id,1); addToDivision('<?php echo 'dfinsc'.$division[$index];?>',this.id,'<?php echo $division[$index];?>',0);" size="11" maxlength="13" value="<?php if($budgetid) { echo $dispsc; } else { /*echo number_format($finscforz1,2,'.','');*/ echo $finscforz1; } ?>" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ) { print "onFocus='blur();'"; } ?> <?php if($radio2=='1' || $radio2==''){echo "readonly"; } ?> />
						</td>
						<td  align="center">
							<?php
							$dispst=getFinTargetst($division[$index],$district[$dindex],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);
							?>
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal st" id="finst<?php echo $district[$dindex];?>" name="fintargetst[]" onblur="convertDecimal(this.id)" onchange="getdatavalid(<?php echo $abc1; ?>,<?php echo $dispst; ?>,fintot<?php echo $district[$dindex];?>.value,budgetid.value,'<?php echo $division[$index]?>','<?php echo $district[$dindex]?>','<?php echo $finyear?>','<?php echo $schemecode?>',this.id); chkamount(this.id,1); addToDivision('<?php echo 'dfinst'.$division[$index];?>',this.id,'<?php echo $division[$index];?>',0);" size="11" maxlength="13" value="<?php if($budgetid) { echo  $dispst; } else { /*echo number_format($finstforz1,2,'.','');*/ echo $finstforz1; } ?>" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ) { print "onFocus='blur();'"; } ?> <?php if($radio2=='1' || $radio2==''){echo "readonly"; } ?> />
						</td>
						<td  align="center">
							<?php
							$dispwsm=getFinTargetwsm($division[$index],$district[$dindex],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);
							?>
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal wsm" id="finwsm<?php echo $district[$dindex];?>" name="fintargetwsm[]" onblur="convertDecimal(this.id)" onchange="getdatavalid(<?php echo $abc1; ?>,<?php echo $dispwsm; ?>,fintot<?php echo $district[$dindex];?>.value,budgetid.value,'<?php echo $division[$index]?>','<?php echo $district[$dindex]?>','<?php echo $finyear?>','<?php echo $schemecode?>',this.id); chkamount(this.id,1); addToDivision('<?php echo 'dfinwsm'.$division[$index];?>',this.id,'<?php echo $division[$index];?>',0);" size="11" maxlength="13" value="<?php if($budgetid) { echo  $dispwsm;} else { /*echo number_format($finsmfforz1,2,'.','');*/echo $finsmfforz1; } ?>" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ) { print "onFocus='blur();'"; } ?> <?php if($radio2=='1' || $radio2==''){echo "readonly"; } ?> />
						</td>
						<td  align="center">
							<?php
							$dispoth=getFinTargetoth($division[$index],$district[$dindex],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);
							?>
							<input type="text" autocomplete="off" style="text-align:right" class="addtototal other" id="finoth<?php echo $district[$dindex];?>" name="fintargetoth[]" onblur="convertDecimal(this.id)" onchange="getdatavalid(<?php echo $abc1; ?>,<?php echo $dispoth; ?>,fintot<?php echo $district[$dindex];?>.value,budgetid.value,'<?php echo $division[$index]?>','<?php echo $district[$dindex]?>','<?php echo $finyear?>','<?php echo $schemecode?>',this.id); chkamount(this.id,1); addToDivision('<?php echo 'dfin'.$division[$index];?>',this.id,'<?php echo $division[$index];?>',0);" size="11" maxlength="13" value="<?php if($budgetid) { echo $dispoth; } else { /*echo number_format($finothforz1,2,'.','');*/ echo $finothforz1;} ?>" <?php if($x=="") { ?> disabled  <?php } ?> <?php if($x == "delete" ) { print "onFocus='blur();'"; } ?> <?php if($radio2=='1' || $radio2==''){echo "readonly"; } ?> />
						</td>
						<?php
						if($sessionflow=='P' && $budgetid!='')
						{
						?>
						<td align="center">
						<?php echo $tottgt;?>
						</td>
						<td align="center">
						<?php echo $forallid=($abc1+$tottgt);?>
						</td>
						<?php
						}
						?>
			
						<td align="center">
			<?php
							$dist=$district[$dindex];
							$sql3 = "select * from m_district where dist_code='$dist'";
							$rs3 = mysql_query($sql3,$link_access3) or die(mysql_error());
							$fe_rows3 = mysql_fetch_array($rs3);
							$divcd=$fe_rows3['newdiv_code'];
							$div=$division[$index];
							//$st2 = "SELECT (sum(total_presanc)-sum(presanc_excess)) as presanctot from project p inner join beneficiary b on p.ben_id=b.ben_id where b.dist_code='$dist' and b.taluka_code!=0 and p.schmast_code='$schemecode' AND p.fin_year='$finyear' And p.display='Y' and b.display='Y' and p.stage_code > '65' and p.stage_code!='200';";
							
							$st2 = "SELECT (sum( presanc_tot )- sum( presanc_excess )) as presanctot FROM `budget` WHERE `fin_year` = '$finyear' AND `schmast_code` ='$schemecode' AND `dist_code` = '$dist' AND `budget_id` =0  AND division_code = '$div' and taluka_code<>0 ";
							//$rs2 = mysql_query($st2)or die(mysql_error());
								if($divcd=='5' || $divcd=='6'){
									$rs2 = mysql_query($st2,$link_access1) or die(mysql_error());
								}
								else if($divcd=='2' || $divcd=='7'){
									$rs2 = mysql_query($st2,$link_access2) or die(mysql_error());
								}
								else{
									$rs2 = mysql_query($st2,$link_access3) or die(mysql_error());
								}
							$recd2=mysql_fetch_array($rs2);
							$presanctot=$recd2['presanctot']; 
							$presanctot=$presanctot/100000;
							//echo number_format($presanctot,2,'.','');
							echo $presanctot;							
			?>
						</td>
			
					</tr>
					<input type="hidden" name="district[]"  size="11" value="<?php print htmlentities($district[$dindex]);?>" />
			<?php
							$dindex++;
							$i++;
					}
			?> 

					<tr>
						<th  style="text-align:left"><?php getDivisionName($division[$index],$link_access3) ?>Total</th>
						<th><div class="divsn" id="dphy<?php echo $division[$index]?>"><?php echo getDivisionPhyTarget($division[$index],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);?></div></th>
						<th><div class="divsn" id="dfintot<?php echo $division[$index] ?>"><?php echo $abcd=getDivisionFinTarget($division[$index],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);?></div></th>
						<th><div class="divsn" id="dfinsc<?php echo $division[$index] ?>"><?php echo getDivisionFinTargetsc($division[$index],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);?></div></th>
						<th><div class="divsn" id="dfinst<?php echo $division[$index] ?>"><?php echo getDivisionFinTargetst($division[$index],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);?></div></th>
						<th><div class="divsn" id="dfinwsm<?php echo $division[$index] ?>"><?php echo getDivisionFinTargetwsm($division[$index],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);?></div></th>
						<th><div class="divsn" id="dfin<?php echo $division[$index] ?>"><?php echo getDivisionFinTargetoth($division[$index],$finyear,$schemecode,$budgetid,$reviseid,$link_access3);?></div></th>
						<?php
						if($sessionflow=='P' && $budgetid!='')
						{
							//////////// target excluding current budget id ////////////
							$sqlvv_p="SELECT sum(fin_target) from budget where division_code='$division[$index]' and taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id!='$budgetid' and budget_id!='0' And display='Y';";
							$rstvv_p=mysql_query($sqlvv_p,$link_access3) or die(mysql_error());
							$recvv_p=mysql_fetch_array($rstvv_p);
							$fint_p=$recvv_p[0];
							$tottgt_p=$fint_p/100000;
							
							$forallid_tot=($abcd+$tottgt_p);
							/////////////////////////////////////////////////////////////////
						
						?>
						<th><?php echo $tottgt_p;?></th>
						<th><?php echo $forallid_tot;?></th>
						<?php
						}
						?>
			
						<th>
			<?php
						$dist=$district[$dindex];
						$sql3 = "select * from m_district where dist_code='$dist'";
						$rs3 = mysql_query($sql3,$link_access3) or die(mysql_error());
						$fe_rows3 = mysql_fetch_array($rs3);
						$divcd=$fe_rows3['newdiv_code'];
						
						$div=$division[$index];
						$st2 = "SELECT (sum( presanc_tot )- sum( presanc_excess )) as presanctot FROM `budget` WHERE `fin_year` = '$finyear' AND `schmast_code` ='$schemecode' AND `budget_id` =0  AND division_code = '$div' and dist_code!=0 and taluka_code<>0 ";
						//$rs2 = mysql_query($st2)or die(mysql_error());
						if($divcd=='5' || $divcd=='6'){
							$rs2 = mysql_query($st2,$link_access1) or die(mysql_error());
						}
						else if($divcd=='2' || $divcd=='7'){
							$rs2 = mysql_query($st2,$link_access2) or die(mysql_error());
						}
						else{
							$rs2 = mysql_query($st2,$link_access3) or die(mysql_error());
						}
						$recd2=mysql_fetch_array($rs2);
						$presanctot=$recd2['presanctot'];
						$presanctot=$presanctot/100000;
						//echo number_format($presanctot,2,'.','');
						echo $presanctot;
			?>
						</th>
			
					</tr>
			<?php
					$index++;
				}
			?>
					<tr>
						<th width="30" align="Center"> Total </th>
						<th width="30" align="center" colspan="1">
							<input type="text"  autocomplete="off" style="text-align:right" id="phytargettotal" name="phytargettotal" size="11" value="<?php echo getSchemePhy($finyear,$schemecode,$budgetid,$reviseid,$link_access3) ?>" onFocus='blur();'  <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text"  autocomplete="off" style="text-align:right" id="fintargettotal" name="fintargettotal" size="11" value="<?php echo $abcde=getSchemeFin($finyear,$schemecode,$budgetid,$reviseid,$link_access3)?>" onFocus='blur();'  <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="finsctargettotal" name="finsctargettotal" size="11" value="<?php echo getSchemeFinsc($finyear,$schemecode,$budgetid,$reviseid,$link_access3)?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="finsttargettotal" name="finsttargettotal" size="11" value="<?php echo getSchemeFinst($finyear,$schemecode,$budgetid,$reviseid,$link_access3)?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th align="center" colspan="1">
							<input type="text" autocomplete="off" style="text-align:right" id="finwsmtargettotal" name="finwsmtargettotal" size="11" value="<?php echo getSchemeFinwsm($finyear,$schemecode,$budgetid,$reviseid,$link_access3)?>" onFocus='blur();' <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<th width="30" align="center" colspan="1">
							<input type="text"  autocomplete="off" style="text-align:right" id="finothtargettotal" name="finothtargettotal" size="11" value="<?php echo getSchemeFinoth($finyear,$schemecode,$budgetid,$reviseid,$link_access3)?>" onFocus='blur();'  <?php if($x=="") { ?> disabled  <?php } ?> />
						</th>
						<?php
						if($sessionflow=='P' && $budgetid!='')
						{
							//////////// target excluding current budget id ////////////
							$sqlvv_pw="SELECT sum(fin_target) from budget where taluka_code=0 and schmast_code='$schemecode' AND fin_year='$finyear' and budget_id!='$budgetid' and budget_id!='0' And display='Y';";
							$rstvv_pw=mysql_query($sqlvv_pw,$link_access3) or die(mysql_error());
							$recvv_pw=mysql_fetch_array($rstvv_pw);
							$fint_pw=$recvv_pw[0];
							$tottgt_pw=$fint_pw/100000;
							
							$forallid_granttot=($abcde+$tottgt_pw);
							/////////////////////////////////////////////////////////////////
						?>
						<th>
						<?php echo $tottgt_pw;?>
						</th>
						<th>
						<?php echo $forallid_granttot;?>
						</th>
						<?php 
						} 
						?>
			
						<th>
			<?php
					$dist=$district[$dindex];
					$div=$division[$index];
					
					$sql3 = "select * from m_district where dist_code='$dist'";
					$rs3 = mysql_query($sql3,$link_access3) or die(mysql_error());
					$fe_rows3 = mysql_fetch_array($rs3);
					$divcd=$fe_rows3['newdiv_code'];
						
					$st2 = "SELECT (sum( presanc_tot )- sum( presanc_excess )) as presanctot FROM `budget` WHERE `fin_year` = '$finyear' AND `schmast_code` ='$schemecode' AND `budget_id` =0 and dist_code!=0 and taluka_code<>0 ";
					//$rs2 = mysql_query($st2)or die(mysql_error());
					if($divcd=='5' || $divcd=='6'){
						$rs2 = mysql_query($st2,$link_access1) or die(mysql_error());
					}
					else if($divcd=='2' || $divcd=='7'){
						$rs2 = mysql_query($st2,$link_access2) or die(mysql_error());
					}
					else{
						$rs2 = mysql_query($st2,$link_access3) or die(mysql_error());
					}
					$recd2=mysql_fetch_array($rs2);
					$presanctot=$recd2['presanctot'];
					$presanctot=$presanctot/100000;
					//echo number_format($presanctot,2,'.','');
					echo $presanctot;
			?>
						</th>
			
					</tr>
				</table>  
			<?php
		}
		if($x == "delete")
		{
			$st_display = "select * from budget where schmast_code='$schemecode' and fin_year='$finyear' and budget_id ='$budgetid' and display='Y'";
			$rs_display = mysql_query($st_display,$link_access3) or die('Error in query execution');
			$row_display = mysql_fetch_array($rs_display);
			$display = $row_display['display'];
		?>
					<tr>
						<td width="200" align="center"><span class="labeltext ">Display</span><span class="error">*</span></td>
						<td width="600" align="center">
		<?php
			if($display=='Y')
			{
		?>
							<input type="radio" name="display" value="N" /><span class="labeltext ">Delete</span>
		<?php
			}
		?>
		<?php
			if($display=='N')
			{
		?>
							<input type="radio" name="display" value="Y" /><span class="labeltext ">Undelete </span>
		<?php
			}
			if($display=='')
			{
		?>
							<input type="radio" name="display" value="N" /><span class="labeltext ">Delete </span>
		<?php 
			}
		?>
						</td>
					</tr>
		<?php
		}
		?>
				<table border="0" width="700"  bordercolor="silver" align="center" style="margin-top:90px">
					<tr>
						<td colspan="3" align="center">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3" align="center">
							<input type="submit" name="cmdUpdate" value="Save" class="buttonn" />
							<input type="button" name="cmdCancel" value="Cancel" class="buttonn"  onClick="document.location.href='frm_budget_sch_o.php';" />
						</td>
					</tr>
					<tr>
						<td colspan="3" align="center">
							<a href="javascript:printPage();"><font color="red">Print</font></a>
						</td>
					</tr>
				</table>

	<?php 
	}
	
	if(!empty($msg))
	{
	?>
					<table width="800" align="center" border="0">
						<tr>
							<td align="center">
								<b>
									<font color="#008000" face="Arial" size="2">
	<?php
		echo "$msg";
	?>
									</font>
								</b>
							</td>
						</tr>
					</table>
	<?php
	}
	?>
				</fieldset>
			</form>
		</center>
	</body>
</html>

	<!-- ////////////-------------------------start insert part validation---------------------///////// -->

	<!-- ************30 april************* -->
	<script language="JavaScript" type="text/javascript">
	var message="Right Click Not Allowed ";
	function rtclickcheck(keyp)
	{ 
		if(navigator.appName=="Netscape" && keyp.which==3)
		{
			alert(message);
			return false;
		}
		if(navigator.appVersion.indexOf("MSIE")!=-1 && event.button==2)
		{
			alert(message);
			return false;
		}
	}
	document.onmousedown=rtclickcheck;
	</script>
	<script src="../includes/jqlib.js" type="text/javascript"></script>
	<script>
	
	$(document).ready(function(){
		var taskk = "<?php echo $x; ?>";
		$('input[name=radio2]').on('click',function(){
			if(taskk=='modify')
			{
				return false;
			}
		});
	});
		$('tr.distrows input.addtototal').on('keyup', function(){
			var rowid = $(this).parent('td').parent('tr').attr('id');
			var fintargettot = 0.00;
			//$('tr#'+rowid+' input.sc').addClass('alttext');
			var finsc = $('tr#'+rowid+' input.sc').val();
			finsc = finsc * 1;
			finsc = parseFloat(finsc);
			
			
			var finst = $('tr#'+rowid+' input.st').val();
			finst = finst * 1;
			finst = parseFloat(finst);
			//alert(finst);
			
			var finwsm = $('tr#'+rowid+' input.wsm').val();
			finwsm = finwsm * 1;
			finwsm = parseFloat(finwsm);
			//alert(finwsm);
			
			var finother = $('tr#'+rowid+' input.other').val();
			finother = finother * 1;
			finother = parseFloat(finother);
			//alert(finother);
			
			fintargettot = finsc + finst + finwsm + finother;
			fintargettot = parseFloat(fintargettot);
			$('tr#'+rowid+' input.fintot').val(fintargettot).trigger('change');
		});
		
		$('tr.distrows input.distribute').on('keyup', function(){
			var rowid = $(this).parent('td').parent('tr').attr('id');
			var fintargettot = $(this).val();
			//alert(fintargettot);
			fintargettot = fintargettot*1;
			fintargettot =  parseFloat(fintargettot);
			
			var sc = fintargettot*0.16;
			sc = parseFloat(sc);
			
			var st = fintargettot*0.08;
			st = parseFloat(st);
			
			var wsm = fintargettot*0.33;
			wsm = parseFloat(wsm);
			
			var other = fintargettot*0.43;
			other = parseFloat(other);
			
			$('tr#'+rowid+' input.sc').val(sc).trigger('change');
			$('tr#'+rowid+' input.st').val(st).trigger('change');
			$('tr#'+rowid+' input.wsm').val(wsm).trigger('change');
			$('tr#'+rowid+' input.other').val(other).trigger('change');
		});
		
		$(document).ready(function(){
		$('input[type=text][readonly]').addClass('alttext');
		});
	</script>
	<!-- ********************************* -->

	<!-- ////////////-------------------------end insert part validation---------------------///////// -->