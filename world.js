document.addEventListener("DOMContentLoaded", function () {
  let countryLookup = document.getElementById("lookup");
  let cityLookup = document.getElementById("city");

  let resultDiv = document.getElementById("result");

  // country
  countryLookup.addEventListener("click", function () {
    let country = encodeURIComponent(
      document.getElementById("country").value.trim()
    );
    fetch("world.php?country=" + country)
      .then((response) => {
        return response.json();
      })
      .then((response) => {
        resultDiv.innerHTML = response;
      })
      .catch((error) => {
        console.error(error);
      });
  });

  // city
  cityLookup.addEventListener("click", function () {
    let country = encodeURIComponent(
      document.getElementById("country").value.trim()
    );
    fetch("world.php?country=" + country + "&lookup=cities")
      .then((response) => {
        return response.json();
      })
      .then((response) => {
        resultDiv.innerHTML = response;
      })
      .catch((error) => {
        console.error(error);
      });
  });
});
