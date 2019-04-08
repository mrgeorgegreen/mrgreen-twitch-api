<?php
/**
 * Created by PhpStorm.
 * User: mrgreen
 * Date: 08/04/19
 * Time: 8:09 PM
 */

namespace App\Models;


interface DatabaseConnection {

    public function query( $args );
}