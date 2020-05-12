<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:54
  from 'C:\wamp64\www\Ecomie\application\views\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08e6b9e702_28138959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '577ced7bad3619aa3fcaab6891f507e58435b3e4' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\header.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08e6b9e702_28138959 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
> var base_url = "<?php echo base_url();?>
"; <?php echo '</script'; ?>
>
</head>

<body>
    <div id="principal">
        <header>
            <div class="headerLogo">
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
            <div id="logo">
                <div class="element_logo">
                    <a href="<?php echo base_url();?>
"><img src="<?php echo base_url();?>
assets/img/logo_fleur.png" alt="Logo"></a>
                </div>
                <div id="element_titre">
                    <h1 class="titre">ECOMIE</h1>
                    <h2 class="sous_titre">L'association d'aujourd'hui</h2>
                </div>
            </div>
            <div class="menu">
                <input class="burger" type="checkbox">
                <nav>
                    <a href="<?php echo base_url();?>
">Accueil</a>
                    <a href="<?php echo base_url();?>
Articles/articles">Savoir-Faire</a>
                    <a href="<?php echo base_url();?>
Events/events">Evénements</a>
                    <a href="<?php echo base_url();?>
Galeries/galeries">Galerie</a>
                    <a href="<?php echo base_url();?>
pages/contact">Contact</a>
                </nav>
                                <div class="connexion__mobile">
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
<?php }
}
