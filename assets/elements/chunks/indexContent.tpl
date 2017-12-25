<main class="container-fluid main-wrapper">
    <div class="section landing">
        <div class="col-lg-12 introtext text-center">
            <button id="welcome" type="button" class="btn btn-primary btn-lg">Welcome to Maxima Web</button>
        </div>
    </div>
    <div class="section">
        <div class="col-lg-12">
            {set $logged = $_modx->runSnippet('!isAuth')}
            {if $logged}
                <div class="loader"></div>
                <div class="jumbotron default">
                    <form id="input" class="form-horizontal" action="#" style="border-bottom: 1px solid #ccc;">
                        <fieldset>
                            <legend>Maxima Web Console</legend>
                            <div class="form-group">
                                <label for="exampleTextarea">Enter commands below</label>
                                <textarea style="height: 100px;font-size: large;" class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit request</button>
                                <button id="example" type="button" class="btn btn-primary">Example</button>
                            </div>
                        </fieldset>
                    </form>

                    <pre class="col-lg-12" id="output" style="padding-top: 5%">
<i style="color: lightgray;">Output will be here</i>
                    </pre>
                </div>
            {else}
                {$_modx->sendRedirect($_modx->makeUrl(2))}
            {/if}
        </div>
    </div>
</main>
