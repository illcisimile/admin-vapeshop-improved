<?php

require_once 'database/config.php';

$sqlCategory = "SELECT * FROM products_category";

$queryEditCategory = mysqli_query($connection, $sqlCategory);

?>

<!-- Edit Stock Modal -->
<div class="modal fade" id="editStockModal" tabindex="-1" aria-labelledby="editStock" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editStock">Edit product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="crud-stocks/edit-stock.php" method="post" id="editStockForm">
        <div class="modal-body">
          <!-- Product name -->
          <div class="mb-3">
            <label for="editProductName" class="form-label">Product name</label>
            <input type="text" class="form-control" id="editProductName" name="editProductName" disabled />
          </div>
          <!-- Category -->
          <div class="mb-3">
            <label for="editProductCategory" class="form-label">Category</label>
            <select class="form-select" id="editProductCategory" name="editProductCategory" disabled>
              <option selected>Select product category</option>
              <?php
              while ($editCategory = mysqli_fetch_assoc($queryEditCategory)) {
                $editCategoryName = $editCategory['category_name'];
                echo '<option value="' . $editCategoryName . '">' . $editCategoryName . '</option>';
              }
              ?>
            </select>
          </div>
          <!-- Quantity -->
          <div class="mb-3">
            <label for="editQuantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="editQuantity" name="editQuantity" />
          </div>
          <!-- Warning Quantity -->
          <div class="mb-3">
            <label for="editWarningQuantity" class="form-label">Warning Quantity</label>
            <input type="text" class="form-control" id="editWarningQuantity" name="editWarningQuantity" />
          </div>
        </div>
        <div class="modal-footer" id="editStockModalFooter">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>