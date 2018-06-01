/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
  // Site title and description.
  wp.customize('blogname', function (value) {
    value.bind(function (to) {
      $('.site-title a').text(to);
    });
  });
  wp.customize('blogdescription', function (value) {
    value.bind(function (to) {
      $('.site-description').text(to);
    });
  });
  // Customizer colors
  wp.customize('artifact_header_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#header, #cssmenu, #cssmenu ul ul li a').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#header, #cssmenu, #cssmenu ul ul li a').css({
          'clip': 'auto',
          'background-color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_header_text_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#header .tagline, #cssmenu ul li a, #cssmenu ul ul li a').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#header .tagline, #cssmenu ul li a, #cssmenu ul ul li a').css({
          'clip': 'auto',
          color: to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_headings_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $(':not(#footer) h1, :not(#footer) h2, :not(#footer) h3, :not(#footer) h4, :not(#footer) h5, :not(#footer) h6').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $(':not(#footer) h1, :not(#footer) h2, :not(#footer) h3, :not(#footer) h4, :not(#footer) h5, :not(#footer) h6').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_body_background_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('body').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('body').css({
          'clip': 'auto',
          'background-color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_text_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('body, .tagline').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('body, .tagline').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_content_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#posts .container, #content').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#posts .container, #content').css({
          'clip': 'auto',
          'background-color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_link_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('a').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('a').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_footer_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#footer').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#footer').css({
          'clip': 'auto',
          'background-color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_widget_text_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#footer').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#footer').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_widget_headings_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#footer h1, #footer h2, #footer h3, #footer h4, #footer h5').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#footer h1, #footer h2, #footer h3, #footer h4, #footer h5').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_topbar_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#topbar').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#topbar').css({
          'clip': 'auto',
          'background-color': to,
          'position': 'relative'
        });
      }
    });
  });
  wp.customize('artifact_topbar_text_color', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('#topbar').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('#topbar p').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  // Fonts
  wp.customize( 'artifact_google_fonts_body_font', function( value ) {
    value.bind( function( to ) {
      var font = to.replace(' ', '+');
      WebFontConfig = {
        google: { families: [ font+'::latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();

      // style the text
      if(to == 'none') {
        $('body').attr('style', '');
      }
      else {
        var myVar=setInterval(function(){
          if(typeof WebFont != 'undefined') {
            WebFont.load({
              google: {
                families: [font]
              }
            });
            clearInterval(myVar);
          }
        },100);

        $('body').attr("style", 'font-family:"'+to+'" !important');
      }

    } );
  } );
  wp.customize( 'artifact_google_fonts_heading_font', function( value ) {
    value.bind( function( to ) {
      var font = to.replace(' ', '+');
      WebFontConfig = {
        google: { families: [ font+'::latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();

      // style the text
      if(to == 'none') {
        $('h1,h2,h3,h4,h5,h6').attr("style", '');
      }
      else {
        var myVar=setInterval(function(){
          if(typeof WebFont != 'undefined') {
            WebFont.load({
              google: {
                families: [font]
              }
            });
            clearInterval(myVar);
          }
        },100);

        $('h1,h2,h3,h4,h5,h6').attr("style", 'font-family:"'+to+'" !important');
      }


    } );
  } );
})(jQuery);
