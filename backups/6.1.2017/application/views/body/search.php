<div class="content">
    <div style="clear:both;">
        <div style="float:left;width:90%">
            <style>
                .dataTables_wrapper { font-size: 12px }
                .ui-datepicker,#cal_event2 { font-size: 11px !important; }
                .MsoListParagraphCxSpFirst, .MsoListParagraphCxSpMiddle, .MsoListParagraphCxSpLast { margin: 0 0 0 25px; }
            </style>

                <!-- wrapper -->
                <div class="container2" style="">
                    <a href="<?php echo base_url().'index.php/app/logout' ?>">Ausloggen</a>
                    <h2 style="border-bottom: 1px solid #666666; padding-bottom: 10px; background: url(../images/tpl/suchen-icon.png) 0 -5px no-repeat;">Bericht erstellen </h2>

                    <form method="post" name="suchen" id="suchen1" action="" width="100%">
                        <table border="0" cellpadding="2" cellspacing="0" >
                            <tr>
                                <td><b>Firma:</b></td>
                                <td><select name="company" style="width:250px;" class="hersteller">
                                        <option value=""><?php echo convertToUTF8("auswahl"); ?></option>
                                        <!-- Firma list --->
                                        <?php
                                        if(!empty($companies)){
                                            foreach($companies as $company)
                                            {
                                                $id = (int)$company->id;
                                                $name = $company->name;
                                                $option .= "<option value='$id'>$name</option>";
                                            }

                                            echo @$option;
                                        }
                                        ?>
                                        <!-- /Firma list --->

                                    </select>
                                    <br>
                                    <span style="font-size:12px;color:#E13300"><?php echo form_error('company'); ?></span>
                                </td>
                            </tr>

                            <tr>
                                <td><b>Monat:</b></td>
                                <td><select name="month" style="width:250px;" class="hersteller">
                                        <option value=""><?php echo convertToUTF8("auswahl"); ?></option>
                                        <!-- Months list --->
                                        <?php
                                        if(!empty($months)){
                                            $option = "";
                                            foreach($months as $month)
                                            {
                                                $name = $month->name;
                                                $id = $month->id;
                                                $option .= "<option value='$id'>$name</option>";
                                            }

                                            echo @$option;
                                        }
                                        ?>
                                        <!-- /Months list --->

                                    </select><br>
                                    <span style="font-size:12px;color:#E13300"><?php echo form_error('month'); ?></span></td>
                            </tr>
                            <tr>
                                <td><b>Jahr:</b></td>
                                <td><select name="year" style="width:250px;" class="hersteller">
                                        <option value=""><?php echo convertToUTF8("auswahl"); ?></option>
                                        <!-- Year list --->
                                        <?php
                                        for($year = 2015; $year <= 2026; $year++){
                                            echo "<option value='$year'>$year</option>";
                                        }
                                        ?>
                                        <!-- /Year list --->
                                    </select><br>
                                    <span style="font-size:12px;color:#E13300"><?php echo form_error('year'); ?></span></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="save_data" value="Bericht generiere" /> &nbsp; </td>
                            </tr>
                        </table><br />
                    </form>

                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead style="text-align:left">
                        <tr>
                            <th>Datum</th>
                            <th>Firma</th>
                            <th>Berater</th>
                            <th>Kundenname</th>
                            <th>Einzel</th>
                            <th>Familie</th>
                            <th>3P</th>
                            <th>4P</th>
                        </tr>
                        </thead>

                        <tfoot style="text-align:left">
                        <tr>
                            <th>Datum</th>
                            <th>Firma</th>
                            <th>Berater</th>
                            <th>Kundenname</th>
                            <th>Einzel</th>
                            <th>Familie</th>
                            <th>3P</th>
                            <th>4P</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php
                        if(isset($invitations) && !empty($invitations)){

                            foreach($invitations as $invitation){
                                $company = htmlspecialchars($invitation['company']);
                                $consultant = htmlspecialchars($invitation['consultant']);
                                $customer_name = htmlspecialchars($invitation['customer_name']);
                                $single = $invitation['single'];
                                $familie = $invitation['familie'];
                                $personen_3 = $invitation['personen_3'];
                                $personen_4 = $invitation['personen_4'];
                                $date = date("d.m.Y",strtotime($invitation['date_created']));

                                @$singletotal += $single;
                                @$familie_total += $familie;
                                @$personen_3_total += $personen_3;
                                @$personen_4_total += $personen_4;

                                @$count += 1;

                                @$row .= "<tr><td>$date</td><td>$company</td><td>$consultant</td><td>$customer_name</td><td>$single</td>
                                            <td>$familie</td><td>$personen_3</td><td>$personen_4</td></tr>";
                            }

                            echo @$row;

                            if(@$count > 0){
                                @$row = "<tr><td>TOTAL</td><td></td><td></td><td></td><td>$singletotal</td>
                                            <td>$familie_total</td><td>$personen_3_total</td><td>$personen_4_total</td></tr>";

                                echo $row;


                            }

                            //format sum values


                        }
                        ?>
                        </tbody>
                    </table>

                    <input type="hidden" id="single_total" value="<?php echo @$singletotal ?>" />
                    <input type="hidden" id="familie_total" value="<?php echo @$familie_total ?>" />
                    <input type="hidden" id="p3_total" value="<?php echo @$personen_3_total ?>" />
                    <input type="hidden" id="p4_total" value="<?php echo @$personen_4_total ?>" />

                </div>

            </div>

            <script type="text/javascript">
                $(document).ready(function() {

                    var export_title = "Bericht erstellen ";
                    var singleSum = $('#single_total').val();
                    var familieSum = $('#familie_total').val();
                    var p3 = $('#p3_total').val();
                    var p4 = $('#p4_total').val();

                    $('#example').DataTable({
                        dom: 'Bfrtip',
                        "pageLength": 60,
                        buttons: [
                            {
                                extend: 'copy',
                                title: export_title
                            },
                            {
                                extend: 'csv',
                                title: export_title
                            },
                            {
                                extend: 'excel',
                                title: export_title
                            },
                            {
                                extend: 'pdf',
                                title: export_title
                            },
                            {
                                extend: 'print',
                                title: export_title
                            }
                        ],
                        language: {
                            processing: "Bitte warten...",
                            search: "Suchen",
                            lengthMenu: "_MENU_ Eintr&#xE4;ge anzeigen",
                            info: "_START_ bis _END_ von _TOTAL_ Eintr&#xE4;gen",
                            infoEmpty: "Keine Daten in der Tabelle vorhanden",
                            infoFiltered: "(gefiltert von _MAX_ Eintr&#xE4;gen)",
                            infoPostFix: "",
                            loadingRecords: "Wird geladen...",
                            zeroRecords: "Keine Eintr&#xE4;ge vorhanden.",
                            emptyTable: "Keine Datens&#xE4;tze zum anzeigen vorhanden",
                            buttons: {
                                copy: 'Kopieren',
                                copyTitle: 'in die Zwischenablage kopieren',
                                copySuccess: {
                                    _: '%d kopierte Zeilen',
                                    1: '1 kopierte Zeile'
                                },
                                print: "drucken"


                            },
                            paginate: {
                                first: "Erste",
                                previous: "Zur&#xFC;ck",
                                next: "N&#xE4;chste",
                                last: "Letzte"
                            },
                            aria: {
                                sortAscending: ": aktivieren, um Spalte aufsteigend zu sortieren",
                                sortDescending: ": aktivieren, um Spalte absteigend zu sortieren"
                            }
                        },
                        "footerCallback": function (row, data, start, end, display ) {
                            var api = this.api(), data;
                            // Update footer
//                            $( api.column(4).footer() ).html(singleSum);
//                            $( api.column(5).footer() ).html(familieSum);
//                            $( api.column(6).footer() ).html(p3);
//                            $( api.column(7).footer() ).html(p4);


                        }

                    });
                } );
            </script>

        </div>
        <br style="clear: both;"/>
        <div id="ergebnis"></div>
        <br style="clear: both;"/>
        <div style="height:16px;text-align:center;">
            <div id="loading" style="display:none;"><img src="../images/tpl/ajax-loader.gif" alt="" /> Termine werden geladen...</div>
        </div><div id="cal_event2"></div>
        <div id="cal_event"></div>
        <!-- <div id="calendar"></div> -->

        <br style="clear: both;" />
    </div>

</div>
</div>