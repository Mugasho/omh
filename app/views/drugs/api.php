<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 3:46 PM
 */

$db=new \omh\database\DB();
$current     = isset( $_GET['p'] ) ? filter_input( INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT ) : 1;
$limit       = isset( $_GET['limit'] ) ? $_GET['limit'] : 10;
$search['s'] = isset( $_GET['s'] ) ?
	filter_input( INPUT_GET, 's', FILTER_SANITIZE_STRING ) : null;
$search['l'] = isset( $_GET['origin'] ) ?
	filter_input( INPUT_GET, 'origin', FILTER_SANITIZE_STRING ) : null;
$search['c'] = isset( $_GET['company'] ) ?
	filter_input( INPUT_GET, 'company', FILTER_SANITIZE_STRING ) : null;

if(isset($_GET['id'])){
    $id=filter_input( INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $drugs=$db->getDrugByID($id);
}else{
$pages = round( $db->countDrugs( $search ) / $limit, 0 );
$drugs = array();

if ( ! is_null( $pages ) ) {

	$start   = $current < 5 ? 1 : $current - 4;
	$last    = ( $current + 4 ) > $pages ? $pages : $current + 4;
	$next_id = ( ( $current - 1 ) * $limit );
	$drugs   = $db->getDrugNames( $limit, $next_id, $search );


}
}
echo json_encode($drugs);