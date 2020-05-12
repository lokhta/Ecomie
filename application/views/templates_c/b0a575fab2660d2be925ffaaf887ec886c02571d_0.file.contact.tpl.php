<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 20:37:00
  from 'C:\wamp64\www\Ecomie\application\views\templates\pages\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb08ec0fa117_66203255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0a575fab2660d2be925ffaaf887ec886c02571d' => 
    array (
      0 => 'C:\\wamp64\\www\\Ecomie\\application\\views\\templates\\pages\\contact.tpl',
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
function content_5ebb08ec0fa117_66203255 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Ecomie - Contact",'name'=>$_smarty_tpl->tpl_vars['Name']->value), 0, false);
?>
<span id="success" class="message_success"></span>


    <?php echo form_open($_smarty_tpl->tpl_vars['url_form']->value,'id="form_val"');?>

        <?php echo form_label("Nom");?>

        <?php echo form_input("formSendername",'',"id='formSendername'");?>

        <span id="name_error" class="red_error"></span>

        <?php echo form_label("E-mail");?>

        <?php echo form_input("formSendermail",'',"id='formSendermail'");?>

        <span id="email_error" class="red_error"></span>

        <?php echo form_label("Objet");?>

        <?php echo form_input("formSubject",'',"id='formSubject'");?>

        <span id="subject_error" class="red_error"></span>

        <?php echo form_label("Message");?>

        <?php echo form_textarea('formMessage','','id="formMessage"');?>

        <span id="message_error" class="red_error"></span>

        <div class="conditions">
        <?php echo form_checkbox('formRgpd','true',FALSE,'id="formRgpd"');?>
      
        <label class="rgpd__text" for="rgpd"> J'ai lu et j'accepte les <a href="<?php echo base_url();?>
pages/cgu">conditions génèrales d'utilisation.</a></label>
        <span id="rgpd_error" class="red_error"></span>
        </div>

        <?php echo form_submit('envoyer','Envoyer','id="bouton__form"');?>

    <?php echo form_close();?>


<div>
    <span class="print-error-msg"></span>
</div>

<section class="contact__ecomie">
    <div class="contact">
        <img src="<?php echo base_url();?>
assets/img/smartphone.png" alt="Smartphone">
        <p>03.88.69.68.67</p>
    </div>
    <div class="contact">
        <a href="#"><img src="<?php echo base_url();?>
assets/img/fb.svg" alt=" Facebook"></a>
        <p>Ecomie</p>
    </div>
    <div class="contact">
        <img src="<?php echo base_url();?>
assets/img/location.png" alt="Localisation">
        <p>27 rue de la république <br> 67800 Hoenheim</p>
    </div>
</section>
<section class="map">
    <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2637.413906046656!2d7.7528936156659904!3d48.62106107926501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4796c7d850e337df%3A0xddea84dde0adb137!2s27%20Rue%20de%20la%20R%C3%A9publique%2C%2067800%20H%C5%93nheim!5e0!3m2!1sfr!2sfr!4v1578487126783!5m2!1sfr!2sfr"
        width="800" height="600" frameborder="0" style="border:0;"></iframe>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
