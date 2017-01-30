    <div class="content">
        <div style="clear:both;">
            <div style="float:left;width:90%">
                <style>
                    .dataTables_wrapper { font-size: 12px }

                    .ui-datepicker,#cal_event2 { font-size: 11px !important; }
                    .MsoListParagraphCxSpFirst, .MsoListParagraphCxSpMiddle, .MsoListParagraphCxSpLast { margin: 0 0 0 25px; }
                </style>

                <!-- wrapper -->
                <div class="container2" style="width:100%">
                    <a href="<?php echo base_url().'index.php/app/logout' ?>">Ausloggen</a>



                    <h2 style="border-bottom: 1px solid #666666; padding-bottom: 3px; background: url(../images/tpl/suchen-icon.png) 0 -5px no-repeat;"><?php echo convertToUTF8("Geschäftsjahresbericht"); ?></h2><br>

                    <form method="get">
                        <label>Jahr:</label>
                        <select name="year">
                            <option value=""><?php echo convertToUTF8('auswahl') ?></option>
                            <!-- Year list --->
                            <?php
                            for($year = 2015; $year <= 2026; $year++){
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                            <!-- /Year list --->
                        </select>
                        <input type="submit" value="Bericht generieren" name="get_report" />
                    </form><br>
                    <table id="example" class="order-column cell-border compact hover" cellspacing="0" width="100%">
                        <thead style="text-align:left">
                        <tr>
                            <th>Firma</th>
                            <th>Einzel</th>
                            <th>Familie</th>
                            <th>3P</th>
                            <th>4P</th>
                            <th>E-karten &euro;</th>
                            <th>F-karten &euro;</th>
                            <th>3P-Karten &euro;</th>
                            <th>4P-Karten &euro;</th>
                            <th>Zw.Summe &euro;</th>
                            <th>MwSt. &euro;</th>
                            <th>Netto &euro;</th>
                        </tr>
                        </thead>

                        <tfoot style="text-align:left">
                        <tr>
                            <th>Firma</th>
                            <th>Einzel</th>
                            <th>Familie</th>
                            <th>3P</th>
                            <th>4P</th>
                            <th>E-karten &euro;</th>
                            <th>F-karten &euro;</th>
                            <th>3P-Karten</th>
                            <th>4P-Karten</th>
                            <th>Zw.Summe</th>
                            <th>MwSt.</th>
                            <th>Netto</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php
                            if(isset($records) && !empty($records)){
                                foreach($records as $firma){
                                    $firma_name = convertToUTF8($firma['name']);
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

                                    @$sumtotal += $summe;
                                    @$singletotal += $single_count;
                                    @$ekarten_total += $single_value;
                                    @$familie_total += $familie;
                                    @$personen_3_total += $personen_3;
                                    @$personen_4_total += $personen_4;
                                    @$familie_value_total += $familie_value;
                                    @$personen_3_value_total += $personen_3_value;
                                    @$personen_4_value_total += $personen_4_value;
                                    @$netto_total += $netto;
                                    @$mwst_total += $mwst;

                                    $mwst = number_format($mwst, 2, ',', '.') . " &euro;";
                                    $familie_value = number_format($familie_value, 2, ',', '.') . " &euro;";
                                    $personen_3_value = number_format($personen_3_value, 2, ',', '.') . " &euro;";
                                    $personen_4_value = number_format($personen_4_value, 2, ',', '.') . " &euro;";
                                    $summe = number_format($summe, 2, ',', '.') . " &euro;";
                                    $netto = number_format($netto, 2, ',', '.') . " &euro;";
                                    $single_value = number_format($single_value, 2, ',', '.') . " &euro;";

                                    @$row .= "<tr><td>" . htmlspecialchars($firma_name) . "</td><td>$single_count</td><td>$familie</td><td>$personen_3</td>
                                                <td>$personen_4</td><td>$single_value</td><td>$familie_value</td><td>$personen_3_value</td>
                                               <td>$personen_4_value</td><td>$summe</td><td>$mwst</td><td>$netto</td></tr>";
                                }


                                //format sum values
                                $personen_4_value_total = number_format($personen_4_value_total, 2, ',', '.') . " &euro;";
                                $netto_total = number_format($netto_total, 2, ',', '.') . " &euro;";
                                $mwst_total = number_format($mwst_total, 2, ',', '.') . " &euro;";
                                $sumtotal = number_format(@$sumtotal, 2, ',', '.') . " &euro;";
                                $ekarten_total = number_format($ekarten_total, 2, ',', '.') . " &euro;";
                                $familie_value_total = number_format($familie_value_total, 2, ',', '.') . " &euro;";
                                $personen_3_value_total = number_format($personen_3_value_total, 2, ',', '.') . " &euro;";
                                echo  @$row;
                            }
                        ?>
                        </tbody>
                    </table>

                </div>

                <!-- summe total --->
                <input type="hidden" id="summe_total" value="<?php echo @$sumtotal ?>" />
                <input type="hidden" id="single_total" value="<?php echo @$singletotal ?>" />
                <input type="hidden" id="familie_total" value="<?php echo @$familie_total ?>" />
                <input type="hidden" id="p3_total" value="<?php echo @$personen_3_total ?>" />
                <input type="hidden" id="p4_total" value="<?php echo @$personen_4_total ?>" />
                <input type="hidden" id="ekarten_total" value="<?php echo @$ekarten_total ?>" />
                <input type="hidden" id="fkarten_total" value="<?php echo @$familie_value_total ?>" />
                <input type="hidden" id="p3v_total" value="<?php echo @$personen_3_value_total ?>" />
                <input type="hidden" id="p4v_total" value="<?php echo @$personen_4_value_total ?>" />

                <input type="hidden" id="mwst_total" value="<?php echo @$mwst_total ?>" />
                <input type="hidden" id="netto_total" value="<?php echo @$netto_total ?>" />

            </div>

            <script type="text/javascript">
                $(document).ready(function() {

                    var export_title = "Jahresbericht";
                    var sum = $('#summe_total').val() ;
                    var singleSum = $('#single_total').val();
                    var familieSum = $('#familie_total').val();
                    var p3 = $('#p3_total').val();
                    var p4 = $('#p4_total').val();
                    var eKarten = $('#ekarten_total').val();
                    var fKarten = $('#fkarten_total').val();
                    var p3v = $('#p3v_total').val();
                    var p4v = $('#p4v_total').val();
                    var mwst = $('#mwst_total').val();
                    var netto = $('#netto_total').val();

                   $('#example').DataTable({
                       dom: 'Bfrtip',
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
                        $( api.column(1).footer() ).html(singleSum);
                            $( api.column(2).footer() ).html(familieSum);
                            $( api.column(3).footer() ).html(p3);
                            $( api.column(4).footer() ).html(p4);
                            $( api.column(5).footer() ).html(eKarten);

                            $( api.column(6).footer() ).html(fKarten);
                            $( api.column(7).footer() ).html(p3v);
                            $( api.column(8).footer() ).html(p4v);
                            $( api.column(9).footer() ).html(sum);
                            $( api.column(10).footer() ).html(mwst);
                            $( api.column(11).footer() ).html(netto);
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