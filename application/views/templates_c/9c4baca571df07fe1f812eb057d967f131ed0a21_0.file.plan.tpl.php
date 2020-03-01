<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-29 17:21:54
  from 'C:\wamp64\www\Ecomie\application\views\templates\pages\plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5a9db2290492_86018774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c4baca571df07fe1f812eb057d967f131ed0a21' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\pages\\plan.tpl',
      1 => 1582996903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e5a9db2290492_86018774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Ecomie - Plan du site",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>
<section>
    <img class="plan" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/img/ecomie_plan.png" alt="Plan du site">
</section>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
