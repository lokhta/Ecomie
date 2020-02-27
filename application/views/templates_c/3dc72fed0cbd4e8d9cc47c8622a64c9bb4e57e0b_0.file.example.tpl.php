<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-27 20:25:03
  from 'C:\wamp64\www\Ecomie\application\views\templates\example.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e58259fe89533_43068820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dc72fed0cbd4e8d9cc47c8622a64c9bb4e57e0b' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\example.tpl',
      1 => 1582835102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e58259fe89533_43068820 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Example Smarty Page",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>

<h1>Ore wa <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
 ! Kaizoku ou ni naru otoko da !</h1>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
