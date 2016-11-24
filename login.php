<!DOCTYPE html>
    <head>
        <title>Tinderbox 2017 login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="styles.css">


        

    </head>
    <body>

        <div class="container bgcWhite">
            <div class="row"> 
                <div class="col-md-6 col-md-offset-3">
                    <img src="./images/logo.png" width="100%" style=" margin-top: 40px; " /> 
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1>Login</h1>
                </div>
            </div>
            <form method="post" action="./index.php">
                <div class="col-md-6 col-md-offset-3" style="margin-bottom: 40px;">
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="EMAIL">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="KODEORD">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Husk mig</label>
                    </div>
                    
                    <a data-toggle="modal" data-target="#myModal"> Glemt kodeord </a>
                    </br>
                    <button type="submit" class="btn btn-default">LOGIN</button>
                </div>
            </form>
            <div id="id01">
            
            </div>
        </div>

        

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Gendan kodeord</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <span class="help-block">Skriv din emailadresse og du vil modtage en email med link til at lave et nyt kodeord</span>
                                <input type="email" class="form-control" id="email" placeholder="EMAIL">
                                
                            </div>
                            <button type="submit" class="btn btn-default">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
         <script>
            $.ajax({
                method: "POST",
                url: "http://pba.tese.dk/api/user/login",
                data: {
                    email: "a@a.dk",
                    password: "123456"
                }
            }).done(function (obj) {
                        console.log(obj.first_name);
                    });
        </script>

       
    </body>
</html>

