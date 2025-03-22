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
              <div class="relative inline-block text-left">
                <!-- زر القائمة -->
                <button id="dropdown-button" class="px-4 py-2 bg-gray-200 rounded-md">
                    {{ strtoupper(app()->getLocale()) }}
                </button>
            
                <!-- قائمة اللغات -->
                <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg border border-gray-300">
                    <a href="{{ route('localization', 'en') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        {{ __('English') }}
                    </a>
                    <a href="{{ route('localization', 'ar') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        {{ __('العربية') }}
                    </a>
                </div>
            </div>
            





                <h2 class="my-5 text-center">{{__('products.Head')}}</h2>
               <a href="" class="my-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">{{__('products.AddButton')}}</a>
                <input type="text" name="search" id="search" class="form-control mb-3" placeholder="Search">
               <div class="table-data">
                <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('products.Name')}}</th>
      <th scope="col">{{__('products.Price')}}</th>
      <th scope="col">{{__('products.Action')}}</th>
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