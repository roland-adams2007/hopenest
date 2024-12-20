<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Donation</title>
    <style>
        /* Global Styles */
        body {
            background-color: #f7fafc;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Banner Styles */
        .thank-you-banner {
            background-color: #38a169;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            font-size: 24px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Card Styles */
        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 14px;
            margin: 5px 0;
        }
        .card ul {
            margin-top: 10px;
        }
        .card img {
            max-width: 80%;
            margin-top: 20px;
        }

        /* Campaign Progress Bar */
        .campaign-progress-bar {
            background-color: #e2e8f0;
            border-radius: 8px;
            height: 10px;
            margin-top: 15px;
        }
        .campaign-progress-bar div {
            height: 100%;
            border-radius: 8px;
            background-color: #38a169;
            width: 50%;
        }

        /* Social Media Links */
        .social-links {
            text-align: center;
            margin-top: 20px;
        }
        .social-links a {
            text-decoration: none;
            font-size: 16px;
            margin: 0 10px;
            color: #ffffff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .social-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Thank you Banner -->
        <div class="thank-you-banner">
            <h1>Thank You for Your Generous Donation! 🌟</h1>
            <p>Your contribution of <span id="donation-amount" style="font-weight: bold; font-size: 18px;">${{$details['amount']}}</span> is truly appreciated!</p>
        </div>

        <!-- Donation Receipt -->
        <div class="card">
            <h3>Donation Receipt</h3>
            <p>Thank you for your donation of <strong>${{$details['amount']}}</strong> made on <strong>{{$details['date']}}</strong>.</p>
        </div>

        <!-- Impact Statement -->
        <div class="card">
            <h3>Your Donation Makes a Difference!</h3>
            <ul>
                <li>Provide 50 meals to families in need.</li>
                <li>Fund 5 scholarships for deserving students.</li>
                <li>Expand our outreach programs to rural communities.</li>
            </ul>
        </div>

        <!-- Thank You Certificate -->
        <div class="card">
            <div class="certificate-box text-center">
                <h3 class="font-bold text-2xl">Certificate of Appreciation</h3>
                <p class="mt-4 text-lg">Dear <span id="donor-name" class="font-semibold">{{$details['name']}}</span>,</p>
                <p class="mt-4 text-lg">Your generous donation has earned you our heartfelt appreciation. Here's your certificate:</p>
                <img src="{{asset('assets/images/certficate.webp')}}" alt="Thank You Certificate">
                <p class="mt-4">Share this certificate on social media to inspire others to support this cause!</p>
            </div>
        </div>

        <!-- Social Media Engagement -->
        <div class="social-links">
            <p><strong>Help Spread the Word!</strong></p>
            <p>Share your donation story on social media and encourage others to contribute. Use the hashtag <strong>#DonateForChange</strong> to get featured!</p>
            <div>
                <a @disabled(true) href="https://twitter.com/intent/tweet?text=I%20just%20donated%20to%20a%20great%20cause%20%E2%80%93%20you%20can%20too%20!%20%23DonateForChange" target="_blank">Twitter</a>
                <a @disabled(true) href="https://www.facebook.com/sharer/sharer.php?u=[yourwebsite.com]" target="_blank">Facebook</a>
                <a @disabled(true) href="https://www.instagram.com" target="_blank">Instagram</a>
            </div>
        </div>

    </div>

</body>
</html>
