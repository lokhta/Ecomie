    <!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{base_url()}assets/css/style.css">
        <link rel="shortcut icon" type="image/png" href="{base_url()}assets/img/5151logo_fleur.ico" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>{$title}</title>
        <script src="https://kit.fontawesome.com/cefffb285d.js" crossorigin="anonymous"></script>
        <script src="{base_url()}assets/js/ckeditor/ckeditor.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
        <script>
            var session_id = "{$smarty.session.id}";
        </script>
    </head>

    <body>
        <div id="main_content">
            <header>
                <div class="headerLogo headerAdmin" id="headerAdmin">
                    {if $smarty.session.role == 1}
                        <a href="{base_url()}documentation/index.html">Accéder à la documentation technique</a>
                    {/if}
                    
                    <div id="link_headerAdmin">
                        <div>
                            <a href="{base_url()}"> Retourner à Ecomie / </a>
                        </div>
                        <div>
                            {if $smarty.session.id}
                                <a href="{base_url()}users/profil">{$smarty.session.firstname}</a><span>/</span><a href="{base_url()}users/logout">Deconnexion</a>
                                {else}
                                    <a href="{base_url()}pages/inscription">Inscription</a><span>/</span><a href="{base_url()}pages/connexion">Connexion</a>       
                            {/if}
                        </div>
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
        {if in_array($url, array("Articles/dashboard", "Newsletters/dashboard", "Events/dashboard", "Galeries/dashboard"))}
            {$script_ckeditor}
        {/if}
    </body>
</html>