<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom in LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff; 
            color: #0056b3;  
        }
        #zmmtg-root {
            margin-top: 20px;
            height: 500px; 
        }
        .container {
            border: 1px solid #dee2e6;  
            background-color: white;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        .list-group-item {
            border-color: #b6d4fe;  
        }
        .list-group-item-action:hover {
            background-color: #e1f5fe; 
        }
        .btn-primary {
            background-color: #007bff;  
            border-color: #007bff;  
        }
        .btn-primary:hover {
            background-color: #0056b3;  
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container my-4">
    <h2 class="mb-3">Zoom Meetings</h2>
    <div id="zmmtg-root"></div>
    <div id="aria-notify-area"></div>

    <div class="list-group">
        <button class="list-group-item list-group-item-action" onclick="joinMeeting('123456789', 'password1')">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Meeting Title One</h5>
                <small class="text-muted">3 days to go</small>
            </div>
            <p class="mb-1">Some description for the first meeting...</p>
            <small class="text-muted">Meeting ID: 123456789</small>
        </button>
     </div>
</div>

<script src="https://source.zoom.us/2.0.1/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/2.0.1/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/2.0.1/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/2.0.1/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/2.0.1/lib/vendor/lodash.min.js"></script>
<script src="https://source.zoom.us/zoom-meeting-2.0.1.min.js"></script>
<script type="text/javascript">
    ZoomMtg.preLoadWasm();
    ZoomMtg.prepareJssdk();

    function joinMeeting(meetingId, passWord) {
        ZoomMtg.init({
            leaveUrl: 'https://yourlms.com/leave', 
            isSupportAV: true,
            success: function () {
                ZoomMtg.join({
                    meetingNumber: meetingId,
                    userName: 'LMS User',  
                    signature: generateSignature('YOUR_API_KEY', 'YOUR_API_SECRET', meetingId, 0),   
                    apiKey: 'YOUR_API_KEY',
                    userEmail: 'email@example.com',  
                    passWord: passWord,
                    success: function (res) {
                        console.log('Joining meeting success', res);
                    },
                    error: function (error) {
                        console.log('Error joining meeting', error);
                    }
                });
            },
            error: function (error) {
                console.log('Error initializing Zoom SDK', error);
            }
        });
    }

    function generateSignature(apiKey, apiSecret, meetingNumber, role) {
         return ZoomMtg.generateSignature({
            meetingNumber: meetingNumber,
            apiKey: apiKey,
            apiSecret: apiSecret,
            role: role,
            success: function(res){
                console.log('Signature', res.result);
                return res.result;
            }
        });
    }
</script>

</body>
</html>
