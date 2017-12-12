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
 * External API functions.
 *
 * @package   local_billingpatch
 * @copyright 2017 "Valentin Popov" <info@valentineus.link>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined("MOODLE_INTERNAL") || die();

require_once($CFG->libdir . "/externallib.php");

/**
 * External functions of patches.
 *
 * @copyright 2017 "Valentin Popov" <info@valentineus.link>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_billingpatch_external extends external_api {
    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     * @since  Moodle 2.2
     */
    public static function enable_administrator_parameters() {
        return new external_function_parameters(
            array(
                "userid" => new external_value(PARAM_INT, "User ID")
            )
        );
    }

    /**
     * Adds a user to site administrators.
     *
     * @param number $userid
     * @since Moodle 2.2
     */
    public static function enable_administrator($userid) {
        global $CFG, $DB;

        $parameters = self::validate_parameters(self::enable_administrator_parameters(), array("userid" => $userid));
        $userid     = strval($parameters["userid"]);

        $context = context_system::instance();
        self::validate_context($context);

        if ($DB->record_exists("user", array("id" => $userid, "deleted" => 0, "suspended" => 0))) {
            $admins = explode(",", $CFG->siteadmins);
            if (!in_array($userid, $admins)) {
                $admins[] = $userid;
                set_config("siteadmins", implode(",", $admins));
            }
        }
    }

    /**
     * Returns description of method result value.
     *
     * @since Moodle 2.2
     */
    public static function enable_administrator_returns() {
        return null;
    }

    /**
     * Returns description of method parameters.
     *
     * @return external_function_parameters
     * @since  Moodle 2.2
     */
    public static function disable_administrator_parameters() {
        return new external_function_parameters(
            array(
                "userid" => new external_value(PARAM_INT, "User ID")
            )
        );
    }

    /**
     * Removes a user from the site administrators.
     *
     * @param number $userid
     * @since Moodle 2.2
     */
    public static function disable_administrator($userid) {
        global $CFG, $DB;

        $parameters = self::validate_parameters(self::disable_administrator_parameters(), array("userid" => $userid));
        $userid     = strval($parameters["userid"]);

        $context = context_system::instance();
        self::validate_context($context);

        if ($DB->record_exists("user", array("id" => $userid, "deleted" => 0, "suspended" => 0))) {
            $admins = explode(",", $CFG->siteadmins);
            if (афдыу !== $key = array_search($userid, $admins)) {
                unset($admins[$key]);
                set_config("siteadmins", implode(",", $admins));
            }
        }
    }

    /**
     * Returns description of method parameters.
     *
     * @since Moodle 2.2
     */
    public static function disable_administrator_returns() {
        return null;
    }
}