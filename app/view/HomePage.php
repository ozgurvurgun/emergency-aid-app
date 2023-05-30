<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Afet Yardım</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
  <div class="container">
    <form method="post">
      <h1 class="text-center mt-4 mb-4 text-danger">Afet Yardım</h1>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">il <span class="text-danger">(Zorunlu)</span></label>
            <select id="selectCity" class="form-select">
              <option value="0" selected>Seçin...</option>
              <?php
              foreach ($cityData as $value) { ?>
                <option value="<?= $value['sehir_key'] ?>">
                  <?= $value['sehir_title'] ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">ilçe <span class="text-danger">(Zorunlu)</span></label>
            <select id="selectCounty" class="form-select">
              <option selected>Seçin...</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">Mahalle <span class="text-danger">(Zorunlu)</span></label>
            <select id="selectNeighbourhood" class="form-select">
              <option selected>Seçin...</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">Cadde / Sokak</label>
            <input id="street" type="text" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">Apartman Adı</label>
            <input id="apartmentName" type="text" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">Apartman No</label>
            <input id="apartmentNo" type="text" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">Telefon Numarası</label>
            <input id="telephoneNo" type="text" class="form-control" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">Ad Soyad</label>
            <input id="nameSurname" type="text" class="form-control" />
          </div>
        </div>
        <div class="col-md-4 mx-auto">
          <div class="mb-3">
            <label class="form-label">Kaynak <span class="text-danger">(Zorunlu)</span></label>
            <input id="source" type="text" class="form-control" required />
          </div>
        </div>
        <div class="col-md-6 mx-auto">
          <div class="mb-3">
            <label class="form-label">Not</label>
            <textarea id="note" class="form-control" rows="2"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="d-grid gap-2 col-4 mx-auto mt-4">
          <button id="submitForm" class="btn btn-lg btn-primary" type="submit">
            GÖNDER
          </button>
        </div>
      </div>
    </form>
  </div>
  <div class="container">
    <p class="text-center mt-4 mb-5">
      Yardım taleplerini toplu bir şekilde ilgili birimlere ulaştırmaya
      çalışıyoruz. Lütfen methanetli olun ve sakinliğinizi koruyun.<br />Sizi
      yalnız bırakmayacağız.
    </p>
    <hr class="border border-dark rounded border-4 opacity-50" />
    <h1 class="text-center mt-4 mb-4 text-danger">
      Kayıtlı Yardım Talepleri
    </h1>
    <form action="" method="post">
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">il</label>
            <select id="filter" class="form-select">
              <option value="0" selected>Seçin...</option>
              <?php
              foreach ($cityData as $value) { ?>
                <option value="<?= $value['sehir_key'] ?>">
                  <?= $value['sehir_title'] ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label class="form-label">ilçe</label>
            <select id="filterCounty" class="form-select">
              <option value="0" selected>Seçin...</option>
            </select>
          </div>
        </div>
        <div class="col-md-4 mx-auto">
          <label class="form-label">&nbsp;</label>
          <div class="d-grid gap-2">
            <button id="filterButton" class="btn btn-success" type="submit">Filtrele</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="container mt-5 mb-4">
    <div class="table-responsive">
      <table class="table">
        <thead class="table-dark rounded">
          <tr>
            <th scope="col">İl</th>
            <th scope="col">İlçe</th>
            <th scope="col">Adres</th>
            <th scope="col">İletişim</th>
            <th scope="col">Kaynak</th>
            <th scope="col">Not</th>
            <th scope="col">Kayıt Zamanı</th>
          </tr>
        </thead>
        <tbody id="tableData">

          <?php
          foreach ($tableData as $value) { ?>
            <tr>
              <td><?= $value['yardim_talepleri_il'] ?></td>
              <td><?= $value['yardim_talepleri_ilce'] ?></td>
              <td>
                <?= $value['yardim_talepleri_mahalle'] ?>&nbsp;mahallesi<br />
                <?= $value['yardim_talepleri_cadde_sokak'] ?><br />
                <?= $value['yardim_talepleri_apartman_adi'] ?>&nbsp;apartmanı<br />
                apartman no:&nbsp;<?= $value['yardim_talepleri_apartman_no'] ?>
              </td>
              <td>
                telefon numarası:&nbsp;<?= $value['yardim_talepleri_telefon_no'] ?><br />
                ad soyad:&nbsp;<?= $value['yardim_talepleri_ad_soyad'] ?>
              </td>
              <td><?= $value['yardim_talepleri_kaynak'] ?></td>
              <td><?= $value['yardim_talepleri_not'] ?></td>
              <td><?= $value['yardim_talepleri_zaman'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="app/view/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>