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
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
         <!-- partial:../../partials/_navbar.html -->
         @include('admin.navbar')
         <!-- partial -->
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="row">
                  <!-- Display Events -->
                  <!-- Display Events -->
                  <div class="col-md-12 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex justify-content-between align-items-center mb-3">
                              <h4 class="card-title">Event List</h4>
                              <button type="button" class="btn btn-primary" onclick="openAddModal()">
                              + Add Event
                              </button>
                           </div>
                           <!-- Search Section -->
                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="eventSearch">Search Events:</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control" id="eventSearch" 
                                          placeholder="Search by topic, venue, or date..." autocomplete="off">
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
                                       <th>#</th>
                                       <th>Topic</th>
                                       <th>Date</th>
                                       <th>Time</th>
                                       <th>Venue</th>
                                       <th>Description</th>
                                       <th>Image</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody id="eventsTableBody">
                                    @forelse($events as $index => $event)
                                    <tr class="event-row" 
                                       data-topic="{{ strtolower($event->topic) }}" 
                                       data-venue="{{ strtolower($event->venue) }}" 
                                       data-date="{{ $event->event_date }}"
                                       data-description="{{ strtolower($event->description) }}">
                                       <td>{{ $index + 1 }}</td>
                                       <td>{{ $event->topic }}</td>
                                       <td>{{ $event->event_date }}</td>
                                       <td>{{ $event->start_time }} - {{ $event->end_time }}</td>
                                       <td>{{ $event->venue }}</td>
                                       <td title="{{ $event->description }}">
                                          {{ Str::limit($event->description, 20, '...') }}
                                       </td>
                                       <td>
                                          @if($event->image)
                                          <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" width="100">
                                          @else
                                          N/A
                                          @endif
                                       </td>
                                       <td>
                                          <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                             @csrf
                                             @method('DELETE')
                                             <button type="button"
                                                class="btn btn-info btn-sm" onclick='editEvent(@json($event))'> Update 
                                             </button>
                                             <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                          </form>
                                       </td>
                                    </tr>
                                    @empty
                                    <tr id="no-events-row">
                                       <td colspan="8" class="text-center">No events found.</td>
                                    </tr>
                                    @endforelse
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <script>
                        $(document).ready(function () {
                           let allEventRows = $('.event-row');
                        
                           // Search functionality
                           $('#eventSearch').on('input', function() {
                              const searchTerm = $(this).val().toLowerCase().trim();
                              
                              if (searchTerm === '') {
                                 // Show all rows
                                 allEventRows.show();
                                 updateSearchResults('');
                              } else {
                                 let visibleCount = 0;
                                 
                                 allEventRows.each(function() {
                                    const topic = $(this).data('topic');
                                    const venue = $(this).data('venue');
                                    const date = $(this).data('date');
                                    const description = $(this).data('description');
                                    
                                    if (topic.includes(searchTerm) || 
                                        venue.includes(searchTerm) || 
                                        date.includes(searchTerm) || 
                                        description.includes(searchTerm)) {
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
                                 const totalCount = allEventRows.length;
                                 if (visibleCount === 0) {
                                    resultsElement.html('<i class="fas fa-exclamation-triangle text-warning"></i> No events found matching "' + searchTerm + '"');
                                 } else {
                                    resultsElement.html('<i class="fas fa-search text-info"></i> Found ' + visibleCount + ' of ' + totalCount + ' events');
                                 }
                              }
                           }
                        });
                     </script>
                     <style>
                        /* Search input styling */
                        #eventSearch {
                        border-radius: 4px;
                        }
                        /* Highlight matching rows */
                        .event-row {
                        transition: background-color 0.2s ease;
                        }
                     </style>
                  </div>
                  <!-- Add/Update Event Modal -->
                  <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content" style="width: 350px;">
                           <form id="eventForm" method="POST" enctype="multipart/form-data" class="forms-sample">
                              @csrf
                              <input type="hidden" name="_method" id="formMethod" value="POST">
                              <input type="hidden" name="id" id="eventId">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="modalTitle">Add New Event</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Topic</label>
                                    <div class="col-sm-9">
                                       <input type="text" name="topic" id="topic" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                       <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                       <input type="date" name="event_date" id="event_date" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Start Time</label>
                                    <div class="col-sm-9">
                                       <input type="time" name="start_time" id="start_time" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">End Time</label>
                                    <div class="col-sm-9">
                                       <input type="time" name="end_time" id="end_time" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Venue</label>
                                    <div class="col-sm-9">
                                       <input type="text" name="venue" id="venue" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                       <input type="file" name="image" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" id="submitBtn" class="btn btn-primary">Add Event</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- JS Script -->
                  <script>
                     function openAddModal() {
                        resetForm();
                        $('#addEventModal').modal('show');
                     }
                     
                     function resetForm() {
                        $('#eventForm').attr('action', "{{ route('admin.events.store') }}");
                        $('#formMethod').val('POST');
                        $('#modalTitle').text('Add New Event');
                        $('#submitBtn').text('Add Event');
                        $('#eventId').val('');
                        $('#topic').val('');
                        $('#description').val('');
                        $('#event_date').val('');
                        $('#start_time').val('');
                        $('#end_time').val('');
                        $('#venue').val('');
                     }
                     
                     function editEvent(event) {
                        $('#eventForm').attr('action', '/admin/events/' + event.id);
                        $('#formMethod').val('PUT');
                        $('#modalTitle').text('Update Event');
                        $('#submitBtn').text('Update Event');
                        $('#eventId').val(event.id);
                        $('#topic').val(event.topic);
                        $('#description').val(event.description);
                        $('#event_date').val(event.event_date);
                        $('#start_time').val(event.start_time);
                        $('#end_time').val(event.end_time);
                        $('#venue').val(event.venue);
                        $('#addEventModal').modal('show');
                     }
                  </script>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:../../partials/_footer.html -->
               <footer class="footer">
               </footer>
               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../../../admin/assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="../../../admin/assets/vendors/select2/select2.min.js"></script>
      <script src="../../../admin/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../../../admin/assets/js/off-canvas.js"></script>
      <script src="../../../admin/assets/js/hoverable-collapse.js"></script>
      <script src="../../../admin/assets/js/misc.js"></script>
      <script src="../../../admin/assets/js/settings.js"></script>
      <script src="../../../admin/assets/js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="../../../admin/assets/js/file-upload.js"></script>
      <script src="../../../admin/assets/js/typeahead.js"></script>
      <script src="../../../admin/assets/js/select2.js"></script>
      <!-- End custom js for this page -->
   </body>
</html>