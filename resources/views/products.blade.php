<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Ajax Crud</title>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-5 text-center">Laravel Ajax Crud</h2>
               <a href="" class="my-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
                <input type="text" name="search" id="search" class="form-control mb-3" placeholder="Search">
               <div class="table-data">
                <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th>{{$loop->iteration}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>
        <a href="" class="btn btn-success update_product_form" 
        data-bs-toggle="modal"
        data-bs-target="#updateModal" 
        data-id="{{$product->id}}"
        data-name="{{$product->name}}"
        data-price="{{$product->price}}"
        ><i class="las la-edit"></i></a>

        <a href=""
         class="btn btn-danger delete_product"
         data-id="{{$product->id}}">
         <i class="las la-times"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!!  $products->links() !!}
                </div>
            </div>
        </div>
    </div>
      @include('add_product_modal')
      @include('update_product_modal')
      @include('product_js') 
      {!! Toastr::message() !!} 
  </body>
</html>