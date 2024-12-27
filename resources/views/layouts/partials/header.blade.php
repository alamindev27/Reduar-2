<!doctype html>
<html lang="en">

<head>
    @include('layouts.partials.styles')
    <style>
        .container{
            max-width: 1060px !important;
        }
    </style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

nav{
  /* position: fixed; */
  z-index: 9999;
  width: 100%;
  /* background: #242526; */
}
nav .wrapper{
  position: relative;
  max-width: 1300px;
  padding: 0px 0px;
  line-height: 35px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  z-index: 9999;
}
.wrapper .logo a{
  color: #f2f2f2;
  font-size: 30px;
  font-weight: 600;
  text-decoration: none;
}
.wrapper .nav-links{
  display: inline-flex;
}
.nav-links li{
  list-style: none;
}
.nav-links li a{
  color: #000;
  text-decoration: none;
  padding: 0px 7px;
  border-radius: 5px;
  transition: all 0.3s ease;
}
/* .nav-links li a:hover{
  background: #3A3B3C;
} */
.nav-links .mobile-item{
  display: none;
}
.nav-links .drop-menu{
  position: absolute;
  background: #fff;
  width: 260px;
  line-height: 45px;
  top: 85px;
  opacity: 0;
  visibility: hidden;
  box-shadow: 0 6px 10px rgba(0,0,0,0.15);
  padding-left: 8px;
  border-radius: 10px;
}
.nav-links li:hover .drop-menu,
.nav-links li:hover .mega-box{
  transition: all 0.3s ease;
  top: 80px;
  opacity: 1;
  visibility: visible;
}
.drop-menu li a{
  width: 100%;
  display: block;
  padding: 0 0 0 15px;
  font-weight: 400;
  border-radius: 0px;
}
.mega-box{
  position: absolute;
  left: 0;
  width: 100%;
  /* padding: 0 30px; */
  top: 85px;
  opacity: 0;
  visibility: hidden;
}
.mega-box .content{
  background: #fff;
  padding: 0px 20px 10px 20px;
  display: flex;
  width: 100%;
  justify-content: space-between;
  box-shadow: 0 6px 10px rgba(0,0,0,0.15);
  border-radius: 10px;
}
.mega-box .content .row{
  width: calc(25% - 30px);
  line-height: 45px;
}
.content .row img{
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.content .row header{
  color: #000;
  font-weight: 500;
}
.content .row .mega-links{
  margin-left: -40px;
  border-left: 1px solid rgba(255,255,255,0.09);
}
.row .mega-links li{
  padding: 0 20px;
}
.row .mega-links li a{
  padding: 0px;
  padding: 0 20px;
  color: #000;
  font-size: 17px;
  display: block;
}
/* .row .mega-links li a:hover{
  color: #f2f2f2;
} */
.wrapper .btn{
  color: #000;
  font-size: 20px;
  cursor: pointer;
  display: none;
}
.wrapper .btn.close-btn{
  position: absolute;
  right: 30px;
  top: 10px;
}

@media screen and (max-width: 970px) {
  .wrapper .btn{
    display: block;
  }
  .wrapper .nav-links{
    position: fixed;
    height: 100vh;
    width: 100%;
    max-width: 350px;
    top: 0;
    left: -100%;
    background: #ddd;
    display: block;
    padding: 50px 10px;
    line-height: 50px;
    overflow-y: auto;
    box-shadow: 0px 15px 15px rgba(0,0,0,0.18);
    transition: all 0.3s ease;
    margin-bottom: 0px;
  }
  /* custom scroll bar */
  ::-webkit-scrollbar {
    width: 10px;
  }
  ::-webkit-scrollbar-track {
    background: #242526;
  }
  ::-webkit-scrollbar-thumb {
    background: #3A3B3C;
  }
  #menu-btn:checked ~ .nav-links{
    left: 0%;
  }
  #menu-btn:checked ~ .btn.menu-btn{
    display: none;
  }
  #close-btn:checked ~ .btn.menu-btn{
    display: block;
  }
  .nav-links li{
    margin: 15px 10px;
  }
  .nav-links li a{
    padding: 0 20px;
    display: block;
    font-size: 20px;
  }
  .nav-links .drop-menu{
    position: static;
    opacity: 1;
    top: 65px;
    visibility: visible;
    padding-left: 20px;
    width: 100%;
    max-height: 0px;
    overflow: hidden;
    box-shadow: none;
    transition: all 0.3s ease;
  }
  #showDrop:checked ~ .drop-menu,
  #showMega:checked ~ .mega-box{
    max-height: 100%;
  }
  .nav-links .desktop-item{
    display: none;
  }
  .nav-links .mobile-item{
    display: block;
    color: #000;
    font-size: 20px;
    padding-left: 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: all 0.3s ease;
  }

  .drop-menu li{
    margin: 0;
  }
  .drop-menu li a{
    border-radius: 5px;
    font-size: 18px;
  }
  .mega-box{
    position: static;
    top: 65px;
    opacity: 1;
    visibility: visible;
    /* padding: 0 20px; */
    max-height: 0px;
    overflow: hidden;
    transition: all 0.3s ease;
  }
  .mega-box .content{
    box-shadow: none;
    flex-direction: column;
    padding: 20px 20px 0 20px;
  }
  .mega-box .content .row{
    width: 100%;
    margin-bottom: 15px;
    border-top: 1px solid rgba(255,255,255,0.08);
  }
  .mega-box .content .row:nth-child(1),
  .mega-box .content .row:nth-child(2){
    border-top: 0px;
  }
  .content .row .mega-links{
    border-left: 0px;
    padding-left: 15px;
  }
  .row .mega-links li{
    margin: 0;
  }
  .content .row header{
    font-size: 19px;
  }
}
nav input{
  display: none;
}

.body-text{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  text-align: center;
  padding: 0 30px;
}
.body-text div{
  font-size: 45px;
  font-weight: 600;
}
</style>










</head>

<body>
    @php
        $currentUrl = Request::url();
        $link = route('frontend.mediaKit');
    @endphp

        @if ($currentUrl == $link)
            <a href="mailto:{{ advertisement(10)->link }}" target="_blank" style="position: fixed; top:50%;left:0%; transform:translateY(-50%); z-index:9999;" class="d-none d-xl-block text-decoration-none">
                <img src="{{ asset('uploads/ad/10.png') }}" class="img-fluid" alt="" style="width: 120px; height:600px;">
                <small class="d-block text-dark fw-bold">Price-$ {{ advertisement(10)->price }}</small>
            </a>

            <a href="mailto:{{ advertisement(11)->link }}" target="_blank" style="position: fixed; top:50%;right:0%; transform:translateY(-50%); z-index:9999;" class="d-none d-xl-block text-decoration-none">
                <img src="{{ asset('uploads/ad/11.png') }}" class="img-fluid" alt="" style="width: 120px; height:600px;">
                <small class="d-block text-dark text-end fw-bold">Price-${{ advertisement(11)->price }}</small>
            </a>
        @else
            @if (advertisement(10)->status == 'unavailable')
                <a href="{{ advertisement(10)->link }}" target="_blank" style="position: fixed; top:50%;left:0%; transform:translateY(-50%); z-index:9999;" class="d-none d-xl-block">
                    <img src="{{ asset(advertisement(10)->image) }}" class="img-fluid" alt="" style="width: 120px; height:600px;">
                </a>
            @endif
            @if (advertisement(10)->status == 'unavailable')
                <a href="{{ advertisement(11)->link }}" target="_blank" style="position: fixed; top:50%;right:0%; transform:translateY(-50%); z-index:9999;" class="d-none d-xl-block">
                    <img src="{{ asset(advertisement(11)->image) }}" class="img-fluid" alt="" style="width: 120px; height:600px;">
                </a>
            @endif
        @endif



    <header>

            <div class="container">
                {{-- desktop menu --}}
                @include('layouts.partials.menu-bar')
                <!-- mobile menu -->
                {{-- @include('layouts.partials.mobile-nav') --}}
            </div>




        @if ($currentUrl != route('frontend.award.index') && $currentUrl != route('frontend.advertisement') && $currentUrl != route('frontend.contact'))
            <div class="container-fluid">
                <div class="container">
                    <div class="row justify-content-center mb-3 g-2">
                        @if ($currentUrl == $link)
                            @if (setting()->add_configure == 'all' || setting()->add_configure == 'top')
                                <div class="col-3">
                                    <a href="mailto:{{ advertisement(1)->link }}" class="text-decoration-none" target="_blank">
                                        <img src="{{ asset('uploads/ad/1.png') }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                        <small class="d-block text-dark fw-bold">Price-${{ advertisement(1)->price }}</small>
                                    </a>
                                </div>

                                <div class="col-6">
                                    <a href="mailto:{{ advertisement(2)->link }}" class="text-decoration-none" target="_blank">
                                        <img src="{{ asset('uploads/ad/2.png') }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                        <small class="d-block text-dark fw-bold">Price-${{ advertisement(2)->price }}</small>
                                    </a>
                                </div>

                                <div class="col-3">
                                    <a href="mailto:{{ advertisement(3)->link }}" class="text-decoration-none" target="_blank">
                                        <img src="{{ asset('uploads/ad/3.png') }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                        <small class="d-block text-dark fw-bold">Price-${{ advertisement(3)->price }}</small>
                                    </a>
                                </div>
                            @endif
                        @else
                            @if (advertisement(1)->status == 'unavailable')
                                <div class="col-3">
                                    <a href="{{ advertisement(1)->link }}" target="_blank">
                                        <img src="{{ asset(advertisement(1)->image) }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                    </a>
                                </div>
                            @endif

                            @if (advertisement(2)->status == 'unavailable')
                                <div class="col-6">
                                    <a href="{{ advertisement(2)->link }}" target="_blank">
                                        <img src="{{ asset(advertisement(2)->image) }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;" style="width: 728px; height:90px;">
                                    </a>
                                </div>
                            @endif

                            @if (advertisement(3)->status == 'unavailable')
                                <div class="col-3">
                                    <a href="{{ advertisement(3)->link }}" target="_blank">
                                        <img src="{{ asset(advertisement(3)->image) }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center mb-3 g-2">
                    @if ($currentUrl == $link)
                        @if (setting()->add_configure == 'all' || setting()->add_configure == 'bottom')
                            <div class="col">
                                <a href="{{ advertisement(4)->link }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('uploads/ad/4.png') }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                    <small class="d-block text-dark fw-bold">Price-${{ advertisement(4)->price }}</small>
                                </a>
                            </div>

                            <div class="col">
                                <a href="{{ advertisement(5)->link }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('uploads/ad/5.png') }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                    <small class="d-block text-dark fw-bold">Price-${{ advertisement(5)->price }}</small>
                                </a>
                            </div>
                        @endif
                    @else
                        @if (advertisement(4)->status == 'unavailable')
                            <div class="col">
                                <a href="{{ advertisement(4)->link }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset(advertisement(4)->image) }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                </a>
                            </div>
                        @endif

                        @if (advertisement(5)->status == 'unavailable')
                            <div class="col">
                                <a href="{{ advertisement(5)->link }}" target="_blank">
                                    <img src="{{ asset(advertisement(5)->image) }}" class="img-fluid w-100" alt="" style="width: 728px; height:90px;">
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </header>
