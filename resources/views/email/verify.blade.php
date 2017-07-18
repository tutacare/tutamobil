<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Konfirmasi Alamat Email Anda</h2>
        <div>
            Terima kasih telah membuat akun di mobilokal.com
            <p>Silahkan klik link dibawah ini untuk konfirmasi alamat email anda</p>
            <p>{{ URL::to('register/verify/' . $confirmation_code) }}</p>
            <br />
            <p>NB:</p>
            <p>=====Ini hanya email pemberitahuan=====</p>
            <p>=====Harap tidak membalas email ini=====</p>

        </div>
    </body>
</html>
