<?php
session_start();
include_once('../../../config/config.php');
$serviceType = $_GET['serviceType'];

if ($serviceType == 'I'){
?>

<div class="">
<table id="tblDetails" class="table table-striped table-bordered table-sm detailsTable" cellspacing="0"  style="background-color: white; width: 100%;" cellspacing="0">
  <thead   style="border-bottom: 0 !important">
    <tr>
			<th class="text-right" style=" color: black;width:5px;">#</th>
			<th style="color: black; min-width:50px; ">Select</th>
			<th style="color: black; min-width:200px;">Customer Code</th>
			<th style="color: black; min-width:200px;">NumAtCard</th>
			<th style="color: black; min-width:200px;">Document Date</th>
			<th style="color: black; min-width:100px;">Item Code</th>
			<th style="color: black; min-width:100px;">Quantity</th>
			<th style="color: black; min-width:100px;">Gross Total</th>
    </tr>
  </thead>
  <tbody class="">
    <tr style="background-color: white; "  >
	 <td class="rowno text-right" style="background-color: lightgray;color:black; font-size:5px;">
		<span>1</span>
		<button type="button" class="btn d-none btnrowfunctions" data-toggle="dropdown" style="width:1px; padding-left: 0px !important;margin-left: 0px !important">
			<i class="fas fa-caret-down" ></i>
		</button>
		
	
		 <ul class="dropdown-menu rowfunctions" role="menu" style="background-color: #fdfd96;">
			<li class="deleterow" style="font-size:20px; color: black; font-weight:bold">Delete Row</a></li>
			<li class="duplicaterow"style="font-size:20px; color: black; font-weight:bold">Duplicate Row</a></li>
		  </ul>
		
	  </td>
      
	  <td >
	  <div class="input-group ">
		<input type="checkbox" style="height: 20px; width: 20px; margin: 10px auto auto; text-align: center; outline: none;" class="form-control matrix-cell chkboxInvoice " s="">
		</div>
	  </td>
	  <td >
		<div class="input-group ">
		<input type="text" class="form-control matrix-cell whsecode" aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none;" readonly/>
		</div>
	  </td>
	  <td >
	  
		<div class="input-group ">
		<input type="text" class="form-control matrix-cell whsecode" aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none;" readonly/>
		</div>
	  </td>
	  <td >
	  
	  <div class="input-group ">
	  <input type="text" class="form-control matrix-cell whsecode" aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none;" readonly/>
	  </div>
	</td>
	    <td >
		<input type="text" class="form-control matrix-cell whsecode" aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none;" readonly/>
		
	  </td>
	    <td >
		<input type="text" class="form-control matrix-cell whsecode" aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none;" readonly/>
		
	  </td>
	   

      
    </tr>
	
  </tbody>
  <tfoot style="z-index: 999;  background-color: lightgray; " class="d-none">
		<tr style="background-color: lightgray; z-index: 999">
		<th class="text-right" style=" color: black;width:5px;">#</th>
			<th style="color: black; min-width:50px; ">Select</th>
			<th style="color: black; min-width:200px;">Customer Code</th>
			<th style="color: black; min-width:200px;">NumAtCard</th>
			<th style="color: black; min-width:200px;">Document Date</th>
			<th style="color: black; min-width:100px;">Item Code</th>
			<th style="color: black; min-width:100px;">Quantity</th>
			<th style="color: black; min-width:100px;">Gross Total</th>
		</tr>
	  </tfoot>
</table>
</div>

<?php
}

else{
?>
<div class="">
<table id="tblDetails" class="table table-striped table-bordered table-sm detailsTable" cellspacing="0"  style="background-color: white">
  <thead style="z-index: 999;  background-color: lightgray !important;" class="thead-fixed ">
    <tr style="background-color: lightgray; z-index: 999 !important;">
	<th class="text-right" style=" color: black;width:5px;">#</th>
			<th style="color: black; min-width:50px; ">Select</th>
			<th style="color: black; min-width:200px;">Customer Code</th>
			<th style="color: black; min-width:200px;">NumAtCard</th>
			<th style="color: black; min-width:200px;">Document Date</th>
			<th style="color: black; min-width:100px;">Item Code</th>
			<th style="color: black; min-width:100px;">Quantity</th>
			<th style="color: black; min-width:100px;">Gross Total</th>
	
    </tr>
  </thead>
  <tbody class="">
    <tr style="background-color: white; "  >
	  <td class="rowno text-right" style="background-color: lightgray;color:black; font-size:13px;">
		<span>1</span>
		<button type="button" class="btn d-none btnrowfunctions" data-toggle="dropdown" style="width:1px; padding-left: 0px !important;margin-left: 0px !important">
			<i class="fas fa-caret-down" ></i>
		</button>
		
	
		 <ul class="dropdown-menu rowfunctions" role="menu" style="background-color: #fdfd96;">
			<li class="deleterow" style="font-size:20px; color: black; font-weight:bold">Delete Row</a></li>
			<li class="duplicaterow"style="font-size:20px; color: black; font-weight:bold">Duplicate Row</a></li>
		  </ul>
		
	  </td>
	   <td >
		<input type="text" class="form-control matrix-cell gldescription"  aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none" />
		 
	  </td>
	  <td >
		<div class="input-group ">
		<input type="text" class="form-control matrix-cell glaccount"  aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none" readonly/>
		  <button class="btn "   type="button" data-mdb-ripple-color="dark"  style="background-color: #ADD8E6; "  data-toggle="modal" data-target="#glModal" data-backdrop="false">
			<i class="fas fa-list-ul input-prefix" tabindex=0 style="color:blue " ></i>
		  </button>
		</div>
	  </td>
	   <td >
		<input type="text" class="form-control matrix-cell glname"  aria-label="" aria-describedby="button-addon2" style="outline: none; border:none" maxlength="30" readonly/>
		
	  </td>
	   <td class="d-none">
		<input type="text" class="form-control matrix-cell text-right quantity"  aria-label="" aria-describedby="button-addon2" style="outline: none; border:none" maxlength="30" value="1"/>
		
	  </td>
	    <td >
		<input type="text" class="form-control matrix-cell text-right price"   aria-label="" aria-describedby="button-addon2" style="outline: none; border:none" maxlength="30" />
		
	  </td>
	    <td >
		<input type="text" class="form-control matrix-cell text-right discount"   style="outline: none; border:none" maxlength="8"/>
		
	  </td>
	   <td >
	   <div class="input-group ">
            <input type="text" class="form-control text-right d-none taxamount" style="outline: none; border:none"
                maxlength="8" />
            <select type="text" class="form-control taxcode" placeholder="" readonly>
                <?php
												$qry = odbc_exec($MSSQL_CONN, "USE [".$MSSQL_DB."]; SELECT Code,Name,Rate FROM OVTG WHERE Inactive = 'N' AND Category='O' ORDER BY CASE WHEN Code = 'OVAT-N' THEN '1' ELSE Code END ASC");
													while (odbc_fetch_row($qry)) 
													{
														//echo odbc_result($qry, 'NextNumber');
														echo '<option  class="taxoptions" val-rate="' . number_format(odbc_result($qry, "Rate"), 2, '.', '.') . '" value="' . odbc_result($qry, "Code") . '"  >' . odbc_result($qry, "Code") . '</option>';
													}
													
													odbc_free_result($qry);
											?>
            </select>
        </div>
	  </td>
	    <td >
		<div class="input-group ">
				<input type="text" class="form-control text-right selWT d-none"  name="selWTax" style="outline: none; border:none" maxlength="8"/>
			  <select class="form-control input-sm selwt" name="selWT" readonly>

					<option value="0">No</option>';
					<option value="1" >Yes</option>';
				</select>
		</div>
	  </td>
	   <td >
		<input type="text" class="form-control matrix-cell text-right grossprice"    maxlength="30" />
		
	  </td>
	   <td >
		<input  type="text" class="form-control matrix-cell text-right rowtotal " style="outline: none; border:none" readonly/>	
	  </td>
	   <td >
	   <input  type="text" class="form-control matrix-cell text-right grosstotal " aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none" readonly/>
	  </td>

      
    </tr>
	
  </tbody>
  <tfoot style="z-index: 999;  background-color: lightgray; " class="d-none">
	<tr style="background-color: lightgray; z-index: 999 !important;">
	<th class="text-right" style=" color: black; width:5px;">#</th>
			<th style="color: black; min-width:50px; ">Select</th>
			<th style="color: black; min-width:200px;">Customer Code</th>
			<th style="color: black; min-width:200px;">NumAtCard</th>
			<th style="color: black; min-width:200px;">Document Date</th>
			<th style="color: black; min-width:100px;">Item Code</th>
			<th style="color: black; min-width:100px;">Quantity</th>
			<th style="color: black; min-width:100px;">Gross Total</th>
	
    </tr>
	  </tfoot>
</table>

</div>


<?php
}
?>
<script>$('#tblDetails').dataTable({
            scrollY: 300,
            scrollX: true,
            scroller: true,
			searching: false,
			ordering: false,
			bLengthChange: false,
			paging: false,
			info: false,
			
        });
</script>



