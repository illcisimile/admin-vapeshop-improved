let suppliersDataTable;
let suppliersArchiveDataTable;

$(document).ready(function () {
  // Fetch all suppliers
  suppliersDataTable = $("#suppliersDataTable").DataTable({
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
    ajax: "crud-suppliers/fetch-suppliers.php",
  });

  // Fetch archived suppliers
  suppliersArchiveDataTable = $("#suppliersArchiveDataTable").DataTable({
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
    ajax: "crud-suppliers/fetch-suppliers-archive.php",
  });

  // Add supplier
  $("#addSupplierForm")
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
            $("#addSupplierForm")[0].reset();
            $("#addSupplierModal").modal("hide");
            suppliersDataTable.ajax.reload(null, false);
          } else {
            alert("Error!");
          }
        },
      });
      return false;
    });
});

// Edit supplier
function editSupplier(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#supplierID").remove();

    $.ajax({
      url: "crud-suppliers/get-selected-supplier.php",
      type: "post",
      data: { supplierID: id },
      dataType: "json",
      success: function (response) {
        $("#editSupplierName").val(response.supplier_name);
        $("#editContactNumber").val(response.contact_no);
        $("#editEmail").val(response.email);
        $("#editWebsite").val(response.website);
        $("#editAddress").val(response.address);

        $("#editSupplierModalFooter").append('<input type="hidden" name="supplierID" id="supplierID" value="' + response.id + '"/>');

        $("#editSupplierForm")
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
                  $("#editSupplierForm")[0].reset();
                  $("#editSupplierModal").modal("hide");
                  suppliersDataTable.ajax.reload(null, false);
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

// Remove supplier (not permanent)
function removeSupplier(id = null) {
  if (id) {
    $("#removeSupplierButton")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud-suppliers/remove-supplier.php",
          type: "post",
          data: { supplierID: id },
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
              $("#removeSupplierModal").modal("hide");
              suppliersDataTable.ajax.reload(null, false);
            } else {
              alert("Error!");
            }
          },
        });
      });
  }
}

// Restore supplier
function restoreSupplier(id = null) {
  if (id) {
    $("#restoreSupplierButton")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud-suppliers/restore-supplier.php",
          type: "post",
          data: { supplierID: id },
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
              $("#restoreSupplierModal").modal("hide");
              suppliersArchiveDataTable.ajax.reload(null, false);
            } else {
              alert("Error!");
            }
          },
        });
      });
  }
}

// Remove supplier (permanent)
function deleteSupplier(id = null) {
  if (id) {
    $("#deleteSupplierButton")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud-suppliers/delete-supplier.php",
          type: "post",
          data: { supplierID: id },
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
              $("#deleteSupplierModal").modal("hide");
              suppliersArchiveDataTable.ajax.reload(null, false);
            } else {
              alert("Error!");
            }
          },
        });
      });
  }
}
