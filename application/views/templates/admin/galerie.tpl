
<div>
    <a href="{base_url()}Galeries/editor">Créer une galerie</a>
</div>
{foreach from=$galerie item=val key=key name=name}
    <div>
        <a href="{base_url()}Galeries/dashboard?event_id={$val.imgEvent}"><img src="{base_url()}assets/img/upload/{$val.imgName}" alt="{$val.imgAlt}" style="width: 500px;"></a>
        <h2>{$val.eventName}</h2>
    </div>
{/foreach}