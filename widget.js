const refresh = document.getElementById('refresh');

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
      EUR.innerText = data.rates['EUR'];
      USD.innerText = data.rates['USD'];
      JPY.innerText = data.rates['JPY'];
      CAD.innerText = data.rates['CAD'];
      CHF.innerText = data.rates['CHF'];
      AUD.innerText = data.rates['AUD'];
      RUB.innerText = data.rates['RUB'];
      dat.innerText = 'Rates: ' + data['date'];
    });
}

// Event listeners
refresh.addEventListener('click', () => { calculate(); });

calculate();