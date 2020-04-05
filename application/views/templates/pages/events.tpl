{include file="header.tpl" title="Ecomie - Evénements" name=$Name}
  <div class="btn-content" id="btn-create-art">
        {if $smarty.session.id}
            <a href="{base_url()}Events/dashboard" class="btn">Créer un Évènement</a> 
        {/if}
    </div>
    <div class="contenaire__bloc">
            {foreach from=$event item=val key=key}
                <section class="savoir__faire">
                            <h2>{$val.eventName}</h2>
                            <p>{$val.eventContent}</p>
                        </div>
                    </a>
                    <div class="auteur">
                        <p>{$val.author}</p>
                        <p>{$val.eventDateStart} {$val.eventTimeStart}<br> {$val.eventDateEnd} {$val.eventTimeEnd} </p>
                    </div>
                </section>
            {/foreach}    
         

        </div>
        <section class="astuce__fb">
            <p>Plein d'autres astuce sur notre page Facebook</p>
            <a href="#"><img src="{base_url()}assets/img/facebook.svg" alt="Facebook"></a>
        </section>

    {include file="footer.tpl"}

