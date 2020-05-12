{include file="header.tpl" title="Ecomie - Galerie" name=$Name}


<div id="content_gallery" name="slide">
<h2> {$galerieDetail[0]["eventName"]} </h2>
    <div id="gallery"></div>
    <div id="btn_content">
        <button id="prev"><i class="fas fa-caret-square-left"></i></button>
        <button id ="next"><i class="fas fa-caret-square-right"></i></button>
    </div>
    </div>
    {include file="footer.tpl"}
</div>

<script>

    $(document).ready(function(){

        let image = {$images|json_encode};
        gallery(image);
    })

</script>

