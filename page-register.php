<?php
/**
 * Template Name: Openweb - Page Register
 * Template Post Type: page
 * Template Description: Plantilla para páginas de ejemplo.
 *
 * @package Openweb
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();
?>

<?php
while (have_posts()) {
    the_post();
}
?>
<!-- chat -->
<?php get_template_part('template-parts/components/chat');; ?>
<!-- end chat -->


<!-- page register -->
<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2><?php echo the_title_attribute(); ?></h2>
                <p class="no-margin">
                    <?php echo the_content(); ?>
                </p>
            </div>

            <div class="col-xs-12">
                <hr />
            </div>

            <div class="col-xs-12">
                <div class="form-wrap">
                    <div id="errorArmadillo" class="message message-error"
                         data-msg-error-conflict="<?php _e('Ya existe un usuario con esas credenciales', 'openweb'); ?>"
                         data-msg-error-default="<?php _e('Ha ocurrido un error, inténtalo más tarde'); ?>">
                        <span class="icon icon-lg bbva-coronita_alert"></span>
                    </div>
                    <div id="successArmadillo" class="message message-success">
                        <span class="icon icon-lg bbva-coronita_checkmark"></span>
                        <?php _e('Usuario creado correctamente', 'openweb'); ?>
                    </div>

                    <form id="openweb-form-register" autocomplete="off" class="mod" method="" action="">
                        <div class="form-group form-group-bbva clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <label for="name" class="control-label required"><?php echo ucfirst(__('nombre', 'openweb')); ?></label>
                                </div>
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <input class="form-control-bbva" name="name" id="name" type="text"
                                           placeholder="<?php echo ucfirst(__('nombre', 'openweb')); ?>"
                                           data-msg-err="<?php echo __('El nombre no puede estar vacío'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-bbva clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <label for="surname" class="control-label required"><?php echo ucfirst(__('apellidos', 'openweb')); ?></label>
                                </div>
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <input class="form-control-bbva" name="surname" id="surname" type="text"
                                           placeholder="<?php echo ucfirst(__('apellidos', 'openweb')); ?>"
                                           data-msg-err="<?php echo __('Los apellidos no pueden estar vacíos'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-bbva clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <label for="email" class="control-label required"><?php echo ucfirst(__('correo electrónico', 'openweb')); ?></label>
                                </div>
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <input class="form-control-bbva" name="email" id="email" type="text"
                                           placeholder="<?php echo ucfirst(__('correo electrónico', 'openweb')); ?>"
                                           data-msg-err="<?php echo __('El email no puede estar vacío'); ?>"
                                           data-msg-err-format="El email debe ser una cuenta de correo válida">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-bbva clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <label for="username" class="control-label required"><?php echo ucfirst(__('usuario', 'openweb')); ?></label>
                                </div>
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <input class="form-control-bbva" autocomplete="off" name="username" id="username"
                                           type="text" placeholder="<?php echo ucfirst(__('usuario', 'openweb')); ?>"
                                           data-msg-err="<?php echo __('El usuario no puede estar vacío'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-bbva clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <label for="password" class="control-label required"><?php echo ucfirst(__('contraseña', 'openweb')); ?></label>
                                </div>
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <input class="form-control-bbva" autocomplete="off" name="password" id="password"
                                           type="password" placeholder="<?php echo ucfirst(__('contraseña', 'openweb')); ?>"
                                           data-msg-err="<?php echo __('La contraseña no puede estar vacía'); ?>"
                                           data-msg-err-repeat="Las contraseñas deben ser iguales"
                                           data-msg-err-format="<?php _e('El formato de la contraseña no es correcto'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-bbva clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <label for="repeat-password" class="control-label required"><?php echo ucfirst(__('repetir contraseña', 'openweb')); ?></label>
                                </div>
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <input class="form-control-bbva" autocomplete="off" name="repeat-password" id="repeat-password"
                                           type="password" placeholder="<?php echo ucfirst(__('repetir contraseña', 'openweb')); ?>"
                                           data-msg-err="<?php echo __('La contraseña repetida no puede estar vacía'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-bbva">
                            <div class="row">
                                <div class="col-xs-12 col-md-offset-2 col-md-8">
                                    <button class="submit btn btn-aqua" name="register" id="register" type="submit"><?php echo __('Registrar'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
