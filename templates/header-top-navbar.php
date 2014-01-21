<header class="banner navbar navbar-default navbar-static-top" role="banner">
    <div class="navbar-header-top">
        <div class="container">
            <div class="clearfix">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse4">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="pull-right">
                    <a class="navbar-brand" href="tel:9132134548">
                        <span class="label label-top-nav hidden-xs">
                            <span class="glyphicon glyphicon-time"></span> Call Us Today!</span>
                        <span class="phone-number black">
                            <?php echo of_get_option("phone_number"); ?>
                        </span>
                    </a>
                </div>
                <div class="pull-right social hidden-xs">
                    <?php
                    $social = array(
                        'facebook',
                        'twitter',
                        'instagram',
                        'google-plus',
                        'pinterest',
                        'youtube'
                    );
                    foreach($social as $key){
                        $url = of_get_option($key);
                        if(!empty($url))
                        {
                            echo "<a href='$url'><i class='fa fa-$key'></i></a>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix">
                <nav class="collapse navbar-collapse4" role="navigation">
                    <?php
                    if (has_nav_menu('primary_navigation')) :
                        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                    endif;
                    ?>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="navbar-header-logo clearfix">
            <div class="row">
                <div class="col-sm-8">
                    <a class="logo" href="<?php echo home_url(); ?>/">
                        <img class="img-responsive" src="<?php echo of_get_option('custom_logo'); ?>"
                             alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <div class="col-sm-4 hidden-xs text-right">
                    <h3><?php echo html_entity_decode(of_get_option('header_caption'), ENT_QUOTES); ?></h3>
                </div>
            </div>
        </div>
        <div class="navbar-header-nav">
            <nav class="collapse navbar-collapse" role="navigation">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
                endif;
                ?>
            </nav>
            <?php if (is_front_page()) { ?>
                <div class="front-page-carousel">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">

                                    <?php
                                    $teasers = new WP_Query(array('post_type' => 'teaser'));
                                    $idx = 0;
                                    while ($teasers->have_posts()) :
                                        $teasers->the_post();
                                        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                        ?>
                                        <div class="item <?php echo ($idx == 0) ? "active" : "" ?>">
                                            <img src="<?php echo $url; ?>">

                                            <div class="carousel-caption">
                                                <h3><?php the_title(); ?></h3>

                                                <div class="hidden-xs"><?php the_excerpt(); ?></div>
                                                <a href="<?php echo get_permalink($post->ID); ?>"
                                                   class="btn btn-danger hidden-xs">Learn More</a>
                                            </div>
                                        </div>
                                        <?php
                                        $idx++;
                                    endwhile;
                                    wp_reset_query();
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <div class="row nav-widgets mt15">
                <div class="col-lg-4 col-md-4 col-sm-4 mb15">
                    <?php dynamic_sidebar('nav-left'); ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mb15">
                    <?php dynamic_sidebar('nav-middle'); ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mb15">
                    <?php dynamic_sidebar('nav-right'); ?>
                </div>
            </div>
        </div>
    </div>
</header>
