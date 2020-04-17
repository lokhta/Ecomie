    {include file="header.tpl" title="Ecomie - Accueil" name=$Name}
        {form_open('users/inscription')}
            
                {form_label("Nom*")}
                {form_input("userName", "", "id='userName'")}
            
            
                {form_label("Prénom*")}
                {form_input("userFirstname", "", "id='userFirstname'")}
            
            
                {form_label("Addresse mail*")}
                {form_input("userEmail", "", "id='userEmail'")}
           
            
                {form_label("N° de Téléphone")}
                {form_input("userPhone", "", "id='userPhone'")}
            
            
                {form_label("Addresse postale*")}
                {form_input("userAddress", "", "id='userAddress'")}
            
            
                {form_label("Code postale*")}
                {form_input("userCp", "", "id='userCp'")}
            
            
                {form_label("Ville*")}
                {form_input("userCity", "", "id='userCity'")}
            
            
                {form_label("Mot de passe*")}
                {form_password("userPwd", "", "id='userPwd'")}

                {form_label("Confirmez le mot de passe*")}
                {form_password("confirmPwd", "", "id='userPwd'")}

                {form_submit('submit', "S'inscrire")}
            
        {form_close()}

    {include file="footer.tpl"}