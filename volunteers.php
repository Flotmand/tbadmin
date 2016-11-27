<?php require 'header.php'; ?>
        <div class="container bgcWhite">
            <div class="table-responsive">
                <div id="newVolunteers">
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
                    <button type="button" data-toggle="collapse" data-target="#newUsers" id="newBtn">Åben</button>
                </div>
                <div id="activeVolunteers">
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
                    <button type="button" data-toggle="collapse" data-target="#activeUsers" id="activeBtn" class="btn btn-default">Åben</button>
                </div>
                <div id="admins">
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
                    <button type="button" data-toggle="collapse" data-target="#administrator" id="adminBtn" class="btn btn-default">Åben</button>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <h2>Sæt valgte frivillige på et hold</h2>
                      <select class="form-control" id="team">
                      </select>
                      <button type="button" id="saveTeamstoUsersBtn" class="btn btn-default" class="btn btn-default">Gem</button>
                  </div>
              </div>
            </div>

        </div>


        <script>




          // CALL TO GET THE TEAM DATA
        var teams = [];
        $.ajax({
            async: true,
            method: "GET",
            url: "http://pba.tese.dk/api/team"
        }).done(function (obj) {
            var i;
            for ( i = 0; i < obj.length; i++) {
                  // var teams is being used i the "user"-call
                teams.push(obj[i]);

                  // Creates the <select>-box in the bottom of the page
                var optionsOut = '<option value="' + obj[i].id + '">' + obj[i].title + '</option>';
                $("#team").append(optionsOut);
            }
        });
            // THE CALL TO GET THE USER DATA
          $.ajax({
              //async: false,
              method: "GET",
              url: "http://pba.tese.dk/api/user"
          }).done(function (obj) {
                var i;

                var countNewUsers = 0;
                var countActiveUsers = 0;
                var countAdmins = 0;

                for ( i = 0; i < obj.length; i++) {
                    var out = "";

                    out += '<tr><td><div class="checkbox"><label><input type="checkbox" name="userId" value="'+ obj[i].id +'"></label></div></td></td><td>' + obj[i].first_name + ' ' + obj[i].last_name +'</td><td>' + obj[i].mobile + '</td><td>' + obj[i].email + '</td><td>' + obj[i].dob + '</td>';

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
                            countAdmins++;
                        } else if ( obj[i].admin == 0 && obj[i].activated == 1 ) {
                            $("#activeUsers").append(out);
                            countActiveUsers++;
                        }
                    } else {
                        out += '</tr>';
                        $("#newUsers").append(out);
                        countNewUsers++;
                    }
                }


                if ( countNewUsers == 0 ) {
                    $("#newVolunteers").remove();
                } else {
                    $("#newUsers").toggleClass('in');
                  }

                if ( countActiveUsers == 0 ) {
                    $("#activeVolunteers").remove();
                } else if ( countNewUsers == 0) {
                    $("#activeUsers").toggleClass('in');
                  }

                if ( countAdmins == 0 ) {
                    $("#admins").remove();
                } else if ( countNewUsers == 0 && countActiveUsers == 0 ) {
                  $("#administrator").toggleClass('in');
                }
            });

            $(document).ready(function(){
                // NOTE Three identical functions that check if a tablebody is open or closed and changes the button text accordingly
                $('#adminBtn').click(function () {
                    var $this = $(this);
                    if($('#administrator').hasClass('in')){
                        $this.text('Åben');
                    } else {
                        $this.text('Luk');
                    }
                });

                $('#activeBtn').click(function () {
                    var $this = $(this);
                    if($('#activeUsers').hasClass('in')){
                        $this.text('Åben');
                    } else {
                        $this.text('Luk');
                    }
                });

                $('#newBtn').click(function () {
                  var $this = $(this);
                  if($('#newUsers').hasClass('in')){
                      $this.text('Åben');
                  } else {
                      $this.text('Luk');
                  }
                });

                /* NOTE Kan ikke få den her til at virke i click-funktioner
                function openCloseBtn( btnId, divCollapse ) {
                    var btn = $(btnId);

                    if ( $(divCollapse).hasClass('in')) {
                        btn.text('Åben');
                        console.log("Hej lars");
                    } else {
                        btn.text('Luk');
                    }
                } */
            });



              // the functions in here only runs when a ajax-call to the specified url is complete
            $( document ).ajaxComplete(function( event, xhr, settings ) {

                  // Creates an array with selected users ID's
                var selectedUsers = new Array();
                  // When a change is registred to a checkbox the selected userId is puched to the array
                $(":checkbox").change(function(){
                      // Check if the checkbox is checked or unchecked and either adds or removed the userId from the array
                    if ( $(this).is( ":checked" ) ) {
                        selectedUsers.push($(this).val());
                    } else {
                        var index = selectedUsers.indexOf($(this).val());
                        if (index > -1) {
                            selectedUsers.splice(index, 1);
                        }
                    }

                    // NOTE the selected users are here
                    console.log(selectedUsers);

                });

                  // TODO her gemmes hold-id'et.
                  //Kør API kaldet i denne function hvor selectedUsers gemmes sammen med hold-id'et
                  // HUSK at inaktive brugere samtidig skal sætte som aktiv når de sættes på et hold
                $("#saveTeamstoUsersBtn").click(function() {
                    console.log($(team).val());
                })


                if ( settings.url === "http://pba.tese.dk/api/user" ) {
                    if( $('#newUsers').hasClass('in') ){
                        $('#newBtn').text('Luk');
                    }
                    else if ( $('#activeUsers').hasClass('in') ) {
                        $('#activeBtn').text('Luk');
                    }
                    else if ( $('#administrator').hasClass('in') ) {
                        $('#adminBtn').text('Luk');
                    }

                }
            });


        </script>


 <?php require 'footer.php'; ?>
