<!doctype html>
<html lang="en">
<head>
    <title>[[*pagetitle]] - [[++site_name]]</title>
    <base href="[[!++site_url]]"/>
    <meta charset="[[++modx_charset]]"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/css/tether.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/theme/css/bootstrap.min.css">
    <style>
        body{
            padding-top: 4em;
        }
        #output {
            font-weight: bold;
            font-size: large;
        }
        .loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .main-wrapper {
            height: 100vh;
            padding-left: 0px;
            padding-right: 0px;
        }
        .section {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .landing {
            background-image: url("https://img3.goodfon.com/original/1366x768/1/60/blackboard-mathematics-algebra.jpg");
            background-color: #17234E;
            margin-bottom: 0;
            background-repeat: no-repeat;
            background-position: center;
            -webkit-background-size: cover;
            background-size: cover;
            width: 100%;
        }
        .introtext {
            padding-top: 20%;
        }
        .introtext button {
           font-size: 5.9vw;
        }
    </style>
</head>
<body>