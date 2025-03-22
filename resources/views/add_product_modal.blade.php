
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addProductForm">
        @csrf
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">{{__('add_product.AddNewProduct')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="errMsgContainer mb-2" >

            </div>
        <div class="form-group">
            <label for="name">{{__('add_product.Name')}}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
        </div>

        
        <div class="form-group mt-2">
            <label for="name">{{__('add_product.Price')}}</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Product Price">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('add_product.Close')}}</button>
        <button type="button" id="add_product" class="btn btn-primary">{{__('add_product.SaveProduct')}}</button>
      </div>
    </div>
  </div>
    </form>
</div>