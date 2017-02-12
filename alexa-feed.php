<?php
/**
 * Plugin Name:     Alexa Flash Briefing Feed
 * Plugin URI:      http://mattonomics.com/alexa-flash-briefing-feed/
 * Description:     Generates an Amazon ready Flash Briefing Feed for your WordPress site.
 * Author:          Matt Gross
 * Author URI:      http://mattonomics.com
 * Text Domain:     alexa-feed
 * Domain Path:     /languages
 * Version:         0.1.0
 * License:         MIT
 * @package         Alexa_Feed
 */

 /**
 * Copyright 2017 Matt Gross
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use, copy,
 * modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so, subject to the
 * following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Alexa;

\add_action( 'after_setup_theme', 'Alexa\\create_alexa_feed' );

function create_alexa_feed() {
  \add_feed( 'alexa', 'Alexa\\generate_alexa_feed_template' );
}

function generate_alexa_feed_template() {
  include 'feed-template.php';
}

/**
* @author guid.us
* @link http://guid.us/GUID/PHP
*/

function generate_alexa_uuid(){
    if ( function_exists('com_create_guid') ){
        return com_create_guid();
    } else {
        mt_srand( (double) microtime() * 10000 );
        $charid = strtoupper( md5( uniqid( rand(), true ) ) );
        $hyphen = chr( 45 ); // "-"
        $uuid   = substr( $charid, 0,  8  ).$hyphen
                 .substr( $charid, 8,  4  ).$hyphen
                 .substr( $charid, 12, 4  ).$hyphen
                 .substr( $charid, 16, 4  ).$hyphen
                 .substr( $charid, 20, 12 );
        return $uuid;
    }
}
