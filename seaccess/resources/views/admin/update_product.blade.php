<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Product | Admin</title>
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
    <style type="text/css">
        .update-container {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            margin: 40px auto;
        }
        
        .h2_font {
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #d92323;
            padding-bottom: 10px;
            display: inline-block;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            color: #e0e0e0;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
        background-color: #3a3a3a;
        border: 1px solid #444;
        color: #e0e0e0 !important; /* Force text color */
        height: 45px;
        border-radius: 4px;
        width: 100%;
        padding: 0 15px;
        transition: all 0.3s;
    }
        .form-control:focus {
            background-color: #4a4a4a;
            border-color: #d92323;
            box-shadow: 0 0 0 0.2rem rgba(217, 35, 35, 0.25);
            color: #ffffff;
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23e0e0e0' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px 12px;
        }
        
        .btn-primary {
            background-color: #d92323;
            border-color: #d92323;
            border-radius: 4px;
            height: 45px;
            padding: 0 30px;
            font-weight: 500;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 20px;
        }
        
        .btn-primary:hover {
            background-color: #b51d1d;
            border-color: #b51d1d;
            transform: translateY(-2px);
        }
        
        .current-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
            border: 2px solid #444;
            margin: 10px 0;
        }
        
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        
        .file-input-label {
            display: block;
            padding: 12px 15px;
            background-color: #3a3a3a;
            border: 1px solid #444;
            border-radius: 4px;
            color: #e0e0e0;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s;
        }
        
        .file-input-label:hover {
            background-color: #444;
        }
        
        .alert {
            border-radius: 4px;
            border-left: 4px solid #d92323;
            background-color: #3a3a3a;
            color: #ffffff;
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
            <div class="update-container">
              @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              
              <h2 class="h2_font">Update Product</h2>
              
              <form action="{{url('update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{$product-> product_name}}">
                </div>

                <div class="form-group">
                  <label for="price">Product Price</label>
                  <input type="number" class="form-control" name="price" id="price" value="{{$product-> price}}">
                </div>

                <div class="form-group">
                  <label for="discount">Product Discount</label>
                  <input type="number" class="form-control" name="discount" id="discount" value="{{$product-> discounted_price}}">
                </div>

                <div class="form-group">
                  <label for="description">Product Description</label>
                  <textarea class="form-control" name="description" id="description" rows="3">{{$product->description}}</textarea>
                </div>

                <div class="form-group">
                  <label for="category">Product Category</label>
                  <select name="category" class="form-control" id="category">
                    <option value="{{$product->category}}" selected>Current: {{$product->category}}</option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Current Image</label>
                  <img class="current-image" src="product/{{$product->image}}" alt="Current product image">
                </div>

                <div class="form-group">
                  <label for="image">Change Image</label>
                  <div class="file-input-wrapper">
                    <label for="image" class="file-input-label">
                      <i class="mdi mdi-cloud-upload"></i> Choose new image
                    </label>
                    <input type="file" name="image" id="image">
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- plugins:js -->
    @include('admin.script');
  </body>
</html>