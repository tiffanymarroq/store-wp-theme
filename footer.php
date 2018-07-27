<footer class="footer">
    <div class="container">
        <div class="footer-info">
            <div class="row">
                <div class="col-sm-12 col-lg-6 info">
                    <p class="text-title">About Company</p>
                    <p>Lorem ipsum dolor sit amet, elementum non arcu pellentesque nunc, a mauris nulla quis mattis non, quam
                        ipsum hendrerit risus viverra sed. Pede quam sem id mi curabitur, sollicitudin et fermentum odio,
                        elit nunc, in nam, lorem porttitor lectus. Quis mattis et ipsum nesciunt, congue odio ipsum at. Sit
                        dignissim suspendisse sed, lacu</p>

                </div>
                <div class="col-sm-12 col-lg-3 info">
                    <p class="text-title">Stay Connected</p>
                    <div class="social-menu ">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'social-menu',
                                'container'      => 'ul',
                                'depth'          => 4,
                                'menu_class'     => ' nav ',                 
                                ) );
                        ?>
                    </div>
                    <a href="<?php echo site_url(); ?>/contact"><button class=" inverse">Message Us</button></a>
                </div>
                <div class="col-sm-12 col-lg-3 info">
                    <p class="text-title">Contact Information</p>
                    <p>NAME</p>
                    <p>ADDRESS </p>
                    <p>NUMBER</p>
                </div>
            </div>
        </div>
        <div class="copy-info">
            <div class="copyright ">
                <p>Tiffany Marroquin &copy; 2018</p>
            </div>

        </div>
    </div>
</footer>
<!-- footer -->
</div>
<!-- Main -->
<?php wp_footer(); ?>
</body>

</html>