<!DOCTYPE html>
<html lang="en">
   @include('admin.head')
   <body>
      <div class="container-scroller">
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
               <a class="sidebar-brand brand-logo" href="index"><img src="/admin/assets/images/logo.png" alt="logo" /></a>
               <a class="sidebar-brand brand-logo-mini" href="index"><img src="/admin/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            @include('admin.sidebar')
         </nav>
         <div class="container-fluid page-body-wrapper">
            @include('admin.navbar')
            <div class="main-panel">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-md-12 grid-margin">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $stats['pending_borrow_requests'] }}</h3>
                                       <p class="text-warning ml-2 mb-0 font-weight-medium">Pending</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-warning">
                                       <span class="mdi mdi-book-open-page-variant icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Pending Borrow Requests</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $detailedStats['overdue_count'] }}</h3>
                                       <p class="text-danger ml-2 mb-0 font-weight-medium">Overdue</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-danger">
                                       <span class="mdi mdi-alarm icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Overdue Books</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $stats['approved_books'] }}</h3>
                                       <p class="text-success ml-2 mb-0 font-weight-medium">Ready</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-success">
                                       <span class="mdi mdi-book-open-page-variant icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Books Ready to Issue</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $stats['pending_returns'] }}</h3>
                                       <p class="text-info ml-2 mb-0 font-weight-medium">Issued</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-info">
                                       <span class="mdi mdi-book-open-page-variant icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Currently Issued</h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $detailedStats['total_books'] }}</h3>
                                       <p class="text-success ml-2 mb-0 font-weight-medium">Available</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-success">
                                       <span class="mdi mdi-book-multiple icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Total Books</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $detailedStats['returned_books'] }}</h3>
                                       <p class="text-success ml-2 mb-0 font-weight-medium">+{{ $detailedStats['this_month_requests'] }}</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-success">
                                       <span class="mdi mdi-book-open-page-variant icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Returns This Month</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $detailedStats['today_requests'] }}</h3>
                                       <p class="text-info ml-2 mb-0 font-weight-medium">New</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-info">
                                       <span class="mdi mdi-calendar-today icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Requests Today</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                       <h3 class="mb-0">{{ $stats['active_users'] }}</h3>
                                       <p class="text-primary ml-2 mb-0 font-weight-medium">Active</p>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="icon icon-box-primary">
                                       <span class="mdi mdi-account-multiple icon-item"></span>
                                    </div>
                                 </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Active Users</h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Overdue Books Table -->
                  @if($overdueBooks->count() > 0)
                  <div class="row">
                     <div class="col-12 grid-margin">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title text-danger">
                                 <i class="mdi mdi-alarm"></i> Overdue Books - Immediate Action Required
                              </h4>
                              <div class="table-responsive">
                                 <table class="table table-hover">
                                    <thead>
                                       <tr>
                                          <th>User</th>
                                          <th>Books</th>
                                          <th>Issue Date</th>
                                          <th>Due Date</th>
                                          <th>Days Overdue</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($overdueBooks as $order)
                                       <tr class="table-danger-light">
                                          <td>
                                             <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm mr-2">
                                                   <span class="avatar-title rounded-circle bg-danger text-white">
                                                   {{ substr($order->user->name, 0, 1) }}
                                                   </span>
                                                </div>
                                                <div>
                                                   <h6 class="mb-0">{{ $order->user->name }}</h6>
                                                   <small class="text-muted">{{ $order->user->email }}</small>
                                                </div>
                                             </div>
                                          </td>
                                          <td>
                                             @foreach($order->books as $book)
                                             <div class="mb-1">
                                                <strong>{{ $book->title }}</strong>
                                                <br><small class="text-muted">by {{ $book->author }}</small>
                                             </div>
                                             @endforeach
                                          </td>
                                          <td>{{ $order->issued_at ? \Carbon\Carbon::parse($order->issued_at)->format('M d, Y') : 'N/A' }}</td>
                                          <td>{{ $order->due_at ? \Carbon\Carbon::parse($order->due_at)->format('M d, Y') : 'N/A' }}</td>
                                          <td>
                                             <span class="badge badge-danger">
                                             {{ $order->days_overdue }} day{{ $order->days_overdue > 1 ? 's' : '' }}
                                             </span>
                                          </td>
                                          <td>
                                             <button class="btn btn-sm btn-success" onclick="markAsReturned({{ $order->id }})">
                                             <i class="mdi mdi-check"></i> Mark Returned
                                             </button>
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  <div class="row">
                     <!-- Recent Borrow Requests -->
                     <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Recent Borrow Requests</h4>
                              <div class="preview-list">
                                 @forelse($recentRequests as $request)
                                 <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                       <div class="preview-icon 
                                          @if($request->status == 'pending') bg-warning
                                          @elseif($request->status == 'approved') bg-info
                                          @elseif($request->status == 'issued') bg-success
                                          @else bg-secondary
                                          @endif">
                                          <i class="mdi mdi-book"></i>
                                       </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                       <div class="flex-grow">
                                          <h6 class="preview-subject">{{ $request->user->name }}</h6>
                                          <p class="text-muted mb-0">
                                             @foreach($request->books->take(2) as $book)
                                             {{ $book->title }}@if(!$loop->last), @endif
                                             @endforeach
                                             @if($request->books->count() > 2)
                                             <small>(+{{ $request->books->count() - 2 }} more)</small>
                                             @endif
                                          </p>
                                       </div>
                                       <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                          <p class="text-muted mb-0">{{ $request->created_at->diffForHumans() }}</p>
                                          <span class="badge badge-{{ 
                                             $request->status == 'pending' ? 'warning' : 
                                             ($request->status == 'approved' ? 'info' : 
                                             ($request->status == 'issued' ? 'success' : 'secondary')) 
                                             }}">
                                          {{ ucfirst($request->status) }}
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 @empty
                                 <div class="text-center py-4">
                                    <i class="mdi mdi-book-open-page-variant icon-lg text-muted"></i>
                                    <p class="text-muted mt-2">No recent requests</p>
                                 </div>
                                 @endforelse
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Quick Statistics Overview -->
                     <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Quick Statistics Overview</h4>
                              <div class="preview-list">
                                 <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                       <div class="preview-icon bg-warning">
                                          <i class="mdi mdi-clock"></i>
                                       </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                       <div class="flex-grow">
                                          <h6 class="preview-subject">Pending Requests</h6>
                                          <p class="text-muted mb-0">{{ $stats['pending_borrow_requests'] }} requests awaiting approval</p>
                                       </div>
                                       <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                          <h3 class="mb-0">{{ $stats['pending_borrow_requests'] }}</h3>
                                          @if($stats['pending_borrow_requests'] > 0)
                                          <a href="{{ route('admin.borrow-requests') }}" class="btn btn-xs btn-warning mt-1">Review</a>
                                          @else
                                          <small class="text-muted">None</small>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                       <div class="preview-icon bg-danger">
                                          <i class="mdi mdi-alarm"></i>
                                       </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                       <div class="flex-grow">
                                          <h6 class="preview-subject">Overdue Books</h6>
                                          <p class="text-muted mb-0">
                                             @php
                                             $overduePercentage = $stats['pending_returns'] > 0 ? round(($detailedStats['overdue_count'] / $stats['pending_returns']) * 100, 1) : 0;
                                             @endphp
                                             {{ $overduePercentage }}% of issued books are overdue
                                          </p>
                                       </div>
                                       <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                          <h3 class="mb-0">{{ $detailedStats['overdue_count'] }}</h3>
                                          @if($detailedStats['overdue_count'] > 0)
                                          <small class="text-danger">Urgent</small>
                                          @else
                                          <small class="text-success">Good</small>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                       <div class="preview-icon bg-success">
                                          <i class="mdi mdi-book-open-page-variant"></i>
                                       </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                       <div class="flex-grow">
                                          <h6 class="preview-subject">Currently Issued</h6>
                                          <p class="text-muted mb-0">Books currently out with users</p>
                                       </div>
                                       <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                          <h3 class="mb-0">{{ $stats['pending_returns'] }}</h3>
                                          <small class="text-muted">Monitor</small>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="preview-item">
                                    <div class="preview-thumbnail">
                                       <div class="preview-icon bg-info">
                                          <i class="mdi mdi-book-open-page-variant"></i>
                                       </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                       <div class="flex-grow">
                                          <h6 class="preview-subject">Ready to Issue</h6>
                                          <p class="text-muted mb-0">Approved books ready for issuance</p>
                                       </div>
                                       <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                          <h3 class="mb-0">{{ $stats['approved_books'] }}</h3>
                                          @if($stats['approved_books'] > 0)
                                          <a href="{{ route('admin.borrow-requests') }}" class="btn btn-xs btn-info mt-1">Issue</a>
                                          @else
                                          <small class="text-muted">None</small>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <footer class="footer">
               </footer>
            </div>
         </div>
      </div>
   </body>
</html>