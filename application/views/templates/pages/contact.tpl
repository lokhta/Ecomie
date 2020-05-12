{include file="header.tpl" title="Ecomie - Contact" name=$Name}
<span id="success" class="message_success"></span>


    {form_open($url_form,'id="form_val"')}
        {form_label("Nom")}
        {form_input("formSendername",'',"id='formSendername'")}
        <span id="name_error" class="red_error"></span>

        {form_label("E-mail")}
        {form_input("formSendermail",'',"id='formSendermail'")}
        <span id="email_error" class="red_error"></span>

        {form_label("Objet")}
        {form_input("formSubject",'',"id='formSubject'")}
        <span id="subject_error" class="red_error"></span>

        {form_label("Message")}
        {form_textarea('formMessage','','id="formMessage"')}
        <span id="message_error" class="red_error"></span>

        <div class="conditions">
        {form_checkbox('formRgpd', 'true',FALSE,'id="formRgpd"')}      
        <label class="rgpd__text" for="rgpd"> J'ai lu et j'accepte les <a href="{base_url()}pages/cgu">conditions génèrales d'utilisation.</a></label>
        <span id="rgpd_error" class="red_error"></span>
        </div>

        {form_submit('envoyer','Envoyer','id="bouton__form"')}
    {form_close()}

<div>
    <span class="print-error-msg"></span>
</div>

<section class="contact__ecomie">
    <div class="contact">
        <img src="{base_url()}assets/img/smartphone.png" alt="Smartphone">
        <p>03.88.69.68.67</p>
    </div>
    <div class="contact">
        <a href="#"><img src="{base_url()}assets/img/fb.svg" alt=" Facebook"></a>
        <p>Ecomie</p>
    </div>
    <div class="contact">
        <img src="{base_url()}assets/img/location.png" alt="Localisation">
        <p>27 rue de la république <br> 67800 Hoenheim</p>
    </div>
</section>
<section class="map">
    <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2637.413906046656!2d7.7528936156659904!3d48.62106107926501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4796c7d850e337df%3A0xddea84dde0adb137!2s27%20Rue%20de%20la%20R%C3%A9publique%2C%2067800%20H%C5%93nheim!5e0!3m2!1sfr!2sfr!4v1578487126783!5m2!1sfr!2sfr"
        width="800" height="600" frameborder="0" style="border:0;"></iframe>
</section>

{include file="footer.tpl"}