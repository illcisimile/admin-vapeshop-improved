<!-- Add Supplier Modal -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplier" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSupplier">Add new supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="crud-suppliers/add-supplier.php" method="post" id="addSupplierForm">
        <div class="modal-body">
          <!-- Supplier name -->
          <div class="mb-3">
            <label for="supplierName" class="form-label">Supplier name</label>
            <input type="text" class="form-control" id="supplierName" name="supplierName" />
          </div>
          <!-- Contact number -->
          <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact no.</label>
            <input type="text" class="form-control" id="contactNumber" name="contactNumber" />
          </div>
          <!-- E-mail address -->
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" />
          </div>
          <!-- Website -->
          <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" class="form-control" id="website" name="website" />
          </div>
          <!-- Address -->
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Supplier Modal -->
<div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="editSupplier" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSupplier">Edit supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="crud-suppliers/edit-supplier.php" method="post" id="editSupplierForm">
        <div class="modal-body">
          <!-- Supplier name -->
          <div class="mb-3">
            <label for="editSupplierName" class="form-label">Supplier name</label>
            <input type="text" class="form-control" id="editSupplierName" name="editSupplierName" />
          </div>
          <!-- Contact number -->
          <div class="mb-3">
            <label for="editContactNumber" class="form-label">Contact no.</label>
            <input type="text" class="form-control" id="editContactNumber" name="editContactNumber" />
          </div>
          <!-- E-mail address -->
          <div class="mb-3">
            <label for="editEmail" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="editEmail" name="editEmail" />
          </div>
          <!-- Website -->
          <div class="mb-3">
            <label for="editWebsite" class="form-label">Website</label>
            <input type="text" class="form-control" id="editWebsite" name="editWebsite" />
          </div>
          <!-- Address -->
          <div class="mb-3">
            <label for="editAddress" class="form-label">Address</label>
            <textarea class="form-control" id="editAddress" name="editAddress"></textarea>
          </div>
        </div>
        <div class="modal-footer" id="editSupplierModalFooter">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Remove Supplier Modal -->
<div class="modal fade" id="removeSupplierModal" tabindex="-1" aria-labelledby="removeSupplier" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="removeSupplier">Remove supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Are you sure you want to remove this supplier?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" id="removeSupplierButton">Remove</button>
      </div>
    </div>
  </div>
</div>