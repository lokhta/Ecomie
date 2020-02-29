<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-29 10:25:22
  from 'C:\wamp64\www\Ecomie\application\views\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5a3c12598e38_31536015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '577ced7bad3619aa3fcaab6891f507e58435b3e4' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\header.tpl',
      1 => 1582971913,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5a3c12598e38_31536015 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="assets/img/5151logo_fleur.ico" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ecomie</title>
</head>

<body>
    <div id="principal">
        <header>
            <div id="logo">
                <div class="element_logo"><img src="assets/img/logo_fleur.png" alt="Logo">
                </div>
                <div id="element_titre">
                    <h1 class="titre">ECOMIE</h1>
                    <h2 class="sous_titre">L'association d'aujourd'hui</h2>
                </div>
            </div>
            <div class="menu">
                <input class="burger" type="checkbox">
                <nav>
                    <a href="#">Accueil</a>
                    <a href="savoir-faire/savoir_faire.html">Savoir-Faire</a>
                    <a href="erreur/erreur.html">Evénements</a>
                    <a href="galerie/galerie.html">Galerie</a>
                    <a href="contact/contact.html">Contact</a>
                    <a class="connexion" href="#">Connexion</a>
                </nav>
                <a class="connexion__mobile" href="erreur/erreur.html"><img
                        src="assets/img/baseline_perm_identity_white_24dp.png" alt="Connexion"></a>

            </div>
        </header>
<?php }
}
