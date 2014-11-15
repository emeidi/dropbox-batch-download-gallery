dropbox-batch-download-gallery
==============================

A PHP script which generates a list of wget commands to automatically download full resolution images from a shared gallery

Example
-------
Direct your browser to a Dropbox shared gallery and save the HTML page (as a source, not a Web Archive) in the folder where this script resides. Call the file "index.html". Then run

    $ php dropbox-batch-download-gallery.php

and check the output. If you're satisfied, run the script again, but this time pipe the output into another file:

    $ php dropbox-batch-download-gallery.php > download.sh

Last but not least run this script:

    $ bash download.sh

``wget`` now should download all gallery images in full resolution.