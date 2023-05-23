const toggleButton = document.getElementById('toggle-button');
  const largeDiv = document.getElementById('large-div');
  const additionalDiv = document.getElementById('additional-div');

  additionalDiv.classList.add('hidden'); // Hide the additional-div initially

  toggleButton.addEventListener('click', () => {
    if (largeDiv.classList.contains('hidden')) {
      largeDiv.classList.remove('hidden');
      additionalDiv.classList.add('hidden');
    } else {
      largeDiv.classList.add('hidden');
      additionalDiv.classList.remove('hidden');
    }
  });

function addOption(selectElement) {
    var selectedOption = selectElement.value;

    if (selectedOption !== '') {
      var newSelect = document.createElement('select');
      newSelect.setAttribute('id', 'input' + (selectElement.selectedIndex + 1));
      newSelect.setAttribute('name', 'input[]');
      newSelect.setAttribute('onchange', 'addOption(this)');

      var options = [
        'Choose appropriately',
        'Mising Keyboard',
        'Mising Mouse',
        'Mising HDMI/DVI/VGA cable',
        'Mising Power Ethernet cable',
        'Mising Monitor',
        '',
        'Faulty Keyboard',
        'Faulty CPU Unit',
        'Faulty Monitor',
        'Faulty HDMI/DVI/VGA cabel',
        'Faulty UPS',
        'Faulty socket',
        '',
        'No internet',
        'No power'
        // Add more options as needed
      ];

      for (var i = 0; i < options.length; i++) {
        var newOption = document.createElement('option');
        newOption.textContent = options[i];
        newSelect.appendChild(newOption);
      }
      
      var newSelectContainer = document.getElementById('new');
      newSelectContainer.appendChild(document.createElement('br')); // Add line break
      newSelectContainer.appendChild(newSelect);

      selectElement.onchange = null;
    }
  }