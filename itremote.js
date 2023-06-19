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

$(document).ready(function() {
    var $header = $('span.status.rounded-1');
    
    function updateButton() {
        if (window.location.pathname.includes('/front/computer.form.php')) {
            var fullText = $header.text().trim();
            var splitText = fullText.split(' - ');

            var computerName = splitText.length > 1 ? splitText.slice(1).join(' - ').trim() : '';

            var encode = encodeURIComponent(computerName);
            var buttonHtml = '<a id="btn-it-remote" class="btn btn-outline-secondary" style="margin-left: 20px;" href="https://control.itremote.com/Remote/OpenAccess?deviceName=' + encode + '" target="_blank" class="btn btn-primary">IT Remote</a>';

            if (!$('#btn-it-remote').length) {
                var $button = $(buttonHtml);
                $('div.main-header')[0].after($button[0]);
            }
        }
    }

    if ($header.length) {
        var observer = new MutationObserver(updateButton);
        observer.observe($header[0], {childList: true});

        var checkTextInterval = setInterval(function() {
            if ($header.text().trim() !== '') {
                clearInterval(checkTextInterval);
                updateButton();
            }
        }, 1000);
    }
});