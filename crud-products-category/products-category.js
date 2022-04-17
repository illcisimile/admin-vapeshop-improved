let productsCategoryDataTable;

$(document).ready(function () {
  productsCategoryDataTable = $("#productsCategoryDataTable").DataTable({
    columnDefs: [
      {
        orderable: false,
        targets: 2,
      },
    ],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud-products-category/fetch-products-category.php",
  });

  $("#addCategoryForm")
    .unbind("submit")
    .bind("submit", function () {
      let form = $(this);

      $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: form.serialize(),
        dataType: "json",
        success: function (response) {
          if (response.success) {
            Toastify({
              text: response.message,
              duration: 2000,
              gravity: "top",
              position: "center",
              backgroundColor: "#198754",
            }).showToast();
            $("#addCategoryForm")[0].reset();
            $("#addCategoryModal").modal("hide");
            productsCategoryDataTable.ajax.reload(null, false);
          } else {
            alert("Error");
          }
        },
      });
      return false;
    });
});

function editCategory(id = null) {
  if (id) {
    $("#categoryID").remove();

    $.ajax({
      url: "crud-products-category/get-selected-category.php",
      type: "post",
      data: { categoryID: id },
      dataType: "json",
      success: function (response) {
        $("#editCategoryName").val(response.category_name);

        $("#editCategoryModalFooter").append('<input type="hidden" name="categoryID" id="categoryID" value="' + response.id + '"/>');

        $("#editCategoryForm")
          .unbind("submit")
          .bind("submit", function () {
            let form = $(this);

            $.ajax({
              url: form.attr("action"),
              method: form.attr("method"),
              data: form.serialize(),
              dataType: "json",
              success: function (response) {
                if (response.success) {
                  Toastify({
                    text: response.message,
                    duration: 2000,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#198754",
                  }).showToast();
                  $("#editCategoryForm")[0].reset();
                  $("#editCategoryModal").modal("hide");
                  productsCategoryDataTable.ajax.reload(null, false);
                } else {
                  alert("Error!");
                }
              },
            });
            return false;
          });
      },
    });
  }
}

function deleteCategory(id = null) {
  if (id) {
    $("#deleteCategoryButton")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud-products-category/delete-category.php",
          type: "post",
          data: { categoryID: id },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              Toastify({
                text: response.message,
                duration: 2000,
                gravity: "top",
                position: "center",
                backgroundColor: "#198754",
              }).showToast();
              $("#deleteCategoryModal").modal("hide");
              productsCategoryDataTable.ajax.reload(null, false);
            } else {
              alert("Error!");
            }
          },
        });
      });
  }
}
