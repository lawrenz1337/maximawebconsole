<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top navbar-fixed-top">
    <a class="navbar-brand" href="{$_modx->config.site_url}">Maxima Web</a>
    <div class="pull-right">
        {set $logged = $_modx->runSnippet('!isAuth')}
        {if $logged}
            [[!Login]]
        {/if}
    </div>
</nav>