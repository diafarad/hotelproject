<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classe</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/Semantic-UI-CSS-master/semantic.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/DataTables/DataTables-1.10.20/css/dataTables.semanticui.min.css"/>
    <script src="<?php echo base_url(); ?>public/js/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url(); ?>public/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>public/jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>public/DataTables/DataTables-1.10.20/js/dataTables.semanticui.min.js"></script>
    <script src="<?php echo base_url(); ?>public/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "language": {
                    "lengthMenu": "Afficher _MENU_ lignes",
                    "zeroRecords": "Pas de correspondance",
                    "info": "Page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun enregistrement disponible",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "Suiv.",
                        "previous":   "Préc."
                    },
                    "search":         "Rechercher:"
                },
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Tout"]]
            } );
        } );
    </script>
    <style>
        .ui.stackable.grid{
            margin-left: 15px !important;
        }
    </style>
</head>
<body>

<div class="container" style="margin-top: 50px; max-width: 750px">
    <div class="panel panel-info ">
        <div class="panel-heading" align="center">Classes</div>
        <div class="panel-body">
            <table id="example" class="ui celled table" style="width:100%; padding-left: auto; ">
                <thead>
                <tr>
                    <th style='text-align:center;'>Libellé</th>
                    <th style='text-align:center;'>Niveau</th>
                    <th style="text-align: center">Action </th>
                    <th style="text-align: center">Action </th>
                </tr>
                </thead>
                <tbody>
                <?php

                while($result=mysqli_fetch_row($classes))
                {
                    echo "
                            <tr>
                                <td style='text-align:center;'>$result[1]</td>
                                <td style='text-align:center;'>$result[2]</td>
                                <td><center><button type='button' class='btn btn-primary btn-xs add_cours_classe' 
                                        data-toggle='modal' data-target='#myaddModal'
                                        data-id='$result[0]'
                                        data-lib='$result[1]'>
                                        Ajouter
                                    </button></center>
                                </td>
                                <td><center><button type='button' class='btn btn-success btn-xs details_classe' 
                                        data-toggle='modal' data-target='#mydetailModal'
                                        data-id='$result[0]'
                                        data-lib='$result[1]'>
                                        Détails
                                    </button></center>
                                </td>
                            </tr>
                            ";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th style='text-align:center;'>Libellé</th>
                    <th style='text-align:center;'>Niveau</th>
                    <th style="text-align: center">Action </th>
                    <th style="text-align: center">Action </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" align="center">Nouvelle Classe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url(); ?>controller/ClasseController.php">
                    <div class="form-group">
                        <label class="control-label">Libellé</label>
                        <input class="form-control" type="text" name="lib" id="lib" placeholder="Entrer le libellé"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Niveau</label>
                        <input class="form-control" type="text" name="niveau" id="niveau" placeholder="Entrer le niveau"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Montant Inscription</label>
                        <input class="form-control" type="text" name="mont" id="mont" placeholder="Entrer le montant d'inscription"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Série</label>
                        <input class="form-control" type="text" name="serie" id="serie" placeholder="Entrer la série"/>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="valider" value="Ajouter"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mydetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><center> Liste des élèves de la <span id="libcl"></span></center></h4>
            </div>
            <form class="form-inline" style="margin-top: 15px; margin-bottom: 15px">
                <center>
                    <div class="form-group">
                        <label class="sr-only">Année académique</label>
                        <input type="text"  class="form-control" id="annee" placeholder="Entrer l'année académique">
                        <input type="hidden"  class="form-control" id="classeinput" >
                    </div>
                    <button type="submit" class="btn btn-primary" id="lancer" name="lancer">Lancer</button>
                </center>
            </form>
            <center>
                <table id="resultClasse" class="table table-bordered table-striped" style="width:auto;">
                    <thead>
                    <tr>
                        <th style='text-align:center;'>Matricule</th>
                        <th style='text-align:center;'>Prénom-s</th>
                        <th style='text-align:center;'>Nom</th>
                        <th style='text-align:center;'>Date de Naiss</th>
                        <th style="text-align: center">Lieu de Naiss</th>
                        <th style="text-align: center">Genre</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th style='text-align:center;'>Matricule</th>
                        <th style='text-align:center;'>Prénom-s</th>
                        <th style='text-align:center;'>Nom</th>
                        <th style='text-align:center;'>Date de Naiss</th>
                        <th style="text-align: center">Lieu de Naiss</th>
                        <th style="text-align: center">Genre </th>
                    </tr>
                    </tfoot>
                </table>
            </center>
        </div>
    </div>
</div>

<script>

    $(document).on( "click", '.details_classe',function(e) {
        var id = $(this).data('id');
        $('#classeinput').val(id);
        var lib = $(this).data('lib');
        $("#libcl").text(lib);
        $('#annee').val('');
        $('#resultClasse > tbody').empty();
        $.ajax({
            url: "<?php echo base_url();?>controller/ClasseController.php?classe_id="+id,
            dataType: "text",
            success: function (data) {
                $('#resultClasse > tbody').empty();
                if(data){
                    $('#resultClasse').append(data);
                }
                else {
                    $('#resultClasse').append("<tr><td colspan='6'><center>Pas de résultat disponible !</center></td></tr>");
                }
            },
            error: function (e) {
                showModalDialog("PAS BON");
            }
        });
    });

    $(document).ready(function () {
        $('#lancer').click(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>controller/ClasseController.php",
                method: "POST",
                data: {
                    annee : $('#annee').val(),
                    classe : $('#classeinput').val()
                },
                dataType: "text",
                success: function(data) {
                    //alert(data);
                    $('#resultClasse > tbody').empty();
                    if(data){
                        $('#resultClasse').append(data);
                    }
                    else {
                        $('#resultClasse').append("<tr><td colspan='6'><center>Pas de résultat disponible !</center></td></tr>");
                    }
                },
                error: function (e) {
                    $('#action_alert').html('<center><div class="alert alert-danger"> Une petite erreur est survenue</div></center>');
                    $('#action_alert').dialog();
                }
            });
        });
    });

</script>


</body>
</html>
