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
                            <h5 class="card-title mb-0 text-md-start text-center">Struk</h5>
                          </div>
                        </div>
                    </div>
                <div class="table-responsive text-nowrap m-3">
                  <table class="table" id="myTable">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Kode Lelang</th>
                        <th>Nama Lelang</th>
                        <th>Nama Lengkap</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($struk as $data)
                      <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>{{$data->lelang->kode_lelang}}</td>
                        <td>{{$data->lelang->barang->nama}}</td>
                        <td>{{ $data->pemenang->user->nama_lengkap }}</td>
                        <td>{{ $data->total }}</td>
                        <td><span class="badge @if($data->status == 'berhasil') bg-label-success @elseif($data->status == 'gagal') bg-label-danger @elseif($data->status == 'belum dibayar') bg-label-warning @elseif($data->status == 'pending') bg-label-info @endif me-1">{{ $data->status }}</span></td>
                        <td>{{ $data->tgl_trx->format('H:i d-m-Y')}}</td>
                        <td>
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalCenter-{{ $data->kode_struk }}"
                            ><i class="icon-base bx bx-edit-alt me-1"></i></a
                            >
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
          @foreach($struk as $data)
          <div class="modal fade" id="modalCenter-{{ $data->kode_struk }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Status Pembayaran</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                      <label for="nameWithTitle" class="form-label">Total</label>
                      <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder=""
                        value="Rp.{{ number_format($data->total, 0, ',', '.') }}"
                        disabled />
                    </div>
                  </div>
                  <form action="{{ route('backend.struk.update', $data->kode_struk) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col mb-6">
                        <label for="nameWithTitle" class="form-label">Status</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
                            <option value="berhasil">Berhasil</option>
                            <option value="gagal">Gagal</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                  </button>
                </div>
                </form>
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