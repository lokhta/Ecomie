
{if !$is_in_base}
    {form_open('', 'id="checkbox_news"')}
        {form_checkbox('check_news','1',TRUE,'id="check_news"')} 
        {form_submit('valider',"M'inscrire à la newsletter",'id="submit"')} 
    {form_close()}
{/if}

<div id="stats_dash">
    <div class="flex_column bg_green">
        <h3>Membres inscrit</h3>
        <span>0</span>
    </div>
    <div class="flex_column bg_blue">
        <h3>Articles Publiés</h3>
        <span>0</span>
    </div>
    <div class="flex_column bg_orange">
        <h3>Événements</h3>
        <span>0</span>
    </div>
</div>
<div id="dash_actu">
    <div class="dash_activiter">
        <h3>Dernières activités</h3>
        <table class="tab">
            <tr class='thead'>
                <th>Catégorie</th>
                <th>Titre</th>
            </tr>
            {* {foreach from= key=key item=val} *}
                <tr style="background: {cycle values='#fff , #D6EAF8'}">
                    <td></td>
                </tr>
            {* {/foreach} *}
        </table>
    </div>
    <div class="dash_activiter">
        <h3>Commentaires signalés</h3>
        <table class="tab">
            <tr class='thead'>
                <th>Auteur</th>
                <th>Commentaires</th>
            </tr>
            {* {foreach from= key=key item=val} *}
                <tr style="background: {cycle values='#fff , #D6EAF8'}">
                    <td></td>
                </tr>
            {* {/foreach} *}
        </table>
    </div>
</div>