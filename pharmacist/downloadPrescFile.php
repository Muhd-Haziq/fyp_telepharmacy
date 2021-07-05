<?php

 echo $_GET['presc'];
if( isset($_GET['presc']) ) {
    
    $prescFile = $_GET['presc'];
    
    echo $prescFile . "<br/>";
    
    $filePath = '../prescFiles/' . $prescFile;
    echo $filePath;
    
    echo file_exists($filePath);
    
    if (file_exists($filePath)) {
        header('Pragma: public'); 	// required
	header('Expires: 0');		// no cache
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
	header('Cache-Control: private',false);
        header("Content-Type: image/jpeg");
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename=' . $prescFile);
        header('Content-Transfer-Encoding: binary');
	header('Content-Length: '.filesize($filePath));
	header('Connection: close');
        ob_clean();
        flush();
        readfile($filePath);
        exit;
    }
   
}
