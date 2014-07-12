<?php

  class Plugin_fancybox extends Plugin {

    var $meta = array(
      'name'       => 'Fancybox',
      'version'    => '0.2',
      'author'     => 'Max Westen',
      'author_url' => 'http://dlmax.org'
    );

    function __construct() {
      parent::__construct();
      $this->site_root  = Config::getSiteRoot();
    }


    /**
     * Adds the nessecary Fancybox initialisation code to the <head> section of the layout.
     * @return string
     */
    public function head(){
      $selector = $this->fetchParam('selector', 'article.entry', false, false, false); // get the selector

      $head = $this->css->link("jquery.fancybox.css") . '
      ' . $this->js->link("/fancybox/jquery.fancybox.pack.js") . '
    <script type="text/javascript">
      window.onload = function(){
        jQuery(function() {
          jQuery(".lightbox").fancybox({
            wrapCSS    : "fancybox-custom",
            closeClick : true,
            openEffect	: "none",
            closeEffect	: "none",
            loop : false,

            helpers : {
            title : {
              type : "inside"
              },
            overlay : {
              css : {
                  "background-color" : "#eee"
                }
            }
          }
          });
          jQuery("'.$selector.' '."a[href$='.jpg']:has(img),a[href$='.png']:has(img), a[href$='.gif']:has(img)".'").attr("data-fancybox-group", "content-gallery");
          jQuery("'.$selector.' '."a[href$='.jpg']:has(img),a[href$='.png']:has(img), a[href$='.gif']:has(img)".'").fancybox({
            wrapCSS    : "fancybox-custom",
            closeClick : true,
            openEffect	: "none",
            closeEffect	: "none",
            loop : false,

            helpers : {
            title : {
              type : "inside"
              },
            overlay : {
              css : {
                  "background-color" : "#eee"
                }
            }
          }
          });
        });
      };
    </script>
    ';


      return $head;
    }

  }
