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
 * Event handlers.
 *
 * @package   local_billingpatch
 * @copyright 2017 "Valentin Popov" <info@valentineus.link>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_billingpatch;

defined("MOODLE_INTERNAL") || die();

/**
 * Description of event handlers.
 *
 * @copyright 2017 "Valentin Popov" <info@valentineus.link>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class observer {
    /**
     * External function, called by the observer.
     *
     * @param object $event
     */
    public static function course_module($event) {
        $data = $event->get_data();

        if ($data["other"]["modulename"] == "bigbluebuttonbn") {
            self::monkey_patch_bigbluebuttonbn($data["other"]["instanceid"]);
        }
    }

    /**
     * Patches for BigBlueButton.
     *
     * @param number $instanceid
     */
    private static function monkey_patch_bigbluebuttonbn($instanceid = 0) {
        global $DB;
        $module = $DB->get_record("bigbluebuttonbn", array("id" => $instanceid));
        $DB->set_field("event", "timeduration", $module->closingtime);
    }
}