<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sabor
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php wp_body_open(); ?>
   <div id="page" class="site">

      <header id="masthead" class="site-header">
         <?php
            $show_notice = get_field('show_notice', 'option');
            if ($show_notice == true || $show_notice == 'true') :
               ?>
               <div class="header-top">
                  <p><?php the_field('site_title', 'option'); ?></p>
               </div>
               <?php
            endif;
         ?>
         <div class="header-middle">
            <div class="company-logo">
               <?php
                  $company_logo = get_field('comapny_logo', 'option');
                  $company_logo_url = get_field('comapny_url', 'option');
               ?>
               <a href="<?php echo $company_logo_url; ?>" target="_blank">
                  <img src="<?php echo $company_logo['url']; ?>" alt="Company Logo" width="28" height="18" />
               </a>
            </div>
            <div class="site-logo">
               <?php
                  $site_logo = get_field('site_logo', 'option');
               ?>
               <a href="<?php echo esc_url(home_url('/')); ?>">
                  <img src="<?php echo $site_logo['url'];; ?>" alt="Site Logo" width="138" height="27" />
               </a>
            </div>
            <div class="social-icon">
               <?php
               $social_icon_and_links = get_field('social_icon_and_links', 'option');
               if (!empty($social_icon_and_links) && is_array($social_icon_and_links)) :
                  foreach ($social_icon_and_links as $social_single) :
                     if (!empty($social_single['icon_url']) && !empty($social_single['social_icon']['url'])) :
                        ?>
               <a href="<?php echo esc_url($social_single['icon_url']); ?>">
                  <img src="<?php echo esc_url($social_single['social_icon']['url']); ?>"
                     alt="<?php echo esc_attr($social_single['social_icon']['alt']); ?>" width="18" height="18" />
               </a>
               <?php
                     endif;
                  endforeach;
               endif;
               ?>
            </div>
            <!-- Mobile Navigation -->
            <a href="#menu" class="menu-btn mburger mburger--squeeze">
               <b></b>
               <b></b>
               <b></b>
            </a>
            <nav id="menu" class="mobile-menu">
               <?php
               wp_nav_menu(array(
                  'theme_location' => 'header_menu',
                  'menu' => 'Header Menu',
                  'container' => '',
               ));
               ?>
               <li>
                  <?php
                  if (!empty($social_icon_and_links) && is_array($social_icon_and_links)) :
                     foreach ($social_icon_and_links as $social_single) :
                        if (!empty($social_single['icon_link']) && !empty($social_single['social_icon']['url'])) :
                  ?>
                  <a href="<?php echo esc_url($social_single['icon_link']['url']); ?>"
                     target="<?php echo esc_attr($social_single['icon_link']['target']); ?>">
                     <img src="<?php echo esc_url($social_single['social_icon']['url']); ?>"
                        alt="<?php echo esc_attr($social_single['social_icon']['alt']); ?>" width="18" height="18" />
                  </a>
                  <?php
                        endif;
                     endforeach;
                  endif;
                  ?>
               </li>
               <div class="search-bar">
                  <?php
                     $theme_url = get_template_directory_uri();
                  ?>
                  <a href="javascript:void(0);">
                     <img src="<?php echo $theme_url; ?>/assets/images/search-icon.svg" alt="Search Icon" width="20"
                        height="20" />
                  </a>
               </div>
            </nav>
         </div>
         <div class="header-bottom">
            <nav>
               <?php
               wp_nav_menu(array(
                  'theme_location' => 'header_menu',
                  'menu' => 'Header Menu',
                  'container' => '',
               ));
               ?>
               <div class="search-bar">
                  <span>
                     <img src="<?php echo $theme_url; ?>/assets/images/search-icon.svg" alt="Search Icon" width="20"
                        height="20" />
                  </span>
               </div>
               <!-- Search Bar Popup !-->
               <div class="search-popup">
                  <span class="close-btn">
                     <img src="<?php echo $theme_url; ?>/assets/images/close-icon.png" alt="Close Icon" width="20"
                        height="20" />
                  </span>
                  <div class="search-field">
                     <form action="" method="get">
                        <input placeholder="Busca una receta ahora" id="searchbox" type="text" name="s" />
                        <button>
                           <input type="hidden" name="post_type" value="post" />
                           <img src="<?php echo $theme_url; ?>/assets/images/search-icon.svg" alt="Search Icon"
                              width="20" height="20" />
                        </button>
                     </form>
                  </div>
               </div>
               <!--- /Search Bar Popup -->
            </nav>
         </div>
      </header><!-- #masthead -->