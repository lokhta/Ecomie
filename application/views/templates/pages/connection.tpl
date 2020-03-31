    {include file="header.tpl" title="Ecomie - Connexion" name=$Name}
    {form_open('login/validation')}
                <h1>Connexion</h1>
                {form_label("Adresse Mail")}
                {form_input("email",'',"id='userEmail'")}
                <span class="text-danger"><?php echo form_error('userEmail'); ?></span>
                <label><b>Mot de passe</b></label>
                {form_input("password","id='title'")}<input type="password" placeholder="Entrer le mot de passe" name="userPwd">
                <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                {form_submit("id='mysubmit'", 'Se connecter')}    
                <a href="{base_url()}pages/inscription">Créez votre compte</a>
                {form_close()}
    {include file="footer.tpl"}