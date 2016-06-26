<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme setgs.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
global $base_url;
?>
<div id="page">
  <nav class="navbar navbar-default container">
    
      <div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-4">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php if ($logo): ?>
            <a class="navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-8">
        <div class="collapse navbar-collapse" id="main-menu">
          <ul class="nav navbar-nav text-uppercase navbar-right" id="top-social-links">
            <li>
              <a href="https://facebook.com/socialvalueaotearoa" rel="Facebook">
                <img src="<?php print $base_url;?>/sites/all/themes/nexus/images/icon_facebook.svg" alt="Link In"/>
              </a>
              <a href="https://twitter.com/socialaotearoa" rel="Tweeter">
                <img src="<?php print $base_url;?>/sites/all/themes/nexus/images/icon_twitter.svg" alt="Link In"/>
              </a>
              <a href="https://nz.linkedin.com/in/socialvalueaotearoa" rel="Linked In">
                <img src="<?php print $base_url;?>/sites/all/themes/nexus/images/icon_linkedin.svg" alt="Link In"/>
              </a>
            </li>
            <li id="btn_member_login" class="text-capitalize">
              <?php if(!user_is_logged_in()): ?>
              <a href="<?php print $base_url;?>/user/login" rel="Login">Member Login</a>
              <?php else: ?>
              <a href="<?php print $base_url;?>/user/logout" rel="Login">Logout</a>
              <?php endif; ?>
            </li>
          </ul>

          <?php 
          if (module_exists('i18n_menu')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
          ?>
          <ul class="nav navbar-nav text-uppercase navbar-right" id="mobile-social-links">
            <li class="social">
              <a href="https://facebook.com/socialvalueaotearoa" rel="Facebook">
                <img src="<?php print $base_url;?>/sites/all/themes/nexus/images/icon_facebook.svg" alt="Link In"/>
              </a>
              <a href="https://twitter.com/socialaotearoa" rel="Tweeter">
                <img src="<?php print $base_url;?>/sites/all/themes/nexus/images/icon_twitter.svg" alt="Link In"/>
              </a>
              <a href="https://nz.linkedin.com/in/socialvalueaotearoa" rel="Linked In">
                <img src="<?php print $base_url;?>/sites/all/themes/nexus/images/icon_linkedin.svg" alt="Link In"/>
              </a>
            </li>
            <li id="btn_member_login" class="text-capitalize">
              <?php if(!user_is_logged_in()): ?>
              <a href="<?php print $base_url;?>/user/login" rel="Login">Member Login</a>
              <?php else: ?>
              <a href="<?php print $base_url;?>/user/logout" rel="Login">Logout</a>
              <?php endif; ?>
            </li>
          </ul> 
                  
        </div><!-- /.navbar-collapse -->
      </div>
    </div><!-- /.container>-->
  </nav><!-- end of nav -->

  <?php if ($is_front): ?>
    <?php if (theme_get_setting('slideshow_display','nexus')): ?>
      <?php
      $slide1_head = check_plain(theme_get_setting('slide1_head','nexus'));   $slide1_desc = check_markup(theme_get_setting('slide1_desc','nexus'), 'full_html'); $slide1_url = check_plain(theme_get_setting('slide1_url','nexus'));
      $slide2_head = check_plain(theme_get_setting('slide2_head','nexus'));   $slide2_desc = check_markup(theme_get_setting('slide2_desc','nexus'), 'full_html'); $slide2_url = check_plain(theme_get_setting('slide2_url','nexus'));
      $slide3_head = check_plain(theme_get_setting('slide3_head','nexus'));   $slide3_desc = check_markup(theme_get_setting('slide3_desc','nexus'), 'full_html'); $slide3_url = check_plain(theme_get_setting('slide3_url','nexus'));
      ?>
      <!-- Carousel================================================== -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <div class="first-slide slides" style="background-image:url(<?php print base_path() . drupal_get_path('theme', 'nexus') . '/images/slide-image-1.png'; ?>);">
              <div class="vcenter-parent">
                <div class="vcenter">
                  <div class="container">
                    <?php if($slide1_head || $slide1_desc) : ?>
                      <div class="row">
                        <div class="carousel-caption col-lg-4">
                          <h1><?php print $slide1_head; ?></h1>
                          <?php print $slide1_desc; ?>
                          <p><a class="btn" href="<?php print url($slide1_url); ?>" role="button"><?php print t('Find out more'); ?></a></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>        
          </div>
          <div class="item">
            <div class="second-slide slides" style="background-image:url(<?php print base_path() . drupal_get_path('theme', 'nexus') . '/images/slide-image-2.png'; ?>);">
              <div class="vcenter-parent">
                <div class="vcenter">
                  <div class="container">
                    <?php if($slide2_head || $slide2_desc) : ?>
                      <div class="row">
                        <div class="carousel-caption col-lg-4">
                          <h1><?php print $slide2_head; ?></h1>
                          <?php print $slide2_desc; ?>
                          <p><a class="btn" href="<?php print url($slide2_url); ?>" role="button"><?php print t('Find out more'); ?></a></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>         
          </div>
          <div class="item">
            <div class="third-slide slides" style="background-image:url(<?php print base_path() . drupal_get_path('theme', 'nexus') . '/images/slide-image-3.png'; ?>);">
              <div class="vcenter-parent">
                <div class="vcenter">
                  <div class="container">
                    <?php if($slide3_head || $slide3_desc) : ?>
                      <div class="row">
                        <div class="carousel-caption col-lg-4">
                          <h1><?php print $slide3_head; ?></h1>
                          <?php print $slide3_desc; ?>
                          <p><a class="btn" href="<?php print url($slide3_url); ?>" role="button"><?php print t('Find out more'); ?></a></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>         
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div><!-- /.carousel -->
    <?php endif; ?>
  <?php endif; ?>

  <?php if($page['preface_first'] || $page['preface_middle'] || $page['preface_last']) : ?>
    <?php $preface_col = ( 12 / ( (bool) $page['preface_first'] + (bool) $page['preface_middle'] + (bool) $page['preface_last'] ) ); ?>
    <div id="preface-area">
      <div class="container">
        <div class="row">
          <?php if($page['preface_first']): ?><div class="preface-block col-lg-<?php print $preface_col; ?>">
            <?php print render ($page['preface_first']); ?>
          </div><?php endif; ?>
          <?php if($page['preface_middle']): ?><div class="preface-block col-lg-<?php print $preface_col; ?>">
            <?php print render ($page['preface_middle']); ?>
          </div><?php endif; ?>
          <?php if($page['preface_last']): ?><div class="preface-block col-lg-<?php print $preface_col; ?>">
            <?php print render ($page['preface_last']); ?>
          </div><?php endif; ?>
        </div>
      </div>
    </div><!-- /.preface -->
  <?php endif; ?>

  <?php if($page['header']) : ?>
    <div id="header-block" class="container-fluid">
      <div class="row">
        <?php print render($page['header']); ?>
      </div>
    </div>
  <?php endif; ?>

  <div id="main-content">
    <?php if ($is_front): ?>
      <div id="front-about">
        <div class="container-fluid">
          <div class="row">
            <div class="vcenter-parent">
              <div class="vcenter">
                <div class="content-about col-lg-4 col-lg-offset-4">
                  <h1 page-title="">WELCOME TO<br> SOCIAL VALUE AOTEAROA</h1>
                  <hr>
                  <p>The platform for those working to better understand, account for, measure, analyse and manage the social, economic and environmental outcomes created by their programmes or organisations.</p>
                  <p><a class="btn" href="about/10" role="button">About us</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end for front-about -->
    <?php endif; ?>
    <?php if (!$is_front): ?>
      <div class="container">
        <div class="row">
        <?php endif; ?>
        <?php if($page['sidebar_first']||$page['sidebar_second']) { $primary_col = 9; } else { $primary_col = 12; } ?>
        <?php if ($page['sidebar_second']): ?>
          <div class="col-lg-3" >
            <aside id="sidebar" class="left" role="complementary">
             <?php print render($page['sidebar_second']); ?>
           </aside>
         </div>
       <?php endif; ?>
<?php if ($page['sidebar_first']): ?>
        <div class="hidden-lg   col-md-12 mobilech" style="z-index:5;" >
          <aside id="sidebar" role="complementary">
           <?php print render($page['sidebar_first']); ?>
         </aside>
       </div>
     <?php endif; ?>
       <div id="primary" class="content-area col-lg-<?php print $primary_col; ?> ">
        <section id="content" role="main">
          <?php if (theme_get_setting('breadcrumbs')): ?><?php if ($breadcrumb): ?><div id="breadcrumbs"><?php print $breadcrumb; ?></div><?php endif;?><?php endif; ?>
          <?php print $messages; ?>
          <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
          <div id="content-wrap">
            <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            <?php print render($page['content']); ?>
          </div>
        </section>
      </div>
      <?php if ($page['sidebar_first']): ?>
        <div class="col-lg-3 hidden-md hidden-sm hidden-xs " >
          <aside id="sidebar" role="complementary">
           <?php print render($page['sidebar_first']); ?>
         </aside>
       </div>
     <?php endif; ?>
     <?php if (!$is_front): ?>
     </div>
   </div>
 <?php endif; ?>      
</div>

<?php if($page['footer']) : ?>
  <div id="footer-block">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <?php print render($page['footer']); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']): ?>
  <?php $footer_col = ( 12 / ( (bool) $page['footer_first'] + (bool) $page['footer_second'] + (bool) $page['footer_third'] + (bool) $page['footer_fourth'] ) ); ?>
  <div id="bottom" class="col-lg-12">
    <div class="container">
      <div class="row">
        <?php if($page['footer_first']): ?><div class="footer-block col-lg-<?php print $footer_col; ?> col-md-3  col-sm-3 mnheight" >
          <?php print render ($page['footer_first']); ?>
        </div><?php endif; ?> 
        <?php if($page['footer_second']): ?><div class="footer-block col-lg-<?php print $footer_col;?>  col-md-3 col-sm-3 mnheight" >
          <?php print render ($page['footer_second']); ?>
        </div><?php endif; ?>
        <?php if($page['footer_third']): ?><div class="footer-block col-lg-<?php print $footer_col;?> col-md-3 col-sm-3 mnheight" >
          <?php print render ($page['footer_third']); ?>
        </div><?php endif; ?>
        <?php if($page['footer_fourth']): ?><div class="footer-block col-lg-<?php print $footer_col;?> col-md-3 col-sm-3 mnheight" >
          <?php print render ($page['footer_fourth']); ?>
        </div><?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<footer id="colophon" class="site-footer col-lg-12" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="fcred col-lg-12">
      Social Value Aotearoa  &copy; 2016 - All rights reserved.
      </div>
    </div>
  </div>
</footer>

</div>
