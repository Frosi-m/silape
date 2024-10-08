@extends('user.layouts.dashboard-user')

@section('isi')
    <div id="group_18_menu" nameid="Group 18">
        <a href="biodata_user">
            <div nameid="Rectangle 37" id="rectangle_37">
                <img src="assets/images/polygon_4.png" nameid="Polygon 4" id="polygon_4" />

                <div id="ri_user_smile_fill" nameid="ri:user-smile-fill">
                    <div nameid="ri:user-smile-fill" id="_bg__ri_user_smile_fill_ek1"></div>
                    <img src="assets/images/smile.png" nameid="Vector" id="vector" />

                </div>
                <div nameid="Data diri" id="data_diri">
                    Data diri
                </div>

            </div>
        </a>


    </div>

    <div id="group_19" nameid="Group 19">
        <div nameid="Group 18" id="_bg__group_18_ek1"></div>
        {{-- <a href="halaman_laporan"> --}}
        <div nameid="Rectangle 37" id="rectangle_38">
            <img src="assets/images/polygon_4.png" nameid="Polygon 4" id="polygon_4" />

            <div id="ri_user_smile_fill" nameid="ri:user-smile-fill">
                <div nameid="ri:user-smile-fill" id="_bg__ri_user_smile_fill_ek1"></div>
                <img src="assets/images/costumers.png" nameid="Vector" id="vector" />

            </div>
            <div nameid="Data diri" id="pengaduan">
                Pengaduan
            </div>

            <div class="list_dropdown">
                <a href="halaman_laporan">
                    Tambah laporan
                </a>

                <a href="list_laporan">
                    List laporan
                </a>
            </div>
        </div>
        {{-- </a> --}}



    </div>



    <div id="group_20" nameid="Group 20">
        <a href="ubah_pw">
            <div nameid="Rectangle 37" id="rectangle_37_ek1">
                <div nameid="Ubah password" id="ubah_password">
                    Ubah password
                </div>

                <div id="group_27" nameid="Group 27">
                    <img src="assets/images/polygon_4.png" nameid="Polygon 2" id="polygon_2_ek1" />

                    <div id="material_symbols_lock" nameid="material-symbols:lock">
                        <div nameid="material-symbols:lock" id="_bg__material_symbols_lock_ek1"></div>
                        <img src="assets/images/gembok.png" nameid="Vector" id="vector_ek2" />

                    </div>

                </div>
            </div>
        </a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($pesan_pw = Session::get('pw_sama'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                title: "{{ $pesan_pw }}"
            });
        </script>
    @endif
@endsection
