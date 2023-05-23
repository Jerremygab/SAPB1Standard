<?php
session_start();
include_once('../../../../config/config.php');

$docNum = $_GET['docNum'];
$docType = $_GET['docType'];
$objType = $_GET['objType'];

$html='';


$qry = odbc_exec($MSSQL_CONN, "USE [".$MSSQL_DB."];
	SELECT 
		T0.U_DocEntry,
		T0.U_FileName,
		T0.U_FileLocation

		
		
	FROM [@ATTACHMENT] T0 
	INNER JOIN OINV T1 ON T1.DocEntry = T0.U_DocEntry


	WHERE T1.DocNum IN ( $docNum )
	ORDER BY T0.U_LineNo ASC");
$ctr = 1;

while (odbc_fetch_row($qry)) 
{
	
	$U_DocEntry = odbc_result($qry, "U_DocEntry");
	$U_FileName = odbc_result($qry, "U_FileName");
	$U_FileLocation = odbc_result($qry, "U_FileLocation");
	

			
		$html .=		
					' <tr style="background-color: white; "  >
		<td class="rowno text-right" style="background-color: lightgray;color:black; font-size:13px;">
			<span>1</span>
			<ul class="dropdown-menu rowfunctions" role="menu" style="background-color: #fdfd96;">
				<li class="deleterow" style="font-size:20px; color: black; font-weight:bold">Delete Row</a></li>
				<li class="duplicaterow"style="font-size:20px; color: black; font-weight:bold">Duplicate Row</a></li>
			</ul>
	  </td>
	 <td >
	<div class="input-group " >
<input type="text" class="form-control matrix-cell targetpath"  aria-label="File Name"aria-describedby="button-addon2" style="outline: none; border:none" readonly value="'.$U_FileLocation.'"/>
		
	</div>
	  </td>
	  <td >
			<div class="input-group ">
			<input type="text" class="form-control matrix-cell file" name="file"  aria-label="File Name" aria-describedby="button-addon2" style="outline: none; border:none" readonly value="'.$U_FileName.'"/>
						
		</div>
	  </td>
	  <td >
	  <div class="input-group ">
				<input type="date" id="txtAttachmentDate"  min="01-01-2018" max="12-31-2050" class="form-control matrix-cell attachmentdate"  style="outline: none; border:none" readonly/>	
			</div>
	  </td>
	  <td>
			<div class="input-group ">
				<input type="text" class="form-control matrix-cell freetext"style="outline: none; border:none;" readonly/>
			</div>
	  </td>
 </tr>';
		}		


		$html .= ' <tr style="background-color: white; "  >
		<td class="rowno text-right" style="background-color: lightgray;color:black; font-size:13px;">
			<span>1</span>
			<ul class="dropdown-menu rowfunctions" role="menu" style="background-color: #fdfd96;">
				<li class="deleterow" style="font-size:20px; color: black; font-weight:bold">Delete Row</a></li>
				<li class="duplicaterow"style="font-size:20px; color: black; font-weight:bold">Duplicate Row</a></li>
			</ul>
	  </td>
	 <td >
	<div class="input-group " >
<input type="text" class="form-control matrix-cell targetpath"  aria-label="File Name"aria-describedby="button-addon2" style="outline: none; border:none" readonly/>
		
	</div>
	  </td>
	  <td >
			<div class="input-group ">
			<input type="file" class="form-control matrix-cell file" name="file"  aria-label="File Name" aria-describedby="button-addon2" style="outline: none; border:none" readonly />
						
		</div>
	  </td>
	  <td >
	  <div class="input-group ">
				<input type="date" id="txtAttachmentDate"  min="01-01-2018" max="12-31-2050" class="form-control matrix-cell attachmentdate"  style="outline: none; border:none" readonly/>	
			</div>
	  </td>
	  <td>
			<div class="input-group ">
				<input type="text" class="form-control matrix-cell freetext"style="outline: none; border:none;" readonly/>
			</div>
	  </td>
 </tr>';

 echo $html;
odbc_free_result($qry);
odbc_close($MSSQL_CONN);

?>
