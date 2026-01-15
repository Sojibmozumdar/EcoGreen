 @extends('backend.mastaring')


 @section('content')
     <div class="ecogreen-category">

         <style>
             /* ===== Scoped Only Inside .ecogreen-category ===== */
             .ecogreen-category {
                 --eco-dark: #0f3d2e;
                 --eco-main: #2e8b57;
                 --eco-soft: #eaf6ef;
             }

             .ecogreen-category .eco-box {
                 background: #ffffff;
                 border-radius: 16px;
                 padding: 24px;
                 box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
             }

             /* Sub Navbar */
             .ecogreen-category .sub-nav {
                 background: linear-gradient(135deg, var(--eco-dark), var(--eco-main));
                 border-radius: 12px;
                 padding: 8px;
                 margin-bottom: 18px;
                 display: flex;
                 gap: 6px;
             }

             .ecogreen-category .sub-nav a {
                 color: #dff4ea;
                 padding: 7px 16px;
                 border-radius: 8px;
                 text-decoration: none;
                 font-size: 14px;
                 transition: .3s;
             }

             .ecogreen-category .sub-nav a.active,
             .ecogreen-category .sub-nav a:hover {
                 background: rgba(255, 255, 255, .18);
                 color: #fff;
             }

             /* Add Button */
             .ecogreen-category .btn-eco {
                 background: linear-gradient(135deg, #3cb371, #2e8b57);
                 border: none;
                 color: #fff;
                 border-radius: 30px;
                 padding: 7px 18px;
                 font-size: 14px;
             }

             /* Table */
             .ecogreen-category table th {
                 background: #c6d7ce;
                 color: #1f513f;
                 border: none;
                 font-weight: 600;
                 font-size: 14px;
             }

             .ecogreen-category table td {
                 border-color: #cee4d5;
                 font-size: 14px;
                 vertical-align: middle;
             }

             /* Status */
             .ecogreen-category .status-active {
                 background: #d1f5e0;
                 color: #146c43;
                 padding: 5px 14px;
                 border-radius: 20px;
                 font-size: 12px;
                 font-weight: 600;
             }

             .ecogreen-category .status-inactive {
                 background: #ffe2e2;
                 color: #b42318;
                 padding: 5px 14px;
                 border-radius: 20px;
                 font-size: 12px;
                 font-weight: 600;
             }

             /* Action Buttons */
             .ecogreen-category .btn-action {
                 width: 34px;
                 height: 34px;
                 padding: 0;
                 border-radius: 50%;
                 display: inline-flex;
                 align-items: center;
                 justify-content: center;
             }
         </style>

         <!-- Sub Navbar -->
         <div class="sub-nav">
             <a href="{{ route('category.index') }}" class="active">
                 <i class="bi bi-grid"></i> Category
             </a>
             <a href="{{ route('sub_category.index') }}">
                 <i class="bi bi-diagram-3"></i> Sub Category
             </a>
         </div>

         <!-- Content Box -->
         <div class="eco-box">

             <!-- Header -->
             <div class="d-flex justify-content-between align-items-center mb-3">
                 <h6 class="mb-0 fw-semibold">Sub Category List</h6>
                 <a href="{{ route('sub_category.create') }}" class="btn btn-eco">
                     <i class="bi bi-plus-circle"></i> Add SubCategory
                 </a>
             </div>

             <!-- Table -->
             <table class="table table-hover align-middle mb-0">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Sub Category Name</th>
                         <th>Category Name</th>
                         <th width="120">Order</th>
                         <th width="150">Status</th>
                         <th width="150" class="text-center">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($sub_categories as $row)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $row->name }}</td>
<td>{{ $row->category->name }}</td>
                             <td>{{ $row->order }}</td>
                             <td>
                                 <span class="{{ $row->status == 1 ? 'status-active' : 'status-inactive' }}">
                                     {{ $row->status == 1 ? 'Active' : 'Inactive' }}
                                 </span>
                             </td>

                             <td class="text-center">
                                 <a href="{{ route('sub_category.edit', $row->id) }}"
                                     class="btn btn-success btn-sm btn-action">
                                     <i class="bi bi-pencil"></i>
                                 </a>



                                 <form action="{{ route('sub_category.destroy', $row->id) }}" method="POST"
                                     class="d-inline delete-form">
                                     @csrf
                                     @method('DELETE')

                                     <button type="submit" class="btn btn-danger btn-sm btn-action">
                                         <i class="bi bi-trash"></i>
                                     </button>
                                 </form>

                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
             <!-- Pagination -->
             <div class="d-flex justify-content-between align-items-center mt-3">

                 <div>
                     {{ $sub_categories->links('pagination::bootstrap-5') }}
                 </div>
             </div>


         </div>
     </div>
 @endsection
 <style>
     .ecogreen-category .pagination {
         margin-bottom: 2px;
     }

     .ecogreen-category .page-link {
         color: #2e8b57;
         border-radius: 10px;
         margin: 5px 2px;

         border: 1px solid #d7e7df;
     }

     .ecogreen-category .page-item.active .page-link {
         background: #2e8b57;
         border-color: #2e8b57;
         color: #fff;

     }

     .ecogreen-category .page-link:hover {
         background: #eaf6ef;
     }
 </style>
 @push('scripts')
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             @if (session('success'))
                 Swal.fire({
                     icon: 'success',
                     title: 'Success!',
                     text: '{{ session('success') }}',
                     timer: 2000,
                     showConfirmButton: false,
                     background: '#fff',
                     iconColor: 'rgb(37, 135, 47)'
                 });
             @endif
         });

         function deleteTeacher(id) {
             Swal.fire({
                 title: 'Are you sure?',
                 text: "This teacher's record will be permanently deleted!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: 'rgb(21, 86, 16)',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, Delete it!',
                 cancelButtonText: 'Cancel'
             }).then((result) => {
                 if (result.isConfirmed) {
                     document.getElementById('delete-form-' + id).submit();
                 }
             })
         }
     </script>
 @endpush
