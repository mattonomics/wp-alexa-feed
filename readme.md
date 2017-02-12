=== Alexa Feed ===
Contributors: mattonomics
Tags: WordPress, Alexa
Requires at least: 3.7
Tested up to: 4.7.2
Stable tag: 0.1.0
License: MIT
License URI: https://opensource.org/licenses/MIT

An extremely simple plugin to generate a feed that can be understood by Amazon Alexa, specifically the Flash Briefing API.

== Installation ==

1. Clone this repo (or download as .zip and upload) into the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Flush rewrite rules by navigating to 'Settings > Permalinks' and clicking 'Save Changes'. I'll update this in the future so you don't have to do that ;)

== Frequently Asked Questions ==

= Why is UTF-8 hardcoded? =

Because that is literally all that Alexa understands right now.

= Why is the Content-Type header hardcoded? =

Because it must be exactly that for Alexa to understand it.

= Why can't I have more than 5 posts? =

You can, but the Flash Briefing will only read the first 5.

= Why are sticky posts disabled? =

Because I wanted to pull the latest posts. This can easily be disabled by adding the following to your theme's `functions.php` file:

`add_filter( 'alexa_feed_query_args', function( $args ) {
  unset( $args['ignore_sticky_posts'] );
  return $args;
} );`

= Where are all the attributes for `<rss>`? =

Alexa documentation suggests those are irrelevant, so I've excluded them.

= Why RSS and not JSON? =

I will add JSON in the future. Really just wanted to get this out the door as a POC.

= How do I validate the feed? =

You'll have to set up a Flash Briefing Skill and go through that process. More here: https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/steps-to-create-a-flash-briefing-skill

= What if I want to include audio? =

This plugin does not support audio because this is an MVP proof of concept. Down the road I'm sure I'll update it.
