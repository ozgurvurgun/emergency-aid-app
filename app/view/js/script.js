let SelectCity = document.getElementById("selectCity");
let SelectCounty = document.getElementById("selectCounty");
let selectNeighbourhood = document.getElementById("selectNeighbourhood");
var submitForm = document.getElementById("submitForm");
const xhttp = new XMLHttpRequest();
//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//

SelectCity.addEventListener("change", (event) => {
  const URL = `/emergency-aid-app/getCounty/${event.target.value}`;
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let countyData = JSON.parse(this.responseText);
      let result = '<option value="0" selected>Seçin...</option>';
      countyData.forEach((element) => {
        result += `
        <option value="${element.ilce_key}">${element.ilce_title}</option>
        `;
      });
      SelectCounty.innerHTML = result;
    }
  };
  xhttp.open("GET", URL, true);
  xhttp.send();
});

//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//

SelectCounty.addEventListener("change", (event) => {
  const URL = `/emergency-aid-app/getNeighbourhood/${event.target.value}`;
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let selectNeighbourhoodData = JSON.parse(this.responseText);
      let result = "<option selected>Seçin...</option>";
      selectNeighbourhoodData.forEach((element) => {
        result += `
          <option>${element.mahalle_title}</option>
          `;
      });
      selectNeighbourhood.innerHTML = result;
    }
  };
  xhttp.open("GET", URL, true);
  xhttp.send();
});

//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//

submitForm.addEventListener("click", (e) => {
  e.preventDefault();
  let cityKey = document.getElementById("selectCity").value;
  let countyKey = document.getElementById("selectCounty").value;
  let selectCity = document.getElementById("selectCity");
  selectCity = selectCity.options[selectCity.selectedIndex].innerHTML;

  let SelectCounty = document.getElementById("selectCounty");
  SelectCounty = SelectCounty.options[SelectCounty.selectedIndex].innerHTML;

  let selectNeighbourhood = document.getElementById("selectNeighbourhood");
  selectNeighbourhood =
    selectNeighbourhood.options[selectNeighbourhood.selectedIndex].innerHTML;

  let street = document.getElementById("street").value;
  let apartmentName = document.getElementById("apartmentName").value;
  let apartmentNo = document.getElementById("apartmentNo").value;
  let telephoneNo = document.getElementById("telephoneNo").value;
  let nameSurname = document.getElementById("nameSurname").value;
  let source = document.getElementById("source").value;
  let note = document.getElementById("note").value;

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    }
  };
  xhttp.open("POST", "/emergency-aid-app/saveForm");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(
    `il=${selectCity}&ilKey=${cityKey}&ilce=${SelectCounty}&ilceKey=${countyKey}&mahalle=${selectNeighbourhood}&caddeSokak=${street}&apartmanAd=${apartmentName}&apartmanNo=${apartmentNo}&telefon=${telephoneNo}&adSoyad=${nameSurname}&kaynak=${source}&not=${note}`
  );
});

//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//

let filter = document.getElementById("filter");
let filterCounty = document.getElementById("filterCounty");
filter.addEventListener("change", (event) => {
  const URL = `/emergency-aid-app/getCounty/${event.target.value}`;
  xhttp.onreadystatechange = function () {
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

//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//
let filterButton = document.getElementById("filterButton");
filterButton.addEventListener("click", (e) => {
  e.preventDefault();
  let filter = document.getElementById("filter").value;
  let filterCounty = document.getElementById("filterCounty").value;
  let tableDOM = document.getElementById("tableData");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let tableData = JSON.parse(this.responseText);
      let result = "";
      tableData.forEach((element) => {
        result += `
        <tr>
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
      </tr>
        `;
      });
      tableDOM.innerHTML = result;
    }
  };
  xhttp.open("POST", "/emergency-aid-app/filterTable");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`il=${filter}&ilce=${filterCounty}`);
});
