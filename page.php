<?php 
get_header();

while(have_posts()) {
    the_post(); ?>
    <header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <ul>
              <li class="current-menu-item"><a href="#">About Us</a></li>
              <li><a href="#">Programs</a></li>
              <li><a href="#">Events</a></li>
              <li><a href="#">Campuses</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>



    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title() ?></h1>
        <div class="page-banner__intro">
          <p>Learn how the school of your dreams got started.</p>
        </div>
      </div>
    </div>
    
    <div class="container container--narrow page-section">
        <?php  
            $parent = wp_get_post_parent_id();

            if (has_post_parent()) {
                ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($parent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parent); ?></a> <span class="metabox__main">Our History</span>
                    </p>
                </div>
                <?php
            }
        ?>
      

      <div class="page-links">
        <h2 class="page-links__title"><a href="#"><?php the_title() ?></a></h2>
        <ul class="min-list">
            <?php
                if ($parent) {
                    $findChildrenOf = $parent;
                } else {
                    $findChildrenOf = get_the_ID();
                }

              wp_list_pages(array(
                'title_li' => NULL,
                'child_of' => $findChildrenOf
                )) ?>
          <!-- <li class="current_page_item"><a href="#">Our History</a></li>
          <li><a href="#">Our Goals</a></li> -->
        </ul>
      </div>

      <div class="generic-content">
        <p><?php the_content(); ?></p>
      </div>
    </div>


    <?php
}

 get_footer();
?>