<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:59
  from 'C:\wamp64\www\Ecomie\application\views\templates\pages\galeries.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08eb236884_03005984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '637288e171e48bb788a55c0d7bdd3f643401d1b1' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\pages\\galeries.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ebb08eb236884_03005984 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Ecomie - Galerie",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>

<div id="list_gallery">

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['galerie']->value, 'val', false, 'key', 'name', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
      <div>
          <a href="<?php echo base_url();?>
Galeries/galeries?event_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['imgEvent'];?>
"><img src="<?php echo base_url();?>
assets/img/upload/<?php echo $_smarty_tpl->tpl_vars['val']->value['imgName'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['val']->value['imgAlt'];?>
" style="width: 300px"></a>
          <h2><?php echo $_smarty_tpl->tpl_vars['val']->value['eventName'];?>
</h2>
      </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
