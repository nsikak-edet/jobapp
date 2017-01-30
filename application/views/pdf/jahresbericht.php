<style>
    #table{
        border-collapse: separate;
        border-spacing: 0px;
        *border-collapse: expression('separate', cellSpacing = '0px');
        border-right:1px solid black;
        border-top:1px solid black;
    }
    #table td,#table th  {
        border-left:1px solid black;
        border-bottom:1px solid black;
        padding: 2px;
    }
    img{
        position:absolute;
        float:right;
        margin-bottom:10px
    }
</style>
<table>
    <tr>
        <td style="width:300px"><h3>Jahresbericht</h3>
            <p>Zeitraum: <?php setlocale(LC_TIME, 'de_DE', 'deu_deu'); echo strftime("%B %Y") ?><br>
                Filiale: <?php echo $branch ?>
            </p>
        </td>
        <?php $ci =& get_instance();
        $logo_file_name = $ci->session->userdata('logo');
        ?>
        <td style="padding-left:260px"><img src="<?php echo getAssetsURL(); ?>/images/logo/<?php echo $logo_file_name; ?>" alt="Fertighaus Welt"><br></td>
    </tr>
</table>
<table id='table' border='0'  cellspacing='0'  width='100%'>
    <thead style='text-align:left'>
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
    <?php echo $rows ?>
</table>