$(document).ready(function () {
  $("#target-content").load("pagination.php?page=1");
  $(".page-link").click(function () {
    var id = $(this).attr("data-id");
    var select_id = $(this).parent().attr("id");
    $.ajax({
      url: "pagination.php",
      type: "GET",
      data: {
        page: id,
      },
      cache: false,
      success: function (dataResult) {
        $("#target-content").html(dataResult);
        $(".pageitem").removeClass("active");
        $("#" + select_id).addClass("active");
      },
    });
  });
});
