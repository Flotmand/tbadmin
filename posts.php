<?php require 'header.php'; ?>

        <div class="container bgcWhite" id="putHere">
          <h1>Opslag</h1>
            <div class="row" id="newFAQ">
                <div class="col-md-12">
                    <h3>Tilføj nyt opslag</h3>
                     <form>
                        <div class="form-group">
                            <label for="post">Besked:</label>
                            <textarea type="post" class="form-control" id="post"></textarea>
                        </div>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <!-- TODO 27/11 Nåede her til og bryggede på fil-input'et -->
                            <span class="btn btn-default btn-file"><span>Vælg fil</span><input type="image" /></span>
                            <span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span>
                        </div>
                        <button type="submit" class="btn btn-default">Tilføj</button>
                    </form>
                </div>
                <br>
                <br>
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

          var users = [];
          $.ajax({
              async: true,
              method: "GET",
              url: "http://pba.tese.dk/api/user"
          }).done(function (obj) {
              var i;
              for ( i = 0; i < obj.length; i++) {
                  users.push(obj[i]);
              }
          });

            var posts = [];
            $.ajax({
                async: true,
                method: "GET",
                url: "http://pba.tese.dk/api/posts"
            }).done(function (obj) {
                    //console.log(obj);

                    var i;
                    for ( i = 0; i < obj.length; i++) {
                        posts.push(obj[i]);
                    }

                });


                $( document ).ajaxComplete(function( event, xhr, settings ) {
                    console.log("Teams: " + teams);
                    console.log("Users: " + users);
                    console.log("Posts: " + posts);
                    var i;
                    var x = 1;
                    var rowIntro;
                    var rowOutro;
                    var out = "";
                    for ( i = 0; i < posts.length; i++) {
                        //console.log(obj[i].question);
                        var teamName;

                        var x;
                        for (x = 0; x < teams.length; x++) {
                            if ( teams[x].id == posts[i].team_id ) {
                                teamName = teams[x].title;
                            }
                        }

                        var userName;
                        var y;
                        for (y = 0; y < teams.length; y++) {
                            if ( users[y].id == posts[i].user_id ) {
                                userName = users[y].first_name + ' ' + users[y].last_name;
                            }
                        }

                        out += '<div class="row"><div class="col-md-12"><div class="jumbotron" id="' + posts[i].id + '"><h4>Hold: ' + teamName +'</h4><h4>Skrevet af: ' + userName +'</h4><p>' + posts[i].description + '</p>';

                        if ( jQuery.isEmptyObject(posts[i].image) == false ) {
                            out += '<img class="postImage" src="' + posts[i].image + '" width="100%" />';
                        }

                        out += '</div></div></div>';


                    }

                    $("#putHere").append(out);
                });

        </script>

<?php require 'footer.php'; ?>
