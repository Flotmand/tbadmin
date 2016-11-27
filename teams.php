<?php require 'header.php'; ?>

        <div class="container bgcWhite" id="putHere">
            <div class="row">
                <div class="col-md-12">
                    <h3>Tilføj nyt hold</h3>
                     <form>
                        <div class="form-group">
                            <label for="title">Titel:</label>
                            <input type="title" class="form-control" id="editTitle">

                            <label for="description">Beskrivelse:</label>
                            <textarea type="description" class="form-control" id="editDescription"></textarea>
                            <input type="hidden" id="teamId">
                        </div>
                        <button type="button" class="btn btn-default" id="addEditBtn">Tilføj</button>
                    </form>
                </div>
                <br>
                <br>
            </div>
        </div>

        <script>
            var teamsObj = [];
            $.ajax({
                method: "GET",
                url: "http://pba.tese.dk/api/team"
            }).done(function (obj) {
                    //console.log(obj);
                    var i;
                    var x = 1;
                    var rowIntro;
                    var rowOutro;
                    var out = "";
                    for ( i = 0; i < obj.length; i++) {
                        teamsObj.push(obj[i]);
                        //console.log(obj[i].question);
                          // var x skal hjælpe med at holde styr på hvornår der laves en ny row
                        if ( x == 1) {
                          out += '<div class="row">';
                        }

                        out += '<div class="col-md-6"><div class="jumbotron"><h3>' + obj[i].title + '</h3><p>' + obj[i].description + '</p><button type="submit" class="btn btn-default editBtn" id="' + obj[i].id + '">Rediger</button></div></div>';

                        if ( x == 2 || jQuery.isEmptyObject(obj[i+1]) == true) {
                          out += '</div>';
                          x = 1;
                        }
                        else {
                          x = 2;
                        }
                    }

                    $("#putHere").append(out);
                });


                $(document).ready(function() {

               });

               $( document ).ajaxComplete(function( event, xhr, settings ) {

                    // When a button is clicked
                   $(".editBtn").click(function() {
                       var y;
                       for ( y = 0; y < teamsObj.length; y++ ) {
                          if ( teamsObj[y].id == $(this).attr("id") ) {
                              $("#editTitle").val(teamsObj[y].title);
                              $("#editDescription").val(teamsObj[y].description);
                              $("#teamId").val(teamsObj[y].id);
                          }
                       }
                   });

                   $("#addEditBtn").click(function() {
                          // Hvis der ikke findes et teamId så skal der oprettes et nyt hold
                        if ( jQuery.isEmptyObject($("#teamId").val()) ) {
                            // TODO Data til at oprette nye hold er klar her
                            console.log($("#editTitle").val());
                            console.log($("#editDescription").val());
                            console.log("Tomt id: " + $("#teamId").val());
                              // TODO Når data er sendt til API'en skal siden genindlæses så holdene opdateres.
                              // Kunne også gøre ved kun at opdatere dét egentlige hold, men det tager længere tid at kode.
                            location.reload();
                        } else {
                            // TODO Data til at redigere databasen er nu klar her
                            console.log($("#editTitle").val());
                            console.log($("#editDescription").val());
                            console.log($("#teamId").val());
                              // TODO Når data er sendt til API'en skal siden genindlæses så holdene opdateres.
                              // Kunne også gøre ved kun at opdatere dét egentlige hold, men det tager længere tid at kode.
                            location.reload();
                        }




                   });
               });



            </script>

<?php require 'footer.php'; ?>
