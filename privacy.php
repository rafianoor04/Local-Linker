
<?php
session_start();
include('header.php');
?>

<style>
    body {
        background: #f0f2f5;
        font-family: 'Segoe UI', sans-serif;
        color: #333;
    }

    .policy-container {
        max-width: 1000px;
        margin: 60px auto;
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .policy-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .policy-header h2 {
        font-size: 34px;
        color: #032642;
        margin-bottom: 10px;
    }

    .policy-header p {
        color: #666;
        font-size: 16px;
    }

    .policy-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e0e0e0;
    }

    .policy-section:last-child {
        border-bottom: none;
    }

    .policy-section h4 {
        font-size: 20px;
        color: #F15B29;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .policy-section h4::before {
        content: "🔒";
        margin-right: 8px;
        font-size: 18px;
    }

    .policy-section p, .policy-section ul {
        font-size: 16px;
        line-height: 1.7;
        margin: 0;
        color: #444;
    }

    .policy-section ul {
        margin-top: 10px;
        padding-left: 25px;
    }

    .policy-section ul li {
        margin-bottom: 8px;
        list-style-type: disc;
    }

    .contact-info {
        background-color: #f8f9fa;
        padding: 15px;
        border-left: 4px solid #032642;
        border-radius: 6px;
        font-size: 15px;
    }
</style>

<div class="policy-container">
    <div class="policy-header">
        <h2>Privacy Policy</h2>
        <p>Your trust is important to us. Please read our privacy practices carefully.</p>
    </div>

    <div class="policy-section">
        <h4>1. Introduction</h4>
        <p>
            This Privacy Policy explains how we collect, use, and safeguard your information when you use our platform.
        </p>
    </div>

    <div class="policy-section">
        <h4>2. Information We Collect</h4>
        <p>We collect the following types of data:</p>
        <ul>
            <li>Personal: name, email, contact number, address.</li>
            <li>Account: login credentials and preferences.</li>
            <li>Activity: service bookings, ratings, and feedback.</li>
            <li>Technical: device info, IP address, browser type.</li>
        </ul>
    </div>

    <div class="policy-section">
        <h4>3. How We Use Your Information</h4>
        <ul>
            <li>To provide and maintain our services.</li>
            <li>To personalize your experience on the platform.</li>
            <li>To communicate updates, offers, and notifications.</li>
            <li>To analyze usage and improve platform performance.</li>
        </ul>
    </div>

    <div class="policy-section">
        <h4>4. Data Sharing</h4>
        <p>
            We do not sell your data. We may share data with trusted third parties (e.g., payment gateways) when necessary to provide our services.
        </p>
    </div>

    <div class="policy-section">
        <h4>5. Cookies</h4>
        <p>
            We use cookies to improve functionality and enhance user experience. You may disable cookies in your browser settings.
        </p>
    </div>

    <div class="policy-section">
        <h4>6. Data Security</h4>
        <p>
            We implement appropriate security practices like SSL encryption, data hashing, and secure servers to keep your data safe.
        </p>
    </div>

    <div class="policy-section">
        <h4>7. Your Rights</h4>
        <p>You have the right to:</p>
        <ul>
            <li>Access, modify or delete your personal data.</li>
            <li>Withdraw consent where applicable.</li>
            <li>Request a copy of your data.</li>
        </ul>
    </div>

    <div class="policy-section">
        <h4>8. Changes to This Policy</h4>
        <p>
            We may update this policy from time to time. Changes will be posted on this page with the updated revision date.
        </p>
    </div>

    <div class="policy-section">
        <h4>9. Contact Us</h4>
        <div class="contact-info">
            If you have any questions or concerns about this policy, please reach out to us:
            <br><br>
            📧 Email: <strong>locallinker@gmail.com</strong><br>
            ☎ Phone: <strong>+880 01927374742</strong>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<style>
    body {
        background-image: url('img/bg.png');
    }
</style>