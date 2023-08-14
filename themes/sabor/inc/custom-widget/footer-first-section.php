<?php
/**
*footer widget to show in the Sidebar
*/
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widget',

// Widget name will appear in UI
__('footer ', 'sabor'),

// Widget description
array( 'description' => __( 'A footer Widget', 'sabor' ), )
);
}

// Creating widget front-end
public function widget( $args, $instance ) {
	$comapny_logo = get_field('footer_site_logo', 'option');
	$social_icon_and_links = get_field('social_icon_and_links','option');
	$comapny_url = get_field('comapny_url','option');
    $description = get_field('description','option')
?>
<div class="column">
    <a href="<?php echo home_url();?>">
        <img src="<?php echo $comapny_logo['url'];?>" alt="<?php echo $comapny_logo['alt'];?>" width="138" height="27" />
    </a>
    <?php echo $description; ?>
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
</div>
<?php
}
}
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );