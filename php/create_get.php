<?php 

        $curlSession = curl_init(); 


        curl_setopt($curlSession, CURLOPT_URL, $url);



        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, 1); 
        


        curl_setopt($curlSession, CURLOPT_HEADER, 0); 

        


        $output = curl_exec($curlSession);



        curl_close($curlSession);  


     
?>