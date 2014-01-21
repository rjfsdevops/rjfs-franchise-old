<footer class="content-info" role="contentinfo">
    <div class="footer-top mb15">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 mb15">
                    <?php dynamic_sidebar('sidebar-footer-top-left'); ?>
                </div>
                <div class="col-sm-6 mb15">
                    <?php dynamic_sidebar('sidebar-footer-top-middle'); ?>
                </div>
                <div class="col-sm-3 mb15">
                    <?php dynamic_sidebar('sidebar-footer-top-right'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mb15">
                <?php dynamic_sidebar('sidebar-footer-left'); ?>
            </div>
            <div class="col-sm-4 mb15">
                <?php dynamic_sidebar('sidebar-footer-middle'); ?>
            </div>
            <div class="col-sm-4 mb15">
                <?php dynamic_sidebar('sidebar-footer-right'); ?>
            </div>
        </div>
        <div class="row">
            <div class="footer-bottom">

                <div class="col-sm-12">
                    <?php dynamic_sidebar('sidebar-footer'); ?>
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
