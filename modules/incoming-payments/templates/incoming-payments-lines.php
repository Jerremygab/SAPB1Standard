<?php
session_start();
include_once('../../../config/config.php');
$serviceType = $_GET['serviceType'];

if ($serviceType == 'S'){
?>

<div class="">
    <table id="tblDetails" class="table table-striped table-bordered table-sm detailsTable" cellspacing="0"
        style="background-color: white; width:100% !important;" cellspacing="0">
        <thead style="border-bottom: 0 !important; ">
            <tr>
                <th class="text-right" style=" color: black;">#</th>
                <th style="color: black; min-width:50px; ">Select</th>
                <th style="color: black; min-width:150px; ">Document No.</th>
                <th style="color: black; min-width:150px;">Document Type</th>
                <th style="color: black; min-width:150px;">Date</th>
                <th style="color: black; min-width:150px;">Total</th>
                <th style="color: black; min-width:150px;">Balance Due</th>
                <th style="color: black; min-width:150px;">Total Payment</th>
                <th style="color: black; min-width:150px;">WTax Amount</th>
                <th style="color: black; min-width:150px;">Doc. Remarks</th>
                <!--
                <th style="color: black; min-width:150px;">Department</th>
                <th style="color: black; min-width:150px;">Branch</th>
                <th style="color: black; min-width:150px;">Employee</th>
                -->
            </tr>
        </thead>
        <tbody class="">

        </tbody>
        <tfoot style="z-index: 999;  background-color: lightgray; " class="d-none">
            <tr style="background-color: lightgray; z-index: 999">
                <th class="text-right" style=" color: black">#</th>
                <th style="color: black; min-width:50px; ">Select</th>
                <th style="color: black; min-width:150px; ">Document No.</th>
                <th style="color: black; min-width:150px;">Document Type</th>
                <th style="color: black; min-width:150px;">Date</th>
                <th style="color: black; min-width:150px;">Overdue Days</th>
                <th style="color: black; min-width:300px;">Total</th>
                <th style="color: black; min-width:300px;">Total Payment</th>
                <th style="color: black; min-width:300px;">Balance Due</th>
                <th style="color: black; min-width:300px;">WTax Amount</th>
                <th style="color: black; min-width:150px;">Doc. Remarks</th>
                <!--
                <th style="color: black; min-width:150px;">Department</th>
                <th style="color: black; min-width:150px;">Branch</th>
                <th style="color: black; min-width:150px;">Employee</th>
                -->
            </tr>
        </tfoot>
    </table>
</div>

<?php
}

else{
?>
<div class="">
    <table id="tblDetails" class="table table-striped table-bordered table-sm detailsTable" cellspacing="0"
        style="background-color: white">
        <thead style="z-index: 999;  background-color: lightgray !important;" class="thead-fixed ">
            <tr style="background-color: lightgray; z-index: 999 !important;">
                <th class="text-right" style="color: black">#</th>
                <th style="color: black; min-width:300px;">G/L Account</th>
                <th style="color: black; min-width:400px;">G/L Name</th>
                <th style="color: black; min-width:150px;">Doc. Remarks</th>
                <th style="color: black; min-width:150px;">Tax Definition</th>
                <th style="color: black; min-width:100px;">Net Amount</th>
 


            </tr>
        </thead>


       <!--  table ko -->
       <tbody class="">
            <tr style="background-color: white; "  >
            <td class="rowno text-right" style="background-color: lightgray;color:black; font-size:13px; width:45px;">
                <span>1</span>
                <button type="button" class="btn d-none btnrowfunctions" data-toggle="dropdown" style="width:2px; padding-left: 0px !important;margin-left: 0px !important">
                    <i class="fas fa-caret-down" ></i>
                </button>
                
            
                <ul class="dropdown-menu rowfunctions" role="menu" style="background-color: #fdfd96;">
                    <li class="deleterow" style="font-size:20px; color: black; font-weight:bold">Delete Row</a></li>
                    <li class="duplicaterow"style="font-size:20px; color: black; font-weight:bold">Duplicate Row</a></li>
                </ul>
                
            </td>
            <td style="outline: none; width:90px;">
                <input type="checkbox" class="form-control matrix-cell "  aria-label="Recipient's username" aria-describedby="button-addon2" style="width: 25px; display:flex; align-self:center; margin:auto;" />
                
            </td>
            <td >
                <div class="input-group ">
                <input type="text" class="form-control matrix-cell documentNo"  aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none" readonly/>
                </div>
            </td>
            <td >
                <input type="text" class="form-control matrix-cell documentType"  aria-label="" aria-describedby="button-addon2" style="outline: none; border:none" readonly/>
                

                <td >
                <input type="text" class="form-control matrix-cell text-right date"  style="outline: none; border:none"readonly/>
                
            </td>

                <td >
                    <div class="input-group ">
                        <input type="text" class="form-control text-right total"  style="outline: none; border:none"readonly/>
                    </div>
            </td>
            <td >
                <input type="text" class="form-control matrix-cell text-right balanceDue" style="outline: none; border:none" maxlength="12" readonly/>
                
            </td>
            <td >
                <input  type="text" class="form-control matrix-cell text-right totalPayment " style="outline: none; border:none" />	
            </td>
            <td >
            <input  type="text" class="form-control matrix-cell text-right wTaxAmount " aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none" readonly/>
            </td>
            <td >
            <input  type="text" class="form-control matrix-cell text-right docRemarks " aria-label="Recipient's username" aria-describedby="button-addon2" style="outline: none; border:none" readonly/>
            </td>

            
            </tr>
        </tbody>
        <!-- table ko -->
</div>


<?php
}
?>
<script>
$('#tblDetails').dataTable({
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