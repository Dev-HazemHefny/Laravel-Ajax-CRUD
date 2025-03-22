    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script>
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    </script>
    <script>
     // الهدف منه التأكد من أن جميع العناصر في الصفحة جاهزة قبل أن يبدأ الكود في العمل
      $(document).ready(function(){
        //لما ادوس علي ال id #addproduct ينفذ الكود اللي موجود جواه 
        $(document).on('click','#add_product',function(e){
          // هذا السطر يعني: "منع السلوك الافتراضي للعنصر عند النقر عليه."
          e.preventDefault();
          let name = $('#name').val();
          let price = $('#price').val();
          // console.log(name+price);
          // AJAX لإرسال البيانات إلى السيرفر دون الحاجة إلى إعادة تحميل الصفحة."
          $.ajax({
            //  "حدد عنوان URL الذي سيتم إرسال الطلب إليه."  
            url:"{{ route('add.product') }}",
            method:'post',
            // أرسل البيانات التالية إلى السيرفر:"
            data:{name:name,price:price, _token: "{{ csrf_token() }}"},
            //   هو الرد الذي يتم استقباله من السيرفر.
            success:function(res){
              if(res.status == 'success'){
                $('#addModal').modal('hide');
                // تفريغ جميع الحقول ف هذا النموذج
                $('#addProductForm')[0].reset();
                // update the table without reloading
                $('.table').load(location.href+' .table');
                Command: toastr["info"]("Product Added ","Success")
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
              }
            },error:function(err){
              $('.errMsgContainer').html(''); // Clear previous errors
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                  $('.errMsgContainer').append('<span class="text-danger">' + value + '</span><br>');
                });
            }
          });
        });
        //show product data in update form 
        $(document).on('click','.update_product_form',function(){
          let id = $(this).data('id');
          let name = $(this).data('name');
          let price = $(this).data('price');
          $('#up_id').val(id);  
          $('#up_name').val(name);  
          $('#up_price').val(price);  
        });
                       //update product data 
        $(document).on('click','#update_product',function(e){
          // هذا السطر يعني: "منع السلوك الافتراضي للعنصر عند النقر عليه."
          e.preventDefault();
          let up_id = $('#up_id').val();
          let up_name = $('#up_name').val();
          let up_price = $('#up_price').val();
          // console.log(name+price);
          // AJAX لإرسال البيانات إلى السيرفر دون الحاجة إلى إعادة تحميل الصفحة."
          $.ajax({
            //  "حدد عنوان URL الذي سيتم إرسال الطلب إليه."  
            url:"{{ route('update.product') }}",
            method:'post',
            // أرسل البيانات التالية إلى السيرفر:"
            data:{up_id:up_id,up_name:up_name,up_price:up_price, _token: "{{ csrf_token() }}"},
            //   هو الرد الذي يتم استقباله من السيرفر.
            success:function(res){
              if(res.status == 'success'){
                $('#updateModal').modal('hide');
                // تفريغ جميع الحقول ف هذا النموذج
                $('#updateProductForm')[0].reset();
                // update the table without reloading
                $('.table').load(location.href+' .table');
                Command: toastr["success"]("Product Updated","Success")
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
              }
            },error:function(err){
              $('.errMsgContainer').html(''); // Clear previous errors
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                  $('.errMsgContainer').append('<span class="text-danger">' + value + '</span><br>');
                });
            }
          });
        });

        //delete product data
        $(document).on('click','.delete_product',function(e){
          // هذا السطر يعني: "منع السلوك الافتراضي للعنصر عند النقر عليه."
          e.preventDefault();
          let product_id = $(this).data('id');
          if(confirm("Are You Sure To Delete This Product"))
        {
          $.ajax({
            //  "حدد عنوان URL الذي سيتم إرسال الطلب إليه."  
            url:"{{ route('delete.product') }}",
            method:'post',
            // أرسل البيانات التالية إلى السيرفر:"
            data:{product_id:product_id, _token: "{{ csrf_token() }}"},
            //   هو الرد الذي يتم استقباله من السيرفر.
            success:function(res){
              if(res.status == 'success'){
                // update the table without reloading
                $('.table').load(location.href+' .table');
 Command: toastr["success"]("Product Deleted","Success")
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
              }
            },
          });
        }
        });
            // pagination 
            $(document).on('click','.pagination a',function(e){
              e.preventDefault();
             // يستخرج رقم الصفحة من رابط
              let page = $(this).attr('href').split("page=")[1]
              product(page)
            });
            //call the fun and pass page to it
             function product(page){
              $.ajax({
                url: "/pagination/paginate-data?page=" + page,
                success:function(res){
                  $('.table-data').html(res);
                }
              })
            }
            // search for product
            $(document).on('keyup',function(e){
              e.preventDefault();
              let search_string = $('#search').val();
              // console.log(search_string);
              $.ajax({
                url: "{{ route('search.product') }}",
                method: 'GET',
                data:{search_string:search_string, _token: "{{ csrf_token() }}"},
                success:function(res){
                  $('.table-data').html(res);
                  if(res.status=='not found'){
                    $('.table-data').html('<span class="text-danger">'+'Not Found'+"</span>");
                  }
                }
              })
            })
      });      
    </script>



<!-- كود JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let dropdownButton = document.getElementById("dropdown-button");
        let dropdownMenu = document.getElementById("dropdown-menu");

        dropdownButton.addEventListener("click", function () {
            dropdownMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>