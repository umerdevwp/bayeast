
<html>
<!--
This page is on the same domain as the parent, so can
communicate with it to order the iframe window resizing
to fit the content
-->
  <body onload="parentIframeResize()">

    <script>

      // Tell the parent iframe what height the iframe needs to be
      function parentIframeResize()
      {
         var height = getParam('height');

         // This works as our parent's parent is on our domain..
         parent.parent.resizeIframe(height);
      }

      // Helper function, parse param from request string
      function getParam(name)
      {
        name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");

        var regexS = "[\\?&]"+name+"=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(window.location.href);
        if(results == null)
          return "";
        else
          return results[1];
      }


    </script>
  </body>
</html>
