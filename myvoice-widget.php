<?php

/* 
 * Plugin Name:   MyVoice Widget
 * Version:       1.0.0
 * Plugin URL:    http://www.599ebooks.com/plugins
 * Description:   Add your Voice on your blog sidebar and it will be heard online.
 * Author:        Kenneth Jimmerson
 * Author URI:    http://www.599ebooks.com
 */

// Plugin name
function myplugin_register_widgets() {
   register_sidebar_widget('MyVoice', 'myplugin_widget');

   // Comment this line out if you DON'T want to provide widget preferences
   register_widget_control('MyVoice', 'myplugin_widget_control');
}

// Example: Use custom fields to change the name of the widget
// Hint: Keep the title blank if you don't want a title in the sidebar
if (get_option("myplugin_title")) {
   $myplugin_title = get_option("myplugin_title");
}
else {
   $myplugin_title = "MyVoice";
}

function myplugin_widget($args) {
   global $myplugin_title;
   extract($args);

   // Output the actual widget...       
   echo $before_widget;
   echo $before_title . $myplugin_title . $after_title;

   //MyVoice audio codes goes here!;
?>

<iframe src ="http://www.599ebooks.com/plugins/widget-ad.htm" width="155px" height="245px">
  <p>Your browser does not support iframes.</p>
</iframe>


<?php

   echo $after_widget;
}

function myplugin_widget_control() {
   global $myplugin_title;

   // Example on how to set custom fields in widgets...
   if (isset($_POST["myplugin_title"])) {
      update_option("myplugin_title", $_POST["myplugin_title"]);
   }

   // Output the code for administrators to make changes
   echo '<label>Title:</label> <input class="widefat" type="text" name="myplugin_title" value="' . $myplugin_title . '" /></label>';
}

if (function_exists('add_action')) {
   add_action('plugins_loaded', 'myplugin_register_widgets');
}

?>