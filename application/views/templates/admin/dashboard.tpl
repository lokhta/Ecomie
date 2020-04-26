    <!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{base_url()}assets/css/style.css">
        <link rel="shortcut icon" type="image/png" href="{base_url()}assets/img/5151logo_fleur.ico" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>{$title}</title>
        <script src="https://kit.fontawesome.com/cefffb285d.js" crossorigin="anonymous"></script>
        <script src="{base_url()}assets/js/ckeditor/ckeditor.js"></script>
    </head>

    <body>
        <div id="main_content">
            <header>
                <div class="headerLogo headerAdmin">
                    <div>
                        {if $smarty.session.id}
                            <a href="{base_url()}users/profil">{$smarty.session.firstname}</a><span>/</span><a href="{base_url()}users/logout">Deconnexion</a>
                            {else}
                                <a href="{base_url()}pages/inscription">Inscription</a><span>/</span><a href="{base_url()}pages/connexion">Connexion</a>       
                        {/if}
                    </div>
                </div>
            </header>
            <main id="adminContent">
                {include file="admin/sidebare.tpl"}
                <section class="right_content">
                    {include file=$page}
                </section>
            </main>
            <footer>
            </footer>
        </div>
        <script src="{base_url()}assets/js/script.js"></script>
        {if $url == "Articles/dashboard" || $url == "Events/dashboard"}
            {$script_ckeditor}
        {/if}
    </body>
</html>