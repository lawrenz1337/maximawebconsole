<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top navbar-fixed-top">
    <a class="navbar-brand" href="{$_modx->config.site_url}">Maxima Web</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
    </div>
    <div class="pull-right">
        {set $logged = $_modx->runSnippet('!isAuth')}
        {if $logged}
            [[!Login]]
        {/if}
    </div>
</nav>