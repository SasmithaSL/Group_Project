<!DOCTYPE html>
<html lang="en">
   @include('admin.head')
   <body>
      <div class="container-scroller">
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
               <a class="sidebar-brand brand-logo" href="index"><img src="/admin/assets/images/logo.png" alt="logo" /></a>
            </div>
            @include('admin.sidebar')
         </nav>
         <div class="container-fluid page-body-wrapper">
            @include('admin.navbar')
            <div class="main-panel">
               <div class="content-wrapper">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                           <h4 class="card-title mb-0">Manage Users</h4>
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                           <i class="fas fa-plus"></i> + Add User
                           </button>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="userSearch">Search Users:</label>
                                 <div class="input-group">
                                    <input type="text" class="form-control" id="userSearch" 
                                       placeholder="Search by name, email, or phone number..." autocomplete="off">
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
                        <div class="table-responsive">
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>User ID</th>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Registered Date</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody id="usersTableBody">
                                 @foreach($users as $user)
                                 <tr class="user-row" data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}" data-number="{{ $user->number }}">
                                    <td><span class="pl-2">{{ $user->id }}</span></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->number }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>
                                       <button type="button" class="btn btn-danger btn-sm delete-user-btn" 
                                          data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">
                                       Delete
                                       </button>
                                    </td>
                                 </tr>
                                 @endforeach
                                 @if($users->isEmpty())
                                 <tr id="no-users-row">
                                    <td colspan="7" class="text-center">No users found.</td>
                                 </tr>
                                 @endif
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <!-- Add User Modal -->
                  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form method="POST" action="{{ route('admin.users.store') }}" id="addUserForm">
                              @csrf
                              <div class="modal-body">
                                 <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                 </div>
                                 <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                 </div>
                                 <div class="mb-3">
                                    <label for="number" class="form-label">Phone Number</label>
                                    <input type="number" name="number" class="form-control" id="number" required>
                                 </div>
                                 <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" class="form-control" id="role" required>
                                       <option value="">Select Role</option>
                                       <option value="user">User</option>
                                       <option value="admin">Admin</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                 </div>
                                 <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Re-type Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                 <button type="submit" class="btn btn-primary" id="addUserBtn">Add User</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               
               <script>
                  $(document).ready(function () {
                     let allUserRows = $('.user-row');
                  
                     // Show popup messages for session success/error messages
                     @if (session('success'))
                        showPopup('✅ {{ session('success') }}', 'success');
                     @endif
                     
                     @if (session('delete'))
                        showPopup('✅ {{ session('delete') }}', 'success');
                     @endif
                     
                     @if ($errors->any())
                        @foreach ($errors->all() as $error)
                           showPopup('❌ {{ $error }}', 'error');
                        @endforeach
                     @endif
                  
                     $('#userSearch').on('input', function() {
                        const searchTerm = $(this).val().toLowerCase().trim();
                        
                        if (searchTerm === '') {
                           allUserRows.show();
                           updateSearchResults('');
                        } else {
                           let visibleCount = 0;
                           
                           allUserRows.each(function() {
                              const name = $(this).data('name');
                              const email = $(this).data('email');
                              const number = $(this).data('number').toString();
                              
                              if (name.includes(searchTerm) || email.includes(searchTerm) || number.includes(searchTerm)) {
                                 $(this).show();
                                 visibleCount++;
                              } else {
                                 $(this).hide();
                              }
                           });
                           
                           updateSearchResults(searchTerm, visibleCount);
                        }
                     });
                     
                     function updateSearchResults(searchTerm, visibleCount = null) {
                        const resultsElement = $('#searchResults');
                        
                        if (searchTerm === '') {
                           resultsElement.text('');
                        } else {
                           const totalCount = allUserRows.length;
                           if (visibleCount === 0) {
                              resultsElement.html('<i class="fas fa-exclamation-triangle text-warning"></i> No users found matching "' + searchTerm + '"');
                           } else {
                              resultsElement.html('<i class="fas fa-search text-info"></i> Found ' + visibleCount + ' of ' + totalCount + ' users');
                           }
                        }
                     }
                     
                     $('.delete-user-btn').click(function(e) {
                        e.preventDefault();
                        
                        const userId = $(this).data('user-id');
                        const userName = $(this).data('user-name');
                        const button = $(this);
                        
                        if (confirm('Are you sure you want to delete "' + userName + '"?')) {
                           button.prop('disabled', true);
                           button.html('<i class="fas fa-spinner fa-spin"></i> Deleting...');
                           
                           // Create a form and submit it
                           const form = $('<form>', {
                              'method': 'POST',
                              'action': '{{ route("admin.users.delete", ":id") }}'.replace(':id', userId)
                           });
                           
                           form.append($('<input>', {
                              'type': 'hidden',
                              'name': '_token',
                              'value': '{{ csrf_token() }}'
                           }));
                           
                           form.append($('<input>', {
                              'type': 'hidden',
                              'name': '_method',
                              'value': 'DELETE'
                           }));
                           
                           $('body').append(form);
                           form.submit();
                        }
                     });
                     
                     // Show popup function
                     function showPopup(message, type) {
                        const popup = $('<div class="popup"></div>')
                              .addClass(type === 'success' ? 'success-popup' : 'error-popup')
                              .text(message);
                  
                        $('body').append(popup);
                  
                        setTimeout(() => {
                              popup.fadeOut(500, () => popup.remove());
                        }, 3000);
                     }
                     
                     // Handle add user form submission with AJAX
                     $('#addUserForm').on('submit', function(e) {
                        e.preventDefault();
                        
                        const form = $(this);
                        const submitBtn = $('#addUserBtn');
                        const formData = new FormData(this);
                        
                        submitBtn.prop('disabled', true);
                        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Adding User...');
                        
                        $.ajax({
                           url: form.attr('action'),
                           method: 'POST',
                           data: formData,
                           processData: false,
                           contentType: false,
                           success: function(response) {
                              showPopup('✅ User added successfully!', 'success');
                              $('#addUserModal').modal('hide');
                              setTimeout(() => {
                                 location.reload();
                              }, 1500);
                           },
                           error: function(xhr) {
                              const errors = xhr.responseJSON?.errors;
                              if (errors) {
                                 Object.values(errors).flat().forEach(error => {
                                    showPopup('❌ ' + error, 'error');
                                 });
                              } else {
                                 showPopup('❌ Failed to add user. Please try again.', 'error');
                              }
                              
                              submitBtn.prop('disabled', false);
                              submitBtn.html('Add User');
                           }
                        });
                     });
                  });
               </script>
               <style>
                  .popup {
                  position: fixed;
                  top: 20px;
                  right: 20px;
                  padding: 15px 20px;
                  border-radius: 5px;
                  color: white;
                  font-weight: bold;
                  z-index: 9999;
                  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                  }
                  .success-popup {
                  background-color: #28a745;
                  }
                  .error-popup {
                  background-color: #dc3545;
                  }
                  /* Search input styling */
                  #userSearch {
                  border-radius: 4px;
                  }
                  /* Highlight matching rows */
                  .user-row {
                  transition: background-color 0.2s ease;
                  }
               </style>
            </div>
            @include('admin.footer')
         </div>
      </div>
      </div>
     
   </body>
</html>