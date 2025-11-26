<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin: -30px -30px 20px -30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .info-row {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .info-label {
            font-weight: bold;
            color: #667eea;
            display: inline-block;
            width: 120px;
        }
        .info-value {
            color: #333;
        }
        .message-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            margin-top: 20px;
            border-left: 4px solid #667eea;
        }
        .message-label {
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>📧 Pesan Baru dari Website</h1>
        </div>

        <p>Anda menerima pesan baru dari form kontak website PT. Nata Ultima Enggal:</p>

        <div class="info-row">
            <span class="info-label">Nama:</span>
            <span class="info-value">{{ $contactMessage->name }}</span>
        </div>

        <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value">
                <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
            </span>
        </div>

        @if($contactMessage->phone)
        <div class="info-row">
            <span class="info-label">Telepon:</span>
            <span class="info-value">
                <a href="tel:{{ $contactMessage->phone }}">{{ $contactMessage->phone }}</a>
            </span>
        </div>
        @endif

      <div class="info-row">
    <span class="info-label">Waktu:</span>
    <span class="info-value">
        {{ $contactMessage->created_at ? $contactMessage->created_at->format('d F Y, H:i') : now()->format('d F Y, H:i') }} WIB
    </span>
</div>

        <div class="message-box">
            <div class="message-label">Pesan:</div>
            <div>{{ $contactMessage->message }}</div>
        </div>

        <div class="footer">
            <p>Email ini dikirim otomatis dari website PT. Nata Ultima Enggal</p>
            <p><strong>PT. Nata Ultima Enggal</strong><br>
            Jl. Laksda Adisucipto No.37, Karangbayam, Bantul, DIY 55711<br>
            Telepon: +62 274 411 3360 | Email: official@nataultima.com</p>
        </div>
    </div>
</body>
</html>