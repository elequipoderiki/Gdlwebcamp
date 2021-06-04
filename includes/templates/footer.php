
    <footer class="site-footer">
      <div class="contenedor clearfix">
        <div class="footer-informacion">
          <h3>Sobre <span>gdlwebcamp</span></h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem facilis esse pariatur culpa error in
            recusandae odio amet, ipsam ex quos ut necessitatibus, tempora perspiciatis, eveniet provident alias fugiat
          cum!</p> 
        </div>

        <div class="ultimos-tweets">
          <a class="twitter-timeline" data-height="400" href="https://twitter.com/QueenWillRock?ref_src=twsrc%5Etfw">Tweets by QueenWillRock</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        <div class="menu">
          <h3>Redes <span>sociales</span></h3>
          <nav class="redes-sociales">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </nav>
        </div>

      </div><!-- .contenedor-->
      <p class="copyright">
        Todos los derechos Reservados GDLWEBCAMP 2021.
      </p>

      <!-- mailchimp (embedeed)  -->
      <!-- Begin Mailchimp Signup Form -->
      <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
      <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
      </style>

      <div style="display:none">
        <div id="mc_embed_signup">
          <form action="https://gmail.us7.list-manage.com/subscribe/post?u=8e477f79ac46384b8131f71b3&amp;id=1ab8259231" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
              <h2>Suscríbete al Newsletter y no te pierdas nada de este evento</h2>
              <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
              <div class="mc-field-group">
                <label for="mce-EMAIL">Correo electrónico <span class="asterisk">*</span>
                </label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
              </div>
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8e477f79ac46384b8131f71b3_1ab8259231" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Suscríbete" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
          </form>
        </div>
            
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
        <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        <!--End mc_embed_signup-->
      </div>
    </footer>

    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.lettering.js"></script>

    <?php 
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace(".php", "", $archivo);
      if($pagina == 'invitados' || $pagina == 'index'){
        echo '<script src="js/jquery.colorbox-min.js"></script>';
      }else if($pagina == 'conferencia'){
        echo '<script src="js/lightbox.js"></script>';
      }
    ?>

    <script src="js/main.js"></script>
    <script src="js/cotizador.js"></script>
    <!-- hecho por alumno -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- hecho por alumno -->
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
      window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
      ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>

  </body>

</html>