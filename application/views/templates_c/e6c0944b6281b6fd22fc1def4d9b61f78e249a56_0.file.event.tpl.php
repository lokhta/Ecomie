<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:49
  from 'C:\wamp64\www\Ecomie\application\views\templates\admin\event.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08e101a986_75048976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6c0944b6281b6fd22fc1def4d9b61f78e249a56' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\admin\\event.tpl',
      1 => 1589315794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb08e101a986_75048976 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\Ecomie\\application\\third_party\\smarty\\libs\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div>
    <table class="tab">
        <tr class="thead">
            <th>N° évènement</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['event']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
            <tr style="background: <?php echo smarty_function_cycle(array('values'=>'#fff , #D6EAF8'),$_smarty_tpl);?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['eventId'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['eventName'];?>
</td>
        
                <td class="link_gestion">
                    <a href="<?php echo base_url();?>
Events/dashboard?event_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['eventId'];?>
"><i class="fas fa-search"></i></a>
                    <button style="border:0px" class="delete btn_basket" data-link="<?php echo base_url();?>
Events/dashboard?event_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['eventId'];?>
&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
   
        <div class="formContent" id="edit">
                <?php echo form_open($_smarty_tpl->tpl_vars['url']->value,"class='form'");?>

                    <p class="field-content">
                        <?php echo form_label("Titre");?>

                        <?php echo form_input("eventName",$_smarty_tpl->tpl_vars['eventDetail']->value['eventName'],"id='title'");?>

                    </p>
                    <p class="field-content">
            <?php echo form_label("Debut date");?>

            <?php echo form_date("eventDateStart",'',"id='Debut date'");?>

        </p>
        <p class="field-content">
            <?php echo form_label("Debut heure");?>

            <?php echo form_time("eventTimeStart",'',"id='Debut heure'");?>

        </p>
        <p class="field-content">
            <?php echo form_label("Fin jour");?>

            <?php echo form_date("eventDateEnd",'',"id='Fin jour'");?>

        </p>
        <p class="field-content">
            <?php echo form_label("Fin heure");?>

            <?php echo form_time("eventTimeEnd",'',"id='Fin heure'");?>

        </p>
                <?php echo form_textarea('eventContent',$_smarty_tpl->tpl_vars['eventDetail']->value['eventContent'],'id="eventContent" class="ckeditor"');?>

                <?php echo form_submit('valider','Valider','id="submit"');?>

                <?php echo form_close();?>

            </div>
    </div>
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
