
Mojo is a starter theme geared towards advanced themers who want a solid
starting point without extraneous Drupal markup. Check out the Mojo Handbook for
more details: http://drupal.org/node/1528786


Getting Started

1. Copy and paste the mojo folder into a valid theme directory.
      /sites/all/theme
      /sites/default/theme
      /sites/[SITENAME]/theme

2. To create a custom theme, replace all instances of 'mojo' within this folder
   with a machine-readable name of your choice, including folder names,
   filenames, and all occurences within files. This custom name must start with
   a letter and may only contain lowercase letters, numbers, and underscores.

   If you use drush, an easier method is to copy mojo.drush.inc to your ~/.drush
   directory. You can then use the mojo drush command to create a new theme
   based on the Mojo theme. Type 'drush mojo --help' for more information.

3. Edit the .info file and update the theme name and description.


Common Questions

Why doesn't the responsive layout work in Internet Explorer?
 - Responsive layouts are created using CSS media queries. IE8 and earlier do
   not support media queries. The easiest solution is to use Respond.js, a
   JavaScript polyfill that makes IE6-8 understand min-width and max-width media
   queries. Check out the Respond.js module: http://drupal.org/project/respondjs

Why can't I see the theme's logo?
 - The Mojo theme uses the theme logo as a print logo; it is only visible when
   a page is printed. The screen logo is usually added as a CSS background image
   on the site name. Often, the screen logo doesn't look good when printed out,
   thus the need for a separate print logo.
