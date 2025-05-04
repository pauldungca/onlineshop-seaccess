<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category Management | Admin</title>
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
        .category-container {
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
        
        .input-group {
            margin-bottom: 30px;
        }
        
        .form-control {
            background-color: #3a3a3a;
            border: 1px solid #444;
            color: #ffffff;
            height: 45px;
            border-radius: 4px 0 0 4px;
        }
        
        .form-control:focus {
            background-color: #4a4a4a;
            border-color: #d92323;
            box-shadow: 0 0 0 0.2rem rgba(217, 35, 35, 0.25);
            color: #ffffff;
        }
        
        .btn-primary {
            background-color: #d92323;
            border-color: #d92323;
            border-radius: 0 4px 4px 0;
            height: 45px;
            padding: 0 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #b51d1d;
            border-color: #b51d1d;
            transform: translateY(-2px);
        }
        
        .category-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            background-color: #3a3a3a;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .category-table th {
            background-color: #d92323;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 500;
        }
        
        .category-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #444;
            color: #e0e0e0;
            vertical-align: middle;
        }
        
        .category-table tr:last-child td {
            border-bottom: none;
        }
        
        .category-table tr:hover td {
            background-color: #444;
        }
        
        .btn-danger {
            background-color: #333;
            border-color: #444;
            color: #e0e0e0;
            transition: all 0.3s;
            padding: 6px 12px;
            border-radius: 4px;
        }
        
        .btn-danger:hover {
            background-color: #d92323;
            border-color: #d92323;
            color: white;
            transform: translateY(-2px);
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
            <div class="category-container">
              @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              
              <h2 class="h2_font">Add Category</h2>
              
              <form action="{{url('/add_category')}}" method="POST">
                @csrf
                <div class="input-group">
                  <input type="text" name="category" class="form-control" id="category" placeholder="Enter category name">
                  <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
                </div>
              </form>
              
              <table class="category-table">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $data)
                  <tr>
                    <td>{{$data->category_name}}</td>
                    <td>
                      <a href="{{url('delete_category', $data->id)}}" 
                         onclick="return confirm('Are you sure you want to delete this category?')" 
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