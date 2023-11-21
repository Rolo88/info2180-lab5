document.addEventListener("DOMContentLoaded", function () {
  let countryLookup = document.getElementById("lookup");

  let resultDiv = document.getElementById("result");

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
});
