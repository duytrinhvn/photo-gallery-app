<html>
    <head>
        <title>Photo gallery</title>
        <style>
            h1, h5, p {
                color: #514F43;
            }
            .title{
                padding-top: 2%;
                text-align: center;
            }
            .container-fluid {
                background-color: #EFEDDE;  
                padding-bottom: 4%;
                height: 100%;
            }
            .inner-container {
                margin-top: 4%;
                background-color: #E3DFC4;
                border-radius: 3%;
            }
            .card {
                background-color: #8D8A76;  
                margin-right: 4%;
            }
            .card-body {
                background-color: #8D8A76;
                text-align: center;
            }
            .row {
                padding-left: 5%; 
                padding-right: 5%; 
                padding-top: 5%; 
                padding-bottom: 5%;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">
            <h1 class="title">Photo gallery</h1>
            <div class="inner-container">

                <div class="row">
                    <div class="card col-sm" style="padding-right: 0; padding-left: 0">
                        <a href="#">
                            <img src="./photos/d1/BaseBallPark_001.jpg" class="card-img-top img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Gallery #1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </a>
                    </div>

                    <div class="card col-sm" style="padding-right: 0; padding-left: 0">
                        <a href="#">
                            <img src="./photos/d1/BaseBallPark_001.jpg" class="card-img-top img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Gallery #1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </a>
                    </div>

                    <div class="card col-sm" style="padding-right: 0; padding-left: 0">
                        <a href="#">
                            <img src="./photos/d1/BaseBallPark_001.jpg" class="card-img-top img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Gallery #1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>   
    </body>
</html>