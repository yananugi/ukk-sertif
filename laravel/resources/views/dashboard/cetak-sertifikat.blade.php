<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        @page { size: A4 landscape; margin: 0; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cormorant Garamond', 'Times New Roman', serif; color: #1a237e; background: #fff; }
        
        .page {
            width: 297mm;
            height: 210mm;
            padding: 10mm;
            position: relative;
            page-break-after: always;
        }

        .border-outer {
            width: 100%;
            height: 100%;
            border: 6px solid #1a237e;
            padding: 4px;
            position: relative;
        }
        .border-inner {
            width: 100%;
            height: 100%;
            border: 2px solid #c5a059;
            padding: 10mm;
            position: relative;
            text-align: center;
        }

        /* Ornamen Sudut (Aman untuk DomPDF) */
        .corner { position: absolute; width: 40px; height: 40px; border: 2px solid #c5a059; }
        .tl { top: 6px; left: 6px; border-right: 0; border-bottom: 0; }
        .tr { top: 6px; right: 6px; border-left: 0; border-bottom: 0; }
        .bl { bottom: 6px; left: 6px; border-right: 0; border-top: 0; }
        .br { bottom: 6px; right: 6px; border-left: 0; border-top: 0; }

        /* Header & Judul */
        .header { margin-top: 12mm; }
        .logo { font-size: 12px; letter-spacing: 4px; text-transform: uppercase; color: #555; margin-bottom: 10px; }
        .title { font-family: 'Playfair Display', 'Georgia', serif; font-size: 42px; font-weight: bold; letter-spacing: 8px; margin-bottom: 5px; }
        .subtitle { font-size: 15px; letter-spacing: 3px; color: #666; text-transform: uppercase; margin-bottom: 20px; }
        .divider { width: 120px; height: 1px; background: #c5a059; margin: 0 auto 15px; }
        
        .to-text { font-size: 14px; color: #444; font-style: italic; margin-bottom: 5px; }
        .name { font-family: 'Great Vibes', 'Brush Script MT', cursive; font-size: 56px; color: #b8945a; margin: 5px 0 10px; line-height: 1.2; }
        
        .desc { font-size: 16px; line-height: 1.6; color: #333; max-width: 750px; margin: 0 auto; }
        .desc strong { color: #1a237e; }

        /* Footer Tanda Tangan (Menggunakan Tabel agar DomPDF stabil) */
        .footer { margin-top: 16mm; page-break-inside: avoid; }
        table.sig-layout { width: 85%; margin: 0 auto; border-collapse: collapse; }
        table.sig-layout td { width: 33%; text-align: center; vertical-align: bottom; padding: 0 10px; }
        
        .sig-line { width: 160px; height: 1px; background: #1a237e; margin: 40px auto 6px; }
        .stamp-box { width: 85px; height: 85px; border: 2px double #c5a059; margin: 0 auto; }
        
        p { margin: 0; }
        .label { font-size: 11px; color: #777; text-transform: uppercase; letter-spacing: 1px; margin-top: 4px; }
        .date-text { font-weight: 600; font-size: 15px; margin-bottom: 40px; }
        .signer-name { font-weight: 600; font-size: 15px; margin-bottom: 40px; }
    </style>
</head>
<body>

<div class="page">
    <div class="border-outer">
        <div class="border-inner">
            <div class="corner tl"></div><div class="corner tr"></div>
            <div class="corner bl"></div><div class="corner br"></div>

            <div class="header">
                <div class="logo">CORP LOGO / INSTANSI</div>
                <h1 class="title">SERTIFIKAT</h1>
                <div class="subtitle">APRESIASI PRAKTIK KERJA LAPANGAN</div>
                <div class="divider"></div>
            </div>

            <div class="to-text">Dengan ini diberikan kepada</div>
            <div class="name">{{ $sertifikat->nama }}</div>

            <p class="desc">
                Atas dedikasi, kedisiplinan, dan kontribusi luar biasa dalam menyelesaikan program<br>
                Praktik Kerja Lapangan (PKL) di <strong>{{ $sertifikat->dudi }}</strong><br>
                Kompetensi Keahlian: <strong>{{ $sertifikat->jurusan }}</strong>
            </p>

            <div class="footer">
                <table class="sig-layout">
                    <tr>
                        <td>
                            <p class="date-text">{{ date('d F Y') }}</p>
                            <div class="sig-line"></div>
                            <p class="label">Tanggal Terbit</p>
                        </td>
                        <td>
                            <div class="stamp-box"></div>
                        </td>
                        <td>
                            <p class="signer-name"><strong>( PIMPINAN DUDI )</strong></p>
                            <div class="sig-line"></div>
                            <p class="label">Penandatangan</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>