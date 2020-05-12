<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:49
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\galerie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08e1ed6a03_84068070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fa10444a4399ebef5a75f8657394354a3ac7c36' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\galerie.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08e1ed6a03_84068070 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div>
    <a class="btn btn_create_gallery" href="<?php echo base_url();?>
Galeries/editor">Créer une galerie</a>
</div>
<div id="list_gallery">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['galerie']->value, 'val', false, 'key', 'name', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
    <div>
        <a href="<?php echo base_url();?>
Galeries/dashboard?event_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['imgEvent'];?>
"><img src="<?php echo base_url();?>
assets/img/upload/<?php echo $_smarty_tpl->tpl_vars['val']->value['imgName'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['val']->value['imgAlt'];?>
"></a>
        <h2><?php echo $_smarty_tpl->tpl_vars['val']->value['eventName'];?>
</h2>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php }
}
