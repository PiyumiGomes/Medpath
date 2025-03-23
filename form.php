<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Disease Prediction</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            background-color: #f4f6f9;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        input[type="number"],
        select {
            padding: 10px;
            width: calc(100% - 22px);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }

        .radio-group label {
            font-weight: normal;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #007bff;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .switch-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Heart Disease Prediction</h1>
    <form id="predictionForm">
        <label for="Age">Age:</label>
        <input type="number" id="Age" name="Age" required>

        <label for="Sex">Sex:</label>
        <div class="radio-group">
            <label><input type="radio" name="Sex" value="0" required> Female</label>
            <label><input type="radio" name="Sex" value="1" required> Male</label>
        </div>

        <label for="HighBP">High Blood Pressure:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="HighBP" name="HighBP" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="HighChol">High Cholesterol:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="HighChol" name="HighChol" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="CholCheck">Cholesterol Check:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="CholCheck" name="CholCheck" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="BMI">BMI (Body Mass Index):</label>
        <input type="number" step="0.1" id="BMI" name="BMI" required>

        <label for="Smoker">Smoker:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="Smoker" name="Smoker" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="Diabetes">Diabetes:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="Diabetes" name="Diabetes" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="PhysActivity">Physical Activity:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="PhysActivity" name="PhysActivity" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="Fruits">Fruits Consumption:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="Fruits" name="Fruits" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="Veggies">Vegetables Consumption:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="Veggies" name="Veggies" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="HvyAlcoholConsump">Heavy Alcohol Consumption:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="HvyAlcoholConsump" name="HvyAlcoholConsump" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="AnyHealthcare">Any Healthcare:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="AnyHealthcare" name="AnyHealthcare" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="NoDocbcCost">No Doctor because of Cost:</label>
        <div class="switch-label">
            <span>No</span>
            <label class="switch">
                <input type="checkbox" id="NoDocbcCost" name="NoDocbcCost" value="1">
                <span class="slider"></span>
            </label>
            <span>Yes</span>
        </div>

        <label for="GenHlth">General Health (0 to 5):</label>
        <input type="number" id="GenHlth" name="GenHlth" min="0" max="5" required>

        <label for="MentHlth">Mental Health (0 to 30):</label>
        <input type="number" id="MentHlth" name="MentHlth" min="0" max="30" required>

        <label for="PhysHlth">Physical Health (0 to 30):</label>
        <input type="number" id="PhysHlth" name="PhysHlth" min="0" max="30" required>

        <button type="submit">Predict</button>
    </form>

    <h2 id="result"></h2>

    <script>
        document.getElementById('predictionForm').addEventListener('submit', async function(event) {
            event.preventDefault();
    
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
                data[key] = key === 'Sex' ? parseInt(value) : (document.getElementById(key).type === 'checkbox' && !document.getElementById(key).checked ? 0 : parseInt(value));
            });
    
            const response = await fetch('https://bfaa-34-91-115-8.ngrok-free.app/predict/', {  // Replace with your ngrok public URL
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });
    
            const result = await response.json();
            document.getElementById('result').innerText = `Prediction: ${result.prediction}`;
        });
    </script>
</body>
</html>