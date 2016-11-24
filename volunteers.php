<?php require 'header.php'; ?>
        <div class="container bgcWhite">
            <h2>Ny</h2>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        <label><input type="checkbox" value="">  Vælg alle</label>
                    </th>
                    <th>Navn</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Fødselsdag</th>
                    <th>Hold</th>
                    <th>Admin</th>
                    <th>Aktiv</th>
                </tr>
                </thead>
                <tbody id="demo" class="collapse">
                <tr>
                    <td>
                        <div class="checkbox">
                            <label><input type="checkbox" value=""></label>
                        </div>
                    </td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>22-07-1986</td>
                    <td>
                        <div class="form-group form-group-sm">
                            
                            <select class="form-control" id="sel1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <button data-toggle="collapse" data-target="#demo">Collapsible</button>

        </div>
 <?php require 'footer.php'; ?>

