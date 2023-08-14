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
   <?php echo get_field('tracking_code', 'option');?>

   <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
    <script>
      var googletag = googletag || {};
      googletag.cmd = googletag.cmd || [];
    </script>
<script>
      googletag.cmd.push(function() {
        //bloques top - 1000x280
        var mapping1 = googletag.sizeMapping().addSize([0, 0], [[300, 100], [320, 100], [300, 250]]).addSize([750, 700], [[728, 90], [728, 250]]).addSize([1024, 200], [[728, 90],[970, 90], [970, 180], [970, 250], [1000, 280]]).build();
        window.slot1 = googletag.defineSlot('/78858240/sabor/sabor_top1', [[1000, 280], [970, 250], [300, 250]], 'top1_ad').defineSizeMapping(mapping1).addService(googletag.pubads());
       
        //bloque sidebar - 300x250
        var mapping2 = googletag.sizeMapping().addSize([0, 0], [[300, 250]]).addSize([750, 700], [[300,250]]).addSize([1024, 200], [[300,250]]).build();
        window.slot4 = googletag.defineSlot('/78858240/sabor/sabor_sidebar', [320, 250], 'sidebar_ad').defineSizeMapping(mapping2).addService(googletag.pubads());

        //bloques billboards - 728x90
        var mapping3 = googletag.sizeMapping().addSize([0, 0], [[300, 100], [300, 250], [320, 50], [320, 100]]).addSize([750, 700], [[728, 90], [728, 180], [728, 250]]).addSize([1024, 200], [[728, 90], [728, 180], [728, 250]]).build();
        window.slot5 = googletag.defineSlot('/78858240/sabor/sabor_billboard1', [[320, 100], [300, 250], [728, 90]], 'billboard1_ad').defineSizeMapping(mapping3).addService(googletag.pubads());
         window.slot2 = googletag.defineSlot('/78858240/sabor/sabor_billboard2', [[1000, 280], [970, 250], [300, 250]], 'billboard2_ad').defineSizeMapping(mapping1).addService(googletag.pubads());
        window.slot6 = googletag.defineSlot('/78858240/sabor/sabor_billboard3', [[320, 100], [300, 250], [728, 90]], 'billboard3_ad').defineSizeMapping(mapping3).addService(googletag.pubads());
        //bloque flotante - 1x1
        window.slot7 = googletag.defineSlot('/78858240/sabor/sabor_floating', [1, 1],'floating_ad').addService(googletag.pubads());
        //bloques OOP - Programaticos
        googletag.defineOutOfPageSlot('/21759101383,78858240/Sabor_Web-ITT',googletag.enums.OutOfPageFormat.INTERSTITIAL).addService(googletag.pubads());
        googletag.defineOutOfPageSlot('/21759101383,78858240/Sabor_Bottom_Anchor',googletag.enums.OutOfPageFormat.BOTTOM_ANCHOR).addService(googletag.pubads());
        googletag.pubads().setTargeting('SA_Seccion','');
        googletag.pubads().setTargeting('SA_Nota','');
        googletag.pubads().setTargeting('SA_Tipo','');
        googletag.pubads().collapseEmptyDivs();
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
      });
</script>
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
                  'theme_location' => 'mobile_menu',
                  'menu' => 'Mobile Menu',
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
                  <a href="javascript:void(0);" class="close-btn">
                     <img src="<?php echo $theme_url; ?>/assets/images/close-icon.png" alt="Close Icon" width="20"
                        height="20" />
                  </a>
                  <div class="search-field">
                     <form action="<?php echo home_url(); ?>" method="get">
                        <input placeholder="Busca una receta ahora" id="searchbox" type="text" name="s" required/>
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