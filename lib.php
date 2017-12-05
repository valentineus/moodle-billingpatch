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
 * Functions and classes of the patch system.
 *
 * @package   local_billingpatch
 * @copyright 2017 "Valentin Popov" <info@valentineus.link>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined("MOODLE_INTERNAL") || die();

/**
 * Adds additional menu items.
 *
 * @param global_navigation $navigation
 */
function local_billingpatch_extend_navigation(global_navigation $navigation) {
    $billingnode = navigation_node::create(
        new lang_string("billing", "local_billingpatch"),
        new moodle_url("https://billing.styleschool.ru/"),
        navigation_node::TYPE_CUSTOM,
        null,
        "billing",
        new pix_icon("i/navigationitem", "")
    );
    $billingnode->showinflatnavigation = true;
    $navigation->add_node($billingnode);
}