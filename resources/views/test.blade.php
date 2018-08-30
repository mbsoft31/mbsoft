<!DOCTYPE html>
<html>
<head>
  <title>hello</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone-amd-module.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

</head>
<body>

  <script>
    //Dropzone.autoDiscover = false;
    $(function() {
      // Now that the DOM is fully loaded, create the dropzone, and setup the
      // event listeners
      var myDropzone = new Dropzone("#my-awesome-dropzone", { url: "/upload"});

      myDropzone.on("addedfile", function(file) {
        console.log('addedfile')
      });
    })
  </script>

  <form action="/upload"
      class="dropzone"
      id="my-awesome-dropzone"></form>

      

</body>
</html>