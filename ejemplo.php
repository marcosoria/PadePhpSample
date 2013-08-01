<?php
try{
	
	$client = new SoapClient("https://www.pade.mx/PadeApp/TimbradoService?WSDL");	
	$pathXML = 'cfdi-1.xml';
	
	if (file_exists($pathXML)) {
	    $xml = simplexml_load_file($pathXML);
	    	    	 		 	
	} else {
	    exit('Error al abrir archivo '.$pathXML);
	}
	
	$params = new stdClass();
	
	$params->contrato = 'aaaaaa-bbbbb-ccccc-ddddd';
	$params->usuario = 'usuario';
	$params->passwd = 'contrasena123';
	$params->cfdiXml = $xml->asXML();
	$params->opciones = array('CALCULAR_SELLO');
						
	$result = $client->timbradoPruebaConOpciones($params);
	
	echo '<h2>Result</h2><pre>';
	
				print_r($result);
	
				echo '</pre>';
				
	
	
	
}catch(Exception $e){
	var_dump($e);
}
?>