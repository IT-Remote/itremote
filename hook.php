<?php

/**
 * -------------------------------------------------------------------------
 * IT Remote plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * IT Remote plugin is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * IT Remote plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with IT Remote. If not, see <http://www.gnu.org/licenses/>.
 * -------------------------------------------------------------------------
 * @copyright Copyright (C) 2023 by IT Remote plugin team.
 * @license   GPLv2 https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://itremote.com
 * -------------------------------------------------------------------------
 */

// Required
function plugin_itremote_install()
{
    global $DB;
    return true;
}

// Required
function plugin_itremote_uninstall()
{
    global $DB;
    return true;
}