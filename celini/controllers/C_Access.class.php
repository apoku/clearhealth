<?php
/**
 * Access Controller
 *
 * @package	com.clear-health.celini
 * @author	Joshua Eichorn <jeichorn@mail.com>
 */

$loader->requireOnce('controllers/C_Base_Access.class.php');

/**
 * This is just a stub class that extends the base Access controller. 
 * Its how Celini finds it if there isn't an applciation specific extenstion.
 */
class C_Access extends C_Base_Access {
}
?>
