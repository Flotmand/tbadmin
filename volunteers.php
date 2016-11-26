<?php require 'header.php'; ?>
        <div class="container bgcWhite">
            <h2>Nye frivillige</h2>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Navn</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Fødselsdag</th>
                </tr>
                </thead>
                <tbody id="newUsers" class="collapse">

                </tbody>
            </table>
            <button data-toggle="collapse" data-target="#newUsers">Collapsible</button>


            <h2>Aktive frivillige</h2>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Navn</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Fødselsdag</th>
                    <th>Hold</th>
                </tr>
                </thead>
                <tbody id="activeUsers" class="collapse">

                </tbody>
            </table>
            <button data-toggle="collapse" data-target="#activeUsers">Collapsible</button>

            <h2>Administratorer</h2>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Navn</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Fødselsdag</th>
                    <th>Hold</th>
                </tr>
                </thead>
                <tbody id="administrator" class="collapse">

                </tbody>
            </table>
            <button data-toggle="collapse" data-target="#administrator">Collapsible</button>



        </div>
        <script>

        var lars = [];
        $.ajax({
            async: false,
            method: "GET",
            url: "http://pba.tese.dk/api/team"
        }).done(function (obj) {
            //console.log(obj);

            var i;
            for ( i = 0; i < obj.length; i++) {
                //console.log(obj[i].title);

                lars.push(obj[i]);

                out = '<option>' + obj[i].title + '</option>';

                $(".teamSelect").append(out);
            }
        });

          $.ajax({
              method: "GET",
              url: "http://pba.tese.dk/api/user"
          }).done(function (obj) {
                console.log("lars: " + lars);

                var i;
                for ( i = 0; i < obj.length; i++) {
                    console.log("User: " + obj[i].first_name);

                    var out = "";

                    out += '<tr></td><td>' + obj[i].first_name + ' ' + obj[i].last_name +'</td><td>' + obj[i].mobile + '</td><td>' + obj[i].email + '</td><td>' + obj[i].dob + '</td>' + '<td><div class="form-group form-group-sm"><select class="form-control teamSelect" id="selUser'+ obj[i].id +'"</select></div></td></tr>';
                      // If admin and active
                    if ( obj[i].admin == 1 && obj[i].activated == 1 ) {
                        $("#administrator").append(out);
                    }
                      // If regular user and active
                    else if ( obj[i].admin == 0 && obj[i].activated == 1  ) {
                        $("#activeUsers").append(out);
                    }
                    else {
                        $("#newUsers").append(out);
                    }
                }
            });


              //  out += '<tr></td><td>' + obj[i].first_name + ' ' + obj[i].last_name +'</td><td>' + obj[i].mobile + '</td><td>' + obj[i].email + '</td><td>' + obj[i].dob + '</td>' + '<td><div class="form-group form-group-sm"><select class="form-control teamSelect" id="selUser'+ obj[i].id +'"</select></div></td></tr>';

        </script>


 <?php require 'footer.php'; ?>
