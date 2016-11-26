<?php require 'header.php'; ?>
        <div class="container bgcWhite">
            <h2>Nye frivillige</h2>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Vælg</th>
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
                    <th>Vælg</th>
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
                    <th>Vælg</th>
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

        var teams = [];
        $.ajax({
            async: false,
            method: "GET",
            url: "http://pba.tese.dk/api/team"
        }).done(function (obj) {
            //console.log(obj);

            var i;
            for ( i = 0; i < obj.length; i++) {
                //console.log(obj[i].title);

                teams.push(obj[i]);

                out = '<option>' + obj[i].title + '</option>';

                $(".teamSelect").append(out);
            }
        });

          $.ajax({
              method: "GET",
              url: "http://pba.tese.dk/api/user"
          }).done(function (obj) {
                var i;
                for ( i = 0; i < obj.length; i++) {
                    var out = "";

                    out += '<tr><td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td></td><td>' + obj[i].first_name + ' ' + obj[i].last_name +'</td><td>' + obj[i].mobile + '</td><td>' + obj[i].email + '</td><td>' + obj[i].dob + '</td>';

                      // If admin and active OR if regular user and active
                    if ( obj[i].admin == 1 && obj[i].activated == 1 || obj[i].admin == 0 && obj[i].activated == 1 ) {

                          // Loops through the teams
                        var x;
                        for ( x = 0; x < teams.length; x++) {
                              // When the users team_id matches an id from the team-table the team-title is added to the string
                            if ( obj[i].team_id == teams[x].id ) {
                              out += '<td>' + teams[x].title + '</td></tr>';
                            }

                        }

                          // If admin and active
                        if ( obj[i].admin == 1 && obj[i].activated == 1 ) {
                            $("#administrator").append(out);
                        }
                          // If regular user and active
                        else if ( obj[i].admin == 0 && obj[i].activated == 1 ) {
                            $("#activeUsers").append(out);
                        }
                    }
                    else {
                        out += '</tr>';
                        $("#newUsers").append(out);
                    }
                }
            });


              //  out += '<tr></td><td>' + obj[i].first_name + ' ' + obj[i].last_name +'</td><td>' + obj[i].mobile + '</td><td>' + obj[i].email + '</td><td>' + obj[i].dob + '</td>' + '<td><div class="form-group form-group-sm"><select class="form-control teamSelect" id="selUser'+ obj[i].id +'"</select></div></td></tr>';

        </script>


 <?php require 'footer.php'; ?>
