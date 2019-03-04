/**
 * Created by rl on 2017-03-31.
 */



(function() {
    var runMyCode = function($) {
        if ( undefined !== window.elementor ) {
            /*
             $( "header[data-transparent-header='true']:not('.headhesive--clone')" ).prepend( "<p class='hide-nav'><a href=''>Test</a></p>" );
             */

            /* Check if we are using Groovy Menu, if we are, check for css position of wrapper div */

            if($( "header" ).hasClass( "gm-navbar" )){
                console.log('Groovy Menu is active');
                var themo_gm_menu_pos = $('header .gm-wrapper').css('position');
                if(themo_gm_menu_pos == 'absolute'){
                    console.log('Groovy menu position: '+themo_gm_menu_pos);

                    $( "<div class='hide-nav-wrap button'><div class='hide-nav'>Hide/Show Header</div> </div>" ).insertAfter( "header.gm-navbar" );

                    $( ".hide-nav-wrap" ).click(function() {
                        $( "header.gm-navbar .gm-wrapper" ).fadeToggle( "fast", function() {
                            // Animation complete.
                        });
                    });

                    setTimeout(function() {
                        $( ".hide-nav-wrap" ).trigger( "click" ); // Hide Nav on Start.
                    }, 2000);
                }
            }else{
                $( "<div class='hide-nav-wrap button'><div class='hide-nav'>Hide/Show Header</div> </div>" ).insertAfter( "header[data-transparent-header='true']:not('.headhesive--clone')" );

                $( ".hide-nav-wrap" ).click(function() {
                    $( "header[data-transparent-header='true']:not('.headhesive--clone')" ).fadeToggle( "fast", function() {
                        // Animation complete.
                    });
                });

                setTimeout(function() {
                    $( ".hide-nav-wrap" ).trigger( "click" ); // Hide Nav on Start.
                }, 2000);
            }





        }
    };

    var timer = function() {
        if (window.jQuery && window.jQuery.ui) {
            runMyCode(window.jQuery);
        } else {
            window.setTimeout(timer, 100);
        }
    };
    timer();
})();