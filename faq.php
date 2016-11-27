<?php require 'header.php'; ?>

        <div class="container bgcWhite" id="putHere">
            <div class="row" id="newFAQ">
                <div class="col-md-12">
                    <h3>Tilføj nyt punkt</h3>
                     <form>
                        <div class="form-group">
                            <label for="question">Spørgsmål:</label>
                            <input type="question" class="form-control" id="question">
                        </div>
                        <div class="form-group">
                            <label for="answer">Svar:</label>
                            <textarea type="answer" class="form-control" id="answer"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Tilføj</button>
                    </form>
                </div>
                <br>
                <br>
            </div>
        </div>
    <script>
        $.ajax({
            method: "GET",
            url: "http://pba.tese.dk/api/faq"
        }).done(function (obj) {
                console.log(obj);

                var i;
                var x = 1;
                var rowIntro;
                var rowOutro;
                var out = "";
                for ( i = 0; i < obj.length; i++) {
                    //console.log(obj[i].question);
                      // var x skal hjælpe med at holde styr på hvornår der laves en ny row
                    if ( x == 1) {
                      out += '<div class="row">';
                    }

                    out += '<div class="col-md-6"><div class="jumbotron" id="' + obj[i].id + '"><h3>' + obj[i].question + '</h3><p>' + obj[i].answer + '</p><button type="submit" class="btn btn-default">Rediger</button></div></div>';

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
        </script>

<?php require 'footer.php'; ?>
