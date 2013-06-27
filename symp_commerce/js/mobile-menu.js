(function ($) {

// Convert main menu into a mobile menu
Drupal.behaviors.mobileMenu = {
  attach: function(context) {

    // Create mobile menu container, create mobile bar, and clone the main menu
    var $mobileMenu = $('<nav id="mobile-menu" class="menu mobile-menu"></nav>'),
        $mobileBar = $('<div class="mobile-bar clearfix"><a class="mobile-home" href="/" rel="home"><span class="mobile-home-icon">Home</span></a> <a class="menu-button" href="">Menu</a></div>'),
        $mobileLinks = $('<div class="mobile-links element-invisible"></div>')
        $mainMenu = $('#site-navigation', context).find('.main-menu').clone(),

    // Reset menu list class and remove child menus
    $mainMenu.attr('class', 'menu').find('ul ul').remove();

    // Insert the cloned menus into the mobile menu container
    $mainMenu.appendTo($mobileLinks);

    // Insert the top bar into mobile menu container
    $mobileBar.prependTo($mobileMenu);

    // Insert the mobile links into mobile menu container
    $mobileLinks.appendTo($mobileMenu);

    // Add mobile menu to the page
    $('.page', context).before($mobileMenu);

    // Open/Close mobile menu when menu button is clicked
    var $mobileMenuWrapper = $('#mobile-menu', context).find('.mobile-links'),
        $mobileMenuLinks = $mobileMenuWrapper.find('a');
    $mobileMenuLinks.attr('tabindex', -1);
    $('.mobile-bar .menu-button', context).click(function(e) {
      $(this).toggleClass('menu-button-active');
      $mobileMenuWrapper.toggleClass('element-invisible');
      // Take mobile menu links out of tab flow if hidden
      if ($mobileMenuWrapper.hasClass('element-invisible')) {
        $mobileMenuLinks.attr('tabindex', -1);
      }
      else {
        $mobileMenuLinks.removeAttr('tabindex');
      }
      e.preventDefault();
    });

    // Set the height of the menu
    $mobileMenuWrapper.height($(document).height())
  }
};

})(jQuery);
