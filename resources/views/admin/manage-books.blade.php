<!DOCTYPE html>
<html lang="en">
   @include('admin.head')
   <body>
      <div class="container-scroller">
         <!-- partial:../../partials/_sidebar.html -->
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
               <a class="sidebar-brand brand-logo" href="../../index"><img src="../../../admin/assets/images/logo.png" alt="logo" /></a>
               <a class="sidebar-brand brand-logo-mini" href="../../index"><img src="../../../admin/assets/images/logo-mini.svg" alt="logo" /></a> 
            </div>
            @include('admin.sidebar')
         </nav>
         <div class="container-fluid page-body-wrapper">
            @include('admin.navbar')
            <style>
               .table-responsive {
               overflow-x: auto;
               }
               .table {
               min-width: 1200px;
               }
            </style>
            <div class="main-panel">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-md-12 grid-margin stretch-card">
                        <!-- resources\views\admin\manage-books.blade.php -->
                        <div class="card">
                           <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                 <h4 class="card-title mb-0">Manage Books</h4>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBookModal">
                                 <i class="fa fa-plus"></i> + Add New Book
                                 </button>
                              </div>
                              <!-- Success and Error Messages -->
                              @if (session('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 <strong>{{ session('success') }}</strong>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              @endif
                              @if (session('delete'))
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <strong>{{ session('delete') }}</strong>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              @endif
                              @if ($errors->any())
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              @endif
                              <!-- Search Section -->
                              <div class="row mb-3">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="bookSearch">Search Books:</label>
                                       <div class="input-group">
                                          <input type="text" class="form-control" id="bookSearch" 
                                             placeholder="Search by title, author, or ISBN..." autocomplete="off">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>&nbsp;</label>
                                       <div>
                                          <small class="text-muted" id="searchResults"></small>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @if(isset($books) && $books->count() > 0)
                              <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Book ID</th>
                                          <th>Book Title</th>
                                          <th>Author</th>
                                          <th>ISBN</th>
                                          <th>Description</th>
                                          <th>Image</th>
                                          <th>Added Date</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody id="booksTableBody">
                                       @foreach($books as $index => $book)
                                       <tr class="book-row" data-title="{{ strtolower($book->title) }}" data-author="{{ strtolower($book->author) }}" data-isbn="{{ strtolower($book->isbn) }}">
                                          <td>{{ $index + 1 }}</td>
                                          <td>{{ $book->id }}</td>
                                          <td>{{ $book->title }}</td>
                                          <td>{{ $book->author }}</td>
                                          <td>{{ $book->isbn }}</td>
                                          <td>{{ Str::limit($book->description, 80) }}</td>
                                          <td>
                                             @if($book->image)
                                             <img src="data:image/jpeg;base64,{{ $book->image }}" 
                                                alt="{{ $book->title }}" 
                                                style="max-width: 150px; max-height: 180px; object-fit: contain; border-radius: 4px;">
                                             @else
                                             <div style="width: 120px; height: 140px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 4px;">
                                                <span style="font-size: 10px; color: #6c757d;">No Image</span>
                                             </div>
                                             @endif
                                          </td>
                                          <td>{{ $book->created_at->format('d M Y') }}</td>
                                          <td>
                                             <button type="button" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editBookModal{{ $book->id }}">
                                             Update
                                             </button>
                                             <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?')" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                             </form>
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                              @else
                              <div class="alert alert-info text-center">
                                 <i class="fa fa-info-circle"></i> No books have been added yet. Click "Add New Book" to get started.
                              </div>
                              @endif
                           </div>
                        </div>
                        <script>
                           $(document).ready(function () {
                              let allBookRows = $('.book-row');
                           
                              // Search functionality
                              $('#bookSearch').on('input', function() {
                                 const searchTerm = $(this).val().toLowerCase().trim();
                                 
                                 if (searchTerm === '') {
                                    // Show all rows
                                    allBookRows.show();
                                    updateSearchResults('');
                                 } else {
                                    let visibleCount = 0;
                                    
                                    allBookRows.each(function() {
                                       const title = $(this).data('title');
                                       const author = $(this).data('author');
                                       const isbn = $(this).data('isbn');
                                       
                                       if (title.includes(searchTerm) || author.includes(searchTerm) || isbn.includes(searchTerm)) {
                                          $(this).show();
                                          visibleCount++;
                                       } else {
                                          $(this).hide();
                                       }
                                    });
                                    
                                    updateSearchResults(searchTerm, visibleCount);
                                 }
                              });
                              
                              // Update search results text
                              function updateSearchResults(searchTerm, visibleCount = null) {
                                 const resultsElement = $('#searchResults');
                                 
                                 if (searchTerm === '') {
                                    resultsElement.text('');
                                 } else {
                                    const totalCount = allBookRows.length;
                                    if (visibleCount === 0) {
                                       resultsElement.html('<i class="fas fa-exclamation-triangle text-warning"></i> No books found matching "' + searchTerm + '"');
                                    } else {
                                       resultsElement.html('<i class="fas fa-search text-info"></i> Found ' + visibleCount + ' of ' + totalCount + ' books');
                                    }
                                 }
                              }
                           });
                        </script>
                        <style>
                           /* Search input styling */
                           #bookSearch {
                           border-radius: 4px;
                           }
                           /* Highlight matching rows */
                           .book-row {
                           transition: background-color 0.2s ease;
                           }
                        </style>
                     </div>
                     {{-- Add Book Modal --}}
                     <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="addBookModalLabel">Add a New Book</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form class="forms-sample" method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data" id="addBookForm">
                                    @csrf
                                    <div class="form-group">
                                       <label for="title">Book Title</label>
                                       <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="author">Author</label>
                                       <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author name" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="description">Book Description</label>
                                       <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter book description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                       <label for="isbn">ISBN</label>
                                       <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter ISBN" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="image">Book Image</label>
                                       <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                    </div>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                 <button type="submit" form="addBookForm" class="btn btn-primary">Add Book</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- Edit Book Modals --}}
                     @foreach($books as $book)
                     <div class="modal fade" id="editBookModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel{{ $book->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="editBookModalLabel{{ $book->id }}">Edit Book</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form method="POST" action="{{ route('admin.books.update', $book->id) }}" enctype="multipart/form-data" id="editBookForm{{ $book->id }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                       <label for="title{{ $book->id }}">Book Title</label>
                                       <input type="text" class="form-control" id="title{{ $book->id }}" name="title" value="{{ $book->title }}" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="author{{ $book->id }}">Author</label>
                                       <input type="text" class="form-control" id="author{{ $book->id }}" name="author" value="{{ $book->author }}" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="description{{ $book->id }}">Book Description</label>
                                       <textarea class="form-control" id="description{{ $book->id }}" name="description" rows="4" required>{{ $book->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                       <label for="isbn{{ $book->id }}">ISBN</label>
                                       <input type="text" class="form-control" id="isbn{{ $book->id }}" name="isbn" value="{{ $book->isbn }}" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="image{{ $book->id }}">Book Image</label>
                                       <input type="file" class="form-control-file" id="image{{ $book->id }}" name="image" accept="image/*">
                                       @if($book->image)
                                       <img src="data:image/jpeg;base64,{{ $book->image }}" alt="Current Image" style="width: 100px; height: 120px; margin-top: 10px;">
                                       @endif
                                    </div>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                 <button type="submit" form="editBookForm{{ $book->id }}" class="btn btn-primary">Update</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     {{-- Script to handle form errors in modal --}}
                     <script>
                        // Show add book modal if there are validation errors
                        @if ($errors->any() && session()->hasOldInput())
                        $(document).ready(function() {
                              $('#addBookModal').modal('show');
                        });
                        @endif
                     </script>
                     <!-- Auto-hide alerts after 4 seconds -->
                     <script>
                        setTimeout(function() {
                              $('.alert').alert('close');
                        }, 4000);
                     </script>
                  </div>
               </div>
               <footer class="footer">
               </footer>
            </div>
         </div>
      </div>
      <script src="../../../admin/assets/vendors/js/vendor.bundle.base.js"></script>
      <script src="../../../admin/assets/vendors/select2/select2.min.js"></script>
      <script src="../../../admin/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <script src="../../../admin/assets/js/off-canvas.js"></script>
      <script src="../../../admin/assets/js/hoverable-collapse.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="../../../admin/assets/js/misc.js"></script>
      <script src="../../../admin/assets/js/settings.js"></script>
      <script src="../../../admin/assets/js/todolist.js"></script>
      <script src="../../../admin/assets/js/file-upload.js"></script>
      <script src="../../../admin/assets/js/typeahead.js"></script>
      <script src="../../../admin/assets/js/select2.js"></script>
   </body>
</html>