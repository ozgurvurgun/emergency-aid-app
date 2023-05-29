let SelectCity = document.getElementById("selectCity");
let SelectCounty = document.getElementById("selectCounty");
let selectNeighbourhood = document.getElementById("selectNeighbourhood");
let submitForm = document.getElementById("submitForm");
//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//--//-//

SelectCity.addEventListener("change", (event) => {
  const URL = `/emergency-aid-app/getCounty/${event.target.value}`;
  const xhttp = new XMLHttpRequest();
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
  const xhttp = new XMLHttpRequest();
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

  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    }
  };
  xhttp.open("POST", "/emergency-aid-app/saveForm");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(
    `il=${selectCity}&ilce=${SelectCounty}&mahalle=${selectNeighbourhood}&caddeSokak=${street}&apartmanAd=${apartmentName}&apartmanNo=${apartmentNo}&telefon=${telephoneNo}&adSoyad=${nameSurname}&kaynak=${source}&not=${note}`
  );
});