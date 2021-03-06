<?PHP

/*****

	This bot will generate a cryptocurrency address for each currency on each exchange that supports this functionality.

 *****/

function make_deposit_addresses( $Adapters, $Tester ) {

	foreach( $Adapters as $Adapter ) {
		echo "\n<br/>***** " . get_class( $Adapter ) . " *****<br/>\n";
		$deposit_addresses = $Adapter->deposit_addresses();
		if( isset( $deposit_addresses['error'] ) && $deposit_addresses['error'] == "METHOD_NOT_AVAILABLE" ) continue;
		
		$Tester->test( "deposit_addresses", $deposit_addresses );

		foreach( $deposit_addresses as $deposit_address ) {
			echo get_class( $Adapter ) . "\t" . $deposit_address['currency'] . "\t" . $deposit_address['address'] . "\n<br/>";
		}
	}

}

?>