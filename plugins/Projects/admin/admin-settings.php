<h1>Events Settings</h1>

<h2>How to use the sortcode for displaying custom-post-fields:</h2>

<h3>Copy this code in custom-post-type template where yo want to display custom main fields</h3>
<blockquote>
    <pre>&lt;?php do_shortcode('[mpm_show_main_fields id="' . $post->ID . '"]'); ?&gt;</pre>
</blockquote>
<h3>Copy this code in custom-post-type single template where yo want to display custom main fields</h3>
<blockquote>
    <pre>&lt;?php do_shortcode('[mpm_show_all_fields id="' . $post->ID . '"]'); ?&gt;</pre>
</blockquote>
    <h3>Copy this code in custom-post-type single template where yo want to display custom main categories</h3>
<blockquote>
    <pre>&lt;?php do_shortcode('[mpm_show_categoriesid="' . $post->ID . '"]'); ?&gt;</pre>
</blockquote>
    <h3>Copy this code in custom-post-type single template where yo want to display custom main tags</h3>
<blockquote>
    <pre>&lt;?php do_shortcode('[mpm_show_tags id="' . $post->ID . '"]'); ?&gt;</pre>
</blockquote>
        <h2>Settings list</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('mpm_events_settings');
            do_settings_sections('mpm_events_settings');

            // Grab the settings data
            $options = get_option('mpm_events_settings');

            $yeschecked = '';
            $nochecked = '';
            if ($options['mpm_allow_rating'] == 'yes') {
                $yeschecked = 'checked';
            } else {
                $nochecked = 'checked';
            }

            ?>
            <label for="mpm_color">Color:</label>
            <input type="color" id="mpm_color" name="mpm_events_settings[mpm_color]" value="<?php echo $options['mpm_color']; ?>">


            <p>
                <label for="mpm_allow_rating">Allow Rating:</label>
                <input type="radio" name="mpm_events_settings[mpm_allow_rating]" id="mpm_allow_rating" value="yes" <?php echo $yeschecked ?> /> Yes&nbsp;&nbsp;
                <input type="radio" name="mpm_events_settings[mpm_allow_rating]" id="mpm_allow_rating" value="no" <?php echo $nochecked ?> /> No
            </p>

            <p>
                <label for="mpm_max_rating">Max Rating: </label>
                <input type="number" name="mpm_events_settings[mpm_max_rating]" size="2" id="mpm_max_rating" value="<?php echo $options['mpm_max_rating']; ?>" />
            </p>


            <p>
                <input type="submit" class="button button-primary" value="Save Settings">
            </p>
        </form>