    <div class="content">
        <div style="clear:both;">
            <div style="float:left;width:370px;">  <form action="" method="post">
                    <label></label>
                    <h2 style="border-bottom: 1px solid #666666; padding-bottom: 10px; background: url(<?php echo getAssetsURL(); ?>/images/tpl/mitglieder-icon.png) 0 -5px no-repeat;padding-left: 30px;">Mitglieder-Login</h2>

                    <!-- select branch -->
                    <select name="branch_id" style="width:250px;" class="hersteller"><option value="0">Select Filiale</option>
                        <?php
                            foreach($branches as $branch){
                                $br = htmlspecialchars($branch->branch);
                                $branch_id = (int)$branch->id;
                                @$options .= "<option value='$branch_id'>$br</option>";
                            }
                            echo $options;
                        ?>
                    </select><br>
                    <!-- /select branch -->

                    <input type="password" value="*******" name="password" id="passwort" onfocus="if(this.value == '*******') this.value='';" onblur="if (this.value=='') this.value='*******';" style="width:105px;border:1px solid #cccccc;font-size:11px;font-family:Arial;" />
                    <input type="submit" name="login" value="Login" style="border:1px solid #cccccc;font-size:11px;padding:5px 20px" /><br>
                    <span style="color:red"><?php echo @$login_error_msg; ?></span>
                    <div style="font-size:10px;padding-top:5px;">BDF-Mitglieder können ihre Termine in den Kalender eintragen.<br />Wenn Sie noch nicht registriert sind können Sie sich <a href="anmeldung.html">hier</a> anmelden.</div>
                </form>

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