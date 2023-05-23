<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./resources/reporting.css">
  <title>Issues reports</title>
  <style>
    .hidden {
      display: none;
      /* Add any other styles you want for the hidden divs */
    }
  </style>
</head>
<body>
  <h1>Staff Reporting Section</h1>
  <button id="toggle-button">Count / Issues</button>

  <div id="large-div">
        <form action="./functions/reporting.php" method="POST" id="myForm" >
        <div id="labs">
          <label for="labs">Which lab?</label>
            <select name="labs" id="labs">
              <option>TC - 02</option>
              <option>TC - 03</option>
              <option>TC - 05</option>
              <option>TC - 07</option>
              <option>TC - 1-2</option>
              <option>TC - 1-4</option>
              <option>TC - C-1</option>
              <option>TC - D-2</option>
              <option>J-1</option>
              <option>J-2</option>
              <option>I-1</option>
              <option>Masters Lab 3-2</option>
            </select>
        </div>
        <div class="container">
          
          <h3>Count section</h3>
          <div>
            <label for="input1">Machines Count:</label>
            <input type="text" id="input1" name="input1">
  
            <label for="input2">Faulty machines Count:</label>
            <input type="text" id="input2" name="input2">
  
            <label for="input3">Keyboards:</label>
            <input type="text" id="input3" name="input3">
  
            <label for="input4">Mouse:</label>
            <input type="text" id="input4" name="input4">
  
            <label for="input5">Monitor:</label>
            <input type="text" id="input5" name="input5">
  
            <label for="input6">UPS:</label>
            <input type="text" id="input6" name="input6">
          </div>
        </div>
        <div class="submit-btn-container">
          <input type="submit" value="Submit">
        </div>
      </form>
  </div>


<div id="additional-div" class="hidden">
        <form action="./functions/reporting.php" method="POST" id="myForm">
          <div class="container">
            <h3>Issues section</h3>
            <div id="selectContainer">
              <label for="input8">Issue Level:</label>
              <select id="input8" name="input8[]" onchange="addOption(this)">
                <option><small>Choose apropriately</small></option>
                <option></option>
                <option>Mising Keyboard</option>
                <option>Mising Mouse</option>
                <option>Mising Monitor</option>
                <option>Mising HDMI/DVI/VGA cable</option>
                <option>Mising Power Ethernet cable</option>
                <option></option>
                <option>Faulty Mouse</option>
                <option>Faulty Keyboard</option>
                <option>Faulty CPU Unit</option>
                <option>Faulty Monitor</option>
                <option>Faulty HDMI/DVI/VGA cabel</option>
                <option>Faulty UPS</option>
                <option>Faulty socket</option>
                <option></option>
                <option>No internet</option>
                <option>No power</option>
              </select>
    
              <div id="new"></div>
    
              <label for="input9">Machine type:</label>
              <select id="input9" name="input9">
                <option></option>
                <option>HP</option>
                <option>Lenovo</option>
                <option>Dell</option>
              </select>
    
              <label for="description">Description:</label>
              <textarea name="description" id="description"cols="30" rows="10" placeholder="Describe how your issues"></textarea>
            </div>
          </div>
          <div class="submit-btn-container">
            <input type="submit" value="Submit">
          </div>
        </form>
    </div>
<script src="./assets/js/reporting.js"></script>
</body>
</html>



