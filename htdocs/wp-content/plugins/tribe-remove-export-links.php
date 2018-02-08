<?php
/**
 * Plugin name: The Events Calendar: Remove Export Links
 * Description: Removes all of The Events Calendar's front-end export links.
 * Author:      Modern Tribe, Inc
 * Author URI:  http://theeventscalendar.com
 * Version:     1.0
 * License:     GPL v3 - see http://www.gnu.org/licenses/gpl.html
 *
 * The Events Calendar: The Events Calendar: Remove Export Links
 * Copyright (C) 2016 Modern Tribe, Inc
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class Tribe__Events__Remove__Export__Links {

    public function __construct() {
        add_action( 'init', array( $this, 'single_event_links' ) );
        add_action( 'init', array( $this, 'view_links' ) );
    }

    public function single_event_links() {
        remove_action(
            'tribe_events_single_event_after_the_content',
            array( 'Tribe__Events__iCal', 'single_event_links' )
        );
    }

    public function view_links() {
        remove_filter(
            'tribe_events_after_footer',
            array( 'Tribe__Events__iCal', 'maybe_add_link' )
        );
    }
}

new Tribe__Events__Remove__Export__Links();