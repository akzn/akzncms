<div class="container content-container">
    <div class="mb-md-5">
      <h6>Detail Transaksi</h6>
      <hr>
    </div>
  <?php alert_html() ?>

    <div class="d-md-none offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding mb-3">
        <div class="card">
            <div class=card-body>
                <div class="row mb-4 d-md-none">
                    <div class="col-12">
                        <p class="mb-0">ID. Order : <?=$order->order_code?><br><?=date('d-m-Y h:i',strtotime($order->create_date))?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
       <div class="card">
          <div class="card-header p-4 d-none d-md-block">
    
             <div class="float-right">
                <p class="mb-0">ID. Order <?=$order->order_code?></p>
                Tanggal: <?=date('d-m-Y h:i',strtotime($order->create_date))?>
             </div>
          </div>
          <div class="card-body">

            <?php if($payment_detail):?>
            <div class="row">
               <div class="col-12">
                  <div>Tagihan Sekarang</div>
                  <p class="mb-0 pb-0 font-weight-bold">Rp.<?=number_format($payment_detail->amount)?></p>
                  <small>Jatuh Tempo <?=date('d M Y',strtotime($payment_detail->due_date))?></small><br>
                  <!-- <button class="btn btn-primary btn-sm mt-3 float-right">Bayar Sekarang</button> -->
               </div>
            </div>
            
            <?php if($payment_detail->payment_gateway_transaction_status != ''):?>
            <div class="row mt-2">
               <div class="col-12">
                  <p class="mb-0"><span class="fz-12">Transaction ID :</span> <span><?=$payment_detail->transaction_id?></span></p>
                  <p class="mb-0">status : <span style="color:red"><?=$payment_detail->payment_gateway_transaction_status?></span></p>
               </div>
            </div>
            <?php endif;?>
            <div class="row mt-4">
               <div class="col-12">
                  <span class="">
                     <?=$order->btn_pay?>
                  </span>
               </div>
            </div>

             <hr>
            <?php endif;?>

             <div class="row mb-4">
                <div class="col-12">
                  <div class="row">
                     <div class="col-6">
                        <div class="fz-12">Metode Bayar</div>
                        <p class="mb-0 pb-0 font-weight-bold"><?=$payment->payment_type_string?></p>

                        <?php if ($payment->payment_type == '2'):?>
                        <p class="mb-0 pb-0 fz-12">Tenor</p>
                        <p class="mb-0 pb-0 font-weight-bold"><?=$payment->tenor?> Bulan</p>
                        <?php endif;?>

                       
                     </div>
                     <!-- <div class="col-6">
                        <p class="mb-0 pb-0 fz-12">Jumlah Terbayar</p>
                        <p class="mb-0 pb-0 font-weight-bold">1.400.000</p>
                        <p class="mb-0 pb-0 fz-12">Sisa Pembayaran</p>
                        <p class="mb-0 pb-0 font-weight-bold">1.400.000</p>
                     </div> -->
                  </div>
                  <?php if ($payment->payment_type == '2'):?>
                  <hr>
                  <h6>Rincian Tagihan</h6>
                  <table class="table table-tenors">
                     <thead>
                        <tr>
                           <th>Tenor</th>
                           <th>Tagihan</th>
                           <th>Jatuh Tempo</th>
                        </tr>
                     </thead>
                     <tbody>

                        <tr>
                           <td>DP</td>

                           <?php
                              $dueDP = new DateTime($order->create_date.' + 1 day');
                           ?>

                           <?php if($payment_list[0]->payment_type=='2'):?>
                              <td>Rp.<?=number_format($payment_list[0]->amount)?></td>
                              <td style="color:green">Lunas</td>
                           <?php else:?>
                              <td>Rp.<?=number_format($order->down_payment)?></td>
                              <td><?=date('d M Y',strtotime($dueDP->format('d M Y')))?></td>
                           <?php endif;?>

                        </tr>
                       
                        <?php for($i=1;$i<=$payment->tenor;$i++):?>
                           <tr>
                              <td><?=$i?>/<?=$payment->tenor?></td>
                              
                              <?php
                                 $dueTenors = new DateTime(add_month($order->create_date,$i).' + 1 day');
                              ?>

                              <?php if($payment_list[$i]->payment_detail_type=='3'):?>
                                 <td>Rp.<?=number_format($payment_list[$i]->amount)?></td>
                                 <td style="color:green">Lunas</td>
                              <?php else:?>
                                 <td>Rp.<?=number_format($order->monthly_payment)?></td>
                                 <td><?=date('d M Y',strtotime($dueTenors->format('d M Y')))?></td>
                              <?php endif;?>
                           </tr>
                        <?php endfor;?>
                     </tbody>
                  </table>
                  <?php endif;?>
                </div>
             </div>

             <hr>
             <h6 class="mb-3">Detail Transaksi :</h6>
             <div class="row mb-4">
                <div class="col-sm-6 mb-3">
                   <h6 class="text-dark mb-1 fz-12"><?=$order->customer_name?></h6>
                   <div class="fz-12"><?=$order->address?></div>
                   <!-- <div>Email: info@tikon.com</div> -->
                   <div class="fz-12">Phone: <?=$order->customer_phone?></div>
                </div>
                <div class="col-sm-6 ">
                  <p class="mb-0 fz-12">Status Pesanan</p>
                  <p class="mb-0 font-weight-bold <?=($order->order_status_id == '3') ? 'text-info':'' ?>"><?=$order->order_status?></p>
                </div>
             </div>

             <div class="table-responsive-sm d-none d-md-block">
                <table class="table table-striped order-items">
                   <thead>
                      <tr>
                         <th class="center">#</th>
                         <th>Item</th>
                         <!-- <th style="width: 40%">Description</th> -->
                         <!-- <th class="right">Price</th> -->
                         <!-- <th class="center">Qty</th> -->
                         <th class="right" style="text-align: right">Harga</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr>
                         <td class="center" style="font-size:90%">1</td>
                         <td class="left strong" style="font-size:90%"><?=$order->product_name?></td>
                         <!-- <td class="left"><?=$order->product_brief_description?></td> -->
                         <!-- <td class="right">$1500</td> -->
                         <!-- <td class="center">10</td> -->
                         <td class="right" style="text-align: right;font-size:90%">Rp. <?=number_format($order->product_price)?></td>
                      </tr>
                   </tbody>
                </table>
             </div>
             <div class="row d-md-none">
                <div class="col-12">
                    <hr>
                    <h6>Item :</h6>
                    <hr>
                        <p class="fz-12"><?=$order->product_name?></p>
                        <p class="text-right fz-12">Rp. <?=number_format($order->product_price)?></p>
                </div>
             </div>
             <div class="row">
                <div class="col-lg-4 col-sm-5"></div>
                <div class="col-lg-6 col-sm-5 ml-auto">
                   <table class="table table-clear">
                      <tbody>
                         <!-- <tr>
                            <td class="left">
                               <strong class="text-dark">Subtotal</strong>
                            </td>
                            <td class="right">$28,809,00</td>
                         </tr>
                         <tr>
                            <td class="left">
                               <strong class="text-dark">Discount (20%)</strong>
                            </td>
                            <td class="right">$5,761,00</td>
                         </tr>
                         <tr>
                            <td class="left">
                               <strong class="text-dark">VAT (10%)</strong>
                            </td>
                            <td class="right">$2,304,00</td>
                         </tr> -->
                         <tr>
                            <td class="left">
                               <strong class="text-dark">Total</strong>
                            </td>
                            <td class="right" style="text-align: right">
                               <strong class="text-dark">Rp. <?=number_format($order->product_price)?></strong>
                            </td>
                         </tr>
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
          <div class="card-footer bg-white">
             
          </div>
       </div>
    </div>
</div>
<style>
   /* overflow */
  

   table.table-tenors {
      width: 100%;
   }

   table.table-tenors {
      display: flex;
      flex-flow: column;
      width: 100%;
      max-height: 400px;
      
   }

   .table-tenors thead {
      flex: 0 0 auto;
   }

   .table-tenors tbody {
      flex: 1 1 auto;
      display: block;
      overflow-y: auto;
      overflow-x: hidden;
   }

   .table-tenors tr {
      width: 100%;
      display: table;
      table-layout: fixed;
   }
   /* overflow */
   td{
      font-size: 0.8em;
   }
   tr, td{
      text-align: center;
   }
   .fz-12{
      font-size: 13px;
   }
   
</style>