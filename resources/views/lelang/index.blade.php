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
                            <h5 class="card-title mb-0 text-md-start text-center">DataTable with Buttons</h5>
                          </div>
                          <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                            <div class="dt-buttons btn-group flex-wrap mb-0">
                              <a class="btn create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" fdprocessedid="kb7gug" href="{{ route('backend.lelang.create')}}">
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
                        <th>Nama Lelang</th>
                        <th>Jadwal Mulai</th>
                        <th>Jadwal Berakhir</th>
                        <th>Status</th>
                        <th>Kode Lelang</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($lelangs as $data)
                      <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>{{$data->barang->nama}}</td>
                        <td>{{$data->jadwal_mulai}}</td>
                        <td>{{ $data->jadwal_berakhir }}</td>
                        <td><span class="badge @if($data->status == 'dibuka') bg-label-success @elseif($data->status == 'selesai') bg-label-danger @elseif($data->status == 'ditutup') bg-label-warning @endif me-1">{{ $data->status }}</span></td>
                        <td>{{ $data->kode_lelang}}</td>
                        <td>
                          <form action="">
                            <button
                              type="button"
                              class="btn btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#modalCenter-{{ $data->slug }}">
                              Show
                            </button>
                            @if($data->status == 'ditutup')
                              <a class="btn btn-warning" href="{{ route('backend.lelang.edit', $data->id) }}"
                              ><i class="icon-base bx bx-edit-alt me-1"></i></a
                              >
                              <a class="btn btn-danger" href="{{ route('backend.lelang.destroy', $data->id) }}" data-confirm-delete="true"
                                ><i class="icon-base bx bx-trash me-1"></i></a
                              >
                            @elseif($data->status == 'selesai')
                              <a class="btn btn-danger" href="{{ route('backend.lelang.destroy', $data->id) }}" data-confirm-delete="true"
                                ><i class="icon-base bx bx-trash me-1"></i></a
                              >
                            @endif
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

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a
                      href="https://themeselection.com/item/category/admin-templates/"
                      target="_blank"
                      class="footer-link me-4"
                      >Admin Templates</a
                    >

                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                    <a
                      href="https://themeselection.com/item/category/bootstrap-admin-templates/"
                      target="_blank"
                      class="footer-link me-4"
                      >Bootstrap Dashboard</a
                    >

                    <a
                      href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a
                      href="https://github.com/themeselection/sneat-bootstrap-html-admin-template-free/issues"
                      target="_blank"
                      class="footer-link"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          @foreach($lelangs as $data)
          <div class="modal fade" id="modalCenter-{{ $data->slug }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Barang</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row mb-4">
                    <div class="col text-center">
                      <img src="{{ Storage::url($data->barang->foto) }}"
                          alt="Foto Barang"
                          style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-6">
                      <label for="nameWithTitle" class="form-label">Nama Lelang</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="{{ $data->barang->nama }}"
                        disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-6">
                      <label for="nameWithTitle" class="form-label">Jadwal Mulai</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="{{ $data->jadwal_mulai }}"
                        disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-6">
                      <label for="nameWithTitle" class="form-label">Jadwal Berakhir</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="{{ $data->jadwal_berakhir }}"
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