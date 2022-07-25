<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{asset('assets/images/logo.ico')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <title>Home</title>
</head>

<body>

  <!-- navbar -->
  <div class="mynavbar">
    <div class="container">
      <div class="wrapper">
        <div class="logo">
          <a href=""><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
        </div>
        <div class="links">
          <ul class="list-unstyled">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
            <li><a href="https://t.me/marvelixgarans" target="_blank">Telegram / Support</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- header -->
  <div class="header" style="background-image: url({{asset('assets/images/header.png')}});">
    <div class="container">
      <div class="header_content">
        
        <h1>Welcome to KlaimGa<span>ransi&nbsp;</span></h1>
        <h5>BACA PERATURAN DIBAWAH !</h5>
        <pre style="color: white; ;font-weight: bold; font-size: 90%">
  1. Jangan mengubah email dan password akun diatas, tidak boleh mengubah apapun didalam aplikasi netflix,
    hanya diperbolehkan mengubah subtitles hanya saat sedang menonton selain itu tidak boleh mengubah apapun, 
    jika melanggar garansi hangus dan no refund 
  2. Jangan klik tombol replace my account jika akun kamu masih berfungsi dan bisa nonton dengan lancar
  3. Boleh Tekan tombol replace my account hanya jika akun kamu error dan tidak bisa dibuka lagi
  4. Link ini jangan di sebarkan ke orang lain! Hanya untuk pemakaian pribadi, jika ketahuan maka GARANSI HANGUS
  5. Kamu bisa minta akun pengganti dengan klik REPLACE MY ACCOUNT 1x saja setiap 24 jam, pastikan hanya menekan 
  tombol replace my account hanya jika akun netflix diatas sudah tidak bisa kamu gunakan 

  Jika ada yang ingin kamu tanyakan
  Silahkan chat kami di telegram <a href="https://t.me/marvelixgaransi">here</a>
        </pre>
       
        <div class="links">
          <button class="btn btn_style" data-bs-toggle="modal" data-bs-target="#premiumBlanModal">Premium Plan</button>
          <a href="https://t.me/marvelixgarans" target="_blank" class="btn btn_style">Contact Us</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->

  <div class="modal fade" id="premiumBlanModal" tabindex="-1" aria-labelledby="premiumBlanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content"> 
        <a class="closemodal" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></a>
        <div class="modal-body">
          <h5>Starter</h5>
          <h6>Premium Plan </h6>
          <h1>RP.199.000</h1>
          <h4>Per account / 1 year</h6>
          <p>Advanced features for your
            business to grow
          </p>
          <a href="https://nonton.orderonline.id/ntflx" target="_blank" class="btn btn_style">Buy now!</a>
        </div>
      </div>
    </div>
  </div>




  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/aos.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>