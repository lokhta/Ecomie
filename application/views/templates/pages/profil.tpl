 {include file="header.tpl" title="Ecomie - Profil" name=$Name} 
                    <div class="btn-content">
                        <a href="{base_url()}dashboard" class="btn">Retour</a>
                    </div>
                    <div>
                        {if $smarty.session.id}
                            {form_open('users/profil')}
            
                            {form_label("Nom*")}
                            {form_input("userName", $smarty.session.name , "id='userName'")}
                        
                        
                            {form_label("Prénom*")}
                            {form_input("userFirstname", $smarty.session.firstname, "id='userFirstname'")}
                        
                        
                            {form_label("Addresse mail*")}
                            {form_input("userEmail", $smarty.session.email, "id='userEmail'")}
                    
                        
                            {form_label("N° de Téléphone")}
                            {form_input("userPhone", $smarty.session.phone, "id='userPhone'")}
                        
                        
                            {form_label("Addresse postale*")}
                            {form_input("userAddress", $smarty.session.address, "id='userAddress'")}
                        
                        
                            {form_label("Code postale*")}
                            {form_input("userCp", $smarty.session.cp, "id='userCp'")}
                        
                        
                            {form_label("Ville*")}
                            {form_input("userCity", $smarty.session.city, "id='userCity'")}
                        
                        
                            {form_label("Mot de passe*")}
                            {form_input("userPwd", '', "id='userPwd'")}
                        
                            {form_submit('submit', "Mettre à jour")}
                        
                            {form_close()}
                            {else}
                                 <p>Vous n'êtes pas connecté</p>  
                        {/if}
                    </div>

{include file="footer.tpl"}