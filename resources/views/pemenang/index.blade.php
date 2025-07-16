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
                            <h5 class="card-title mb-0 text-md-start text-center">Pemenang</h5>
                          </div>
                        </div>
                    </div>
                <div class="table-responsive text-nowrap m-3">
                  <table class="table" id="myTable">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Lelang</th>
                        <th>Nama Pemenang</th>
                        <th>BID Tertinggi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($pemenang as $data)
                      <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>{{$data->lelang->barang->nama}}</td>
                        <td>{{$data->user->nama_lengkap}}</td>
                        <td>Rp{{ number_format($data->bid, 0, ',', '.') }}</td>
                        <td>
                          <form action="">
                            <button
                              type="button"
                              class="btn btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#modalCenter-{{ $data->slug }}">
                              Show
                            </button>
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
          @foreach($pemenang as $data)
          @php 
              $datadiri = $data->user->datadiri->first(); // ambil satu datadiri
              $no_telp = $datadiri ? preg_replace('/^0/', '62', $datadiri->no_telp) : null;
              $linkwa = $no_telp ? "https://wa.me/" . $no_telp : '#';
          @endphp
          <div class="modal fade" id="modalCenter-{{ $data->slug }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Data Pemenang</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row mb-4">
                    <div class="col text-center">
                      <img src="{{ Storage::url($data->user->foto) }}"
                          alt="Foto User"
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
                        value="{{ $data->lelang->barang->nama }}"
                        disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-6">
                      <label for="nameWithTitle" class="form-label">Nama Pemenang</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="{{ $data->user->nama_lengkap }}"
                        disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-6">
                      <label for="nameWithTitle" class="form-label">Kode Lelang</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="{{ $data->lelang->kode_lelang }}"
                        disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-6">
                      <a class="btn create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" fdprocessedid="kb7gug" href="{{$linkwa}}">
                        <span>
                          <span class="d-flex align-items-center gap-2">
                            <i class="icon-base bx bx-plus icon-sm"></i>
                            <span class="d-none d-sm-inline-block">Hubungi Pemenang</span>
                          </span>
                        </span>
                      </a>
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