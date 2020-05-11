
{if !$is_in_base}
    {form_open('', 'id="checkbox_news"')}
        {form_checkbox('check_news','1',TRUE,'id="check_news"')} 
        {form_submit('valider',"M'inscrire à la newsletter",'id="submit"')} 
    {form_close()}
{/if}

<div id="stats_dash">
    <div class="flex_column bg_green">
        <h3>Membres inscrit</h3>
        <span>{$nb_users}</span>
    </div>
    <div class="flex_column bg_blue">
        <h3>Articles Publiés</h3>
        <span>{$nb_articles}</span>
    </div>
    <div class="flex_column bg_orange">
        <h3>Événements</h3>
        <span>{$nb_events}</span>
    </div>
</div>
   {if $smarty.session.role != 3}
        <div class="dash_activite">
            <h3>Commentaires signalés</h3>
            <table class="tab">
                <tr class='thead'>
                    <th>Auteur</th>
                    <th>Commentaires</th>
                    <th>Action</th>
                </tr>
                {foreach from=$com_report key=key item=val}
                    <tr style="background: {cycle values='#fff , #D6EAF8'}">
                        <td class="col1">{$val.userFirstname}</td>
                        <td class=col2>{$val.commentContent}</td>
                        <td class="col3"><button style="border:0px" class="delete btn_basket" data-link="{base_url()}Comments/edit_comment?commentId={$val.commentId}&amp;del_com=1&dash=1"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                {/foreach}
            </table>
        </div>
        {/if}
</div>

<script>
        $(function() {

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