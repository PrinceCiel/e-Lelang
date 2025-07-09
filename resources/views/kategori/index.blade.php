@extends('layouts.kerangkabackend')
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endsection
@section('content')
<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <div class="card-datatable text-nonwrap">
                    <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                        <div class="row card-header flex-column flex-md-row pb-0">
                          <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                            <h5 class="card-title mb-0 text-md-start text-center">Kategori Barang</h5>
                          </div>
                          <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                            <div class="dt-buttons btn-group flex-wrap mb-0">
                              <button class="btn buttons-collection btn-label-primary dropdown-toggle me-4" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false" fdprocessedid="5hjenb">
                                <span>
                                  <span class="d-flex align-items-center gap-2"><i class="icon-base bx bx-export me-sm-1"></i>
                                  <span class="d-none d-sm-inline-block">Export</span>
                                </span>
                              </button>
                              <a class="btn create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" fdprocessedid="kb7gug" href="{{ route('backend.kategori.create')}}">
                                <span>
                                  <span class="d-flex align-items-center gap-2">
                                    <i class="icon-base bx bx-plus icon-sm"></i>
                                    <span class="d-none d-sm-inline-block">Add New Record</span>
                                  </span>
                                </span>
                              </a>
                            </div>
                          </div>
                        </div>
                    </div>
                <div class="table-responsive text-nowrap m-3">
                  <table class="table" id="myTable">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>slug</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($kategori as $data)
                      <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->slug}}</td>
                        <td>
                          <form action="">
                            <button
                              type="button"
                              class="btn btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#modalCenter-{{ $data->slug }}">
                              Show
                            </button>
                            <a class="btn btn-warning" href="{{ route('backend.kategori.edit', $data->slug) }}"
                              ><i class="icon-base bx bx-edit-alt me-1"></i></a
                              >
                              <a class="btn btn-danger" href="{{ route('backend.kategori.destroy', $data->id) }}" data-confirm-delete="true"
                                ><i class="icon-base bx bx-trash me-1"></i></a
                              >
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
              <!--/ Nested table -->
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          @foreach($kategori as $data)
          <div class="modal fade" id="modalCenter-{{ $data->slug }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Kategori</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-6">
                      <label for="nameWithTitle" class="form-label">Nama Kategori</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="{{ $data->nama }}"
                        disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-6">
                      <label for="nameWithTitle" class="form-label">Slug Kategori</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="{{ $data->slug }}"
                        disabled />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
@endsection
@section('script')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script>
  let table = new DataTable('#myTable');
</script>
@endsection