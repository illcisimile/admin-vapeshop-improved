let stocksDataTable;
let criticalStocksDataTable;
let newStocksDataTable;

$(document).ready(function () {
  // Fetch all stocks
  stocksDataTable = $("#stocksDataTable").DataTable({
    columnDefs: [
      {
        orderable: false,
        targets: 5,
      },
    ],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud-stocks/fetch-stocks.php",
  });

  // Fetch critical stocks
  criticalStocksDataTable = $("#criticalStocksDataTable").DataTable({
    columnDefs: [
      {
        orderable: false,
        targets: 5,
      },
    ],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud-stocks/fetch-critical-stocks.php",
  });

  // Fetch new stocks
  newStocksDataTable = $("#newStocksDataTable").DataTable({
    columnDefs: [
      {
        orderable: false,
        targets: 5,
      },
    ],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud-stocks/fetch-new-stocks.php",
  });
});

// Edit stock
function editStock(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#stockID").remove();

    $.ajax({
      url: "crud-stocks/get-selected-stock.php",
      type: "post",
      data: { stockID: id },
      dataType: "json",
      success: function (response) {
        $("#editProductName").val(response.product_name);
        $("#editProductCategory").val(response.product_category);
        $("#editQuantity").val(response.quantity);
        $("#editWarningQuantity").val(response.warning_quantity);

        $("#editStockModalFooter").append('<input type="hidden" name="stockID" id="stockID" value="' + response.id + '"/>');

        $("#editStockForm")
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
                  $("#editStockForm")[0].reset();
                  $("#editStockModal").modal("hide");
                  stocksDataTable.ajax.reload(null, false);
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

// Edit critical stock (same as editStock)
function editCriticalStock(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#stockID").remove();

    $.ajax({
      url: "crud-stocks/get-selected-stock.php",
      type: "post",
      data: { stockID: id },
      dataType: "json",
      success: function (response) {
        $("#editProductName").val(response.product_name);
        $("#editProductCategory").val(response.product_category);
        $("#editQuantity").val(response.quantity);
        $("#editWarningQuantity").val(response.warning_quantity);

        $("#editStockModalFooter").append('<input type="hidden" name="stockID" id="stockID" value="' + response.id + '"/>');

        $("#editStockForm")
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
                  $("#editStockForm")[0].reset();
                  $("#editStockModal").modal("hide");
                  criticalStocksDataTable.ajax.reload(null, false);
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

// Edit new stock (same as editStock)
function editNewStock(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#stockID").remove();

    $.ajax({
      url: "crud-stocks/get-selected-stock.php",
      type: "post",
      data: { stockID: id },
      dataType: "json",
      success: function (response) {
        $("#editProductName").val(response.product_name);
        $("#editProductCategory").val(response.product_category);
        $("#editQuantity").val(response.quantity);
        $("#editWarningQuantity").val(response.warning_quantity);

        $("#editStockModalFooter").append('<input type="hidden" name="stockID" id="stockID" value="' + response.id + '"/>');

        $("#editStockForm")
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
                  $("#editStockForm")[0].reset();
                  $("#editStockModal").modal("hide");
                  newStocksDataTable.ajax.reload(null, false);
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
