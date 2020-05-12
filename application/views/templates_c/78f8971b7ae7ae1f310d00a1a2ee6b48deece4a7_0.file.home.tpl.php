<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:44
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08dc8dbe69_46447187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78f8971b7ae7ae1f310d00a1a2ee6b48deece4a7' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\home.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08dc8dbe69_46447187 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\Ecomie\\application\\third_party\\smarty\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>

<?php if (!$_smarty_tpl->tpl_vars['is_in_base']->value) {?>
    <?php echo form_open('','id="checkbox_news"');?>

        <?php echo form_checkbox('check_news','1',TRUE,'id="check_news"');?>
 
        <?php echo form_submit('valider',"M'inscrire à la newsletter",'id="submit"');?>
 
    <?php echo form_close();?>

<?php }?>

<div id="stats_dash">
    <div class="flex_column bg_green">
        <h3>Membres inscrit</h3>
        <span><?php echo $_smarty_tpl->tpl_vars['nb_users']->value;?>
</span>
    </div>
    <div class="flex_column bg_blue">
        <h3>Articles Publiés</h3>
        <span><?php echo $_smarty_tpl->tpl_vars['nb_articles']->value;?>
</span>
    </div>
    <div class="flex_column bg_orange">
        <h3>Événements</h3>
        <span><?php echo $_smarty_tpl->tpl_vars['nb_events']->value;?>
</span>
    </div>
</div>
   <?php if ($_SESSION['role'] != 3) {?>
        <div class="dash_activite">
            <h3>Commentaires signalés</h3>
            <table class="tab">
                <tr class='thead'>
                    <th>Auteur</th>
                    <th>Commentaires</th>
                    <th>Action</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['com_report']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                    <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                        <td class="col1"><?php echo $_smarty_tpl->tpl_vars['val']->value['userFirstname'];?>
</td>
                        <td class=col2><?php echo $_smarty_tpl->tpl_vars['val']->value['commentContent'];?>
</td>
                        <td class="col3">
                        <button style="border:0px" class="delete btn_basket" data-link="<?php echo base_url();?>
Comments/edit_comment?commentId=<?php echo $_smarty_tpl->tpl_vars['val']->value['commentId'];?>
&amp;del_com=1&dash=1"><i class="fas fa-trash-alt"></i></button>
                        <a href="<?php echo base_url();?>
Email/send_warning?comment=<?php echo $_smarty_tpl->tpl_vars['val']->value['commentContent'];?>
&author<?php echo $_smarty_tpl->tpl_vars['val']->value['userFirstname'];?>
&email=<?php echo $_smarty_tpl->tpl_vars['val']->value['userEmail'];?>
"><i class="fas fa-exclamation-triangle"></i></a>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        </div>
        <?php }?>
</div>

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
