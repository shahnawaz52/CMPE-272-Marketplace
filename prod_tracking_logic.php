<?php
	function store_visited_products($productname, $product_id) {
		$cookie_name = "VISITED_PRODUCTS";
		$cookie_product_id = "VISITED_PRODUCT_ID";
		if(!isset($_COOKIE[$cookie_name])) {
			$value = array();
			$visited_products = array();
		}
		else {
			// Cookies is already set. Just read its value
			$value = json_decode($_COOKIE[$cookie_name]);
			$visited_products = json_decode($_COOKIE[$cookie_product_id], true);
		}

		if (array_key_exists($product_id, $visited_products)) {
			$visited_products[$product_id]++;
		} else {
			$visited_products[$product_id] = 1;
		}

		// Setting the cookie
		array_push($value, $productname);
		$value = json_encode($value);
		// print_r($value);
		setcookie($cookie_name, $value, time() + (86400 * 30), "/");
		$visited_products_json = json_encode($visited_products);
		// print_r($visited_products_json);
		setcookie($cookie_product_id, $visited_products_json, time() + (86400 * 30), "/");
	}

	function store_visited_product_id($product_id) {
		$cookie_name = "VISITED_PRODUCT_ID";
		if(!isset($_COOKIE[$cookie_name])) {
			$visited_products = array();
		}
		else {
			// Cookie is already set. Just read its value
			$visited_products = json_decode($_COOKIE[$cookie_name], true);
		}
	
		// Increase the visit count of the product
		if (array_key_exists($product_id, $visited_products)) {
			$visited_products[$product_id]++;
		} else {
			$visited_products[$product_id] = 1;
		}
	
		// Setting the cookie
		$visited_products_json = json_encode($visited_products);
		// print_r($visited_products_json);
		setcookie($cookie_name, $visited_products_json, time() + (86400 * 30), "/");
	}

	function drawProductTable($array) {
		$pageCount = array();
        foreach ($array as $item) {
            if (array_key_exists($item, $pageCount)) {
                $pageCount[$item]++;
            } else {
                $pageCount[$item] = 1;
            }
        }
        foreach ($pageCount as $page => $count) {
            echo "<tr>";
            echo "<td style='font-family:monospace;'>".$page."</td>";
            echo "<td style='font-family:monospace;'>".$count."</td>";
            echo "</tr>";
        }
		// foreach ($array as $item) {
		// 	echo "<tr>";
		// 	echo "<td style='font-family:monospace;'>".$item."</td>";
		// 	echo "</tr>";
		// }
	}

	function display_visited_products() {
		echo "<html>
				<head>
				<title>
						Visited products!
				</title>
			</head>
			<body>";

				/* Draw table if cookie was set */
				$cookie_name = "VISITED_PRODUCTS";
				if(!isset($_COOKIE[$cookie_name])) {
					echo "<br><b><h2>No pages visited yet!</h2><b>";
				}
				else {
					echo "<!-- table headers -->
						<br><table class='table table-striped' border='1' style='text-align:center;width:100%'>
						<thead><tr style='font-size:15px;'><th style = 'color:firebrick;font-family:monospace;font-size:larger'>Visited Pages or Products</th></tr></thead><tbody>";
					// Cookies is already set. Just read its value
					$value = json_decode($_COOKIE[$cookie_name]);
					drawProductTable($value);
					echo "</tbody></table></body>";
				}
		echo "</html>";
		
	}
?>
