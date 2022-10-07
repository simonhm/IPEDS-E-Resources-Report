<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IPEDS Project | ALMA</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <style>
       #barcode, #setID {
         background-color: lightblue;
         margin-top: 5px;
	 margin-bottom: 5px;
         padding: 4px;
       }
 
       .icon {
         width: 18px;
         height: 18px;
       }
      
       .btn-primary {
         padding: 5px;
       }

       #listOCLC {
         color: blueviolet;
         font-size: 12px;
       }

       .floating-label-form-group {
         border: none;
       }
   
       #OCLC {
         display: none;
       }

    </style>

<script>

function toggle(source) {
  checkboxes = document.getElementsByName('email_libs[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}

function displayOCLC() {
  var x = document.getElementById("OCLC");
  if (x.style.display == "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

var _validFileExtensions = [".xlsx"];    
function Validate1(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;            
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extension is: " + _validFileExtensions.join(", "));
                    return false;
                }
            } //else {
              //  alert("You need to choose an Excel report file to process");
              //  return false;
            //}
        }
    }
   
    var elem = document.getElementById('sendMessageButton1');
    elem.disabled=true;
    elem.value='Processing, please wait...';

    return true;
}

function Validate2(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extension is: " + _validFileExtensions.join(", "));
                    return false;
                }
            } //else {
              //  alert("You need to choose an Excel report file to process");
              //  return false;
            //}
        }
    }

    var elem = document.getElementById('sendMessageButton2');
    elem.disabled=true;
    elem.value='Processing, please wait...';

    return true;
}

</script>

  </head>

  <body id="page-top">


<?php

        //  Include PHPExcel_IOFactory
        include 'PHPExcel/IOFactory.php';

function my_curl($url, $timeout=6000, $error_report=FALSE)
{
    $curl = curl_init();

    // HEADERS FROM FIREFOX - APPEARS TO BE A BROWSER REFERRED BY GOOGLE
    $header[] = "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
    $header[] = "Cache-Control: max-age=0";
    $header[] = "Connection: keep-alive";
    $header[] = "Keep-Alive: 300";
    $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $header[] = "Accept-Language: en-us,en;q=0.5";
    $header[] = "Pragma: "; // browsers keep this blank.

    // SET THE CURL OPTIONS - SEE http://php.net/manual/en/function.curl-setopt.php
    curl_setopt($curl, CURLOPT_URL,            $url);
    curl_setopt($curl, CURLOPT_USERAGENT,      'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6');
    curl_setopt($curl, CURLOPT_HTTPHEADER,     $header);
    curl_setopt($curl, CURLOPT_REFERER,        'http://www.google.com');
    curl_setopt($curl, CURLOPT_ENCODING,       'gzip,deflate');
    curl_setopt($curl, CURLOPT_AUTOREFERER,    TRUE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_TIMEOUT,        $timeout);

    // RUN THE CURL REQUEST AND GET THE RESULTS
    $htm = curl_exec($curl);
    $err = curl_errno($curl);
    $inf = curl_getinfo($curl);
    curl_close($curl);

    // ON FAILURE
    if (!$htm)
    {
        // PROCESS ERRORS HERE
        if ($error_report)
        {
            echo "CURL FAIL: $url TIMEOUT=$timeout, CURL_ERRNO=$err";
            var_dump($inf);
        }
        return FALSE;
    }

    // ON SUCCESS
    return $htm;
}

function get_2ending_chars(string $s){
  return substr($s, -2);
}

  if (@$_GET["lib"] == "") { 
    echo "You need to provide LIBRARY CODE to use this web-based application. For example: <a href=index.php?lib=TST>index.php?lib=TST</a><br>";
    echo "Contact <a href=https://www.mnpals.org>MnPALS</a> for more info";
    
  }

    if (@$_GET["lib"] != "") {

      $config = parse_ini_file('config.ini');

	$lib = @$_GET["lib"];

 	// log
        error_log("IPEDS for $lib", 0);
 
      $api_key = @$config[$lib];
      $api_key_nz = @$config['NZ'];

      if ($api_key == "") {
        echo "The LIB code ". $lib . " hasn't been installed on this application yet.<br>";
        echo "Contact <a href=https://www.mnpals.org>MnPALS</a> for more info";
        $installed = false;
        exit;
      }

      // Log IPED file
      $filename = 'logs/' . $lib . "_report.csv";
      if (file_exists($filename)) {
        //echo "The file $filename exists";
      } else {
        //echo "The file $filename does not exist";
        $myfile = fopen($filename, "w") or die("Unable to open file!");
	fclose($myfile);
      } 

      if (@$_GET["action"] == "") {
?>
	<form action='index.php?lib=<?php echo $lib;?>&action=process&nzalma_api=no' method="POST" enctype="multipart/form-data" onsubmit="return Validate1(this);">
		<label>Option 1: Use a NZalma Excel file having all NZalma databases</label>
		  <br><br>
<?php
        $nzalma_filename = "logs/nzalma_filename.txt";
        $simon = "";
        $simon = @file_get_contents($nzalma_filename);
        if ($simon != "") {
                $nz = explode("|", $simon);
                $nz_name = $nz[0];
                $nz_date = $nz[1];
                echo "You can use this file <a target=_blank href='logs/$nz_name'>" . $nz_name . "</a> which was uploaded at $nz_date.<br>OR Choose and upload a new excel file to process<br>";
        }
?>
		  <input type="file" name="Report_File" value=""><br><br>
          <input type='hidden' id='lib' name='lib' value='<?php echo $lib;?>'>
          <input type='hidden' id='action' name='action' value='process'>
	  <input id='sendMessageButton1' class='btn btn-primary btn-xl' type='submit' value='Generate E-Resource Analytics Report for <?php echo $lib;?>'>
	</form>
<br><br><hr><br><br>
        <form action='index.php?lib=<?php echo $lib;?>&action=process&nzalma_api=yes' method="POST" enctype="multipart/form-data" onsubmit="return Validate2(this);">
                <label>Option 2: Use API to get NZalma databases</label>
                  <br><br>
          <input type='hidden' id='lib' name='lib' value='<?php echo $lib;?>'>
          <input type='hidden' id='action' name='action' value='process'>
          <input id='sendMessageButton2' class='btn btn-primary btn-xl' type='submit' value='Generate E-Resource Analytics Report for <?php echo $lib;?>'>
	</form>
<?php
      }     
      elseif (@$_GET["action"] == "process") {

	$zipname = 'logs/ALL-eres-' . date("dMY") . '.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);

	$lib_array = array("$lib");
	if ($lib == "ALL") {
		$process_all = true;
		if (!$process_all) {
			//$lib_array = array("CEN", "SCU", "BSU", "BETHEL");
			$lib_array = array("TST");
		} else {
			// Read the email csv file
			$lib_array = array();
                	$handle = fopen("emails.csv", "r");
                	$i = 0;
                	if ($handle) {
                        	while (($line = fgets($handle)) !== false) {
                                	// process the line read.
                                	$ss = explode(",", $line);
					$lib_code = $ss[0];
					array_push($lib_array, $lib_code);
                        	}

                        	fclose($handle);
                	}
		}
	}
	// foreach lib
	foreach ($lib_array as $i => $value) {
		$lib = $lib_array[$i];
		$api_key = @$config[$lib];

	$e_report = array();
	$rs_array = array();
	$sort_rs =  array();

        // Get IZ E-Resources
        $url_iz = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/electronic/e-collections?apikey=$api_key&limit=100";
        $htm_iz = my_curl($url_iz);
	$xml_iz = new SimpleXMLElement($htm_iz);

        $max = $xml_iz->attributes()[0];
        $offset = 0;

        while ($max>0) {
                foreach ($xml_iz->{'electronic_collection'} as $item) {
			$rs_name = trim($item->{'public_name'});
			if (in_array($rs_name, $rs_array)) {
				foreach ($e_report as $key=>$value) {
                                        if ($value["rs_name"] == $rs_name ) {
                                                $e_report[$key]["Notes"] = "Warning - Check Duplicate Database in IZalma. | ";
                                           //echo $value["rs_name"]."<br>";        
						break;
					}
                                }
			} else {
                		array_push($rs_array, $rs_name);
                		array_push($e_report, array(
                        		"rs_name" => $rs_name,
                        		"nzalma" => "",
                        		"izalma" => "yes",
                        		"ebooks" => "",
                        		"emedia" => "",
                        		"eserials" => "",
                        		"other" => "",
                       			"NZan" => "",
					"IZan" => "",
			        	"Notes" => ""));
			}
		}

                if ($max > 0) {
                        $max = $max - 100;
                        $offset = $offset + 100;
                        if ($max > 0) {
                                $url_iz = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/electronic/e-collections?apikey=$api_key&limit=100&offset=$offset";
                                $htm_iz = my_curl($url_iz);
                                $xml_iz = new SimpleXMLElement($htm_iz);
                        }
                }
        }

	//echo "ABC " . var_dump($e_report[0]["CareNotes"][0]["izalma"]). "<br>";

	// Get NZ E-Resources

	$c = 0;

	if (@$_GET["nzalma_api"] == "yes") {

        $url_nz = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/electronic/e-collections?apikey=$api_key_nz&limit=100";
        $htm_nz = my_curl($url_nz);
        $xml_nz = new SimpleXMLElement($htm_nz);
 

	$max = $xml_nz->attributes()[0];;
	$offset = 0;

        while ($max>0) {

        	foreach ($xml_nz->{'electronic_collection'} as $report) {	
                $rs_name = trim($report->{'public_name'});

		if (!empty($report->{'cdi_group_settings'})) {
			foreach ($report->{'cdi_group_settings'}->{'cdi_group_setting'} as $group) {
				$group_code = strtoupper($group->{'group'});
				if ($group_code == $lib) {
					$c = $c + 1;
					if (in_array($rs_name, $rs_array)) {
						foreach ($e_report as $key=>$value) {
                                                        if ($value["rs_name"] == $rs_name ) {
                                                                $e_report[$key]["nzalma"] = "yes";
                                                                $e_report[$key]["Notes"] = "Warning - Fix Duplicate Database in IZalma. | ";
                                                                break;
                                                        }
                                                }
					} else {
						array_push($rs_array, $rs_name);
                                                array_push($e_report, array(
                                                        "rs_name" => $rs_name,
                                                        "nzalma" => "yes",
                                                        "izalma" => "",
                                                        "ebooks" => "",
                                                        "emedia" => "",
                                                        "eserials" => "",
                                                        "other" => "",
                                                        "NZan" => "",
                                                        "IZan" => "",
                                                        "Notes" => ""));
					}
					break;
				}
			} // foreach
		} // if !empty 
		}


/*
                if (strpos($c3, $lib) != false) {
			$c = $c + 1;
                           		if (in_array($rs_name, $rs_array)) {
                                                foreach ($e_report as $key=>$value) {
                                                        if ($value["rs_name"] == $rs_name ) {
                                                                $e_report[$key]["nzalma"] = "yes";
                                                                $e_report[$key]["Notes"] = "NZalma | ";
                                                                break;
                                                        }
                                                }
                                        } else {
                                                array_push($rs_array, $rs_name);
                                                array_push($e_report, array(
                                                        "rs_name" => $rs_name,
                                                        "nzalma" => "yes",
                                                        "izalma" => "",
                                                        "ebooks" => "",
                                                        "emedia" => "",
                                                        "eserials" => "",
                                                        "other" => "",
                                                        "NZan" => "",
                                                        "IZan" => "",
                                                        "Notes" => "NZalma | "));
                                        }
		}
	}
 */
        	if ($max > 0) {
                        $max = $max - 100;
                        $offset = $offset + 100;
                        if ($max > 0) {
                                $url_nz = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/electronic/e-collections?apikey=$api_key&limit=100&offset=$offset";
                                $htm_nz = my_curl($url_nz);
                                $xml_nz = new SimpleXMLElement($htm_nz);
                        }
                }

	} //while max > 0

	} // if ($_FILES["Report_File"] == '')
	else {

        $nzalma_filename = "logs/nzalma_filename.txt";
	$simon = "";
	$inputFileName = "";
        $simon = @file_get_contents($nzalma_filename);
        if ($simon != "") {
                $nz = explode("|", $simon);
                $inputFileName = "logs/" . $nz[0];
        }
	if ($_FILES["Report_File"]["name"] != "") {
		$inputFileName = 'logs/' . $_FILES["Report_File"]["name"];
		file_put_contents('logs/nzalma_filename.txt', $_FILES["Report_File"]["name"] . "|" . date('Y-m-d H:i:s')); 
		file_put_contents($inputFileName,  
			file_get_contents($_FILES["Report_File"]["tmp_name"]));
	}

	//  Read your Excel workbook
	try {
    		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
		$objWorksheet = $objPHPExcel->getActiveSheet();
	} catch(Exception $e) {
    		die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	//  Loop through each row of the worksheet in turn
	$i=2;
	foreach ($objWorksheet->getRowIterator() as $row) {

		$rs_name = trim($objPHPExcel->getActiveSheet()->getCell("A$i")->getValue());//column A
		//echo $column_A_Value . "<br>";
    		//you can add your own columns B, C, D etc.
		$av = strtoupper($objPHPExcel->getActiveSheet()->getCell("L$i")->getValue());//column L
		$av = "simon " . $av;

		if (strpos($av, $lib) != false) {
                        $c = $c + 1;
                                        if (in_array($rs_name, $rs_array)) {
                                                foreach ($e_report as $key=>$value) {
                                                        if ($value["rs_name"] == $rs_name ) {
                                                                $e_report[$key]["nzalma"] = "yes";
                                                                $e_report[$key]["Notes"] = "Warning - Fix Duplicate Database in IZalma. | ";
                                                                break;
                                                        }
                                                }
                                        } else {
                                                array_push($rs_array, $rs_name);
                                                array_push($e_report, array(
                                                        "rs_name" => $rs_name,
                                                        "nzalma" => "yes",
                                                        "izalma" => "",
                                                        "ebooks" => "",
                                                        "emedia" => "",
                                                        "eserials" => "",
                                                        "other" => "",
                                                        "NZan" => "",
                                                        "IZan" => "",
                                                        "Notes" => ""));
                                        }
                }

    		$i++;
	}

	} //else of if $_FILES["Report_File"] == ''

        //echo "NZalma ($lib): " . $c . "<br>";
/*
        foreach ($e_report as $item) {
		//var_dump($item);
	        foreach ($item as $key=>$value) {
			echo $key;
			echo "<br><br>";
		}
	}
*/
        $ebooks = 0;
	$emedia = 0;
	$eserials = 0;
	$other = 0;
        // Get IZ E-Resources Analytics Report
        $url_iz_rp = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?apikey=$api_key&limit=1000&path=%2Fshared%2FCommunity%2FReports%2FConsortia%2FMNPALS%2FWork%20in%20Process%2FIZitemsjan27";
        $htm_iz_rp = my_curl($url_iz_rp);
	$xml_iz_rp = new SimpleXMLElement($htm_iz_rp);

	if (!isset($xml_iz_rp->{'QueryResult'}->{'ResultXml'}->{'rowset'}->{'Row'})) error_log("api problem of " . $lib . ": ". $url_iz_rp, 0);

	foreach ($xml_iz_rp->{'QueryResult'}->{'ResultXml'}->{'rowset'}->{'Row'} as $report) {
		$rs_name = trim($report->{'Column1'});
		$c2 = (string) $report->{'Column2'};
		$c3 = (string) $report->{'Column3'};
		$found = false;
		$b = "";
		$m = "";
		$s = "";
		$o = "";
		foreach ($e_report as $key=>$value) {
                                if ($value["rs_name"] == $rs_name ) {
					$e_report[$key]["IZan"] = "yes";
					$e_report[$key][$c2] = $c3;
					if ($c2 == "ebooks") $ebooks = $ebooks + $c3;
					if ($c2 == "emedia") $emedia = $emedia + $c3;
					if ($c2 == "eserials") $eserials = $eserials + $c3;
					if ($c2 == "other") $other = $other + $c3;
					$found = true;
					break;
				}
		}	
		if (!$found) {
				array_push($rs_array, $rs_name);
			                if ($c2 == "ebooks") { $ebooks = $ebooks + $c3; $b = $c3; }
                                        if ($c2 == "emedia") { $emedia = $emedia + $c3; $m = $c3; }
                                        if ($c2 == "eserials") { $eserials = $eserials + $c3; $s = $c3; }
                                        if ($c2 == "other") { $other = $other + $c3; $o = $c3; }
                                array_push($e_report, array(
                                        "rs_name" => $rs_name,
                                        "nzalma" => "",
                                        "izalma" => "",
                                        "ebooks" => $b,
                                        "emedia" => $m,
                                        "eserials" => $s,
                                        "other" => $o,
                                        "NZan" => "",
                                        "IZan" => "yes",
					"Notes" => "Doesn't show as IZalma, but it is. | "));
		}
	}

        // Get NZ E-Resources Analytics Report
        $url_nz_rp = "https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?apikey=$api_key_nz&limit=1000&path=%2Fshared%2FMnPALS%20Consortium%20NZ%2001MNPALS_NETWORK%2FPals%2FJill%2Fnz-itemsjan27-allinst";
        $htm_nz_rp = my_curl($url_nz_rp);
        $xml_nz_rp = new SimpleXMLElement($htm_nz_rp);

        foreach ($xml_nz_rp->{'QueryResult'}->{'ResultXml'}->{'rowset'}->{'Row'} as $report) {
                $rs_name = trim($report->{'Column1'});
                $c2 = (string) $report->{'Column2'};
		$c3 = (string) $report->{'Column3'};
		$c4 = (string) $report->{'Column4'};

		$c2 = "simon " . strtoupper($c2);

                $found = false;
                $b = "";
                $m = "";
                $s = "";
                $o = "";

		if (strpos($c2, $lib) != false) {
                	foreach ($e_report as $key=>$value) {
                                if ($value["rs_name"] == $rs_name ) {
					$e_report[$key]["NZan"] = "yes";
					if ($e_report[$key][$c3] != "") {
						$e_report[$key]["Notes"] = $e_report[$key]["Notes"] . $c3 . " in IZan: " . $e_report[$key][$c3] . " | ";
					}
					$e_report[$key][$c3] = $c4;
					if ($c3 == "ebooks") $ebooks = $ebooks + $c4;
                                        if ($c3 == "emedia") $emedia = $emedia + $c4;
                                        if ($c3 == "eserials") $eserials = $eserials + $c4;
					if ($c3 == "other") $other = $other + $c4;
					$found = true;
					break;
				}
			}
			if (!$found) {
                                array_push($rs_array, $rs_name);
                                        if ($c3 == "ebooks") { $ebooks = $ebooks + $c4; $b = $c4; }
                                        if ($c3 == "emedia") { $emedia = $emedia + $c4; $m = $c4; }
                                        if ($c3 == "eserials") { $eserials = $eserials + $c4; $s = $c4; }
                                        if ($c3 == "other") { $other = $other + $c4; $o = $c4; }
                                array_push($e_report, array(
                                        "rs_name" => $rs_name,
                                        "nzalma" => "",
                                        "izalma" => "",
                                        "ebooks" => $b,
                                        "emedia" => $m,
                                        "eserials" => $s,
                                        "other" => $o,
                                        "NZan" => "yes",
                                        "IZan" => "",
                                        "Notes" => "Doesn't show as NZalma, but it is. | "));			
			}
		}
        }

	// Special Cases - Notes
	foreach ($e_report as $key=>$value) {
                if (($value["rs_name"] == " " ) or  ($value["rs_name"] == "" )) {
                        $e_report[$key]["Notes"] = $e_report[$key]["Notes"] . "In Alma with blank name - ask PALS for details. |";
                }
		if ($value["rs_name"] == "EBSCOhost Business Source Premier" ) {
			$e_report[$key]["Notes"] = $e_report[$key]["Notes"] . "Consider adjusting the eserials number (company reports probably shouldn't count as separate serials) |";
		}
		if ($value["rs_name"] == "EBSCOhost MegaFILE" ) {
                        $e_report[$key]["Notes"] = $e_report[$key]["Notes"] . "Consider taking out counts since the individual databases are listed |";
		}
		if ($value["rs_name"] == "eGovernment Documents" ) {
                        $e_report[$key]["Notes"] = $e_report[$key]["Notes"] . "Consider adjusting these numbers depending on your programs & usage |";
                }
	}

	// Sort
	foreach($e_report as $key) {
        	$sort_rs[] = $key['rs_name'];
    	}

    	array_multisort($sort_rs, SORT_ASC, SORT_NATURAL|SORT_FLAG_CASE, $e_report);

/*
	foreach ($xml_iz->{'electronic_collection'} as $item) {
		$rs_name = (string)$item->{'public_name'};
		$ebooks = "";
		$emedia = "";
		$eserials = "";
		$other = "";
		$count = 0;
		
		foreach ($xml_iz_rp->{'QueryResult'}->{'ResultXml'}->{'rowset'}->{'Row'} as $report) {
			if ($report->{'Column1'} == $rs_name) {
				//echo $report->{'Column1'} . " - " . $report->{'Column2'} . " : " . $report->{'Column3'} . "<br>";
				if ($report->{'Column2'} == 'ebooks') {
                                	$ebooks = $report->{'Column3'};
				}
				if ($report->{'Column2'} == 'emedia') {
                                        $emedia = $report->{'Column3'};
				}
				if ($report->{'Column2'} == 'eserials') {
                                        $eserials = $report->{'Column3'};
				}
				if ($report->{'Column2'} == 'other') {
                                        $other = $report->{'Column3'};
                                }
                	}
		}
		//echo "abc " . $xml_iz_rp->{'QueryResult'}->{'ResultXml'}->{'rowset'}->{'Row'}->{'Column1'};
		//echo $rs_name . "," . $ebooks . "," . $emedia . "," . $eserials . "," . $other . "<br>";
		fwrite($myfile, '"' . $rs_name . '"' . ',"' . $ebooks . '"' . ',"' . $emedia . '"' . ',"' . $eserials . '"' . ',"' . $other . '"' . "\n");
	}
 */
 
	// Save to file
        $filename = 'logs/' . $lib . '_report.csv';
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        fwrite($myfile,"Electronic Collection Public Name,NZalma,IZalma,Ebooks,Emedia,Eserials,Other,NZan,IZan,Notes\n");
	
	foreach ($e_report as $value) {
                //var_dump($item);
                        //echo $key . ": " . var_dump($value[0]);
			//echo "<br><br>";
			fwrite($myfile, '"' . $value["rs_name"] . '","' . $value["nzalma"] . '","' . $value["izalma"] . '","' . $value["ebooks"] . '","' . $value["emedia"] . '","' . $value["eserials"] . '","' . $value["other"] . '","' . $value["NZan"] . '","' . $value["IZan"] . '","' . $value["Notes"] . '"' . "\n");
	}

	// total
	fwrite($myfile, '"' . "*** TOTAL ***" . '","' . "" . '","' . "" . '","' . $ebooks . '","' . $emedia . '","' . $eserials . '","' . $other . '","' . "" . '","' . "" . '","' . "" . '"' . "\n");

	fclose($myfile);

	// convert csv to xlsx
	$objReader = PHPExcel_IOFactory::createReader('CSV');

	// If the files uses a delimiter other than a comma (e.g. a tab), then tell the reader
	//$objReader->setDelimiter("\t");
	// If the files uses an encoding other than UTF-8 or ASCII, then tell the reader
	//$objReader->setInputEncoding('UTF-16LE');

	$filename_excel = 'logs/' . $lib . '_report.xls';
	$objPHPExcel = $objReader->load($filename);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save($filename_excel);
	

 	// apply background for excel file
	        //  Read your Excel workbook
	        //  Read your Excel workbook

	$filename_excel1 = 'logs/' . $lib . '-eres-' . date("dMY") . '.xls';

	try {
                $inputFileType1 = PHPExcel_IOFactory::identify($filename_excel);
                $objReader1 = PHPExcel_IOFactory::createReader($inputFileType1);
                $objPHPExcel1 = $objReader1->load($filename_excel);
                $objWorksheet1 = $objPHPExcel1->getActiveSheet();
        } catch(Exception $e) {
                die('Error loading file "'.pathinfo($filename_excel,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

 
/*
	$objPHPExcel1->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '#D9D9D6')
        )
    )
);
 */

	$objPHPExcel1->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold( true );
	
	$l = $objPHPExcel1->getActiveSheet()->getHighestRow();

	$ll = $l - 1;
	/*
	$objPHPExcel1->getActiveSheet()->getStyle("A1:A$ll")->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '#fff0c6')
        )
    )
);
	 */
	$objPHPExcel1->getActiveSheet()->getStyle("A1:A$ll")
	->getFill()
	->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
	->getStartColor()
	->setRGB('fff0c6');

        $objPHPExcel1->getActiveSheet()->getStyle("B1:B$ll")
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
	->setRGB('d6dcf1');

	$objPHPExcel1->getActiveSheet()->getStyle("C1:C$ll")
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
	->setRGB('d6dcf1');

	$objPHPExcel1->getActiveSheet()->getStyle("H1:H$ll")
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
	->setRGB('dfecd6');

	$objPHPExcel1->getActiveSheet()->getStyle("I1:I$ll")
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
	->setRGB('dfecd6');

	$objPHPExcel1->getActiveSheet()->getStyle("J1:J$ll")
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('D9D9D6');

	$objPHPExcel1->getActiveSheet()->getStyle("A$l:J$l")
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('D9D9D6');
        

	//PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
	foreach(range('A','J') as $columnID) {
 	   $objPHPExcel1->getActiveSheet()->getColumnDimension($columnID)
        	->setAutoSize(true);
	}

	$objWriter1 = PHPExcel_IOFactory::createWriter($objPHPExcel1, 'Excel5');
	$objWriter1->save($filename_excel1);
	/*
	foreach ($xml_iz_rp->{'QueryResult'}->{'ResultXml'}->{'rowset'}->{'Row'} as $report) {
		if ($report->{'Column1'} == 'AMA Current Titles') {
	  		echo $report->{'Column1'} . " - " . $report->{'Column2'} . " : " . $report->{'Column3'} . "<br>";
		}
      }
       */      

	// Add each excel file into ZIP
	$zip->addFile($filename_excel1);


	}
	// foreach lib in case ALL
	$zip->close();

	// Show download links
      	//echo var_dump($e_report);
	if (@$_GET["lib"] == "ALL") {
		echo "<a href=$zipname>E-Resource Analytics Report for ALL</a><br><br>";
		//echo "<br><br><a target=_blank href=index.php?lib=ALL&action=email>Send Email</a>";
		echo '<form method="POST" action="index.php?lib=ALL&action=email">';
		echo '<legend>Select the institutions to send email:</legend>';

                echo '<div>';
                echo '<input type="checkbox" name="select_all" onClick="toggle(this)">';
                echo '<label>Select All</label>';
                echo '</div>';

		// Read the email csv file
		$handle = fopen("emails.csv", "r");
		$i = 0;
		if ($handle) {
    			while (($line = fgets($handle)) !== false) {
				// process the line read.
				$ss = explode(",", $line);
				$lib_code = $ss[0];
				$email = $ss[1];
				$i = $i + 1;
				echo '<div>';
                		echo '<input type="checkbox" name="email_libs[]" value="' . $lib_code . '|' . $email . '">';
                		echo '<label>' . $lib_code . ': ' . $email . '</label>';
                		echo '</div>';
    			}
			
    			fclose($handle);
		}
  		echo '<br><br><input type="submit" value="Send Email">';
		echo '</form>';
		echo "<br><br><a href=index.php?lib=ALL>Back</a>";
	} else {
		echo "<a href=$filename_excel1>E-Resource Analytics Report for $lib</a>";
		//echo "<br><br><a target=_blank href=index.php?lib=$lib&action=email>Send Email</a>";
		echo "<br><br><a href=index.php?lib=$lib>Back</a>";
	}

      } // action = "process"
      elseif (@$_GET["action"] == "email") {

	      // send all checked libs
	      if (isset($_POST['email_libs'])) {
		      foreach ($_POST['email_libs'] as $email_lib) {
                              $ss = explode("|", $email_lib);
                              $lib_code = $ss[0];
			      $email = $ss[1];
			      //echo $lib_code . ": " . $email . "<br>";
			      $to = $email;
                	      $subject = "IPEDS Report for " . $lib_code . " on " .date('M d, Y'); 
			      $message = "There is an IPEDS report for " . $lib_code . ": <a href=https://yourdomain.com/logs/" . $lib_code . "-eres-" . date("dMY") . ".xls>click here</a> to download.";
			      $headers = 'From: IPEDS Report <noreply@yourdomain.com>' . "\n";

              		      // BCC
              		      //$headers .= "Bcc: simon.mai@mnsu.edu\r\n";

		              $headers .= 'MIME-Version: 1.0' . "\n";
        		      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
              		      $returnpath = '-f noreply@yourdomain.com';

           		      if (mail($to,$subject,$message,$headers, $returnpath)) echo "Report was sent to " . $lib_code . ": " . $email . "<br>";
          		      else echo "Failed (" . $lib_code . ": " . $email . ")<br>";
		      }
	      }

	      $to = "jill.holman@mnsu.edu";
	      //$to = "master.simon21@yahoo.com";
	      $subject = "IPEDS Report for " . $_GET["lib"] . " on " .date('M d, Y');
	      if ($_GET["lib"] == "ALL") {
		      $message = "There is an IPEDS report for " . $_GET["lib"] . ": <a href=https://yourdomain.com/iped/logs/" . $_GET["lib"] . "-eres-" . date("dMY") . ".zip>click here</a> to download.";
	      } else {
	      	$message = "There is an IPEDS report for " . $_GET["lib"] . ": <a href=https://yourdomain.com/iped/logs/" . $_GET["lib"] . "-eres-" . date("dMY") . ".xls>click here</a> to download.";
	      }
	      $headers = 'From: IPEDS Report <noreply@yourdomain.com>' . "\n";

	      // BCC
  	      $headers .= "Bcc: simon.mai@mnsu.edu\r\n";


	      $headers .= 'MIME-Version: 1.0' . "\n";
  	      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  	      $returnpath = '-f noreply@yourdomain.com';
		
	      if ($_GET["lib"] == "ALL") {
  	   	if (mail($to,$subject,$message,$headers, $returnpath)) echo "All Reports was sent.";
		        else echo "Failed";
	      }
	      echo "<br><br><a href=index.php?lib=ALL>Back</a>";
      } // action = email

 
    } // if lib != ""

// Detect ALMA widget
$almaW = false;
if (@$_SERVER['HTTP_REFERER'] != "") {
  if (strpos($_SERVER['HTTP_REFERER'], "primo.exlibrisgroup") == true) $almaW = true;
} 

if (!$almaW) {
?>

<p>
<center>IPEDS Project <?php echo date("Y");?> ver 2.1<br>Developed by <a href=https://www.mnpals.org>MnPALS</a></center>

<?php
}
?>


  </body>

</html>
