<?php

function getProductList($usrName, $pwd, $dbId ,$appToken, $qbDomain, $expTime) {
	$quickbase = new QuickBase($usrName, $pwd, true, $dbId ,$appToken, $qbDomain, $expTime);
	$queries = array(
            array(
                'fid'   => '0',        // field id to be searched
                'ev'    => 'CT',       // EX - look for exact match
                'cri'   => '')    // value to be searched
             );

	try {
		$results = $quickbase->do_query($queries, '', '');
		//echo '<pre>';
		//print_r($results);
		// convert simple xml element object to array for better manipulation
		$results =(array) $results->table->records;
		$results = $results['record'];
		$i=0;
		foreach ($results as $result) {
			$result = (array) $result;
			//print_r($result['@attributes']);exit;
			//print_r($result);exit;
			$records[$i]['rid'] = $result['@attributes']['rid'];
			$records[$i]['sku'] = $result['f']['0'];
			$i++;
		}
		//print_r($results);
	} catch (Exception $e) {
   		$records['error'] = 'no matching record found';
	}

	return $records;
}

function getProductDetails($rid, $usrName, $pwd, $dbId ,$appToken, $qbDomain, $expTime) {
	$quickbase = new QuickBase($usrName, $pwd, true, $dbId ,$appToken, $qbDomain, $expTime);
	$queries = array(
            array(
                'fid'   => '0',        // field id to be searched
                'ev'    => 'EX',       // EX - look for exact match
                'cri'   => $rid)    // value to be searched
             );

	try {
		$results = $quickbase->do_query($queries, '', '');
		//echo '<pre>';
		//print_r($results);
		// convert simple xml element object to array for better manipulation
		$results = (array) $results->table->records->record;
		if (array_key_exists ('f', $results) ) {
			$res['recs'] = $results['f'];
			$res['rid'] =  $results['@attributes']['rid'];
			$records['result'] = $res;

   		} else {
     			$records['result'] = 'no matching record found';
   		}
	} catch (Exception $e) {
   		$records['result'] = 'no matching record found';
	}

	return $records;
}

function addStrategicAccountsManagement ($quickbase, $qbReqProd){


	$fields = array();
	for($i=6;$i<=18;$i++) {
		array_push($fields, array( 'fid'   => $i,
            'value' => $_POST['_fid_'.$i]));
	}
	// Adding records to Sales Sample Requests
	$res = $quickbase->add_record($fields);
	$status = false;
    if($res->errcode == 0){
    	$status = true;
		$startRid = (int) $res->rid;

		addReqProduct ($startRid,$qbReqProd);
    }

}

function addReqProduct ($stRid,  $qb) {
	//echo 'rid: '.$stRid;
	$salesMan = $_POST['_fid_7'];

	$fields = array(
        array(
		'fid'   => '7',
		'value' => $_POST['f2_fid_7']),
        array(
		'fid'   => '8',
		'value' => $_POST['f2_fid_8']),
        /*array(
		'fid'   => '9',
		'value' => $_POST['f2_fid_9']),*/
        /*array(
		'fid'   => '10',
		'value' => $_POST['f2_fid_10']),
        array(
		'fid'   => '11',
		'value' => $_POST['f2_fid_11']),*/
        array(
		'fid'   => '12',
		'value' => $stRid),
       /* array(
		'fid'   => '13',
		'value' => $_POST['_fid_6']),
        array(
		'fid'   => '14',
		'value' => $_POST['_fid_7'])*/
		);
	//print_r($fields);
	$res = $qb->add_record($fields);
	$status = false;
    if($res->errcode == 0){
		$rid = (int) $res->rid;
		//echo 'rid:'. $rid;
		$res = $qb->edit_record($rid, $fields);
		if($res->errcode == 0) {
			//print_r($res);
		}else {
			echo 'falied to update';
		}

	}

}

?>
