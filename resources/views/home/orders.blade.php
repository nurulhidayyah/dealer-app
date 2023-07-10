@extends('layouts.home')

@section('title', 'Checkout')

@section('content')
    <!-- Checkout -->
    <section class="section-wrap checkout pb-70">
        <div class="container relative">
            <div class="row">

                <div class="ecommerce col-xs-12">
                    <h2>My Payments</h2>
                    <table class="table table-ordered table-hover table-striped">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nominal Transfer</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($payments as $index => $payment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="tanggal_payment"></td>
                                    <td>Rp. {{ number_format($payment->jumlah) }}</td>
                                    <td>{{ $payment->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h2>My Orders</h2>
                    <table class="table table-ordered table-hover table-striped">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Grand Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="tanggal"></td>
                                    <td>Rp. {{ number_format($order->grand_total) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        @if ($order->status == 'Dikirim')
                                            <form action="/pesanan_diterima/{{ $order->id }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Terima</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end ecommerce -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end checkout -->
@endsection

@push('js')
    <script>
        $(function() {

            const token = localStorage.getItem('token');
            $.ajax({
                url: '/api/pesanan/baru',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        tgl = new Date(val.created_at);
                        tgl_lengkap = tgl.toLocaleDateString("id-ID");
                        row = `${tgl_lengkap}`;
                    });

                    $('.tanggal').append(row)
                }
            });
            $.ajax({
                url: '/api/pesanan/dikonfirmasi',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        tgl = new Date(val.created_at);
                        tgl_lengkap = tgl.toLocaleDateString("id-ID");
                        row = `${tgl_lengkap}`;
                    });

                    $('.tanggal').append(row)
                }
            });
            $.ajax({
                url: '/api/pesanan/dikemas',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        tgl = new Date(val.created_at);
                        tgl_lengkap = tgl.toLocaleDateString("id-ID");
                        row = `${tgl_lengkap}`;
                    });

                    $('.tanggal').append(row)
                }
            });
            $.ajax({
                url: '/api/pesanan/dikirim',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        tgl = new Date(val.created_at);
                        tgl_lengkap = tgl.toLocaleDateString("id-ID");
                        row = `${tgl_lengkap}`;
                    });

                    $('.tanggal').append(row)
                }
            });
            $.ajax({
                url: '/api/pesanan/diterima',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        tgl = new Date(val.created_at);
                        tgl_lengkap = tgl.toLocaleDateString("id-ID");
                        row = `${tgl_lengkap}`;
                    });

                    $('.tanggal').append(row)
                }
            });
            $.ajax({
                url: '/api/pesanan/selesai',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        tgl = new Date(val.created_at);
                        tgl_lengkap = tgl.toLocaleDateString("id-ID");
                        row = `${tgl_lengkap}`;
                    });

                    $('.tanggal').append(row)
                }
            });

            $.ajax({
                url: '/api/payments',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        tgl = new Date(val.created_at);
                        tgl_lengkap = tgl.toLocaleDateString("id-ID");
                        row = `${tgl_lengkap}`;
                    });

                    $('.tanggal_payment').append(row)
                }
            });

        });
    </script>
@endpush
