{include file="header.tpl" title="Ecomie - Galerie" name=$Name}

<div class="btn-content" id="btn-create-art">
    {if $smarty.session.id}
      <a href="{base_url()}Galeries/dashboard" class="btn-event">Créer une galerie</a> 
    {/if}
</div>


<div class='galerie'>
  {foreach from=$galerie item=val key=key}
    <div class='galerie__container'>
         <p>{$val.imgAlt}</p>
              <a href="{base_url()}Galeries/galeries?event_id={$val.imgEvent}">
                <img src="{$val.imgName}" alt="{$val.imgAlt}">
              </a>
        </div>
  {/foreach}
</div>



{include file="footer.tpl"}