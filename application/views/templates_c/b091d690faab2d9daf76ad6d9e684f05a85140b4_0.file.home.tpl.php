<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-29 13:01:17
  from 'C:\wamp64\www\Ecomie\application\views\templates\pages\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5a609d774db5_86649463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b091d690faab2d9daf76ad6d9e684f05a85140b4' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\pages\\home.tpl',
      1 => 1582981274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e5a609d774db5_86649463 (Smarty_Internal_Template $_smarty_tpl) {
?>        <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Ecomie - Accueil",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>
        <div id=background>
            <div class="slider">
                <div class="slides">

                    <div class="slide">
                        <p class="slide_texte">Ecomie oeuvre
                            pour le partage</br> de savoir-faire et les
                            services </br> écoresponsable entre voisin.
                    </div>
                    <div class="slide">
                        <p class="slide_texte">Des savoir faire pour réaliser</br>ses propres produits</br>
                            respectueux de l'environement.</p>
                    </div>
                    <div class="slide">
                        <p class="slide_texte">Des événements locaux</br> et amusant</br> à vivre ensemble</p>
                    </div>
                </div>
            </div>
        </div>
        <section id="impact">
            <div class="terre">
                <img class="centrer" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/terre.png" alt="Terre">
                <p>réduison notre impact</br>sur la planéte</br>par la force du groupe</p>
            </div>
            <div class="terre">
                <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/partage_2.png" alt="Partage">
                <p>Apprendre et partager </br> avec ses proches</p>
            </div>
            <div class="terre">
                <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/qartier.png" alt="Quartier">
                <p>Ce retrouver lors </br>d'événements et défi</br>de quartier convivial</p>
            </div>
        </section>
        <section id="letter">
            <p class="news">Ce n'est que le début </br>inscrit toi à la newsletter pour les derniéres astuces.</p>
            <div id="newsletter">
                <label for="Newsletter"></label>
                <input id="mail" type="text" id="Newsletter" placeholder="Entrez votre adresse mail">
                <button class="bouton">Souscrivez </button>
            </div>
        </section>
        <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
