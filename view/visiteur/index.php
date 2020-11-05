<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visiteurs</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/Semantic-UI-CSS-master/semantic.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/DataTables/DataTables-1.10.20/css/dataTables.semanticui.min.css"/>
    <script src="<?php echo base_url(); ?>public/js/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-3.4.0.min.js"></script>
    <script src="<?php echo base_url(); ?>public/jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>public/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
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

<div class="container" style="margin-top: 50px">
    <div class="panel panel-info ">
        <div id="action_alert_add_chambre" title="Message"></div>
        <div class="panel-heading" align="center">Visiteurs du jour</div>
        <div class="panel-body">
            <button type="button" style="margin-bottom: 5px;" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal" data-whatever="@mdo">Ajouter
            </button>
            <table id="example" class="ui celled table" style="width:100%; padding-left: auto; ">
                <thead>
                <tr>
                    <th style='text-align:center;'>Identifiant</th>
                    <th style='text-align:center;'>N° chambre</th>
                    <th style='text-align:center;'>Type séjour</th>
                    <th style='text-align:center;'>Heure d'arrivée</th>
                    <th style='text-align:center;'>Plat</th>
                    <th style='text-align:center;'>Repas</th>
                    <th style='text-align:center;'>Heure repas</th>
                    <th style="text-align: center">Action </th>
                    <th style="text-align: center">Action </th>
                </tr>
                </thead>
                <tbody>
                    <?php

                    while($result=mysqli_fetch_row($chambres))
                    {
                        $col = 'text-align:center;';
                        if ($result[3]=='Occupée'){
                            $col = 'text-align:center; background: #f17421; color:#fff';
                        }
                        echo "
                            <tr>
                                <td style='text-align:center;'>$result[0]</td>
                                <td style='text-align:center;'>$result[1]</td>
                                <td style='text-align:center;'>$result[2]</td>
                                <td style='$col'>$result[3]</td>
                                <td style='text-align:center;'>Yassa</td>
                                <td style='text-align:center;'>Non servi</td>
                                <td style='text-align:center;'>14h30</td>
                                <td><center><button type='button' class='btn btn-warning btn-xs edit_button' 
                                        data-toggle='modal' data-target='#myeditModal'
                                        data-typecham='$result[1]'
                                        data-typelit='$result[2]'
                                        data-statut='$result[3]'
                                        data-num='$result[0]'>
                                        Éditer
                                    </button>
                                    </center>
                                </td> 
                                <td><center><button type='button' class='btn btn-danger btn-xs del_button' 
                                        data-toggle='modal' data-target='#mydelModal'
                                        data-num='$result[0]'>
                                        Supprimer
                                    </button>
                                    </center>
                                </td> 
                            </tr>
                            ";
                    }
                    ?>
                </tbody>
                <tfoot>
                <tr>
                    <th style='text-align:center;'>Identifiant</th>
                    <th style='text-align:center;'>Chambre</th>
                    <th style='text-align:center;'>Type séjour</th>
                    <th style='text-align:center;'>Heure d'arrivée</th>
                    <th style='text-align:center;'>Plat</th>
                    <th style='text-align:center;'>Repas</th>
                    <th style='text-align:center;'>Heure repas</th>
                    <th style="text-align: center">Action</th>
                    <th style="text-align: center">Action</th>
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
                <h4 class="modal-title" id="exampleModalLabel" align="center">Nouvelle Chambre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_addchambre">
                    <div class="form-group">
                        <label class="control-label">Numéro chambre</label>
                        <input class="form-control" type="number" name="numc" id="numc" placeholder="Entrer le numéro de la chambre"/>
                        <span id="err_num" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Type chambre</label>
                        <select class="form-control" id="typechambre" name="typechambre">
                            <option selected disabled>Sélectionner le type de la chambre</option>
                            <option value="Climatisée"> Climatisée </option>
                            <option value="Ventilo"> Ventilo </option>
                        </select>
                        <span id="err_typechambre" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Type lit</label>
                        <select class="form-control" id="typelit" name="typelit">
                            <option selected disabled>Sélectionner le type de lit</option>
                            <option value="Double"> Double </option>
                            <option value="Simple"> Simple </option>
                        </select>
                        <span id="err_typelit" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success" id="valideraddchambre" name="valideraddchambre">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit button -->
<div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Édition classe</h4>
            </div>
            <form method="post" action="<?php echo base_url(); ?>controller/ClasseController.php">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control classe_id" type="hidden" name="id" required>
                        <label class="control-label">Libellé</label>
                        <input class="form-control classe_libelle" name="libelle" placeholder="Entrer le libellé" required>
                    </div>
                    <div class="form-group">
                        <label for="heading">Niveau</label>
                        <input class="form-control classe_niveau" type="text" name="niveau" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Montant Inscription</label>
                        <input class="form-control classe_montantIns" type="text" name="montantIns" placeholder="Entrer le montant d'inscrption" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Série</label>
                        <input class="form-control classe_serie" name="serie" placeholder="Entrer la serie" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="enregistrer">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal for Edit button -->

<div class="modal fade" id="mydelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Suppression classe</h4>
            </div>
            <form method="post" action="<?php echo base_url(); ?>controller/ClasseController.php">
                <div class="modal-body">
                    <div class="form-group">
                        <h3>Voulez-vous vraiment supprimer?</h3>
                        <input class="form-control del_id" type="hidden" name="id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning" name="supprimer">Confirmer</button>
                </div>
            </form>
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
    $(document).on( "click", '.edit_button',function(e) {
        var id = $(this).data('id');
        var lib = $(this).data('libelle');
        var niveau = $(this).data('niveau');
        var montantIns = $(this).data('montantins');
        var serie = $(this).data('serie');

        $(".classe_id").val(id);
        $(".classe_libelle").val(lib);
        $(".classe_montantIns").val(montantIns);
        $(".classe_niveau").val(niveau);
        $(".classe_serie").val(serie);
        //tinyMCE.get('business_skill_content').setContent(content);
    });

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

    $(document).on( "click", '.del_button',function(e) {
        var id = $(this).data('id');

        $(".del_id").val(id);
    });


    $('#valideraddchambre').click(function () {
        //event.preventDefault();
        var err_num = '';
        var err_typecham = '';
        var err_typelit  = '';
        var num = '';
        var typecham = '';
        var typelit = '';

        if($('#numc').val() == ''){
            err_num = 'Saisir le numéro de la chambre';
            $('#err_num').text(err_num);
            $('#numc').css('border-color', '#cc0000');
            num = '';
        }else {
            err_num = '';
            $('#err_num').text(err_num);
            $('#numc').css('border-color', '');
            num = $('#numc').val();
        }
        if($('#typechambre').val() == ''){
            err_typecham = 'Sélectionner le type de la chambre';
            $('#err_typechambre').text(err_typecham);
            $('#typechambre').css('border-color', '#cc0000');
            typecham = '';
        }else {
            err_typecham = '';
            $('#err_typechambre').text(err_typecham);
            $('#typechambre').css('border-color', '');
            typecham = $('#typechambre').val();
        }
        if($('#typelit').val() == ''){
            err_typelit= 'Sélectionner le type de lit de la chambre';
            $('#err_typelit').text(err_typelit);
            $('#typelit').css('border-color', '#cc0000');
            typelit = '';
        }else {
            err_typelit = '';
            $('#err_typelit').text(err_typelit);
            $('#err_typelit').css('border-color', '');
            typelit = $('#typelit').val();
        }

        if(err_num != '' || err_typecham != '' || err_typelit != ''){
            return false;
        }else {
            var form_data = $('#form_addchambre').serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>controller/ChambreController.php",
                method: "POST",
                data: form_data,
                dataType: "text",
                success: function(data) {
                    $('#exampleModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('#action_alert_add_chambre').html('<center><div class="alert alert-success"> Chambre ajoutée</div></center>');
                    $('#action_alert_add_chambre').dialog({
                        modal: true,
                        open: function(event, ui){
                            setTimeout("$('#action_alert_add_chambre').dialog('close')",3000);
                        }
                    });
                },
                error: function (e) {
                    $('#action_alert_add_chambre').html('<center><div class="alert alert-danger"> Une petite erreur est survenue</div></center>');
                    $('#action_alert_add_chambre').dialog({
                        modal: true,
                        open: function(event, ui){
                            setTimeout("$('#action_alert_add_chambre').dialog('close')",3000);
                        }
                    });
                }
            });
        }

    });

</script>


</body>
</html>
