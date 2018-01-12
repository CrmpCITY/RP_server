<?

	$m_id = 			"26757";
	$m_secret = 		"z12rcnmi";
	$m_secret_2 = 		"ra5x9a4i";

	function get_sign($merchant_id, $order_amount, $secret_word, $order_id)
	{
		return md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$order_id);
	}

	function get_ip()
	{
	    if(isset($_SERVER['HTTP_X_REAL_IP']))
		{
			return $_SERVER['HTTP_X_REAL_IP'];
		}
		
	    return $_SERVER['REMOTE_ADDR'];
	}

	function success_payment($uid, $sum)
	{
		$db_host = 			"127.0.0.1"; 
		$db_user = 			"maxeitzen_srv"; 
		$db_database = 		"maxeitzen_srv"; 
		$db_password = 		"1*s{nlX0";

		$mysql = new mysqli($db_host, $db_user, $db_password, $db_database); 

		mysql_query("SET NAMES 'utf8'", $mysql); 

		if(!$mysql)
		{
			return "ERROR: Database connection error!";
		}

		$table_donations = 	"donations";
		$table_user_id = 	"acc_id";
		$table_amount = 	"amount";
		$table_date = 		"date";
		$table_time = 		"time";

		$date = date("d.m.Y"); 
		$time = date("H:i:s");

		$mysql->query("INSERT INTO ".$table_donations." (".$table_user_id.", ".$table_amount.", ".$table_date.", ".$table_time.") VALUES ('".$uid."', '".$sum."', '".$date."', '".$time."')"); 
		$mysql->close();

		return "YES";
	}

?>