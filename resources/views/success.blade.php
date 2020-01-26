<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=480">
    <title>Заказ принят</title>
    <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('public/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/action-mob.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</head>

<body>
  <div id="success-order" class="modal">
    <p>
      <center>
          <img src="{{ asset('public/img/success.png') }}" alt="Done" style="height: auto;width: 100px;">
      </center>
    </p>
    <p>
      <center>
          <h1>Заявка успешно отправлена</h1>
          <p>Наш оператор свяжется с Вами в ближайшее время для подтверждения заказа</p>
      </center>
    </p>
  </div>
    <script>
    $(document).ready(function() {
        $('#success-order').modal({ showClose: false, clickClose: false });
    })
    </script>
    @if (config('app.env') === 'production')
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1265927796927313');
      fbq('track', 'PageView');
      fbq('track', 'Lead');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1265927796927313&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156255564-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-156255564-1');
    </script>
    @endif
</body>

</html>