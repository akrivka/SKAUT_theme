<?php
// Logo / znak widget
// Register sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(
        array(
        'name' => 'Logo / znak',
        'id' => 'logo',
        'description' => 'Logo nebo znak v levé horním rohu stránky',
        'before_widget' => '',
        'after_widget' => '',
        )
    );
}

// Register widget
add_action('widgets_init', 'logo_widget');
function logo_widget() {
    register_widget( 'logo' );
}

// Enqueue additional admin scripts
function logo_admin() {
    wp_enqueue_media();
    wp_enqueue_script( 'wp-media-uploader', get_template_directory_uri() . '/js/wp_media_uploader.js', array( 'jquery' ), 1.0 );
    wp_enqueue_script('logo_script', get_template_directory_uri() . '/js/logo-widget.js', false, '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'logo_admin');

// Widget
class logo extends WP_Widget {

    function logo() {
        $widget_ops = array('classname' => 'logo');
        $this->WP_Widget('logo-widget', 'Logo / znak', $widget_ops);
    }

    function widget($args, $instance) {
        echo $before_widget;
?>

    <img src="<?php echo esc_url($instance['image_uri']); ?>" />

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        console.log("jsem tu");
        return $instance;
    }

    function form($instance) {
?>

	<div class="logo_uploader">
    <p>
    	Po vložení adresy obrázku na ni musíte kliknout a potvrdit enterem. </br>
        <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Obrázek</label>
        <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
        <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
        <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
    </p>
    </div>

<?php
    }
}

// Slideshow widget
// Register sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(
        array(
        'name' => 'Slideshow',
        'id' => 'slideshow',
        'description' => 'Prezentace obrázků na začátku stránky',
        'before_widget' => '',
        'after_widget' => '',
        )
    );
}

// Register widget
add_action('widgets_init', 'slideshow_widget');
function slideshow_widget() {
    register_widget( 'slideshow' );
}

// Enqueue additional admin scripts
add_action('admin_enqueue_scripts', 'slideshow_admin');
function slideshow_admin() {
    wp_enqueue_media();
    wp_enqueue_script('slideshow_script', get_template_directory_uri() . '/js/slideshow-widget.js', false, '1.0.0', true);
}

// Widget
class slideshow extends WP_Widget {

    function slideshow() {
        $widget_ops = array('classname' => 'slideshow');
        $this->WP_Widget('slideshow-widget', 'Slideshow', $widget_ops);
    }

    function widget($args, $instance) {
        echo $before_widget;
?>

    <img src="<?php echo esc_url($instance['image_uri']); ?>" class="slideshow" />

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        console.log("jsem tu");
        return $instance;
    }

    function form($instance) {
?>

    <p>
    	Po vložení adresy obrázku na ni musíte kliknout a potvrdit enterem. </br>
        <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Obrázek</label>
        <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
        <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
        <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
    </p>

<?php
    }
}
?>
