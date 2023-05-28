<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Afet Yardım</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container">
      <form method="post">
        <h1 class="text-center mt-4 mb-4 text-danger">Afet Yardım</h1>
        <div class="row">
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">il</label>
              <select class="form-select">
                <option selected>Seçin...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">ilçe</label>
              <select class="form-select">
                <option selected>Seçin...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Mahalle</label>
              <select class="form-select">
                <option selected>Seçin...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Apartman Adı</label>
              <input type="text" class="form-control" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Telefon Numarası</label>
              <input type="text" class="form-control" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Ad Soyad</label>
              <input type="text" class="form-control" />
            </div>
          </div>
          <div class="col-md-6 mx-auto">
            <div class="mb-3">
              <label class="form-label"
                >Kaynak <span class="text-danger">(Zorunlu)</span></label
              >
              <input type="text" class="form-control" required />
            </div>
          </div>
          <div class="col-md-6 mx-auto">
            <div class="mb-3">
              <label class="form-label">Not</label>
              <textarea class="form-control" rows="1"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="d-grid gap-2 col-4 mx-auto mt-4">
            <button class="btn btn-lg btn-primary" type="submit">GÖNDER</button>
          </div>
        </div>
      </form>
    </div>
    <div class="container">
    <p class="text-center mt-4 mb-5">Yardım taleplerini toplu bir şekilde ilgili birimlere ulaştırmaya çalışıyoruz. Lütfen methanetli olun ve sakinliğinizi koruyun.<br/>Sizi yalnız bırakmayacağız.</p>
    <hr class="border border-dark rounded border-4 opacity-50">
      <h1 class="text-center mt-4 mb-4 text-danger">
        Kayıtlı Yardım Talepleri
      </h1>
      <form action="" method="post">
        <div class="row">
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">il</label>
              <select class="form-select">
                <option selected>Seçin...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">ilçe</label>
              <select class="form-select">
                <option selected>Seçin...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="col-md-4 mx-auto">
            <label class="form-label">&nbsp;</label>
            <div class="d-grid gap-2">
              <button class="btn btn-success" type="button">Filtrele</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="container mt-4 mb-4">
      <div class="row text-center font-monospace">
        <div class="col-md-4 p-3">Adıyaman (3076)</div>
        <div class="col-md-4 p-3">Batman (12)</div>
        <div class="col-md-4 p-3">Bingöl (5)</div>
        <div class="col-md-4 p-3">Adıyaman (3076)</div>
        <div class="col-md-4 p-3">Batman (12)</div>
        <div class="col-md-4 p-3">Bingöl (5)</div>
        <div class="col-md-4 p-3">Adıyaman (3076)</div>
        <div class="col-md-4 p-3">Batman (12)</div>
       
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
