
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateProductForm">
        @csrf
        <input type="hidden" id="up_id">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">{{__('update_product.update_product')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="errMsgContainer mb-2" >

            </div>
        <div class="form-group">
            <label for="name">{{__("update_product.Name")}}</label>
            <input type="text" class="form-control" name="up_name" id="up_name" placeholder="Product Name">
        </div>

        
        <div class="form-group mt-2">
            <label for="name">{{__("update_product.Price")}}</label>
            <input type="text" class="form-control" name="up_price" id="up_price" placeholder="Product Price">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("update_product.Close")}}</button>
        <button type="button" id="update_product" class="btn btn-primary">{{__("update_product.update")}}</button>
      </div>
    </div>
  </div>
    </form>
</div>