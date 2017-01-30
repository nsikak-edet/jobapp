<div class="content">
    <div style="clear:both;">
        <div style="float:left;width:90%">
            <style>
                .dataTables_wrapper { font-size: 12px }
            </style>
            <!-- wrapper -->
            <div class="container2" style="width:100%">
                <a href="<?php echo base_url().'index.php/app/logout' ?>">Ausloggen</a>


                <style type="text/css">
                    .ui-datepicker,#cal_event2 { font-size: 11px !important; }
                    .MsoListParagraphCxSpFirst, .MsoListParagraphCxSpMiddle, .MsoListParagraphCxSpLast { margin: 0 0 0 25px; }
                </style>
                <h2 style="border-bottom: 1px solid #666666; padding-bottom: 3px; background: url(../images/tpl/suchen-icon.png) 0 -5px no-repeat;">Auswertung Eintrittsgutscheine</h2><br>

                <form method="get" name="suchen" id="suchen1" action="" width="100%">
                    <table border="0" cellpadding="2" cellspacing="0" >
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
                            <td><input type="submit" name="get_report" value="Bericht generiere" /> &nbsp; </td>
                        </tr>
                    </table><br />
                </form>

<br>
                    <table id="example" class="order-column cell-border compact hover" cellspacing="0" width="100%">
                        <thead style="text-align:left">
                        <tr>
                            <th>Datum</th>
                            <th>Firma</th>
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
                            <th>Kundenname</th>
                            <th>Einzel</th>
                            <th>Familie</th>
                            <th>3P</th>
                            <th>4P</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php
                            if(isset($records) && !empty($records)){
                                foreach($records as $firma){
                                    $firma_name = convertToUTF8($firma['name']);
                                    $consultant = convertToUTF8($firma['consultant']);
                                    $customer_name = convertToUTF8($firma['customer_name']);
                                    $single_count = $firma['single'];
                                    $familie = $firma['familie'];
                                    $personen_3 = $firma['personen_3'];
                                    $personen_4 = $firma['personen_4'];


                                    $single_value = $single_count * get_multiplier_value(1,$multipliers);
                                    $familie_value = $familie * get_multiplier_value(2,$multipliers);
                                    $personen_3_value = $personen_3 * get_multiplier_value(3,$multipliers);
                                    $personen_4_value = $personen_4 * get_multiplier_value(4,$multipliers);
                                    $summe = $single_value + $familie_value + $personen_3_value + $personen_4_value;
                                    $netto = $summe / 1.16;
                                    $mwst = $summe - $netto;

                                    //sums
                                    @$sumtotal += $summe;
                                    @$singletotal += $single_count;
                                    @$ekarten_total += $single_value;
                                    @$familie_total += $familie;
                                    @$personen_3_total += $personen_3;
                                    @$personen_4_total += $personen_4;

                                    //format string to currency format
                                    $mwst = number_format($mwst, 2, ',', '.') . " &euro;";
                                    $familie_value = number_format($familie_value, 2, ',', '.') . " &euro;";
                                    $personen_3_value = number_format($personen_3_value, 2, ',', '.') . " &euro;";
                                    $personen_4_value = number_format($personen_4_value, 2, ',', '.') . " &euro;";
                                    $summe = number_format($summe, 2, ',', '.') . " &euro;";
                                    $netto = number_format($netto, 2, ',', '.') . " &euro;";
                                    $single_value = number_format($single_value, 2, ',', '.') . " &euro;";
                                    $date = date('d.m.Y',strtotime($firma['date']));

                                    @$row .= "<tr><td>$date</td><td>". htmlspecialchars($firma_name) . "</td><td>".
                                                htmlspecialchars($customer_name) . "</td><td>$single_count</td><td>$familie</td><td>$personen_3</td>
                                               <td>$personen_4</td></tr>";
                                }

                                echo @$row;
                            }
                        ?>
                        </tbody>
                    </table>

                </div>
                <!-- summe total --->
                <input type="hidden" id="single_total" value="<?php echo @$singletotal ?>" />
                <input type="hidden" id="familie_total" value="<?php echo @$familie_total ?>" />
                <input type="hidden" id="p3_total" value="<?php echo @$personen_3_total ?>" />
                <input type="hidden" id="p4_total" value="<?php echo @$personen_4_total ?>" />


            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    var singleSum = $('#single_total').val();
                    var familieSum = $('#familie_total').val();
                    var p3 = $('#p3_total').val();
                    var p4 = $('#p4_total').val();

                    var export_title = "Jahresbericht";

                   $('#example').DataTable({
                       dom: 'Bfrtip',
                       "scrollX": true,
                       "pageLength": 60,
                       buttons: [

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
                            $( api.column(3).footer() ).html(singleSum);
                            $( api.column(4).footer() ).html(familieSum);
                            $( api.column(5).footer() ).html(p3);
                            $( api.column(6).footer() ).html(p4);
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