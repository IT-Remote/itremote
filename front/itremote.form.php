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

include("../../../inc/includes.php");

Html::header("IT Remote");

echo "<body style='background: rgba(0, 0, 0, 0.025);'>";
echo "<h1 style='text-align: start;'>Plugin IT Remote</h1>";
echo "<p style='text-align: start; color: red'>Our plugin currently has no settings!</p>";
echo "<div style='text-align: start; font-weight: 300;'>Our website:</div>";
echo "<p style='text-align: start; font-weight: 500; margin-left: 10px;'><a href='https://control.itremote.com' style='color: #370c52;'>control.itremote.com</a></p>";
echo "<h3 style='text-align: start; color: #4d8aff'>Who are we ?</h3>";
echo "<p style='text-align: start; font-weight: 700; margin-left: 10px;'>From any computer, wherever you are, from your web browser!</p>";
echo "<h5 style='text-align: start; color: #4d8aff'>A SIMPLE AND FLEXIBLE LICENCE</h5>";
echo "<p style='text-align: start; font-weight: 300; margin-left: 10px;'>1 IT Remote licence gives you access to an unlimited number of computers, wherever you are. You can provide remote assistance from any computer.</p>";
echo "<h5 style='text-align: start; color: #4d8aff'>HOW TO USE IT</h5>";
echo "<p style='text-align: start; font-weight: 300; margin-left: 10px;'>1 all-in-one licence: 2 types of access for all your needs</p>";
echo "<h5 style='text-align: start; color: #4d8aff; margin-left: 10px;'>1 centralised web console</h5>";
echo "<h3 style='text-align: start; color: #4d8aff'>How does the plugin work?</h3>";
echo "<p style='text-align: start; font-weight: 300; margin-left: 10px;'>Our plugin consists of a single button, it is in the computer category.</p>";
echo "<div style='text-align: start;'><img style='border-radius: 15px;' src='../misc/screenshots/img-itremote-english-button.png'></div>";
echo "</body>";

Html::footer();