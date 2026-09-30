<html>
    <head>
        <title>test</title>
        <style>
            .container
            {
                padding:10px;
            }

            #top-nav{
                background-color: #1c64b6;
                padding: 14px 50px;
                border-radius: 10px;
                margin-bottom: 10px;
                text-align: center;

                img{
                    height: 100px;
                    width: auto;
                }

            }


            #body
            {
                margin:50px 0;
                padding: 0 20px;
            }

            #footer
            {
                background-color: #1c64b6;
                text-align: center;
                padding: 50px;

                img{
                    height: 100px;
                    width: auto;
                }

            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="top-nav">
                <img src="{{asset('img/logos/horizontal/Logo-Codec-horizontal-light.png')}}" alt="">
            </div>

            <div id="body">
                {{$slot}}
            </div>

            <div id="footer">
                <div class="">
                    <img src="{{asset('img/logos/vertical/Logo-Codec-light.png')}}" alt="">
                </div>
                <div>

                </div>
            </div>
        </div>
    </body>
</html>
