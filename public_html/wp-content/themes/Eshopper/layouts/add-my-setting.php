<?php

//Сохранение настроек
function my_save() {
    global $select_options;
    if ( ! isset( $_REQUEST['settings-updated'] ) )
        $_REQUEST['settings-updated'] = false;
    ?>
    <div class="wrap">
        <h2>Информация о сайте</h2>

        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
            <div id="message" class="updated">
                <p><strong>Настройки сохранены</strong></p>
            </div>
        <?php endif; ?>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <table class="form-table">

                <tr valign="top">
                    <th scope="row">Телефон глановного секретаря</th>
                    <td><input type="text" name="phone" value="<?php echo get_option('phone'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Адрес электороной почты</th>
                    <td><input type="text" name="Email" value="<?php echo get_option('Email'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Адрес</th>
                    <td><input type="text" name="address" value="<?php echo get_option('address'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Facebook (ссылка)</th>
                    <td><input type="text" name="Facebook" value="<?php echo get_option('Facebook'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Youtube (ссылка)</th>
                    <td><input type="text" name="Youtube" value="<?php echo get_option('Youtube'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Instagram (ссылка)</th>
                    <td><input type="text" name="Instagram" value="<?php echo get_option('Instagram'); ?>" /></td>
                </tr>

            </table>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="phone,Email,address,Facebook,Youtube,Instagram" />

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>

        </form>
    </div>
    <?php
}