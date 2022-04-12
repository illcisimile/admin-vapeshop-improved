let productsDataTable;
let productsArchiveDataTable;

$(document).ready(function () {
  // Fetch all products
  productsDataTable = $("#productsDataTable").DataTable({
    columnDefs: [
      {
        orderable: false,
        targets: 6,
      },
    ],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud-products/fetch-products.php",
  });

  // Fetch archived products
  productsArchiveDataTable = $("#productsArchiveDataTable").DataTable({
    columnDefs: [
      {
        orderable: false,
        targets: 6,
      },
    ],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud-products/fetch-products-archive.php",
  });

  // Add product
  $("#addProductForm")
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
              position: "right",
              backgroundColor: "#198754",
            }).showToast();
            $("#addProductForm")[0].reset();
            $("#addProductModal").modal("hide");
            productsDataTable.ajax.reload(null, false);
          } else {
            alert("Error!");
          }
        },
      });
      return false;
    });
});

// Edit product information
function editProduct(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#productID").remove();

    $.ajax({
      url: "crud-products/get-selected-product.php",
      type: "post",
      data: { productID: id },
      dataType: "json",
      success: function (response) {
        $("#editProductName").val(response.product_name);
        $("#editProductCategory").val(response.product_category);
        $("#editBrand").val(response.brand);
        $("#editSupplier").val(response.supplier);
        $("#editPrice").val(response.price);

        $("#editProductModalFooter").append('<input type="hidden" name="productID" id="productID" value="' + response.id + '"/>');

        $("#editProductForm")
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
                    position: "right",
                    backgroundColor: "#198754",
                  }).showToast();
                  $("#editProductForm")[0].reset();
                  $("#editProductModal").modal("hide");
                  productsDataTable.ajax.reload(null, false);
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

// Remove product (not permanent)
function removeProduct(id = null) {
  if (id) {
    $("#removeProductButton")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud-products/remove-product.php",
          type: "post",
          data: { productID: id },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              Toastify({
                text: response.message,
                duration: 2000,
                gravity: "top",
                position: "right",
                backgroundColor: "#198754",
              }).showToast();
              $("#removeProductModal").modal("hide");
              productsDataTable.ajax.reload(null, false);
            } else {
              alert("Error!");
            }
          },
        });
      });
  }
}

// Restore product
function restoreProduct(id = null) {
  if (id) {
    $("#restoreProductButton")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud-products/restore-product.php",
          type: "post",
          data: { productID: id },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              Toastify({
                text: response.message,
                duration: 2000,
                gravity: "top",
                position: "right",
                backgroundColor: "#198754",
              }).showToast();
              $("#restoreProductModal").modal("hide");
              productsArchiveDataTable.ajax.reload(null, false);
            } else {
              alert("Error!");
            }
          },
        });
      });
  }
}

// Remove product (permanent)
function deleteProduct(id = null) {
  if (id) {
    $("#deleteProductButton")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud-products/delete-product.php",
          type: "post",
          data: { productID: id },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              Toastify({
                text: response.message,
                duration: 2000,
                gravity: "top",
                position: "right",
                backgroundColor: "#198754",
              }).showToast();
              $("#deleteProductModal").modal("hide");
              productsArchiveDataTable.ajax.reload(null, false);
            } else {
              alert("Error!");
            }
          },
        });
      });
  }
}
