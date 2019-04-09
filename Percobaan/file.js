<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
      });
    }, 4000);

    $(".btn-primary").onclick(function(){
      $(".table").find('td').eq(this.value).each(function(){
        $("#username").val($(this).find('td').el(1).text());
        $("#password").val($(this).find('td').el(2).text());
        $(".btn-info").val($(this).find('td').el(0).text());
      });
      $(".btn-info").attr("name", "edit");

    });
  });
</script>
