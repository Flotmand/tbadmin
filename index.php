<?php require 'header.php'; ?>
        <div class="container bgcWhite">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <h1 id="h1Greeting">Index</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
            </div>

        </div>
        <script>
        $.ajax({
            method: "GET",
            url: "http://pba.tese.dk/api/user",
            data: {
                id: getCookie("userId")
            }
        }).done(function (obj) {
                console.log(obj);
                $("#h1Greeting").text("Velkommen " + obj.first_name);

            });
        </script>
 <?php require 'footer.php'; ?>
