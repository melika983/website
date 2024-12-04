


<!DOCTYPE html>
<html lang="en">

<head>
    @include('links')
    <script src="https://unpkg.com/html5-qrcode"></script>


</head>
@include('header')



<body class="index-page">


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container text-center">
        {{-- <div class="row gy-4"> --}}
            <h3 dir="rtl">حالا کد QR از غرفه ها اسکن کن</h3>

              <video id="camera" autoplay playsinline></video>
              <div id="reader"></div>



        {{-- </div> --}}
      </div>

    </section><!-- /Hero Section -->



    <!-- Alt Services Section -->




      <script>
function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  // console.log(`Code matched = ${decodedText}`, decodedResult);
//   alert(decodedText);
window.location.href = decodedText;

}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);

  </script>



</body>

</html>

