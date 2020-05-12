{include file="header.tpl" title="Ecomie - Galerie" name=$Name}

<div id="list_gallery">

  {foreach from=$galerie item=val key=key name=name}
      <div>
          <a href="{base_url()}Galeries/galeries?event_id={$val.imgEvent}"><img src="{base_url()}assets/img/upload/{$val.imgName}" alt="{$val.imgAlt}" style="width: 300px"></a>
          <h2>{$val.eventName}</h2>
      </div>
  {/foreach}
</div>
{include file="footer.tpl"}