
1. credit rule
   - db
     - total harga tanah
        - already on products, already saved to payment on create midtrans [x]
     - sukubunga /tahun
       - config column [x]
       - tb payment
     - tenor
       - tb payment 
     - dp
       - product
         - dp
       - tb payment detail
         - add column payment type
           - cash
           - dp
           - installment
    - rumus
      - pokok pinjaman = harga tanah - dp
      - angsuran pokok/bulan = pokok pinjaman / lama tenor dalam bulan
      - angsuran bunga/bulan = (pokok pinjaman * sukubunga) / lama tenor dalam bulan
      - total angsuran/bulan = angsuran pokok+angsuran bunga