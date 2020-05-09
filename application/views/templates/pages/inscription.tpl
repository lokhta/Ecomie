    {include file="header.tpl" title="Ecomie - Accueil" name=$Name}

        
        <span id="success" class="message_success"></span>

        {form_open($url_form,'id="form_val"')}

                <h3>Les champs marqués d'un (*) sont obligatoires.</h3> 

                <p class="form_field">
                    {form_label("Nom*")}
                    {form_input("userName", $value_username, "id='userName'")}
                </p>
                <span id="name_error" class="red_error"></span>


                <p class="form_field">
                    {form_label("Prénom*")}
                    {form_input("userFirstname", $value_Firstname, "id='userFirstname'")}
                </p>
                <span id="firstname_error" class="red_error"></span>


                <p class="form_field">            
                    {form_label("Addresse mail*")}
                    {form_input("userEmail", $value_Mail, "id='userEmail'")}
                </p>
                <span id="email_error" class="red_error"></span>
            

                <p class="form_field">            
                    {form_label("N° de Téléphone")}
                    {form_input("userPhone", $value_phone, "id='userPhone'")}
                </p>
                <span id="phone_error" class="red_error"></span>


                <p class="form_field">
                    {form_label("Addresse postale*")}
                    {form_input("userAddress", $value_address, "id='userAddress'")}
                </p>
                <span id="address_error" class="red_error"></span>


                <p class="form_field">
                    {form_label("Code postal*")}
                    {form_input("userCp", $value_cp, "id='userCp'")}
                </p>
                <span id="cp_error" class="red_error"></span>


                <p class="form_field">
                    {form_label("Ville*")}
                    {form_input("userCity", $value_city, "id='userCity'")}
                </p>
                <span id="city_error" class="red_error"></span>


                <p class="form_field">
                    {form_label("Mot de passe*")}
                    {form_password("userPwd", "", "id='userPwd'")}
                    <i class="fas fa-info-circle" id="help"></i>
                </p>
                <span id="help_pwd" class="info_bulle"></span>
                <span id="pwd_error" class="red_error"></span>


                <p class="form_field">
                    {form_label("Confirmez le mot de passe*")}
                    {form_password("confirmPwd", "", "id='userPwd'")}
                </p>
                <span id="confirmPwd_error" class="red_error"></span>

                {form_submit('submit', "S'inscrire")}
            
        {form_close()}

    {include file="footer.tpl"}
