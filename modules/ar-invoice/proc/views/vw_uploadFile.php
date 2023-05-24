

<?php
session_start();
// $filename = $_FILES['file']['name'];

// $location = 'C:/Users/Administrator/Desktop/JCBA/ATTACHMENTS/'.$filename;

include('../../../../config/config.php');


// 			//PHP
// $count = count($_FILES['fileToUpload']['name']);
// for ($i = 0; $i < $count; $i++) {
//     // echo 'Name: '.$_FILES['fileToUpload']['name'][$i].'<br/>';
// 	$filename = $_FILES['fileToUpload']['name'][$i];
// 	$location = 'C:/Users/karli.DESKTOP-T36732H/OneDrive/Pictures/MEME/upload/'.$filename;
// 	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $location)) {
//     			echo $location;
//     		} else {
//     			echo 0;
//     		}
// }













$u_objecType = 13;
$u_docentry =$_POST['docentryAttachment'];

$count = count($_FILES['fileToUpload']['name']);
for ($i = 0; $i < $count; $i++) {
   
	$filename = $_FILES['fileToUpload']['name'][$i];
	$location = 'C:/Users/Administrator/Desktop/JCBA/ATTACHMENTS/'.$filename;
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $location)) {
    			echo $location;

    			 $addQry = odbc_exec($MSSQL_CONN, "USE [".$MSSQL_DB."]; 
					INSERT INTO [@ATTACHMENT]
						(U_ObjectType, U_DocEntry, U_LineNo, U_FileName, U_FileLocation)
					VALUES
						($u_objecType, $u_docentry, $i,  '$filename', '$location' )
				");
    			 odbc_free_result($addQry);
    			
    		} else {
    			echo 0;
    		}

    		

}

   
?>
