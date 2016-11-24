<?php require 'header.php'; ?>
        
        <div class="container bgcWhite">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tilføj nyt hold</h3>
                     <form>
                        <div class="form-group">
                            <label for="title">Titel:</label>
                            <input type="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Beskrivelse:</label>
                            <textarea type="description" class="form-control" id="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Tilføj</button>
                    </form>
                </div>
                <br>
                <br>

                <div class="col-md-6">
                     <div class="jumbotron">
                        <h3>INDSATSPERIODER</h3> 
                        <p>En indsatsperiode er den periode du kan/vil hjælpe Tinderbox.
                        Du kan vælge i mellem 3 forskellige, og skal minimum vælge en af dem.
                        Du kan også vælge flere, og på den måde have større chance og flere muligheder for at komme på et team.OBS: På nogle før/efter teams kan det forekomme, at man skal have en vagt før og en vagt efter. Dette vil der dog blive blive gjort opmærksom på ved valg af de/de teams hvor dette kan forekomme.</p> 
                        <p><strong>Indsatsperioder:</strong>
                        <br>
                        Før Tinderbox
                        <br>
                        Under Tinderbox
                        <br>
                        Efter Tinderbox</p> 
                        <br>
                        <button type="button" class="btn btn-lg btn-default">Rediger</button> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clearfix visible-md-block"></div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>INDSATSTIMER & FORDELING</h3> 
                        <p>Indsatstimer er det antal timer, som du hjælper Tinderbox.
                        <br>
                        <br>
                        Før Tinderbox = ca. 24 timer
                        <br>
                        Under Tinderbox = ca. 16 timer
                        <br>
                        Efter Tinderbox = ca. 24 timer</p>
                        <p>ordelingen af dine indsatstimer pr. vagt defineres af din frivilligkoordinator/teamleder.
                        Forvent, at dine indsatstimer vil blive fordelt på mere end én sammenhængende vagt, med mindre andet aftales med din frivilligkoordinator/teamleder.</p>
                        <br>
                        <button type="button" class="btn btn-lg btn-default">Rediger</button> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>VAGTBYTTE</h3> 
                        <p>Har du behov for at bytte en vagt med en af de andre på dit hold, klik på “vagtbytte”. Kontakt din frivilligkoordinator/teamleder vedrørende spørgsmål omkring bytte af din(e) vagt(er).</p> 
                        <br>
                        <button type="button" class="btn btn-lg btn-default">Rediger</button> 
                    </div>
                </div>
            </div>
        </div>
 
<?php require 'footer.php'; ?>
