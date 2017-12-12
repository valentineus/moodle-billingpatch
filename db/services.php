<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Registration of web services.
 *
 * @package   local_billingpatch
 * @copyright 2017 "Valentin Popov" <info@valentineus.link>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined("MOODLE_INTERNAL") || die();

$functions = array(
    "local_billingpatch_enable_administrator" => array(
        "classname"   => "local_billingpatch_external",
        "methodname"  => "enable_administrator",
        "classpath"   => "local/billingpatch/externallib.php",
        "description" => "Adds a user to site administrators.",
        "type"        => "write"
    ),

    "local_billingpatch_disable_administrator" => array(
        "classname"   => "local_billingpatch_external",
        "methodname"  => "disable_administrator",
        "classpath"   => "local/billingpatch/externallib.php",
        "description" => "Removes a user from the site administrators.",
        "type"        => "write"
    )
);