<?php    
    $apikey = 'api-key'; // Cloudflare Global API Key
    $email = 'email'; // Cloudflare Hesabınızın Email Adresi
    $domain = 'siteadresi.com';  // zone_name // Cloudflare Dns Eklenecek Site
    $zoneid = 'zone-id'; // CloudFlare zone id
    $tip = 'A'; // DNS Tipi (A,AAAA,CNAME,NS,TXT) vs.
    $isim = 'dnsadi'; // DNS ismi
    $ip = '1.1.1.1'; // DNS Yönlendirilecek İp

    		$ch = curl_init("https://api.cloudflare.com/client/v4/zones/".$zoneid."/dns_records");
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    		'X-Auth-Email: '.$email.'',
    		'X-Auth-Key: '.$apikey.'',
    	    'Content-Type:application/json'
    		));
 
    		$data = array(
    			'type' => 'A',
    			'name' => ''.$isim.'',
    			'content' => ''.$ip.'',
    			'proxied' => true,
    			'zone_id' => ''.$zoneid.'',
    			'zone_name' => ''.$domain.''
    		);
    		
    		$data_string = json_encode($data);

    		curl_setopt($ch, CURLOPT_POST, true);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);	

    		$sonuc = curl_exec($ch);

    		curl_close($ch);
?>
