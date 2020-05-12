<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:36:58
  from 'C:\wamp64\www\Ecomie\application\views\templates\pages\events.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08ea3e2b26_99107055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e13789b07c83c266538c02e0cf97440d5741dd19' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\pages\\events.tpl',
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
function content_5ebb08ea3e2b26_99107055 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Ecomie - Evénements",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>
  <div class="btn-content" id="btn-create-art">
        <?php if ($_SESSION['id'] && $_SESSION['role'] != 3) {?>
            <a href="<?php echo base_url();?>
Events/dashboard" class="btn-event">Créer un évènement</a> 
        <?php }?>
    </div>
    <div class="event__bloc">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['event']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
            <section class="savoir__faire">
                <a href="<?php echo base_url();?>
Events/events?event_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['eventId'];?>
" class="event__content">
                    <h2><?php echo $_smarty_tpl->tpl_vars['val']->value['eventName'];?>
</h2>
                    <p><?php echo $_smarty_tpl->tpl_vars['val']->value['eventContent'];?>
</p>
                </a>
                      
                    <div class="event__auteur">
                        <p><?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</p>
                            <div class="event__auteur--date">
                                <span class="event__date">Début <br><?php echo $_smarty_tpl->tpl_vars['val']->value['eventDateStart'];?>
 <br><?php echo $_smarty_tpl->tpl_vars['val']->value['eventTimeStart'];?>
</span>
                                <span class="event__date">Fin <br><?php echo $_smarty_tpl->tpl_vars['val']->value['eventDateEnd'];?>
 <br><?php echo $_smarty_tpl->tpl_vars['val']->value['eventTimeEnd'];?>
 </span>
                            </div>
                    </div>
                </section> 
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>    
        </div>
        <section class="astuce__fb">
            <p>Plein d'autres astuce sur notre page Facebook</p>
            <a href="#"><img src="<?php echo base_url();?>
assets/img/facebook.svg" alt="Facebook"></a>
        </section>

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
