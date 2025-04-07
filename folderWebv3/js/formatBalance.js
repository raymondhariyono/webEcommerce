document.addEventListener("DOMContentLoaded", function () {
  const balanceInput = document.getElementById("balance");

  if (balanceInput) {
    balanceInput.addEventListener("input", function (e) {
      let value = e.target.value;
      value = value.replace(/\D/g, ""); // Remove non-numeric characters

      // Format number with dots
      let formattedValue = "";
      for (let i = value.length - 1, j = 1; i >= 0; i--, j++) {
        formattedValue = value[i] + formattedValue;
        if (j % 3 === 0 && i !== 0) {
          formattedValue = "." + formattedValue;
        }
      }

      e.target.value = formattedValue;
    });
  }
});
