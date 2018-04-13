<?php
//save in : includes/general_functions.php 

function concatError(&$strError,$strNewErr){
	if($strError==""){
		return $strError ;
	}else{
		return $strError .'<br />'. $strNewErr;
	}
}

?>