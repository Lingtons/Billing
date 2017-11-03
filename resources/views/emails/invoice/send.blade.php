<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .message {
                margin-bottom: 10px;
                padding: 20px;
                font-size: 16px;
                font-weight: 300;
                color:#000;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            <div class="content">
                <div class="m-b-md">
                    <h2>GWU Global Management Ltd</h2>
                </div>

            </div>
        </div>
        <div class="message">
                    <h4>Dear <span style="color:blue;">{!!$user->name!!}</span>,</h4>

                    <b>LPG Bill for the month of November, Kindly find the attached document.</b>
                    <br>
                    <b>Statement date : {!!$setting->statement_date->toFormattedDateString()!!}</b>

                </div>
    </body>
</html>


