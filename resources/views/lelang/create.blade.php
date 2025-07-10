@extends('layouts.kerangkabackend')
@section('content')
<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout -->
              <div class="row mb-12 gy-6">
                <div class="col-xl">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah Data Lelang</h5>
                      <small class="text-body float-end">Merged input group</small>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('backend.lelang.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6"> 
                          <label for="exampleFormControlSelect1" class="form-label">Pilih Barang</label>
                          <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="id_barang">
                            @foreach($barang as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-6">
                          <label for="html5-datetime-local-input" class="form-label">Jadwal Mulai</label>
                          <input
                            class="form-control"
                            type="datetime-local"
                            id="html5-datetime-local-input" name="jadwal_mulai"/>
                        </div>
                        <div class="mb-6">
                          <label for="html5-datetime-local-input" class="form-label">Jadwal Berakhir</label>
                          <input
                            class="form-control"
                            type="datetime-local"
                            id="html5-datetime-local-input" name="jadwal_berakhir"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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
@endsection