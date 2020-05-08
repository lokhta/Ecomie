{include file="header.tpl" title="Ecomie - Evénements" name=$Name}
  <div class="btn-content" id="btn-create-art">
        {if $smarty.session.id}
            <a href="{base_url()}Events/dashboard" class="btn-event">Créer un évènement</a> 
        {/if}
    </div>
    <div class="pagination_link">{$pagination}</div>
    <div class="event__bloc">
        {foreach from=$event item=val key=key}
            <section class="savoir__faire">
                <a href="{base_url()}Events/events?event_id={$val.eventId}" class="event__content">
                    <h2>{$val.eventName}</h2>
                    <p>{$val.eventContent}</p>
                </a>
                      
                    <div class="event__auteur">
                        <p>{$val.author}</p>
                        <div class="event__auteur--date">
                            <span class="event__date">Début <br>{$val.eventDateStart} <br>{$val.eventTimeStart}</span>
                            <span class="event__date">Fin <br>{$val.eventDateEnd} <br>{$val.eventTimeEnd} </span>
                        </div>
                    </div>
                </section> 
            {/foreach}    
        </div>
        <section class="astuce__fb">
            <p>Plein d'autres astuce sur notre page Facebook</p>
            <a href="#"><img src="{base_url()}assets/img/facebook.svg" alt="Facebook"></a>
        </section>

    {include file="footer.tpl"}

