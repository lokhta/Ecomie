    {include file="header.tpl" title="Ecomie - Connexion" name=$Name}
    {form_open('users/connexion', 'id="form"')}
                <h1>Connexion</h1>
                {form_label("Adresse Mail")}
                {form_input("userEmail",'',"id='userEmail'")}
                <span class="red_error" id="error_email"></span>

                {form_label("Mot de passe")}
                {form_password("userPwd",'',"id='userPwd'")}
                <span class="red_error" id="error_pwd"></span>
                
                {form_submit("id='mysubmit'", 'Se connecter')}
                <a href="{base_url()}pages/inscription">Créez votre compte</a>
                {form_close()}
    {include file="footer.tpl"}