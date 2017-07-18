<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Konfirmasi Deposit</h2>
        <div>
            Deposit Anda dengan No. {{ $deposit_id }} telah diproses
            <p>Jumlah Rp.  {{ number_format($deposit, 0, ',', '.') }}</p>
            <p>Silahkan Login pada panel mobilokal.com untuk:</p>
            <p>melakukan transaksi serta melihat riwayat deposit dan buku kas Anda</p>
            <br />
            <p>NB:</p>
            <p>=====Ini hanya email pemberitahuan=====</p>
            <p>=====Harap tidak membalas email ini=====</p>

        </div>
    </body>
</html>
