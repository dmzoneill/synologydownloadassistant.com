<?php

if( isset( $_GET['begindownload'] ) )
{ 
    $fp = fopen("counter.txt", "r"); 
    $count = fread($fp, 1024); 
    fclose($fp); 

    $count = $count + 1; 

    $fp = fopen("counter.txt", "w"); 
    fwrite($fp, $count); 
    fclose($fp); 

  
    $file = 'downloads/synologydownload.crx';  

    // Set headers     
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header("Content-Description: File Transfer");     
    header("Content-Disposition: attachment; filename=".basename($file));     
    header("Content-Type: application/x-chrome-extension");     
    header("Content-Transfer-Encoding: binary");     
    header('Content-Length: ' . filesize($file));

    ob_clean();
    flush();
    readfile($file);
    exit;
}

include( "header.php" );

?>

    <!-- Main -->
    <div id="main">
	    <div class="shell">
	    
		    <br><br><br><br><br><br>
		    
		    <center>
		        <a href='http://www.synologydownloadassistant.com/download.php?begindownload=true' border='0'><img src='images/download.jpg'></a>
		        <br>
		        <h3>Thanks for trying the Synology Download Assistant</h3>
		        <br>
		        Be quick to leave a rating and leave feedback!
		        <br>
		        <br>
		        <span id='downloadCountdownMessage'></span>
		    </center>	
		    
		    <script type='text/javascript'>
		    
		        var timeout = 11;
		    
		        function downloadCountdown()
		        {
		        
		            if( timeout == 1 )
		            {   
				window.open("http://www.synologydownloadassistant.com/download.php?begindownload=true");
                                $( "#downloadCountdownMessage" ).html( "<a style='text-decoration:none' href='http://www.synologydownloadassistant.com/download.php?begindownload=true' target='_blank'>Thanks for downloading</a>" );
		            }
		            else
		            {
		            
		                timeout = timeout - 1;
		                setTimeout( "downloadCountdown()" , 1000 );
		                $( "#downloadCountdownMessage" ).html( "<a style='text-decoration:none' href='http://www.synologydownloadassistant.com/download.php?begindownload=true' target='_blank'>Downloading extension in " + timeout + " seconds</a>" );
		                
		            }
		            
		        }
		        
		        downloadCountdown();
		    
		    </script>
		    
		    <br><br><br><br><br><br>
	    </div>	
    </div>    
    <!-- End Main -->
    
<?php

include( "footer.php" );

?>
