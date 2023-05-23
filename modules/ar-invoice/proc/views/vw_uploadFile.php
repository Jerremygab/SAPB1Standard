

<?php
session_start();
$filename = $_FILES['file']['name'];

$location = 'C:/Users/Administrator/Desktop/JCBA/ATTACHMENTS/'.$filename;

include('../../../../config/config.php');


$u_objecType = 13;
$u_docentry =$_POST['docentryAttachment'];

if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
    			echo $location;
    		} else {
    			echo 0;
    		}

    $addQry = odbc_exec($MSSQL_CONN, "USE [".$MSSQL_DB."]; 
					INSERT INTO [@ATTACHMENT]
						(U_ObjectType, U_DocEntry, U_LineNo, U_FileName, U_FileLocation)
					VALUES
						($u_objecType, $u_docentry, 0,  '$filename', '$location' )
				");
?>
