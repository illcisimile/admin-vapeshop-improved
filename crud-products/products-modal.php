<?php

require_once 'database/config.php';

$sqlCategory = "SELECT * FROM products_category";

$queryAddCategory = mysqli_query($connection, $sqlCategory);

$queryEditCategory = mysqli_query($connection, $sqlCategory);

?>

<!-- Add Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProduct">Add new product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="crud-products/add-product.php" method="post" id="addProductForm">
        <div class="modal-body">
          <!-- Product name -->
          <div class="mb-3">
            <label for="productName" class="form-label">Product name</label>
            <input type="text" class="form-control" id="productName" name="productName" />
          </div>
          <!-- Category -->
          <div class="mb-3">
            <label for="productCategory" class="form-label">Category</label>
            <select class="form-select" id="productCategory" name="productCategory">
              <option selected>Select product category</option>
              <?php
              while ($addCategory = mysqli_fetch_assoc($queryAddCategory)) {
                $addCategoryName = $addCategory['category_name'];
                echo '<option value="' . $addCategoryName . '">' . $addCategoryName . '</option>';
              }
              ?>
            </select>
          </div>
          <!-- Brand -->
          <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" />
          </div>
          <!-- Supplier -->
          <div class="mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <select class="form-select" id="supplier" name="supplier">
              <option value="VapeOmatics Vape Lounge" selected>VapeOmatics Vape Lounge</option>
            </select>
          </div>
          <!-- Price -->
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" />
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

<!-- Edit Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProduct">Edit product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="crud-products/edit-product.php" method="post" id="editProductForm">
        <div class="modal-body">
          <!-- Product name -->
          <div class="mb-3">
            <label for="editProductName" class="form-label">Product name</label>
            <input type="text" class="form-control" id="editProductName" name="editProductName" />
          </div>
          <!-- Category -->
          <div class="mb-3">
            <label for="editProductCategory" class="form-label">Category</label>
            <select class="form-select" id="editProductCategory" name="editProductCategory">
              <option selected>Select product category</option>
              <?php
              while ($editCategory = mysqli_fetch_assoc($queryEditCategory)) {
                $editCategoryName = $editCategory['category_name'];
                echo '<option value="' . $editCategoryName . '">' . $editCategoryName . '</option>';
              }
              ?>
            </select>
          </div>
          <!-- Brand -->
          <div class="mb-3">
            <label for="editBrand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="editBrand" name="editBrand" />
          </div>
          <!-- Supplier -->
          <div class="mb-3">
            <label for="editSupplier" class="form-label">Supplier</label>
            <select class="form-select" id="editSupplier" name="editSupplier">
              <option value="VapeOmatics Vape Lounge" selected>VapeOmatics Vape Lounge</option>
            </select>
          </div>
          <!-- Price -->
          <div class="mb-3">
            <label for="editPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="editPrice" name="editPrice" />
          </div>
        </div>
        <div class="modal-footer" id="editProductModalFooter">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Remove Modal -->
<div class="modal fade" id="removeProductModal" tabindex="-1" aria-labelledby="removeProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="removeProduct">Remove product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Are you sure you want to remove this product?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" id="removeProductButton">Remove</button>
      </div>
    </div>
  </div>
</div>

<!-- Restore Modal -->
<div class="modal fade" id="restoreProductModal" tabindex="-1" aria-labelledby="restoreProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="restoreProduct">Restore product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Are you sure you want to restore this product?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="restoreProductButton">Restore</button>
      </div>
    </div>
  </div>
</div>

<!-- Permanent Delete Modal -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProduct">Permanently remove product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Are you sure you want to permanently remove this product? This action cannot be undone.</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" id="deleteProductButton">Remove permanently</button>
      </div>
    </div>
  </div>
</div>