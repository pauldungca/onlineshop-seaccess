<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  <style type = "text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size:40px;
            padding-bottom:40px;
        }
        .input_color{
            color:black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 1px red solid;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;

        }
  </style>
</head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      @include('admin.header');
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="div_center">
                <h2 class="h2_font">Add Product</h2>
                <form action="{{url('add_product')}}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    <div class="div_design">
                    <label for="name">Product Name</label>                
                    <input type="text" class= "input_color"name="name" id="name" placeholder="Name of the Product">
                    </div>

                    <div class="div_design">
                    <label for="price">Product Price</label>                
                    <input type="number" class= "input_color"name="price" id="price" placeholder="Price of the Product">
                    </div>

                    <div class="div_design">
                    <label for="discount">Product Discount</label>                
                    <input type="number" class= "input_color"name="discount" id="discount" placeholder="Price of the Product">
                    </div>

                    <div class="div_design">
                    <label for="description">Product Description</label>                
                    <input type="text" class= "input_color"name="description" id="description" placeholder="Description of the Product">
                    </div>

                    <div class="div_design">
                    <label for="category">Product Category</label>                
                    <select name="category" class= "input_color" id="category">
                        <option value="" disabled selected>Add Category</option>
                        @foreach($category as $category)
                        <option value="opt2">{{$category -> category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="div_design">
                    <label for="image">Product Image</label>                
                    <input type="file" class= "input_color" name="image" id="image" placeholder="Image of the Product">
                    </div>
                    <input type="submit" class= "btn btn-primary" value ="Add Product">
                </form>
            </div>
        </div>
        </div>
      <!-- main-panel ends -->
    </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');
  </body>
</html>