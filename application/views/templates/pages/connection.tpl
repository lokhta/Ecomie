    {include file="header.tpl" title="Ecomie - Connexion" name=$Name}
    {form_open('users/connexion')}
                <h1>Connexion</h1>
                {form_label("Adresse Mail")}
                {form_input("userEmail",'',"id='userEmail'")}
                <span class="text-danger"></span>
                {form_label("Mot de passe")}
                {form_input("userPwd",'',"id='userPwd'")}
                <span class="text-danger"></span>
                {form_submit("id='mysubmit'", 'Se connecter')}
                <a href="{base_url()}pages/inscription">Créez votre compte</a>
                {form_close()}
    {include file="footer.tpl"}