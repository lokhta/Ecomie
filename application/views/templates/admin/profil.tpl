 
                    <div class="btn-content">
                        <a href="{base_url()}dashboard" class="btn">Retour</a>
                    </div>
                    {form_open_multipart('users/profil')}
                            <table id="tab_profil">
                                <section id="content_avatar">
                                    <p>INFORMATIONS PERSONNELLES</p>
                                    <img class="image" src="{base_url()}assets/img/upload/{$avatar}" alt="">
                                    <div id="gestion_photo_profil"><span class="btn btn_edit_photo">Modifier</span><a href="{base_url()}users/profil?del=1" class="btn btn_del_photo">Supprimer</a> </div>
                                    {form_upload("userAvatar",'',"id='userAvatar'")}
                                </section>
                                <tr class="info_profil"></td>
                                    <td>{form_label("Nom")}</td>
                                    <td>
                                        <span class="info_user">{$smarty.session.name}</span>
                                        {form_input("userName", "" , "id='userName' class='field_profil'")}
                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td>{form_label("Prénom")}</td>
                                    <td>
                                        <span class="info_user">{$smarty.session.firstname}</span> 
                                        {form_input("userFirstname", "", "id='userFirstname' class='field_profil'")} 
                                        <span class="btn_edit_profil"><i class="fas fa-edit">
                                    </td>
                                </tr>
                            
                                <tr class="info_profil">
                                    <td>{form_label("email")}</td>
                                    <td>
                                        <span class="info_user">{$smarty.session.email}</span>
                                        {form_input("userEmail", "", "id='userEmail' class='field_profil'")}
                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td>{form_label("N° de Téléphone")}</td>
                                    <td>
                                        <span class="info_user">{$smarty.session.phone}</span>
                                        {form_input("userPhone", "", "id='userPhone' class='field_profil'")}
                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td>{form_label("Addresse postale")}</td>
                                    <td>
                                        <span class="info_user">{$smarty.session.address}</span>
                                        {form_input("userAddress", "", "id='userAddress' class='field_profil'")}
                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>
                            
                                <tr class="info_profil">
                                    <td>{form_label("Code postale")}</td>
                                    <td>
                                        <span class="info_user">{$smarty.session.cp}</span>
                                        {form_input("userCp", "", "id='userCp' class='field_profil'")}
                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>
                            
                                <tr class="info_profil">
                                    <td>{form_label("Ville")}</td>
                                    <td>
                                        <span class="info_user">{$smarty.session.city}</span>
                                        {form_input("userCity", "", "id='userCity' class='field_profil'")}
                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>

                                <tr class="info_profil">
                                    <td>{form_label("Mot de passe")}</td>
                                    <td>
                                        <span class="info_user"></span>
                                        {form_password("userPwd", '', "id='userPwd' class='field_profil'")}
                                        <span class="btn_edit_profil"><i class="fas fa-edit"></i></span>
                                    </td>
                                </tr>
                            </table>
                            {form_submit('submit', "Mettre à jour", "id='btn_edit_profil'")}
                        {form_close()}


                        <script>



                        </script>

                 

   
