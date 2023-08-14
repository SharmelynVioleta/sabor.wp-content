<?php
/**
 * Footer widget to show in the Sidebar
 */
class WPB_Recipe_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'wpb_recipe_widget',
            __('Latest Recipes', 'sabor'),
            array('description' => __('A Recipes widget to display latest recipes', 'sabor'))
        );
    }

    public function widget($args, $instance) {
        $recipe_title = get_field('recipe_title', 'widget_' . $args['widget_id']);
        $recipe_sub_title = get_field('recipe_sub_title', 'widget_' . $args['widget_id']);
        $image_right = get_field('image_right', 'widget_' . $args['widget_id']);
        $read_more_url = get_field('read_more_url','widget_' . $args['widget_id']);
        ?>
        <div class="recipe">
            <div class="container">
                <div class="recipe-section">
                    <div class="content">
                        <?php if (!empty($recipe_title)) : ?>
                            <h5><?php echo $recipe_title; ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($recipe_sub_title)) : ?>
                            <a href = "<?php echo $read_more_url; ?>"><?php echo $recipe_sub_title; ?></a>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($image_right)) : ?>
                        <div class="image">
                            <img width='300' height='200' src='<?php echo $image_right; ?>'
                                 alt='recipe'>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

function wpb_recipe_widget_register() {
    register_widget('WPB_Recipe_Widget');
}
add_action('widgets_init', 'wpb_recipe_widget_register');
