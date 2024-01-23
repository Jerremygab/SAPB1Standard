<?php
session_start();
include_once('../../../config/config.php');
	
	$EmpId = $_SESSION['SESS_EMP'];
	$EmpName = $_SESSION['SESS_NAME'];
	$ApproverIdString = $_SESSION['ApproverEmpId'];
	$ApproverEmpId = $_SESSION['ApproverEmpId'];
	// $ApproverEmpId = implode(', ', $_SESSION['ApproverEmpId']);
	// $status = $_GET['status'];
	// $statusWhere = '';
	// if($status == 'All'){
	// 	$statusWhere = '';
	// }
	// else if($status == 'Approved'){
	// 	$statusWhere = " AND U_ApprovalCodes != '' AND U_ApprovalCodes = 'Approved'";
	// }
	// else if($status == 'Pending'){
	// 	$statusWhere = " AND U_ApprovalCodes != '' AND U_ApprovalCodes != 'Rejected' AND U_ApprovalCodes != 'Approved'";
	// }
	// else if($status == 'Rejected'){
	// 	$statusWhere = " AND U_ApprovalCodes != '' AND U_ApprovalCodes = 'Rejected'";
	// }
?>

<div class="">
<table id="tblForApprovalApproverSide" class="table table-striped table-bordered table-hover table-lg detailsTable"   style="background-color: white; width= 100%">
		<thead style="border-bottom: 0 !important">
		<tr>
			<th class="text-right" style=" color: black; max-width:30px;" ># <?php echo $EmpId ?></th>
			<th style="color: black; max-width:100px;">Approvers</th>
			<th style="color: black; max-width:100px;">Approved by</th>
			<th style="color: black; max-width:100px;">No. of Approvals Required</th>
			<th style="color: black; max-width:100px;">Dispproved by</th>
			<th style="color: black; max-width:100px;">No. of Dispprovals Required</th>
			<th style="color: black; max-width:100px;">Draft Entry</th>
			<th style="color: black; max-width:100px;">Doc Entry</th>
			<th style="color: black; max-width:100px;">Obj Type</th>
			<th style="color: black; max-width:100px;">Module</th>
			<th style="color: black; max-width:100px;">Card Code</th>
			<th style="color: black; max-width:100px;">Card Name</th>
			<th style="color: black; min-width:100px;">Doc Total</th>
			<th style="color: black; min-width:100px;">Remarks</th>
			<th style="color: black; max-width:100px;">Requestor Id</th>
			<th style="color: black; max-width:200px;">Requestor Emp Name</th>
			<th style="color: black; max-width:200px;">Status</th>
		</tr>
		</thead>
		<tbody class="">

	<?php

	$qry = odbc_exec($MSSQL_CONN, "USE [".$MSSQL_DB2."];
														
		SELECT 
		T0.SAPDraftEntry,
		T0.SAPDocEntry,
		T0.NoOfApprovalsRequired,
		T0.ApproverIds,
		T0.DisapprovedbyApprovers,
		T0.NoOfDisapprovalRequired,
		--CONCAT('0, ', T0.ApprovedByApprovers) AS 
		T0.ApprovedByApprovers,
		T0.ApprovalStatus,
		T1.CardCode,
		T1.CardName,
		T1.DocTotal,
		T1.Comments,
		T1.ObjType,
		CASE WHEN
		T1.ObjType = 13 THEN 'AR Invoice'
		ELSE 'N/A'
		END AS Module,
		T1.OwnerCode,
		CONCAT(T2.firstName, ' ', T2.lastName) AS Name



		FROM [".$MSSQL_DB2."].[dbo].[SAP_DOCS_WITH_APPROVAL] T0
		INNER JOIN [".$MSSQL_DB."].[dbo].[ODRF] T1 ON T1.DocEntry = T0.SAPDraftEntry AND T1.ObjType = 13
		INNER JOIN [".$MSSQL_DB."].[dbo].[OHEM] T2 ON T2.Code = T0.OwnerCode
		
		WHERE T0.ApproverIds LIKE '%$EmpId%'


		ORDER BY T0.SAPDraftEntry
		
				");
				
	$ctr=1;

	while (odbc_fetch_row($qry)) 
	{
		$ApprovedByApproversArray = [];
		$DocEntry = odbc_result($qry, "SAPDraftEntry");
		$SAPDocEntry = odbc_result($qry, "SAPDocEntry");
		$NoOfApprovalsRequired = odbc_result($qry, "NoOfApprovalsRequired");
		$NoOfDisapprovalsRequired = odbc_result($qry, "NoOfDisapprovalRequired");
		$ApproverIds = odbc_result($qry, "ApproverIds");
		$ApprovedByApprovers = odbc_result($qry, "ApprovedByApprovers");
		$DisapprovedByApprovers = odbc_result($qry, "DisapprovedByApprovers");

		$ApprovedByApproversArray = explode(',', odbc_result($qry, "ApprovedByApprovers"));
		$DisapprovedByApproversArray = explode(', ', odbc_result($qry, "DisapprovedByApprovers"));
		$ApproverIdsArray = explode(', ', odbc_result($qry, "ApproverIds"));

		$implode = implode(', ',$ApprovedByApproversArray);
		$ApprovalStatus = odbc_result($qry, "ApprovalStatus");
		$CardCode = odbc_result($qry, "CardCode");
		$CardName = odbc_result($qry, "CardName");
		$DocTotal = number_format(odbc_result($qry, "DocTotal"),2);
		$Comments = odbc_result($qry, "Comments");
		$ObjType = odbc_result($qry, "ObjType");
		$Module = odbc_result($qry, "Module");
		$OwnerCode = odbc_result($qry, "OwnerCode");
		$Name = odbc_result($qry, "Name");

		$Status = 'Pending';
		$background = '';


		$a1=array(1, 2, 4);
		$a2=array(1);

		$result=array_intersect($ApprovedByApproversArray,$ApproverIdsArray);
		$result2=array_intersect($DisapprovedByApproversArray,$ApproverIdsArray);


		if( count($result2) == $NoOfDisapprovalsRequired){
			$Status = 'Rejected';
			$background = '#FF7276';
		}else{
			if( count($result) == $NoOfApprovalsRequired){
				$Status = 'Approved';
				$background = '#90ee90';
			}else{
				$Status = 'Pending';
				$background = '#FFFFA7';
			}				
		}
		
		
		// if($U_ApprovalCodes != '' && $U_ApprovalCodes == 'Approved'){
		// 	$Status = 'Approved';
		// 	$background = '#90ee90';

		// }
		// else if($U_ApprovalCodes != '' && $U_ApprovalCodes != 'Rejected' && $U_ApprovalCodes != 'Approved'){
		// 	$Status = 'Pending';
		// 	$background = '#FFFFA7';
		// }
		// else if($U_ApprovalCodes != '' && $U_ApprovalCodes == 'Rejected'){
		// 	$Status = 'Rejected';
		// 	$background = '#FF7F7F';
		// }
		



		echo  '<tr style="background-color: white; "  >
					<td class="rowno text-right" style="background-color: lightgray;color:black; font-size:13px;">
						<span>'.$ctr.'</span>
					</td>
					<td class="item-approvers">
							'.$ApproverIds.'
					</td>
					<td class="item-approvedbyapprovers">
							'.str_replace("0,","",$ApprovedByApprovers).'
					</td>
					<td class="item-noapproversrequired">
							'.$NoOfApprovalsRequired.'
					</td>
					<td class="item-disapprovedbyapprovers">
							'.str_replace("0,","",$DisapprovedByApprovers).'
					</td>
					<td class="item-nodisapproversrequired">
							'.$NoOfDisapprovalsRequired.'
					</td>
					<td class="item-draftentry">
							'.$DocEntry.'
					</td>
					<td class="item-sapdocentry">
							'.$SAPDocEntry.'
					</td>
					<td class="item-objtype">
							'.$ObjType.'
					</td>
					<td class="item-1">
							'.$Module.'
					</td>
					<td class="item-1">
							'.$CardCode.'
					</td>
					<td class="item-2">
							'.$CardName.'
					</td>
					<td class="text-right" >
							'.$DocTotal.'
					</td>
					<td >
							'.$Comments.'
					</td>
					<td >
							'.$OwnerCode.'
					</td>
					<td >
							'.$Name.'
					</td>
					<td style="background-color: '.$background.'" class="item-status">
							'.$Status.'
					</td>
				</tr>';
			$ctr++;       
	}
	odbc_free_result($qry);
	odbc_close($MSSQL_CONN);


	?>
		
		</tbody>
	</table>
</div>

<script>$('#tblForApprovalApproverSide').dataTable({"bLengthChange": false,});</script>