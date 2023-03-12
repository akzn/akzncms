<div class="container content-container">
    <div class="mb-md-5">
      <h6>Detail pesanan</h6>
      <hr>
    </div>
    <div class="d-md-none offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding mb-3">
        <div class="card">
            <div class=card-body>
                <div class="row mb-4 d-md-none">
                    <div class="col-12">
                        <p class="mb-0">No. Pesanan : <?=$order->order_code?><br><?=date('d-m-Y h:i',strtotime($order->create_date))?></p>
                    </div>
                </div>
                <div class="row mb-4 d-md-none">
                    <div class="col-12">
                        <p class="mb-0">status : <span style="color:red"><?=$order->status_string?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-md-none">
                        <span class="">
                           <?=$order->btn_pay?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
       <div class="card">
          <div class="card-header p-4 d-none d-md-block">
    
             <div class="float-right">
                <p class="mb-0">No. Pesanan <?=$order->order_code?> | status : <span style="color:red"><?=$order->status_string?></span></p>
                Tanggal: <?=date('d-m-Y h:i',strtotime($order->create_date))?>
             </div>
          </div>
          <div class="card-body">
             <div class="row mb-4">
                <div class="col-sm-6 ">
                   <h6 class="mb-3">Kepada :</h6>
                   <h6 class="text-dark mb-1"><?=$order->customer_name?></h6>
                   <div><?=$order->address?></div>
                   <!-- <div>Email: info@tikon.com</div> -->
                   <div>Phone: <?=$order->customer_phone?></div>
                </div>
             </div>
             <div class="row m-3">
                <div class="col-12 d-none d-md-block">
                     <span class="float-right">
                        <?=$order->btn_pay?>
                     </span>
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
                        <p><?=$order->product_name?></p>
                        <p class="text-right">Rp. <?=number_format($order->product_price)?></p>

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
