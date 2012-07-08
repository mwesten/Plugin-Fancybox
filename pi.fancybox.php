<?php

  class Plugin_fancybox extends Plugin {

    var $meta = array(
      'name'       => 'Fancybox',
      'version'    => '0.1',
      'author'     => 'Max Westen',
      'author_url' => 'http://dlmax.org'
    );

    function __construct() {
      parent::__construct();
      $this->site_root  = Statamic::get_site_root();
      $this->theme_root = Statamic::get_templates_path();

      $this->plugin_path = $this->getPluginPath();
    }


    /**
     * Adds the nessecary Fancybox initialisation code to the <head> section of the layout.
     * @return string
     */
    public function head(){
      $selector = $this->fetch_param('selector', 'article.entry', false, false, false); // get the selector

      $head = $this->getPluginCss() . '
    <script type="text/javascript" src="'.$this->plugin_path.'/fancybox/jquery.fancybox.pack.js"></script>
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


    /**
     * Loads the css file from the theme css folder if it exists, else uses the plugin version as fallback.
     * @return string
     */
    private function getPluginCss() {
      $plugincss = '/fancybox/jquery.fancybox.css';
      $csspath = $this->plugin_path.$plugincss;
      return '<link rel="stylesheet" href="'.$csspath.'" type="text/css" media="screen" />';
    }

    /**
     * Returns the path of this plugin folder.
     * @return string
     */
    private function getPluginPath() {
      $plugindir = basename(dirname(__FILE__));
      $parentdir = basename(dirname(dirname(__FILE__)));
      $pluginpath = Statamic_helper::reduce_double_slashes($this->site_root.'/'.$parentdir .'/' . $plugindir."/");

      return $pluginpath;
    }
  }



//jQuery("article.entry a[href$='.jpg']:has(img),a[href$='.png']:has(img), a[href$='.gif']:has(img)").attr
//("data-fancybox-group",  "content-gallery");