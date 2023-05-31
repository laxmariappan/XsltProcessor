<?php /*
 * Plugin Name:       XsltProcessor
 * Plugin URI:        https://github.com/laxmariappan/XsltProcessor
 * Description:       Handles XSLT processing
 * Version:           0.1.0
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Lax Mariappan
 * Author URI:        https://github.com/laxmariappan
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/laxmariappan
 * Text Domain:       xslt-processor
 */

/**
 * Register a custom menu page.
 */
function my_admin_menu() {
		add_menu_page(
			__( 'XsltProcessor', 'my-textdomain' ),
			__( 'XsltProcessor', 'my-textdomain' ),
			'manage_options',
			'demo',
			'page_content',
			'dashicons-schedule',
			3
		);
	}

add_action( 'admin_menu', 'my_admin_menu' );


function page_content() {
    ?>
        <h1>
            <?php esc_html_e( 'Demo.', 'xslt-processor' ); ?>
        </h1>
    <?php
$plugin_dir_uri = plugin_dir_url( __FILE__ );

$template = $plugin_dir_uri . "example.xsl";

$sample = $plugin_dir_uri . "sample.xml";

// @see https://gist.github.com/bzerangue/2164783
$xmlProc = new XsltProcessor();

// Your XSLT Stylesheet for transforming XML
$xslt = new DomDocument();
$xslt -> load( $template );

// This prepares the XSLT for transform
$xmlProc -> importStylesheet($xslt);

// This is your source XML document
$xml = new DomDocument();
$xml -> load( $sample );

// Run Tranform and output XML/HTML
if ($output = $xmlProc -> transformToXML($xml))
{
    echo $output;
} 
// If the transform fails, then it will output this statement below
else 
{
    echo "<p>This feed is not available.</p>";
}


}

