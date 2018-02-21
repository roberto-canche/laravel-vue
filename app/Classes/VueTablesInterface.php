<?php 
/** 
 * VueTables server-side component interface
*/
namespace App\Classes;
Interface VueTablesInterface {
    public function get( $table, Array $fields );
} 