<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
        <div class="search_box pull-right">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s"/>
        </div>
    </div>
</form>