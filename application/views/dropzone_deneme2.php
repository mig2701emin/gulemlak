Import css and dropzone.js

<div class="row">
    <div class="col-sm-20 well">
        <form action="@Url.Action("_UploadImages", "Notebooks", new { unique = Model.UniqueId })"
              method="post"
              enctype="multipart/form-data"
              class="dropzone"
              id="my-dropzone"></form>
    </div>
</div>

<script type="text/javascript">
    Dropzone.options.myDropzone = {
        url: '@Url.Action("_UploadImages", "Notebooks", new { unique = Model.UniqueId })',
        autoProcessQueue: true,
        uploadMultiple: true,
        parallelUploads: 3,
        maxFilesize: 10,
        resizeWidth: 2048,
        addRemoveLinks: false,
        init: function () {
        }
    }
</script>
