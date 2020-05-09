{include file="header.tpl" title="Ecomie - Galerie" name=$Name}

<div id="modal">
        
            <div class="btn-content">
                <a href="{base_url()}Galeries/galeries" class="btn">Retour</a>
            </div>
         <div class='galerie'>
         {var_dump($galerieDetail)}
            {foreach from=$galerieDetail item=val key=key}
                <div class='galerie__container'>
                    <p>{$val.imgAlt}</p>
                    <img src="{$val.imgUrl}" alt="{$val.imgAlt}">
                </div>
            {/foreach}
        </div>

{include file="footer.tpl"}