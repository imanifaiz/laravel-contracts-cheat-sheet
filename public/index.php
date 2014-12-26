<?php require '../vendor/autoload.php'; ?><!doctype html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel 5 Contract Reference - Cheat Sheet</title>
    <meta name="description" content="Making the Internet">

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="" rel="shortcut icon">
    <link href="" rel="apple-touch-icon-precomposed">

    <link rel='stylesheet' href="/css/style.css"/>

</head>
<body>

<div class="container">

    <div class="ui stackable grid">
        <div class="four column row">
            <div class="column">
                <div class="ui top search">
                    <div class="ui icon input">
                        <input type="text" placeholder="filter by keyword" class="prompt">
                        <i class="search icon"></i>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="ui toggle checkbox interfaces">
                    <input type="checkbox" name="interfaces" checked>
                    <label>Interfaces</label>
                </div>
<!--                <div class="ui large buttons">-->
<!--                    <div class="ui button toggle-ints">-->
<!--                        <i class="tasks icon"></i> Show Interfaces-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>




    <div class="ui stackable grid">
        <div class="four column row">
            <?php echo (new \LC\Presenters\GroupPresenter())->getHtml('group.twig'); ?>
        </div>
    </div>


</div>

<script src="/js/script.js"></script>
</body>
</html>