<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-29 17:35:38
  from 'C:\wamp64\www\Ecomie\application\views\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5aa0ea36bd73_22957072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '577ced7bad3619aa3fcaab6891f507e58435b3e4' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\header.tpl',
      1 => 1582997730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5aa0ea36bd73_22957072 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/5151logo_fleur.ico" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>

<body>
    <div id="principal">
        <header>
            <div id="logo">
                <div class="element_logo">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
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
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Accueil</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pages/articles">Savoir-Faire</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pages/evenements">Evénements</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pages/galerie">Galerie</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pages/contact">Contact</a>
                    <a class="connexion" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pages/connexion">Connexion</a>
                </nav>
                <a class="connexion__mobile" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pages/connexion"><img
                        src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/baseline_perm_identity_white_24dp.png" alt="Connexion"></a>

            </div>
        </header>
<?php }
}
