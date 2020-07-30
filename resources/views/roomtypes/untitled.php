<!-- <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
          <h3 class="content-header-title">Room Management</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Starters Kit</a>
              </li>
              <li class="breadcrumb-item active">Boxed Layout
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Room Types</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="{{route('roomtypes.create')}}"><i class="ft-plus-square font-large-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                              <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr role="row">
                                              <th>No</th>
                                              <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th></tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($room_types as $room_type): ?>
                                          <tr role="row" class="even">
                                            <td><?=$room_type->id?></td>
                                            <td class="sorting_1"><?=$room_type->name?></td>
                                            <td>
                                              <a href="{{route('roomtypes.edit',$room_type->id)}}" class="mx-2 d-inline-block text-warning"><i class="ft-edit-3 font-large-1"></i></a>

                                              <form method="post" action="{{route('roomtypes.destroy',$room_type->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mx-2 d-inline-block text-danger"><i class="ft-delete font-large-1"></i></button>
                                              </form>
                                              
                                            </td>
                                          </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr><th>No</th><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Actions</th></tr>
                                        </tfoot>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
    </div>
  </div> -->





  <div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">Dashboard Layout</h3>
      </div>
      <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Starters Kit</a>
            </li>
            <li class="breadcrumb-item active">Boxed Layout
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-body">
      <section class="row">
        <div class="col-sm-12">
            <!-- Kick start -->
            <div id="kick-start" class="card">
                <div class="card-header">
                    <h4 class="card-title">Kick start your project development !</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="card-text">
                            <p>Getting start with your project custom requirements using a ready template which is quite difficult and time taking process, Stack Admin provides useful features to kick start your project development with no efforts !</p>
                            <ul>
                                <li>Stack Admin provides you getting start pages with different layouts, use the layout as per your custom requirements and just change the branding, menu & content.</li>
                                <li>It use template engine to generate pages and whole template quickly using node js. You can generate entire template with your selected custom layout, branding & menu. Save your time for doing the common changes for
                                    each page (i.e menu, branding and footer) by generating template.</li>
                                <li>Every components in Stack Admin are decoupled, it means use use only components you actually need! Remove unnecessary and extra code easily just by excluding the path to specific SCSS, JS file.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Kick start -->
        </div>
      </section>
    </div>
  </div>
</div>


// create room types

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
          <h3 class="content-header-title">Room Management</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Starters Kit</a>
              </li>
              <li class="breadcrumb-item active">Boxed Layout
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Room Type Create From</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="roomtypes/"><i class="ft-list font-large-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body ">
                                <form method="post" action="{{route('roomtypes.store')}}">
                                  @csrf
                                  <div class="form-body">

                                      <div class="form-group">
                                          <label for="complaintinput1">Room Type Name</label>
                                          <input type="text" id="complaintinput1" class="form-control round @error('room_type_name') is-invalid @enderror" placeholder="room type name" name="room_type_name" value="{{ old('room_type_name') }}" required autocomplete="room_type_name" autofocus>
                                          @error('room_type_name')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                      </div>

                                  </div>

                                  <div class="form-actions">
                                      <button type="reset" class="btn btn-warning mr-1">
                                          <i class="ft-x"></i> Cancel
                                      </button>
                                      <button type="submit" class="btn btn-primary">
                                          <i class="fa fa-check-square-o"></i> Save
                                      </button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
    </div>
  </div>