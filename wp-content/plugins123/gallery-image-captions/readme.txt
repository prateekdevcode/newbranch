=== Gallery Image Captions (GIC) ===
Contributors: mlchaves
Donate link: https://ko-fi.com/marklchaves
Tags: gallery, shortcode, filter, html, css, images, captions
Requires at least: 5.3.2
Tested up to: 5.3.2
Stable tag: 1.0.1
Requires PHP: 7.2.18
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Gallery Image Captions (GIC) allows for the customisation of WordPress gallery image captions. 

== Description ==

With **GIC**, we can display the title, caption, and description image attributes. We can also change/filter the rendering HTML to whatever we want.

After installing and activating GIC, simply write your filter and add the WordPress `gallery` shortcode to your page. That's it!

= Motivation =

The default WordPress gallery shortcode will only display the **caption** from the media's attachment metadata. Sometimes it's nice to display more like the title&mdash;even the description.

The **GIC plugin** overrides the WordPress gallery shortcode function to create a [hook](https://developer.wordpress.org/plugins/hooks/). With this _hook_ we can do a little bit more than just displaying the caption.

Some premium themes hide the caption completely. This leaves photography lovers like me scratching their head and spending precious time cobbling together makeshift caption blocks.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Usage ==

= Custom Filter =

The **crux** of this plugin is the ability to filter the gallery image caption. The `galimgcaps_gallery_image_caption` hook makes this possible. 

For the usage examples below, this is the filter used.

`
/**
 * Custom Filter for Gallery Image Captions
 */
function mlc_gallery_image_caption($attachment_id, $captiontag, $selector, $itemtag) {

    $id = $attachment_id;

    // Grab the meta from the GIC plugin.
    $my_image_meta = galimgcaps_get_image_meta($id);
    
    /**
     * Here's where to customise the caption content.
     * 
     * This example uses the meta title, caption, and description. 
     * 
     * You can display any value from the $my_image_meta array. 
     * You can add your own HTML too.
     */
    return "<{$captiontag} class='wp-caption-text gallery-caption' id='{$selector}-{$id}'>" .
            "Title: " . $my_image_meta['title'] . "<br>" .
            "Caption: " . $my_image_meta['caption'] . "<br>". 
            "Description: ". $my_image_meta['description'] . 
        "</{$captiontag}></{$itemtag}>";

}
add_filter('galimgcaps_gallery_image_caption', 'mlc_gallery_image_caption', 10, 4);
`

Feel free to use this filter code as a starter template. After activating the GIC plugin, add the code above to your child theme's `functions.php` file. Rename the function and tweak the return string to suit your needs.

== Usage Example 1 ==

= Shortcode =

For starters, let's use a 

`<p></p>` 

tag for the caption tag.

`[gallery size="full" columns="1" link="file" ids="114" captiontag="p"]`

= Styling =

Let's override the generated styles with our own style for one particular image.

`
/* Targeting a Specific Image */

/* Add some padding all around. */
#gallery-1 .gallery-item, 
#gallery-1 .gallery-item p {
    padding: 1%;
}

/* Add some moody background with typewriter font. */
#gallery-1 .gallery-item {
    color: whitesmoke;
    background-color: black;
    font-size: 1.25rem;
    font-family: Courier, monospace;
    text-align: left !important;
}
`

== Usage Example 2 ==

= Shortcode =

**A 1x2 gallery with large size images using an H4 for the caption.**

`[gallery size="large" columns="2" link="file" ids="109,106" captiontag="h4"]`

**A 1x3 gallery with medium size images using a blockquote for the caption.**

`[gallery size="medium" columns="3" link="file" ids="109,106,108" captiontag="blockquote"]`

Did you notice that we are using 

`<blockquote></blockquote>` 

in the second shortcode? Let's give it try just for _kicks_.

= Styling =

`
/* 1. Style the H4 Used in the Caption Example */
h4 {
	color: #777777 !important;
	font-size: 1.2rem !important;
	font-family: Helvetica, Arial, sans-serif !important;
}

/* 2. Help Align the Blockquote */
#gallery-3 .gallery-caption {
    margin-left: 40px !important;
}
`
== Frequently Asked Questions ==

= What media metadata can I insert into my captions? =

Here's the list of metadata with their array index you can insert into your captions.

* Alternative Text ['alt']
* Title ['title']
* Caption  ['caption']
* Description ['description']
* Attachment URL ['href']
* Image URL ['src']

== Screenshots ==

1. WordPress Gallery Before GIC
2. WordPress Gallery Before GIC
3. Displaying title, caption, and description with moody styling using GIC
4. More styling examples using GIC: centre justified text and even using blockquote styling
5. With GIC, we can even insert links to the image file and attachment Page!
6. Write media queries to control how to display captions for different devices
7. Responsive for mobile displays
8. Another example of displaying title, caption, and description with moody styling using GIC
9. Washington Post style captions using GIC
10. Vogue style captions using GIC

== Changelog ==

= 1.0.1 =
* Readme documentation updates. New author URI in source PHP file.

= 1.0 =
* First release.

== Upgrade Notice ==

= 1.0.1
Minor release only. No code changes. Feel free to upgrade for Readme documentation updates and the new author URI in PHP source file. Also tested on PHP version 7.2.18.

== Responsive CSS Example ==

I recommend adding the following media queries if you use galleries with more than one image. The two media queries below will stack 1x2 and 1x3 galleries into an nx1 or nx2 column as needed.

`
/* Media Queries for Responsive Galleries */

/**
 * Styling based on article "How To: Style Your WordPress Gallery"
 * by Par Nicolas.
 * 
 * https://theme.fm/how-to-style-your-wordpress-gallery/
 */

/* Mobile Portrait Breakpoint - 1 column */
@media only screen and (max-width: 719.998px) {
    .gallery-columns-2 .gallery-item,
	.gallery-columns-3 .gallery-item { 
	 width: 100% !important; 
  }
}

/* Mobile Landscape and Tablet Breakpoints - 2 columns */
@media only screen and (min-width: 720px) and (max-width: 1024px) {
  .gallery-columns-3 .gallery-item { 
	 width: 50% !important; 
  }
}
`