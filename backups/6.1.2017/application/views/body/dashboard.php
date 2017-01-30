    <div class="content">
        <h1></h1>
        <a href="<?php echo base_url().'index.php/app/logout' ?>">Ausloggen</a>
        <p>
        </p>
        <div style="clear:both;">
            <div style="float:left;width:100%;">
                <style type="text/css">
                    .ui-datepicker,#cal_event2 { font-size: 11px !important; }
                    .MsoListParagraphCxSpFirst, .MsoListParagraphCxSpMiddle, .MsoListParagraphCxSpLast { margin: 0 0 0 25px; }
                </style>
                <h2 style="border-bottom: 1px solid #666666; padding-bottom: 10px; background: url(../images/tpl/suchen-icon.png) 0 -5px no-repeat;">Einladungen erfassen </h2>
                <h2 style="color:#27AE60;font-size:14px"><?php echo @$success; ?></h2>

                <!-- DATATABLES EDITOR DATA -->
                <table id="example" valign="left" class="order-column cell-border compact hover" width="100%" cellspacing="0">
                    <thead style="text-align:left">
                    <tr>
                        <th>Datum</th>
                        <th>Firma</th>
                        <th>Berater</th>
                        <th>Kundenname</th>
                        <th>Einzel/Familie</th>
                        <th>Anzahl</th>
                        <th>Filiale</th>

                    </tr>
                    </thead>
                    <tfoot style="text-align:left">
                    <tr>
                        <th>Datum</th>
                        <th>Firma</th>
                        <th>Berater</th>
                        <th>Kundenname</th>
                        <th>Einzel/Familie</th>
                        <th>Anzahl</th>
                        <th>Filiale</th>

                    </tr>
                    </tfoot>
                </table>
                <!-- /DATATABLES EDITOR DATA -->

                <script type="text/javascript">
                    var editor; // use a global for the submit and return data rendering in the examples
                    $(document).ready(function() {
                        editor = new $.fn.dataTable.Editor( {
                            "ajax": "ajax_ee",
                            "table": "#example",
                            "fields": [ {
                                "label": "Firma:",
                                "name": "invitations.company",
                                type:  "select"
                            },{
                                "label" : "Berater:",
                                "name" : "invitations.consultant"
                            }, {
                                "label" : "Kundenname:",
                                "name" : "invitations.customer_name"
                            },
                                {
                                    "label" : "Einzel/Familie:",
                                    "name" : "invitations.count_id",
                                    "type" : "select"
                                }
                            ],
                            i18n: {
                                create: {
                                    button: "neu",
                                    title: "Neuen Eintrag erstellen",
                                    submit: "erstellen"
                                },
                                edit: {
                                    button: "bearbeiten",
                                    title:  "Eintrag bearbeiten",
                                    submit: "aktualisieren"
                                },
                                remove: {
                                    button: "l&#xF6;schen",
                                    title:  "l&#xF6;schen",
                                    submit: "l&#xF6;schen",
                                    confirm: {
                                        _: "Sind Sie sicher, dass Sie %d Zeile l&#xF6;schen m&#xF6;chten?",
                                        1: "Sind Sie sicher, dass Sie 1 Zeile l&#xF6;schen m&#xF6;chten?"
                                    }
                                },
                                error: {
                                    system: "Ein Fehler ist aufgetreten, kontaktieren Sie Ihren Systemadministrator"
                                },
                                datetime: {
                                    previous: 'fr&#xFC;her',
                                    next:     'zuerst',
                                    months:   [ "Januar", "Februar", "Mars", "April", "kann", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                                    weekdays: [ 'verdunkeln', 'Mo.', 'M&#xE4;rz', 'Meer', 'Spiel', 'Fr', 'Sam' ]
                                },
                                multi: {
                                    title: "mehrere Werte",
                                    info: "Die ausgew&#xE4;hlten Elemente enthalten unterschiedliche Werte f&#xFC;r diesen Eintrag. So bearbeiten und verschieben Sie alle Elemente f&#xFC;r diesen Eintrag f&#xFC;r den gleichen Wert, klicken Sie auf oder dr&#xFC;cken Sie hier, sonst werden sie ihre individuellen Werte behalten.",
                                    restore: "&#xC4;nderungen verwerfen"
                                },
                            }
                        } );


                        var export_title = "Einladungen erfassen";
                        $('#example').DataTable( {
                            dom: "Bfrtip",
                            "pageLength": 60,
                            ajax: {
                                url: "ajax_ee",
                                type: "POST"
                            },
                            serverSide: true,
                            columns: [
                                { data : "invitations.date_created"},
                                { data: "firma.name" },
                                { data: "invitations.consultant" },
                                { data: "invitations.customer_name" },
                                { data: "multiplier.name" },
                                { data: "multiplier.value"},
                                { data: "u.branch"}

                            ],
                            select: true,
                            buttons: [
                                { extend: "create", editor: editor },
                                { extend: "edit",   editor: editor },
                                { extend: "remove", editor: editor },
                                {
                                    extend: 'collection',
                                    text: 'Export',
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
                                select: {
                                    rows: "%d Datens&#xE4;tze markiert"
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

                            }

                        } );
                    } );
                </script>

            </div>

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