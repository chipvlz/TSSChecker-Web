<?php 
	/* TODO: ADD API FUNCTIONS */

	if (isset($_GET['method']) && !empty($_GET['method'])) {
		$request_parts = explode('/', $_GET['method']);
		if ($request_parts[0] == "devices") {
			if ($request_parts[1] == "appletv") {
				$array = json_decode(file_get_contents("../internal_files/json/firmwares.json"), true)['devices'];
				foreach ($array as $key => $information) {
					if (filterArray($key, "AppleTV")) {

					} else {
						unset($array[$key]);
					}
				}

				$file_type = htmlentities($_GET['type']);

				//Output based on request
				switch($file_type) {
				    case 'json':
				    	header("Content-type: application/json");
				        echo json_encode($array, JSON_PRETTY_PRINT);
				        break;
				    case 'xml':
				    	header("Content-type: text/xml");
				        echo xmlrpc_encode($array); //This isn't a real function, but you can make one
				        break;
				    default:
				        echo $array;
				}
			} elseif ($request_parts[1] == "ipad") {

				$array = json_decode(file_get_contents("../internal_files/json/firmwares.json"), true)['devices'];
				foreach ($array as $key => $information) {
					if (filterArray($key, "iPad")) {

					} else {
						unset($array[$key]);
					}
				}
				
				$file_type = htmlentities($_GET['type']);

				//Output based on request
				switch($file_type) {
				    case 'json':
				    	header("Content-type: application/json");
				        echo json_encode($array, JSON_PRETTY_PRINT);
				        break;
				    case 'xml':
				    	header("Content-type: text/xml");
				        echo xmlrpc_encode($array); //This isn't a real function, but you can make one
				        break;
				    default:
				        echo $array;
				}

			} elseif ($request_parts[1] == "iphone") {

				$array = json_decode(file_get_contents("../internal_files/json/firmwares.json"), true)['devices'];
				foreach ($array as $key => $information) {
					if (filterArray($key, "iPhone")) {

					} else {
						unset($array[$key]);
					}
				}
				
				$file_type = htmlentities($_GET['type']);

				//Output based on request
				switch($file_type) {
				    case 'json':
				    	header("Content-type: application/json");
				        echo json_encode($array, JSON_PRETTY_PRINT);
				        break;
				    case 'xml':
				    	header("Content-type: text/xml");
				        echo xmlrpc_encode($array); //This isn't a real function, but you can make one
				        break;
				    default:
				        echo $array;
				}

			} elseif ($request_parts[1] == "ipod") {

				$array = json_decode(file_get_contents("../internal_files/json/firmwares.json"), true)['devices'];
				foreach ($array as $key => $information) {
					if (filterArray($key, "iPod")) {

					} else {
						unset($array[$key]);
					}
				}
				$file_type = htmlentities($_GET['type']);

				//Output based on request
				switch($file_type) {
				    case 'json':
				    	header("Content-type: application/json");
				        echo json_encode($array, JSON_PRETTY_PRINT);
				        break;
				    case 'xml':
				    	header("Content-type: text/xml");
				        echo xmlrpc_encode($array); //This isn't a real function, but you can make one
				        break;
				    default:
				        echo $array;
				}

			} elseif ($request_parts[1] == "all") {

				$array = json_decode(file_get_contents("../internal_files/json/firmwares.json"), true)['devices'];
				
				$file_type = htmlentities($_GET['type']);

				//Output based on request
				switch($file_type) {
				    case 'json':
				    	header("Content-type: application/json");
				        echo json_encode($array, JSON_PRETTY_PRINT);
				        break;
				    case 'xml':
				    	header("Content-type: text/xml");
				        echo xmlrpc_encode($array); //This isn't a real function, but you can make one
				        break;
				    default:
				        echo $array;
				}

			} else {

				$file_type = htmlentities($_GET['type']);

				$array = array('error' => "Unknown Method");

				//Output based on request
				switch($file_type) {
				    case 'json':
				    	header("Content-type: application/json");
				        echo json_encode($array, JSON_PRETTY_PRINT);
				        break;
				    case 'xml':
				    	header("Content-type: text/xml");
				        echo xmlrpc_encode($array); //This isn't a real function, but you can make one
				        break;
				    default:
				        echo $array;
				}
			}
		} else {

				$file_type = htmlentities($_GET['type']);

				$array = array('error' => "Unknown Method");

				//Output based on request
				switch($file_type) {
				    case 'json':
				    	header("Content-type: application/json");
				        echo json_encode($array, JSON_PRETTY_PRINT);
				        break;
				    case 'xml':
				    	header("Content-type: text/xml");
				        echo xmlrpc_encode($array); //This isn't a real function, but you can make one
				        break;
				    default:
				        echo $array;
				}
			}

	}

	function filterArray($string, $filter) {
      if(strpos($string, $filter) !== false) {
      	return true;
      } else {
      	return false;
      }

      return false;
	}

?>
