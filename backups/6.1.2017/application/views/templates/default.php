<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<!-- Mirrored from www.fertighauswelt.de/kontakt_termine/termine.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Dec 2016 18:21:52 GMT -->
<head>

    <title>FertighausWelt | Besucher Management</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="BDF e.V." />
    <meta name="dcterms.rightsHolder" content="BDF e.V." />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="revisit-after" content="2 days" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" UTF-8 ISO-8859-1/>-->
    <meta name="p:domain_verify" content="02140eebd8836c8b797748838529619d" />
    <link href="<?php echo getAssetsURL(); ?>/css/fertighauswelt.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="http://www.fertighauswelt.de/images/tpl/favicon.ico" />
    <!--[if IE 6]>
    <style type="text/css" media="screen">
        body { behavior: url(<?php echo getAssetsURL(); ?>/css/csshover.htc); }
    </style>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo getDataTableURL(); ?>/css/editor.dataTables.min.css">

    <script src="<?php echo getAssetsURL(); ?>/skripte/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <link href="<?php echo getAssetsURL(); ?>/css/jquery-ui-1.10.3.custom.css" type="text/css" rel="stylesheet" />
    <script src="<?php echo getAssetsURL(); ?>/skripte/fullcalendar.js" type="text/javascript"></script>
    <link href="<?php echo getAssetsURL(); ?>/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo getAssetsURL(); ?>/js/skripte.js" type="text/javascript"></script>


    <script src="//code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/editor/js/dataTables.editor.min.js" type="text/javascript"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js" type="text/javascript"></script>






    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-19460064-1', 'auto');
        ga('require', 'displayfeatures');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');
    </script>
</head>
<body>

<div class="wrapper">
    <div class="header">


        <a href="http://www.fertighauswelt.de/"><img src="<?php echo getAssetsURL(); ?>/images/tpl/fertighauswelt-logo.png" alt="Fertighaus Welt" /></a>
        <div class="suche" style="text-align:right;">


        </div>

        <?php  ?>

        <div id="mainmenue">
            <a href="<?php echo base_url() ?>index.php/app/" title="Einladungen erfassen" class="subnav" >Einladungen erfassen</a>
            <a href="<?php echo base_url() ?>index.php/app/be" title="Bericht erstellen" class="subnav" >Bericht erstellen</a>
            <a href="<?php echo base_url() ?>index.php/app/jarf" title="Jahresbericht" class="subnav" >Jahresbericht</a>
            <a href="<?php echo base_url() ?>index.php/app/jar" title="<?php echo convertToUTF8("Geschäftsjahresbericht"); ?>" class="subnav" ><?php echo convertToUTF8("Geschäftsjahresbericht"); ?></a>
            <a href="<?php echo base_url() ?>index.php/app/jara" title="<?php echo convertToUTF8("Auswertung Eintrittsgutscheine"); ?>" class="subnav" ><?php echo convertToUTF8("Auswertung Eintrittsgutscheine"); ?></a>
        </div>
    </div><!-- header -->


<!-- Body -->
<?php echo $body; ?>
<!-- Body -->

<br style="clear: both;" />
<div class="footer">
    <div class="footerwrap" style="height:250px"></div><!--footerwrap -->
</div><!--footer -->



<!-- Google Code für ein Remarketing-Tag -->
<!--
Remarketing-Tags dürfen nicht mit personenbezogenen Daten verknüpft oder auf Seiten platziert werden, die sensiblen Kategorien angehören. Weitere Informationen und Anleitungen zur Einrichtung des Tags erhalten Sie unter: http://google.com/ads/remarketingsetup
-->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 986696506;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="../../www.googleadservices.com/pagead/f.txt">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="http://googleads.g.doubleclick.net/pagead/viewthroughconversion/986696506/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

<script type="text/javascript">

    function slideSwitch() {
        var $active = $('#slideshow IMG.active');

        if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

        var $next =  $active.next().length ? $active.next()
            : $('#slideshow IMG:first');

        $active.addClass('last-active');

        $next.css({opacity: 0.0})
            .addClass('active')
            .animate({opacity: 1.0}, 800, function() {
                $active.removeClass('active last-active');
            });
    }

    $(function() {
        setInterval( "slideSwitch()", 3000 );
    });

</script>
<script type="text/javascript">
    var url = escape(document.URL);
    url = url.replace(/\//g,"_");
    document.write("<"+"img src=\"https://www.rvty.net/goto/px/key/552fc0b664ef4/sub_id/"+url+"\" width=\"1\" height=\"1\""+"></"+"img>");
</script>


</body>
</html>

