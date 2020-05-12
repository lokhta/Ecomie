<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:42
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08da5740b4_51035151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e50f3edac36a528cf222f724c4bbf66a0de3ba0' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\dashboard.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/sidebare.tpl' => 1,
  ),
),false)) {
function content_5ebb08da5740b4_51035151 (Smarty_Internal_Template $_smarty_tpl) {
?>    <!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url();?>
assets/css/style.css">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>
assets/img/5151logo_fleur.ico" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/cefffb285d.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/js/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            var session_id = "<?php echo $_SESSION['id'];?>
";
        <?php echo '</script'; ?>
>
    </head>

    <body>
        <div id="main_content">
            <header>
                <div class="headerLogo headerAdmin" id="headerAdmin">
                    <?php if ($_SESSION['role'] == 1) {?>
                        <a href="<?php echo base_url();?>
documentation/index.html">Accéder à la documentation technique</a>
                    <?php }?>
                    
                    <div id="link_headerAdmin">
                        <div>
                            <a href="<?php echo base_url();?>
"> Retourner à Ecomie / </a>
                        </div>
                        <div>
                            <?php if ($_SESSION['id']) {?>
                                <a href="<?php echo base_url();?>
users/profil"><?php echo $_SESSION['firstname'];?>
</a><span>/</span><a href="<?php echo base_url();?>
users/logout">Deconnexion</a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url();?>
pages/inscription">Inscription</a><span>/</span><a href="<?php echo base_url();?>
pages/connexion">Connexion</a>       
                            <?php }?>
                        </div>
                    </div>
                </div>
            </header>
            <main id="adminContent">
                <?php $_smarty_tpl->_subTemplateRender("file:admin/sidebare.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <section class="right_content">
                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                </section>
            </main>
            <footer>
            </footer>
        </div>
        <?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/js/script.js"><?php echo '</script'; ?>
>
        <?php if (in_array($_smarty_tpl->tpl_vars['url']->value,array("Articles/dashboard","Newsletters/dashboard","Events/dashboard","Galeries/dashboard"))) {?>
            <?php echo $_smarty_tpl->tpl_vars['script_ckeditor']->value;?>

        <?php }?>
    </body>
</html><?php }
}
