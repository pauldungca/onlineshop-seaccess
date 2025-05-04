<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Management | Admin</title>
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
        .product-management-container {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            margin: 40px auto;
            overflow-x: auto;
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
        
        .product-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #3a3a3a;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .product-table th {
            background-color: #d92323;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 500;
            white-space: nowrap;
        }
        
        .product-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #444;
            color: #e0e0e0;
            vertical-align: middle;
        }
        
        .product-table tr:last-child td {
            border-bottom: none;
        }
        
        .product-table tr:hover td {
            background-color: #444;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #555;
        }
        
        .btn-danger {
            background-color: #333;
            border-color: #444;
            color: #e0e0e0;
            transition: all 0.3s;
            padding: 6px 12px;
            border-radius: 4px;
            margin: 2px;
        }
        
        .btn-danger:hover {
            background-color: #d92323;
            border-color: #d92323;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-success {
            background-color: #333;
            border-color: #444;
            color: #e0e0e0;
            transition: all 0.3s;
            padding: 6px 12px;
            border-radius: 4px;
            margin: 2px;
        }
        
        .btn-success:hover {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            transform: translateY(-2px);
        }
        
        .action-cell {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .alert {
            border-radius: 4px;
            border-left: 4px solid #d92323;
            background-color: #3a3a3a;
            color: #ffffff;
        }
        
        @media (max-width: 768px) {
            .product-table {
                display: block;
                overflow-x: auto;
            }
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
            <div class="product-management-container">
              @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              
              <h2 class="h2_font">Manage Products</h2>
              
              <table class="product-table">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discounted Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($product as $product)
                  <tr>
                    <td><img class="product-image" src="product/{{$product->image}}" alt="{{$product->product_name}}"></td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>${{ number_format($product->discounted_price, 2) }}</td>
                    <td class="action-cell">
                      <a href="{{ url('update_product/' . $product->id) }}" class="btn btn-success">
                        <i class="mdi mdi-pencil"></i> Edit
                      </a>
                      <a href="{{ url('delete_product/' . $product->id) }}" 
                         onclick="return confirm('Are you sure you want to delete this product?')" 
                         class="btn btn-danger">
                        <i class="mdi mdi-delete"></i> Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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