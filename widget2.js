var refresh = document.getElementById('refresh');
var amount = document.getElementById('amount');

const EUR = document.getElementById('EUR');
const USD = document.getElementById('USD');
const JPY = document.getElementById('JPY');
const CAD = document.getElementById('CAD');
const CHF = document.getElementById('CHF');
const AUD = document.getElementById('AUD');
const RUB = document.getElementById('RUB');
const dat = document.getElementById('dat');

// Fetch exchange rates and update the DOM
function calculate() {
  const base_currency = "GBP";

  fetch(`https://api.exchangerate-api.com/v4/latest/${base_currency}`)
    .then(res => res.json())
    .then(data => {
      EUR.innerText = (amount.value * data.rates['EUR']).toFixed(2);
      USD.innerText = (amount.value * data.rates['USD']).toFixed(2);
      JPY.innerText = (amount.value * data.rates['JPY']).toFixed(2);
      CAD.innerText = (amount.value * data.rates['CAD']).toFixed(2);
      CHF.innerText = (amount.value * data.rates['CHF']).toFixed(2);
      AUD.innerText = (amount.value * data.rates['AUD']).toFixed(2);
      RUB.innerText = (amount.value * data.rates['RUB']).toFixed(2);
      dat.innerText = 'Rates: ' + data['date'];
    });
}

// Event listeners on click refresh widget
refresh.addEventListener('click', (event) => { calculate(); });
amount.addEventListener('input', (event) => { calculate(); });
calculate();