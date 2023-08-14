<?php
/**
 * Footer Widget: Mail Subscription Section
 */
class NewsLetter_Widget extends WP_Widget {

    /**
     * Constructor method
     */
    function __construct() {
        parent::__construct(
            'NewsLetter_Widget', // Base ID of the widget
            __('NewsLetter', 'sabor'), // Widget name displayed in UI
            array('description' => __('A footer widget for Newsletter Subscription', 'sabor')) // Widget description
        );
    }

    /**
     * Render the widget on the front-end
     *
     * @param array $args Widget arguments
     * @param array $instance Widget instance settings
     */
    public function widget($args, $instance) {
        $widgetId = $args['widget_id'];
        // Get custom fields from the widget instance
        $title = get_field('widget_newsletter_title', 'widget_' . $widgetId);
        $description = get_field('widget_newsletter_desc', 'widget_' . $widgetId);
        $form = get_field('widget_newsletter_form', 'widget_' . $widgetId);

        $themeUrl = get_template_directory_uri();
        ?>
        <div class="subscribe-section" style="background-image:url(<?php echo esc_url($themeUrl); ?>/assets/images/subscribe-image.png)">
            <div class="subscribe-content">
                <?php if ($title) : ?>
                    <h5><?php echo $title; ?></h5>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <p><?php echo $description; ?></p>
                <?php endif; ?>
                <div class='footer_newsletter_form'><?php echo $form; ?></div>
            </div>
        </div>
        <?php
    }
}

// Register and load the widget
function registerMailWidget() {
    register_widget('NewsLetter_Widget');
}
add_action('widgets_init', 'registerMailWidget');