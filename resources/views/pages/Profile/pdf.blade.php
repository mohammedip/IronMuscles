<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #e2e8f0;
      margin: 0;
      padding: 40px;
    }

    .card {
      width: 360px; 
      height: 300px; /* smaller height */
      background: #ffffff;
      margin: auto;
      padding: 20px;
      border-radius: 16px;
      border: 3px solid #f97532;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card img {
      width: 50px; 
      height: 50px;
      object-fit: contain;
      margin-right: 10px; 
      border-radius: 50%; 
      display: inline-block; 
    }

    .badge-top {
      display: flex;
      align-items: center;
      text-align: center;
      margin-bottom: 15px;
    }

    .title {
      font-size: 20px;
      font-weight: 800;
      color: #f97532;
      text-transform: uppercase;
    }

    #title2 {
      color: #000;
    }

    .info-block {
      width: 90%;
      margin: 6px 0;
      padding: 10px 14px;
      background: #f3f4f6;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      font-weight: 600;
      border-left: 5px solid #f97532;
    }

    .info-label {
      color: #4b5563;
    }

    .info-value {
      color: #1f2937;
      text-align: right;
    }

    .footer {
      margin-top: auto;
      font-size: 12px;
      color: #6b7280;
      text-align: center;
      padding-top: 10px;
      width: 100%;
    }

    .footer-brand {
      font-size: 14px;
      color: #f97532;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="card">
    <img src="{{ $photo }}" alt="Logo" />
    <div class="badge-top">

      <div class="title">BADGE<span id="title2"> OFFICIEL</span></div>

    </div>

    <div class="info-block">
      <span class="info-label">Nom:</span>
      <span class="info-value">{{ $name }}</span>
    </div>

    <div class="info-block">
      <span class="info-label">Statut:</span>
      <span class="info-value">{{ ucfirst($role) }}</span>
    </div>

    <div class="info-block">
      <span class="info-label">Délivré le:</span>
      <span class="info-value">{{ \Carbon\Carbon::now()->format('d F Y') }}</span>
    </div>

    <div class="info-block">
      <span class="info-label">ID:</span>
      <span class="info-value">IR-{{ $id }}-{{ strtoupper(substr($name, 0, 2)) }}</span>
    </div>

    <div class="footer">
      <span class="footer-brand">IronMuscles</span> © {{ \Carbon\Carbon::now()->format('Y') }}
    </div>
  </div>
</body>
</html>
