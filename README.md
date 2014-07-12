Plugin-Fancybox
===============

**This version is tested with Statamic 1.8.1**
For a working version on Statamic 1.4.2 choose the branch statamic_1.4.

Statamic plugin that adds [Fancybox2](http://fancyapps.com/fancybox) lightbox to your images on your site.

Make sure you read the Fancybox2 [licensing conditions](http://fancyapps.com/fancybox/#license) regarding commercial use.


# Installation
## Clone or Copy the files to their destination
Clone this project on your system:

    cd webfolder/_add-ons
    git clone git://github.com/mwesten/Plugin-Fancybox.git fancybox

Or download the project and add the contents of archive to the `_add-ons/fancybox` folder.

## Add the fancybox init code to your head
Open the theme file layout (for example) `_themes/london-wild/layouts/default.html`
Add the following code in your `<head>` section **after** the jquery initialisation:

    {{ fancybox:head }}


# Usage

The way it's configured right now is that all images that link to another image and are contained in the `<article>` tag with the `entry` class are fancyboxed.
If you need another selector, you can add this as parameter to the init-code like so:

    {{ fancybox:head selector="div.post"}}
 
 If a link has the `lightbox` class, it will be fancyboxed too.   
 
 To override the fancybox options, you have to modify the plugin code at the moment.

# Disclaimer
I've 'written' this plugin for my own use. It comes without any guarantee, so your mileage may vary in using it. If you find bugs or have great additions you'd like to share, use github to fork the project and share your improvements by initiating pull requests.