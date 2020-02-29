<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-29 16:27:39
  from 'C:\wamp64\www\Ecomie\application\views\templates\pages\galerie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5a90fb0c3397_41891680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30658f94bbbe37d6c3322a0b918730a30f660b36' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\pages\\galerie.tpl',
      1 => 1582993655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e5a90fb0c3397_41891680 (Smarty_Internal_Template $_smarty_tpl) {
?>        <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Ecomie - Galerie",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>
<div class="galerie">
  <span id="votre_id1" class="target"></span>
  <span id="votre_id2" class="target"></span>
  <span id="votre_id3" class="target"></span>
  <span id="votre_id4" class="target"></span>

  <div class="cadre_diapo">
    <div class="interieur_diapo">

      <div class=description>
        <span>Fête de quartier</span>
        <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/fete-du-quartier.jpg" alt="Fête" height="auto" width="600px">
      </div>

      <div class=description>
        <span>Jardin partagé</span>
        <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/jardin_partage.jpg" alt="Jardin" height="auto" width="600px">
      </div>

      <div class=description>
        <span>Zero</span>
        <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/zero.jpg" alt="Zero" height="auto" width="600px">
      </div>

      <div class=description>
        <span>Hulot</span>
        <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/hulot.jpg" alt="Hulot" height="auto" width="600px">
      </div>

    </div>

    <ul class="navigation_diapo">
      <li>
        <a href="#votre_id1">
          <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/fete-du-quartier.jpg" alt="fête" height="1000px" width="1000px">
        </a>
      </li>

      <li>
        <a href="#votre_id2">
          <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/jardin_partage.jpg" alt="Jardin" height="1000px" width="1000px">
        </a>
      </li>

      <li>
        <a href="#votre_id3">
          <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/zero.jpg" alt="Zéro déchet" height="1000px" width="1000px">
        </a>
      </li>

      <li>
        <a href="#votre_id4">
          <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/hulot.jpg" alt="Hulot" height="1000px" width="1000px">
        </a></li>
    </ul>
  </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
