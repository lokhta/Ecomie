<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:51
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\messagerie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08e3450c75_33682382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50614dce02d824c6a4fbb266f8238dde41d7cb32' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\messagerie.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08e3450c75_33682382 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\Ecomie\\application\\third_party\\smarty\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>

<table class="tab">
    <tr class="thead">
        <th>Expéditeur</th>
        <?php if ($_SESSION['role'] != 3) {?>
            <th>Object</th>
        <?php }?>
        <th>Date de réception</th>
        <th>Action</th>
    </tr>
    <?php if ($_SESSION['role'] != 3) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['message_forms']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
            <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['formSendername'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['formSubject'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['date'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['time'];?>
</td>
                <td class="link_gestion">
                    <a href="<?php echo base_url();?>
forms/dashboard?form_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['formId'];?>
"><i class="fas fa-search"></i></a>
                    <button style="border:0px" class="delete btn_basket" data-link="<?php echo base_url();?>
forms/dashboard?form_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['formId'];?>
&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

    <?php if ($_SESSION['role'] == 3) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['message']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
            <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['sender'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['date'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['time'];?>
</td>
                <td class="link_gestion">
                    <a href="<?php echo base_url();?>
Messages/dashboard?message_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['msgId'];?>
"><i class="fas fa-search"></i></a>
                    <button style="border:0px" class="delete btn_basket" data-link="<?php echo base_url();?>
Messages/dashboard?message_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['msgId'];?>
&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

</table>

<?php echo '<script'; ?>
>
        $(function() {

            $('.delete').click(function() {
                var ok = confirm('Êtes-vous sûr de vouloir supprimer ?');
                if(ok){
                var current = $(this);
                var link = current.data('link');
                window.location.replace(link);
               }
            });
        });
    <?php echo '</script'; ?>
><?php }
}
