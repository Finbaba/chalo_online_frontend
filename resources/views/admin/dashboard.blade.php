
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sparsh Plaza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../frontend/frontend.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            min-height: 100vh;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            //padding: 20px;
        }

        .top-section {
            //background: linear-gradient(to bottom, brown, orange);

            color: #fff;
            text-align: left;
            padding: 50px 20px 40px 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            border-radius: 0 0 20px 20px;
            margin-bottom: 30px;

            background: var(--startGradientColor);
            background: linear-gradient(90deg, var(--startGradientColor) 0%, var(--CenterGradientColor) 50%, var(--EndGradientColor) 100%);
        }

        .text-container {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 300px;
        }

        .top-section img {
 
            height: auto;
            margin-left: 20px;
            width: 70px;
    height: 70px;
    border-radius: 100%;
        }

        .welcome-text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle-text {
            font-size: 16px;
            margin-top: 0;
        }

        .form-label {
            padding: 20px 0 5px;
            display: block;
            color: #333;
            font-weight: 500;
        }

        .input-wrapper {
            padding: 0;
        }

        .form-control {
            font-size: 16px;
            border-radius: 10px;
            padding: 12px 15px;
            border: none !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .form-control:focus {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15) !important;
            outline: none !important;
        }

        .input-group-text {
            font-size: 16px;
            border-radius: 10px 0 0 10px !important;
            padding: 12px 15px;
            border: none !important;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #otpBtn {
            margin: 20px 0 0;
            border-radius: 10px;
            color: #fff;
            padding: 12px;
            width: 100%;
            background-color: #C0C0C0;
            pointer-events: none;
            opacity: 0.6;
            font-weight: bold;
            border: none;
            font-size: 16px;
            transition: all 0.3s;
        }

        #otpBtn.active {
            //background: linear-gradient(to bottom, brown, orange);
            pointer-events: auto;
            opacity: 1;
            background: var(--EndGradientColor);
            color: white;
        }

        #otpBtn.active:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: var(--CenterGradientColor);
        }

        .error-message {
            color: #ff4444;
            font-size: 14px;
            padding: 5px 0 0;
            display: none;
        }

        .otp-container {
            display: none;
            padding: 20px 0;
            animation: fadeIn 0.5s;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 18px;
            margin: 0 5px;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .otp-input:focus {
            border-color: brown;
            outline: none;
            box-shadow: 0 0 0 2px rgba(165, 42, 42, 0.2);
        }

        .resend-otp {
            text-align: center;
            margin-top: 15px;
            color: #666;
        }

        .resend-otp a {
            color: brown;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .resend-otp a:hover {
            text-decoration: underline;
        }

        #verifyBtn {
            display: none;
            margin: 20px 0;
            width: 100%;
            //background: linear-gradient(to bottom, brown, orange);
            color: white;
            padding: 12px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s;

            background: var(--EndGradientColor);
            color: white;
        }

        #verifyBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: var(--CenterGradientColor);
            color: white;
        }

        .shoplogo{

        }

        @media (max-width: 600px) {
            .top-section {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                padding: 30px 20px;
            }

            .top-section img {
                align-self: flex-end;
                margin-bottom: 15px;
            }

            .otp-input {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 250px;
            background: #333;
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: none;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-section">
            <div class="text-container">
                <h4 class="mb-0 welcome-text">Welcome!</h4>
                <p class="mb-0 subtitle-text">Login to Sparsh Plaza</p>
            </div>
            <img class="shoplogo" src="https://chaloonline.in/logo.jpg" alt="Logo">
        </div>

        <form id="loginForm">
            <label class="form-label">Phone Number</label>
            <div class="input-group mb-3 input-wrapper">
                <span class="input-group-text">+91</span>
                <input type="text" id="phone" class="form-control" placeholder="Enter Mobile Number" maxlength="10" oninput="validatePhone()">
            </div>
            <div id="phoneError" class="error-message">Please enter a valid 10-digit phone number</div>
           
            <button id="otpBtn" class="btn" type="button" onclick="sendOTP()" disabled>Generate OTP</button>
            

            <div id="otpContainer" class="otp-container">
                <label class="form-label">Enter OTP</label>
                <div class="d-flex justify-content-center">
                    <input type="text" id="otp1" class="otp-input" maxlength="1" oninput="moveToNext(this, 'otp2')" autofocus>
                    <input type="text" id="otp2" class="otp-input" maxlength="1" oninput="moveToNext(this, 'otp3')">
                    <input type="text" id="otp3" class="otp-input" maxlength="1" oninput="moveToNext(this, 'otp4')">
                    <input type="text" id="otp4" class="otp-input" maxlength="1" oninput="moveToNext(this, 'otp5')">
                    <input type="text" id="otp5" class="otp-input" maxlength="1" oninput="moveToNext(this, 'otp6')">
                    <input type="text" id="otp6" class="otp-input" maxlength="1" >
                </div>
                <div id="otpError" class="error-message" style="text-align: center;">Invalid OTP. Please try again.</div>
                <div class="resend-otp">
                    Didn't receive OTP? <a href="javascript:void(0)" onclick="resendOTP()">Resend OTP</a>
                    <span id="countdown" style="display: none;"> (30s)</span>
                </div>
            </div>
           
            <button id="verifyBtn" class="btn" type="button" onclick="verifyOTP()">Verify OTP</button>
        </form>
    </div>

    <div id="toast" class="toast"></div>

    <script>
        // For demo purposes - in production you would use a real SMS API
        console.log("OTP script loaded");

        function moveToNext(current, nextFieldID) {
            if (current.value.length >= current.maxLength) {
                var nextField = document.getElementById(nextFieldID);
                if(nextField) {
                    nextField.focus();
                }
            }
        }

        const demoOTPs = {
            "9876543210": "123456",
            "8765432109": "654321",
            "7654321098": "987654",
            "9340737272": "123456"
        };

        let generatedOTP = '';
        let phoneNumber = '';
        let countdownInterval;
        let canResendOTP = true;

       


        function validatePhone() {
            let phoneInput = document.getElementById('phone');
            let otpBtn = document.getElementById('otpBtn');
            let phoneError = document.getElementById('phoneError');
           
            phoneInput.value = phoneInput.value.replace(/\D/g, '').slice(0, 10);
           
            if (phoneInput.value.length === 10) {
                otpBtn.classList.add('active');
                otpBtn.disabled = false;
                phoneError.style.display = 'none';
            } else {
                otpBtn.classList.remove('active');
                otpBtn.disabled = true;
                phoneError.style.display = phoneInput.value.length > 0 ? 'block' : 'none';
            }
        }

        function sendOTP() {
            if (!canResendOTP) return;
           
            phoneNumber = document.getElementById('phone').value;
           
            if (phoneNumber.length !== 10 || !/^\d+$/.test(phoneNumber)) {
                document.getElementById('phoneError').style.display = 'block';
                return;
            }
           
            // Generate OTP (in production, this would come from your backend/SMS API)
            generatedOTP = demoOTPs[phoneNumber] || Math.floor(100000 + Math.random() * 900000).toString();
           
            showToast(`OTP sent to ${phoneNumber}: ${generatedOTP}`);
            console.log(`OTP for ${phoneNumber}: ${generatedOTP}`);
           
            document.getElementById('otpContainer').style.display = 'block';
            document.getElementById('verifyBtn').style.display = 'block';
            document.getElementById('otpBtn').style.display = 'none';
            document.querySelector('.otp-input').focus();
           
            startCountdown();
        }

        function startCountdown() {
            canResendOTP = false;
            let seconds = 30;
            const countdownElement = document.getElementById('countdown');
            countdownElement.style.display = 'inline';
            countdownElement.textContent = ` (${seconds}s)`;
           
            countdownInterval = setInterval(() => {
                seconds--;
                countdownElement.textContent = ` (${seconds}s)`;
               
                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.style.display = 'none';
                    canResendOTP = true;
                }
            }, 1000);
        }

        

        function verifyOTP() {
            const otpInputs = document.querySelectorAll('.otp-input');
            let enteredOTP = '';
           
            otpInputs.forEach(input => {
                enteredOTP += input.value;
            });
           
            if (enteredOTP.length !== 6) {
                showToast('Please enter complete 6-digit OTP');
                return;
            }
           
            if (enteredOTP === generatedOTP) {
                showToast('OTP verified successfully! Redirecting...');
                setTimeout(function(){
                    window.location.href = "{{ route('home') }}";
                }, 1000); // Delay in milliseconds (2000ms = 2 seconds)
                
                // In real app: window.location.href = "dashboard.html";
            } else {
                document.getElementById('otpError').style.display = 'block';
                otpInputs.forEach(input => {
                    input.style.animation = 'shake 0.5s';
                    setTimeout(() => input.style.animation = '', 500);
                });
                showToast('Invalid OTP. Please try again.');
            }
        }

        function resendOTP() {
            if (!canResendOTP) {
                showToast('Please wait before resending OTP');
                return;
            }
           
            clearInterval(countdownInterval);
            sendOTP();
            document.getElementById('otpError').style.display = 'none';
           
            const otpInputs = document.querySelectorAll('.otp-input');
            otpInputs.forEach(input => input.value = '');
            otpInputs[0].focus();
           
            showToast('New OTP sent to your phone number');
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.style.display = 'block';
           
            setTimeout(() => {
                toast.style.display = 'none';
            }, 2000);
        }

        // For demo - prefill test numbers on click
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('phone').addEventListener('dblclick', function() {
                this.value = '9876543210';
                validatePhone();
            });
        });
    </script>
</body>
</html>
