<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice</title>

<style>
@page {
    size: A4;
    margin: 12mm;
}

@media print {
    .no-print { display: none; }
    body { background: #fff; }
}

body {
    margin: 0;
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f3f4f6;
    color: #111827;
}

/* PAGE */
.invoice-wrapper {
    background: #ffffff;
    padding: 28px 32px;
    border: 1px solid #d1d5db; /* SOFT PAGE BORDER */
    box-sizing: border-box;
    page-break-inside: avoid;
}

/* BUTTON */
.download-btn {
    text-align: right;
    margin-bottom: 12px;
}
.download-btn button {
    background: #111827;
    color: #fff;
    border: none;
    padding: 8px 14px;
    font-size: 13px;
    border-radius: 5px;
    cursor: pointer;
}

/* HEADER */
.top-bar {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #d1d5db;
    padding-bottom: 12px;
    margin-bottom: 18px;
}

.title h1 {
    margin: 0;
    font-size: 30px;
}
.title span {
    font-size: 13px;
    color: #6b7280;
}

.invoice-info {
    font-size: 13px;
    line-height: 1.6;
    text-align: right;
}

/* BILLING */
.billing {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
    margin-bottom: 20px;
}

.box h3 {
    font-size: 12px;
    color: #6b7280;
    margin-bottom: 6px;
    text-transform: uppercase;
}

.box p {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 14px;
    font-size: 14px;
}

thead th {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    padding: 10px;
    text-align: left;
    font-weight: 600;
}

tbody td {
    border: 1px solid #e5e7eb;
    padding: 10px;
    vertical-align: top;
}

.right { text-align: right; }

/* TOTALS */
.totals {
    width: 38%;
    margin-left: auto;
    margin-top: 14px;
}

.totals td {
    border: 1px solid #e5e7eb;
    padding: 8px 10px;
}

.grand td {
    font-weight: 600;
    background: #f9fafb;
}

/* NOTES & TERMS */
.section {
    margin-top: 18px;
    font-size: 13px;
}

.section h4 {
    margin-bottom: 6px;
    font-size: 13px;
    text-transform: uppercase;
}

.section ul {
    margin: 4px 0 0 16px;
    padding: 0;
}

/* FOOTER */
.footer {
    margin-top: 30px;
    text-align: right;
}

.signature strong {
    display: block;
    margin-bottom: 45px;
}
</style>
</head>

<body>

<div class="invoice-wrapper">

<!-- PDF BUTTON -->
<div class="download-btn no-print">
    <button onclick="window.print()">Download PDF</button>
</div>

<!-- HEADER -->
<div class="top-bar">
    <div class="title">
        <h1>INVOICE</h1>
        <span>Website Development Services</span>
    </div>
    <div class="invoice-info">
        <strong>Invoice No:</strong> INV-001<br>
        <strong>Date:</strong> 30 Jan 2026<br>
        <strong>Due:</strong> 10 Feb 2026
    </div>
</div>

<!-- BILLING -->
<div class="billing">
    <div class="box">
        <h3>From</h3>
        <p>
            <strong>Saiganesh Gangaprasad Katkam</strong><br>
            1080/G, Venkatesh Niwas,<br>
            Padmanagar, Mumbai – MH<br>
            <strong>Mobile:</strong> 9284029493<br>
            <strong>Email:</strong> saiganesh123k@gmail.com
        </p>
    </div>

    <div class="box">
        <h3>Bill To</h3>
        <p>
            <strong>Trekshitiz Sanstha</strong><br>
            Dombivli, Maharashtra<br>
            India
        </p>
    </div>
</div>

<!-- TABLE -->
<table>
<thead>
<tr>
    <th>#</th>
    <th>Description</th>
    <th class="right">Qty</th>
    <th class="right">Rate (₹)</th>
    <th class="right">Amount (₹)</th>
</tr>
</thead>
<tbody>
<tr>
    <td>1</td>
    <td>
        Complete website development including frontend, backend,
        database integration, admin panel, testing, and deployment support.
    </td>
    <td class="right">1</td>
    <td class="right">30,000</td>
    <td class="right">30,000</td>
</tr>
</tbody>
</table>

<!-- TOTALS -->
<div class="totals">
<table>
<tr>
    <td>Subtotal</td>
    <td class="right">₹ 30,000</td>
</tr>
<tr>
    <td>GST</td>
    <td class="right">₹ 0</td>
</tr>
<tr class="grand">
    <td>Total</td>
    <td class="right">₹ 30,000</td>
</tr>
</table>
</div>

<!-- NOTES -->
<div class="section">
<h4>Notes</h4>
<ul>
    <li>This invoice is for complete website development services.</li>
    <li><strong>No AMC is included.</strong></li>
    <li>Additional changes or features will be charged separately.</li>
</ul>
<strong>Amount in Words:</strong> Rupees Thirty Thousand Only
</div>

<!-- TERMS -->
<div class="section">
<h4>Terms & Conditions</h4>
<ul>
    <li>Payment due on or before the due date.</li>
    <li>Support & maintenance not included.</li>
    <li>Source code provided after full payment.</li>
</ul>
</div>

<!-- SIGN -->
<div class="footer">
    <div class="signature">
        <strong>For Saiganesh Gangaprasad Katkam</strong>
        Authorized Signature
    </div>
</div>

</div>

</body>
</html>
