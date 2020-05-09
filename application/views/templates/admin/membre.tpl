<div>

    <div id="tab_content">


        <div id="tab_left">
        <div class="pagination_link">{$pagination}</div>
            <table class="tab">
                <tr class="thead">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th></th>
                </tr>
                {foreach from=$users_list key=key item=val}
                    <tr style="background: {cycle values='#fff , #D6EAF8'}">
                        <td>{$val.userName}</td>
                        <td>{$val.userFirstname}</td>
                        <td class="link_gestion">
                            <button class="action btn_more" data-name="{$val.userName}" data-firstname="{$val.userFirstname}" data-mail="{$val.userEmail}"
                             data-phone="{$val.userPhone}" data-address="{$val.userAddress}" data-cp="{$val.userCp}" data-city="{$val.userCity}"><i class="fas fa-search"></i></button>
                            <button style="border:0px" class="delete btn_basket" data-link="{base_url()}users/membres?user_id={$val.userId}&amp;del=1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                {/foreach}
            </table>
        </div>


        <div id="tab_right">
            <p class="thead">Coordonnées</p>
            <p class="row_info_membre white">
                <span class="lab">Nom</span>
                <span id="name" class="info_membre"></span>
            </p>
            <p class="row_info_membre bluesky">
                <span class="lab">Prénom</span>
                <span id="firstname" class="info_membre"></span>
            </p>
            <p class="row_info_membre white">
                <span class="lab mail_membres">Email</span>
                <span id="mail" class="info_membre mail"></span>
            </p>
            <p class="row_info_membre bluesky">
                <span class="lab">Téléphone</span>
                <span id="phone" class="info_membre"></span>
            </p>
            <p class="row_info_membre white">
                <span class="lab">Adresse</span>
                <span id="address" class="info_membre"></span>
            </p>
            <p class="row_info_membre bluesky">
                <span class="lab">CP</span>
                <span id="cp" class="info_membre"></span>
            </p>
            <p class="row_info_membre white">
                <span class="lab">Ville</span>
                <span id="city" class="info_membre"></span>
            </p>
            <div class="row_info_membre bluesky">
                {form_open('users/membres')}
                {form_label('Role', "role", 'class="lab"')}
                <span class="info_membre" id="user_role">{$user.role}</span>
                {form_dropdown('userRole',$option,'',"id='role'")}
                {form_submit('submit', "Valider", "id='btn_submit'")}
                <span id="btn_edit_role"><i class="fas fa-edit"></i></span>
                {form_close()}
            </div>

        </div>

    </div>

</div>

    <script>
      $(function() {
        $('.action').click(function() {
            var current = $(this);
            var name = current.data('name');
            var firstname = current.data('firstname');
            var mail = current.data('mail');
            var phone = current.data('phone');
            var address = current.data('address');
            var cp = current.data('cp');
            var city = current.data('city');

            $('#name').text(name);
            $('#firstname').text(firstname);
            $('#mail').text(mail);
            $('#phone').text(phone);
            $('#address').text(address);
            $('#cp').text(cp);
            $('#city').text(city);
            });

        $('span#btn_edit_role').click(function() {
            $('select#role').toggle();
            $('input#btn_submit').toggle();
        });

        $('.delete').click(function() {
            var ok = confirm('Êtes-vous sûr de vouloir supprimer ?');
            if(ok){
                var current = $(this);
                var link = current.data('link');
                window.location.replace(link);
            }

        });



          });
    </script>



