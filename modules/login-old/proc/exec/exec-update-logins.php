<?php
session_start();

include('../../../../config/config.php');

$err = 0;
$errmsg = '';
$selCompany = $_POST['selCompany'];
$txtUsername = $_POST['txtUsername'];
$txtPassword = $_POST['txtPassword'];
$MSSQL_DB = $selCompany;
$MSSQL_DB2 = 'USER-COMMON';


	if($err == 0){
	$qryActiveUpdate = odbc_exec($MSSQL_CONN, "USE [".$MSSQL_DB2."]; UPDATE [dbo].[@OUSR] SET Active = 0 WHERE UserCode='$txtUsername' AND UserPass='$txtPassword'  ");
	}


?>