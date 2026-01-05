<?php $this->load->view('includes/head'); ?>
<style>
  body {
    font-family: 'DejaVu Sans', Arial, sans-serif;
    color: #333;
    background: #fff;
    margin: 0;
    padding: 20px;
    font-size: 12px;
  }

  .invoice-container {
    max-width: 100%;
    margin: 0 auto;
    background: #fff;
  }

  .header-table {
    width: 100%;
    margin-bottom: 20px;
  }

  .header-table td {
    vertical-align: middle;
  }

  .logo-cell {
    width: 50%;
  }

  .logo-cell h3 {
    color: #6777ef;
    margin: 0;
    font-size: 20px;
  }

  .title-cell {
    width: 50%;
    text-align: right;
  }

  .title-cell h1 {
    color: #6777ef;
    font-size: 28px;
    font-weight: normal;
    margin: 0;
    letter-spacing: 2px;
  }

  .info-table {
    width: 100%;
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 15px;
  }

  .info-table td {
    vertical-align: top;
    padding: 5px 10px 5px 0;
  }

  .info-label {
    color: #888;
    font-size: 10px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 3px;
  }

  .info-value {
    font-weight: bold;
    color: #333;
  }

  .info-value-orange {
    font-weight: bold;
    color: #6777ef;
  }

  .client-cell {
    text-align: right;
  }

  .client-name {
    font-weight: bold;
    font-size: 14px;
    color: #333;
  }

  .client-details {
    color: #666;
    font-size: 11px;
  }

  .total-due-box {
    background-color: #f5f5f5;
    padding: 15px;
    margin-bottom: 20px;
    border-left: 4px solid #6777ef;
  }

  .total-due-label {
    color: #666;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 5px;
  }

  .total-due-amount {
    color: #333;
    font-size: 24px;
    font-weight: bold;
  }

  .items-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  .items-table th {
    background-color: #6777ef;
    color: #fff;
    padding: 10px;
    text-align: left;
    font-weight: bold;
    font-size: 11px;
    text-transform: uppercase;
  }

  .items-table th.right {
    text-align: right;
  }

  .items-table th.center {
    text-align: center;
  }

  .items-table td {
    padding: 12px 10px;
    border-bottom: 1px solid #eee;
    vertical-align: top;
  }

  .items-table td.right {
    text-align: right;
  }

  .items-table td.center {
    text-align: center;
  }

  .items-table tr:nth-child(even) {
    background-color: #fafafa;
  }

  .item-name {
    font-weight: bold;
    color: #333;
  }

  .item-desc {
    color: #888;
    font-size: 10px;
    margin-top: 3px;
  }

  .summary-table {
    width: 100%;
    margin-top: 20px;
  }

  .summary-table td {
    vertical-align: top;
  }

  .payment-cell {
    width: 55%;
    padding-right: 20px;
  }

  .payment-title {
    font-weight: bold;
    color: #333;
    font-size: 12px;
    margin-bottom: 10px;
    text-transform: uppercase;
  }

  .payment-info {
    color: #666;
    font-size: 11px;
    line-height: 1.6;
  }

  .totals-cell {
    width: 45%;
  }

  .totals-table {
    width: 100%;
    border-collapse: collapse;
  }

  .totals-table td {
    padding: 6px 0;
    border-bottom: 1px solid #eee;
  }

  .totals-table .label {
    color: #666;
    text-align: left;
  }

  .totals-table .value {
    font-weight: bold;
    color: #333;
    text-align: right;
  }

  .grand-total-row {
    background-color: #6777ef;
    color: #fff;
  }

  .grand-total-row td {
    padding: 10px !important;
    border: none !important;
  }

  .grand-total-row .label {
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
  }

  .grand-total-row .value {
    color: #fff;
    font-size: 16px;
  }

  .note-box {
    margin-top: 20px;
    padding: 12px;
    background-color: #f5f5f5;
  }

  .note-title {
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
  }

  .note-content {
    color: #666;
    font-size: 11px;
  }

  .footer-table {
    width: 100%;
    margin-top: 30px;
    padding-top: 15px;
    border-top: 2px solid #eee;
  }

  .footer-table td {
    vertical-align: middle;
  }

  .footer-left {
    color: #666;
    font-size: 10px;
  }

  .footer-right {
    text-align: right;
    color: #e67e22;
    font-weight: bold;
  }
</style>
</head>

<body>
  <div class="invoice-container">
    <!-- Header -->
    <table class="header-table">
      <tr>
        <td class="logo-cell">
          <?php if (isset($logo_url) && $logo_url) { ?>
            <img src="<?= $logo_url ?>" alt=""
              style="max-height: 50px; max-width: 180px; display: block; margin-bottom: 5px;">
          <?php } ?>
          <h3><?= company_name() ?></h3>
        </td>
        <td class="title-cell">
          <h1><?= $this->lang->line('invoice') ? strtoupper($this->lang->line('invoice')) : 'INVOICE' ?></h1>
        </td>
      </tr>
    </table>

    <!-- Info Row -->
    <table class="info-table">
      <tr>
        <td style="width: 25%;">
          <span
            class="info-label"><?= $this->lang->line('invoice_no') ? $this->lang->line('invoice_no') : 'Invoice No.' ?></span>
          <span class="info-value-orange"><?= htmlspecialchars($invoice[0]['invoice_id']) ?></span>
        </td>
        <td style="width: 25%;">
          <span class="info-label"><?= $this->lang->line('date') ? $this->lang->line('date') : 'Date' ?></span>
          <span
            class="info-value"><?= htmlspecialchars(format_date($invoice[0]['invoice_date'], system_date_format())) ?></span>
        </td>
        <td class="client-cell" style="width: 50%;">
          <span
            class="info-label"><?= $this->lang->line('invoice_to') ? $this->lang->line('invoice_to') : 'Invoice To' ?></span>
          <div class="client-name">
            <?= $invoice_to->company_name ? htmlspecialchars($invoice_to->company_name) : htmlspecialchars($invoice[0]['to_user']) ?>
          </div>
          <div class="client-details">
            <?= $invoice_to->address ? htmlspecialchars($invoice_to->address) : '' ?>
            <?php if ($invoice_to->city || $invoice_to->state) { ?>
              <br><?= $invoice_to->city ? htmlspecialchars($invoice_to->city) : '' ?><?= $invoice_to->state ? ', ' . htmlspecialchars($invoice_to->state) : '' ?>
            <?php } ?>
          </div>
        </td>
      </tr>
    </table>

    <!-- Total Due Section -->
    <div class="total-due-box">
      <div class="total-due-label"><?= $this->lang->line('total_due') ? $this->lang->line('total_due') : 'TOTAL DUE' ?>
      </div>
      <div class="total-due-amount"><?= format_currency($final_total) ?></div>
    </div>

    <!-- Items Table -->
    <table class="items-table">
      <tr>
        <th style="width: 50%;">
          <?= $this->lang->line('item_description') ? $this->lang->line('item_description') : 'Item Description' ?>
        </th>
        <th class="right"><?= $this->lang->line('unit_price') ? $this->lang->line('unit_price') : 'Unit Price' ?></th>
        <th class="center"><?= $this->lang->line('qty') ? $this->lang->line('qty') : 'Qty' ?></th>
        <th class="right"><?= $this->lang->line('total') ? $this->lang->line('total') : 'Total' ?></th>
      </tr>
      <?php foreach ($items as $item) { ?>
        <tr>
          <td>
            <div class="item-name"><?= htmlspecialchars($item['title']) ?></div>
          </td>
          <td class="right"><?= format_currency($item['budget'], false) ?></td>
          <td class="center">1</td>
          <td class="right"><?= format_currency($item['budget'], false) ?></td>
        </tr>
      <?php } ?>
      <?php foreach ($products as $item) { ?>
        <tr>
          <td>
            <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
            <?php if (isset($item['description']) && $item['description']) { ?>
              <div class="item-desc"><?= htmlspecialchars($item['description']) ?></div>
            <?php } ?>
          </td>
          <td class="right"><?= format_currency($item['price'], false) ?></td>
          <td class="center">1</td>
          <td class="right"><?= format_currency($item['price'], false) ?></td>
        </tr>
      <?php } ?>
    </table>

    <!-- Summary Section - Totals only on right -->
    <table class="summary-table">
      <tr>
        <td class="payment-cell">
          <!-- Empty cell for spacing -->
        </td>
        <td class="totals-cell">
          <table class="totals-table">
            <tr>
              <td class="label"><?= $this->lang->line('subtotal') ? $this->lang->line('subtotal') : 'Sub Total' ?>:</td>
              <td class="value"><?= format_currency($invoice[0]['amount'], false) ?></td>
            </tr>
            <?php if ($taxes) {
              foreach ($taxes as $tax) { ?>
                <tr>
                  <td class="label"><?= htmlspecialchars($tax['title']) ?> (<?= htmlspecialchars($tax['tax']) ?>%):</td>
                  <td class="value"><?= format_currency($tax['tax_amount'], false) ?></td>
                </tr>
              <?php }
            } ?>
            <tr class="grand-total-row">
              <td class="label">
                <?= $this->lang->line('grand_total') ? $this->lang->line('grand_total') : 'Grand Total' ?>
              </td>
              <td class="value"><?= format_currency($final_total, false) ?></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- Note Section -->
    <?php if ($invoice[0]['note']) { ?>
      <div class="note-box">
        <div class="note-title"><?= $this->lang->line('note') ? $this->lang->line('note') : 'Note' ?>:</div>
        <div class="note-content"><?= htmlspecialchars($invoice[0]['note']) ?></div>
      </div>
    <?php } ?>

    <!-- Payment Section - Same style as Note -->
    <?php if (get_offline_bank_transfer() && get_bank_details()) { ?>
      <div class="note-box">
        <div class="note-title">
          <?= $this->lang->line('payment_method') ? $this->lang->line('payment_method') : 'Payment Method' ?>:
        </div>
        <div class="note-content"><?= get_bank_details() ?></div>
      </div>
    <?php } ?>

    <!-- Footer -->
    <table class="footer-table">
      <tr>
        <td class="footer-left">
          <?= $invoice_from->address ? htmlspecialchars($invoice_from->address) : '' ?>
          <?php if ($invoice_from->city) { ?> | <?= htmlspecialchars($invoice_from->city) ?><?php } ?>
        </td>
        <td class="footer-right">
          <?= company_name() ?>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>