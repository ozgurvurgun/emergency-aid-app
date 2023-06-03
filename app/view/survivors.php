<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Afet Yardım | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light fs-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                </svg>
            </a>
            <a class="navbar-brand" href="/emergency-aid-app/admin">Acil Yardım Admin Paneli</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="/emergency-aid-app/admin/kurtarilanlar">İşlenenler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/emergency-aid-app/admin/bilanco">Bilanço</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right me-2">
                    <div class="btn-group">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-warning"><?= $user ?></span> hoşgeldin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <li>
                                    <a class="dropdown-item" href="/sessionDestroy">Çıkış Yap</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-4">
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

                        <th scope="col">Kayıt Sorumlusu</th>
                        <th scope="col">Kayıt İşlenme Tarihi</th>
                        <th scope="col">Kayıt Raporu</th>
                    </tr>
                </thead>
                <tbody id="tableData">

                    <?php
                    foreach ($tableData as $value) { ?>
                        <tr id="dataid-<?= $value['yardim_talepleri_id'] ?>">
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
                            <td><?= $value['yardim_talepleri_sorumlu'] ?></td>
                            <td><?= $value['yardim_talepleri_sonuc_zamani'] ?></td>
                            <td><?= $value['yardim_talepleri_sonuc_notu'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const xhttp = new XMLHttpRequest();
        let filter = document.getElementById("filter");
        let filterCounty = document.getElementById("filterCounty");
        filter.addEventListener("change", (event) => {
            const URL = `/emergency-aid-app/getCounty/${event.target.value}`;
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let countyData = JSON.parse(this.responseText);
                    let result = '<option value="0" selected>Seçin...</option>';
                    countyData.forEach((element) => {
                        result += `
        <option value="${element.ilce_key}">${element.ilce_title}</option>
        `;
                    });
                    filterCounty.innerHTML = result;
                }
            };
            xhttp.open("GET", URL, true);
            xhttp.send();
        });
        let filterButton = document.getElementById("filterButton");
        filterButton.addEventListener("click", (e) => {
            e.preventDefault();
            let filter = document.getElementById("filter").value;
            let filterCounty = document.getElementById("filterCounty").value;
            let tableDOM = document.getElementById("tableData");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let tableData = JSON.parse(this.responseText);
                    let result = "";
                    tableData.forEach((element) => {
                        result += `
        <tr id="dataid-${element.yardim_talepleri_id}">
        <td>${element.yardim_talepleri_il}</td>
        <td>${element.yardim_talepleri_ilce}</td>
        <td>
          ${element.yardim_talepleri_mahalle}&nbsp;mahallesi<br />
          ${element.yardim_talepleri_cadde_sokak}<br />
          ${element.yardim_talepleri_apartman_adi}&nbsp;apartmanı<br />
          apartman no:&nbsp;${element.yardim_talepleri_apartman_no}
        </td>
        <td>
          telefon numarası:&nbsp;${element.yardim_talepleri_telefon_no}<br />
          ad soyad:&nbsp;${element.yardim_talepleri_ad_soyad}
        </td>
        <td>${element.yardim_talepleri_kaynak}</td>
        <td>${element.yardim_talepleri_not}</td>
        <td>${element.yardim_talepleri_zaman}</td>
        <td>${element.yardim_talepleri_sorumlu}</td>
        <td>${element.yardim_talepleri_sonuc_zamani}</td>
        <td>${element.yardim_talepleri_sonuc_notu}</td>
      </tr>
        `;
                    });
                    tableDOM.innerHTML = result;
                }
            };
            xhttp.open("POST", "/emergency-aid-app/admin/filterTable");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`il=${filter}&ilce=${filterCounty}`);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>