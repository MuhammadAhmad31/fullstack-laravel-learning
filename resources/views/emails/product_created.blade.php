<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Produk Baru Telah Dibuat - {{ $product->name }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }

        .email-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: #ffffff;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header p {
            font-size: 16px;
            opacity: 0.95;
            margin-top: 10px;
        }

        .notification-badge {
            display: inline-block;
            background-color: #ffd700;
            color: #333;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            margin-top: 15px;
            box-shadow: 0 2px 10px rgba(255, 215, 0, 0.3);
        }

        .content {
            padding: 40px 30px;
        }

        .intro-section {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 10px;
        }

        .intro-section h2 {
            color: #667eea;
            font-size: 26px;
            margin-bottom: 15px;
        }

        .intro-section p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
        }

        .product-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 2px solid #e0e6ed;
            border-radius: 12px;
            padding: 35px;
            margin: 30px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .product-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 3px solid #667eea;
        }

        .product-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 28px;
            color: white;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        .product-title {
            flex: 1;
        }

        .product-title h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 5px;
        }

        .product-title .tag {
            display: inline-block;
            background-color: #10b981;
            color: white;
            padding: 4px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 5px;
        }

        .product-details {
            margin: 25px 0;
        }

        .detail-row {
            display: flex;
            padding: 15px;
            margin-bottom: 12px;
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .detail-row:hover {
            background-color: #e9ecef;
            transform: translateX(5px);
        }

        .detail-label {
            font-weight: 700;
            color: #667eea;
            min-width: 150px;
            font-size: 15px;
        }

        .detail-value {
            color: #333;
            flex: 1;
            font-size: 15px;
        }

        .price-section {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            margin: 25px 0;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        .price-section .label {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .price-section .amount {
            font-size: 42px;
            font-weight: 700;
            margin: 10px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .description-section {
            margin: 30px 0;
            padding: 25px;
            background-color: #f8f9fa;
            border-radius: 10px;
            border-left: 5px solid #667eea;
        }

        .description-section h4 {
            color: #667eea;
            font-size: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .description-section h4:before {
            content: "📝";
            margin-right: 10px;
            font-size: 24px;
        }

        .description-section p {
            color: #555;
            font-size: 15px;
            line-height: 1.8;
        }

        .features-section {
            margin: 30px 0;
        }

        .features-section h4 {
            color: #667eea;
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .features-section h4:before {
            content: "⭐";
            margin-right: 10px;
            font-size: 24px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .feature-item {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #10b981;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background-color: #e9ecef;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-item .icon {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .feature-item h5 {
            color: #333;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .feature-item p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .specifications-section {
            margin: 30px 0;
            padding: 25px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 10px;
        }

        .specifications-section h4 {
            color: #667eea;
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .specifications-section h4:before {
            content: "🔧";
            margin-right: 10px;
            font-size: 24px;
        }

        .spec-table {
            width: 100%;
            border-collapse: collapse;
        }

        .spec-table tr {
            border-bottom: 1px solid #dee2e6;
        }

        .spec-table tr:last-child {
            border-bottom: none;
        }

        .spec-table td {
            padding: 12px;
            font-size: 15px;
        }

        .spec-table td:first-child {
            font-weight: 600;
            color: #667eea;
            width: 40%;
        }

        .spec-table td:last-child {
            color: #555;
        }

        .action-section {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 10px;
        }

        .action-section h4 {
            color: #333;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 15px 35px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background-color: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background-color: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        .statistics-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .stat-card .number {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-card .label {
            font-size: 14px;
            opacity: 0.9;
        }

        .timeline-section {
            margin: 30px 0;
            padding: 25px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .timeline-section h4 {
            color: #667eea;
            font-size: 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .timeline-section h4:before {
            content: "📅";
            margin-right: 10px;
            font-size: 24px;
        }

        .timeline-item {
            display: flex;
            margin-bottom: 20px;
            padding-left: 30px;
            border-left: 3px solid #667eea;
            position: relative;
        }

        .timeline-item:before {
            content: "";
            position: absolute;
            left: -8px;
            top: 0;
            width: 14px;
            height: 14px;
            background-color: #667eea;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #667eea;
        }

        .timeline-content {
            flex: 1;
            padding-left: 15px;
        }

        .timeline-content .date {
            color: #667eea;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .timeline-content .event {
            color: #555;
            font-size: 15px;
        }

        .additional-info {
            margin: 30px 0;
            padding: 25px;
            background: linear-gradient(135deg, #fff5e6 0%, #ffe0b3 100%);
            border-radius: 10px;
            border-left: 5px solid #ff9800;
        }

        .additional-info h4 {
            color: #ff9800;
            font-size: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .additional-info h4:before {
            content: "ℹ️";
            margin-right: 10px;
            font-size: 24px;
        }

        .info-list {
            list-style: none;
            padding: 0;
        }

        .info-list li {
            padding: 10px 0;
            color: #555;
            font-size: 15px;
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
        }

        .info-list li:before {
            content: "✓";
            color: #10b981;
            font-weight: 700;
            margin-right: 12px;
            font-size: 18px;
        }

        .related-products {
            margin: 30px 0;
        }

        .related-products h4 {
            color: #667eea;
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .related-products h4:before {
            content: "🔗";
            margin-right: 10px;
            font-size: 24px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .mini-product-card {
            background-color: white;
            border: 2px solid #e0e6ed;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .mini-product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-color: #667eea;
        }

        .mini-product-card .image-placeholder {
            width: 100%;
            height: 120px;
            background: linear-gradient(135deg, #e0e6ed 0%, #c3cfe2 100%);
            border-radius: 6px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .mini-product-card h5 {
            color: #333;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .mini-product-card .price {
            color: #10b981;
            font-size: 18px;
            font-weight: 700;
        }

        .contact-section {
            margin: 30px 0;
            padding: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            color: white;
            text-align: center;
        }

        .contact-section h4 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-item .icon {
            font-size: 24px;
        }

        .contact-item .text {
            font-size: 16px;
        }

        .footer {
            background-color: #2d3748;
            color: #e2e8f0;
            padding: 40px 30px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 25px;
        }

        .footer-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #667eea;
        }

        .footer-text {
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .social-link {
            display: inline-block;
            width: 45px;
            height: 45px;
            background-color: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: #764ba2;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin: 20px 0;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #e2e8f0;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #667eea;
        }

        .copyright {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #4a5568;
            font-size: 13px;
            opacity: 0.8;
        }

        .divider {
            height: 3px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            margin: 30px 0;
            border-radius: 2px;
        }

        @media (max-width: 600px) {
            .email-container {
                border-radius: 0;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .content {
                padding: 30px 20px;
            }

            .product-card {
                padding: 25px 20px;
            }

            .product-header {
                flex-direction: column;
                text-align: center;
            }

            .product-icon {
                margin: 0 auto 15px;
            }

            .detail-row {
                flex-direction: column;
            }

            .detail-label {
                min-width: auto;
                margin-bottom: 5px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .statistics-section {
                grid-template-columns: repeat(2, 1fr);
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .contact-info {
                flex-direction: column;
                gap: 15px;
            }

            .footer-links {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 Produk Baru Telah Dibuat!</h1>
            <p>Sistem telah berhasil menambahkan produk baru ke dalam database</p>
            <div class="notification-badge">✨ NOTIFIKASI PENTING</div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Intro Section -->
            <div class="intro-section">
                <h2>Selamat!</h2>
                <p>Produk baru telah berhasil ditambahkan ke dalam sistem inventory kami. Berikut adalah informasi lengkap mengenai produk yang baru saja dibuat. Silakan tinjau detail produk di bawah ini dan pastikan semua informasi sudah sesuai dengan kebutuhan bisnis Anda.</p>
            </div>

            <!-- Product Card -->
            <div class="product-card">
                <div class="product-header">
                    <div class="product-icon">📦</div>
                    <div class="product-title">
                        <h3>{{ $product->name }}</h3>
                        <span class="tag">PRODUK BARU</span>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="product-details">
                    <div class="detail-row">
                        <div class="detail-label">Nama Produk:</div>
                        <div class="detail-value">{{ $product->name }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kode Produk:</div>
                        <div class="detail-value">{{ $product->code ?? 'PRD-' . str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kategori:</div>
                        <div class="detail-value">{{ $product->category ?? 'Umum' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">SKU:</div>
                        <div class="detail-value">{{ $product->sku ?? 'SKU-' . strtoupper(substr(md5($product->name), 0, 8)) }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Status:</div>
                        <div class="detail-value">{{ $product->status ?? 'Aktif' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Tanggal Dibuat:</div>
                        <div class="detail-value">{{ $product->created_at ?? now()->format('d F Y, H:i:s') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Dibuat Oleh:</div>
                        <div class="detail-value">{{ $product->creator->name ?? 'Admin System' }}</div>
                    </div>
                </div>

                <!-- Price Section -->
                <div class="price-section">
                    <div class="label">Harga Produk</div>
                    <div class="amount">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <div class="label">{{ $product->price_type ?? 'Harga belum termasuk pajak' }}</div>
                </div>

                <!-- Description Section -->
                <div class="description-section">
                    <h4>Deskripsi Produk</h4>
                    <p>{{ $product->description }}</p>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Features Section -->
            <div class="features-section">
                <h4>Fitur & Keunggulan Produk</h4>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="icon">🚀</div>
                        <h5>Kualitas Premium</h5>
                        <p>Dibuat dengan material berkualitas tinggi dan standar internasional</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon">💎</div>
                        <h5>Desain Modern</h5>
                        <p>Tampilan elegan yang cocok untuk berbagai kebutuhan</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon">🛡️</div>
                        <h5>Garansi Resmi</h5>
                        <p>Dilengkapi dengan garansi resmi untuk kepuasan pelanggan</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon">⚡</div>
                        <h5>Efisiensi Tinggi</h5>
                        <p>Performa optimal dengan konsumsi energi yang efisien</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon">🌍</div>
                        <h5>Ramah Lingkungan</h5>
                        <p>Diproduksi dengan memperhatikan kelestarian lingkungan</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon">🔒</div>
                        <h5>Keamanan Terjamin</h5>
                        <p>Dilengkapi dengan fitur keamanan tambahan</p>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Specifications Section -->
            <div class="specifications-section">
                <h4>Spesifikasi Teknis</h4>
                <table class="spec-table">
                    <tr>
                        <td>Dimensi</td>
                        <td>{{ $product->dimensions ?? '30 x 20 x 15 cm' }}</td>
                    </tr>
                    <tr>
                        <td>Berat</td>
                        <td>{{ $product->weight ?? '2.5' }} kg</td>
                    </tr>
                    <tr>
                        <td>Material</td>
                        <td>{{ $product->material ?? 'High-Grade Plastic & Metal' }}</td>
                    </tr>
                    <tr>
                        <td>Warna</td>
                        <td>{{ $product->color ?? 'Hitam, Putih, Silver' }}</td>
                    </tr>
                    <tr>
                        <td>Garansi</td>
                        <td>{{ $product->warranty ?? '12 Bulan' }}</td>
                    </tr>
                    <tr>
                        <td>Negara Asal</td>
                        <td>{{ $product->origin ?? 'Indonesia' }}</td>
                    </tr>
                    <tr>
                        <td>Sertifikasi</td>
                        <td>{{ $product->certification ?? 'SNI, ISO 9001:2015' }}</td>
                    </tr>
                    <tr>
                        <td>Stok Tersedia</td>
                        <td>{{ $product->stock ?? '150' }} Unit</td>
                    </tr>
                </table>
            </div>

            <div class="divider"></div>

            <!-- Statistics Section -->
            <div class="statistics-section">
                <div class="stat-card">
                    <div class="number">{{ $product->view_count ?? '0' }}</div>
                    <div class="label">Total Dilihat</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ $product->wishlist_count ?? '0' }}</div>
                    <div class="label">Wishlist</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ $product->sold_count ?? '0' }}</div>
                    <div class="label">Terjual</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ $product->rating ?? '5.0' }}</div>
                    <div class="label">Rating ⭐</div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Timeline Section -->
            <div class="timeline-section">
                <h4>Timeline Produk</h4>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="date">{{ now()->format('d M Y, H:i') }}</div>
                        <div class="event">Produk berhasil dibuat dan ditambahkan ke database.</div>
                    </div>
                </div>
                <!-- Additional timeline items can be added here -->
            </div>
        </div>
        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-logo">Inventory System</div>
                <div class="footer-text">
                    &copy; {{ date('Y') }} Inventory System. Semua hak dilindungi und
ang-undang. Terima kasih telah mempercayai kami sebagai mitra bisnis Anda.
                </div>
                <div class="social-links">
                    <a href="#" class="social-link">👍</a>
                </div>
            </div>
        </div>
    </div>
</body>