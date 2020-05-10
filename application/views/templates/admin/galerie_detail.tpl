
<h1> {$galerieDetail[0]["eventName"]} <h2>

<div id="content_gallery" name="slide">
    <div id="gallery"></div>
    {if $galerieDetail|@count > 1}
        <div id="btn_content">
            <button id="prev"><i class="fas fa-caret-square-left"></i></button>
            <button id ="next"><i class="fas fa-caret-square-right"></i></i></button>
        </div>
    {/if}
    </div>

</div>

<script>

    $(document).ready(function(){

        let image = {$images|json_encode};
        gallery(image);
    })

</script>
