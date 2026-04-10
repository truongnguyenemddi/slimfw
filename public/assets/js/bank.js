const banks = [
  {
    "code": "VIETCOMBANK",
    "shortName": "Vietcombank",
    "name": "Ngân hàng Ngoại thương",
    "fullName": "Ngân hàng Ngoại thương (Vietcombank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/vietcombank_logo.png"
  },
  {
    "code": "VIETINBANK",
    "shortName": "Vietinbank",
    "name": "Ngân hàng Công thương",
    "fullName": "Ngân hàng Công thương (Vietinbank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/vietinbank_logo.png"
  },
  {
    "code": "BIDV",
    "shortName": "BIDV",
    "name": "Ngân hàng đầu tư và phát triển Việt Nam",
    "fullName": "Ngân hàng đầu tư và phát triển Việt Nam (BIDV)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/bidv_logo.png"
  },
  {
    "code": "AGRIBANK",
    "shortName": "Agribank",
    "name": "Ngân hàng Nông nghiệp",
    "fullName": "Ngân hàng Nông nghiệp (Agribank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/agribank_logo.png"
  },
  {
    "code": "SACOMBANK",
    "shortName": "SacomBank",
    "name": "Ngân hàng TMCP Sài Gòn Thương Tín",
    "fullName": "Ngân hàng TMCP Sài Gòn Thương Tín (SacomBank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/sacombank_logo.png"
  },
  {
    "code": "TECHCOMBANK",
    "shortName": "TechcomBank",
    "name": "Ngân hàng Kỹ thương Việt Nam",
    "fullName": "Ngân hàng Kỹ thương Việt Nam (TechcomBank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/techcombank_logo.png"
  },
  {
    "code": "ACB",
    "shortName": "Ngân hàng ACB",
    "name": "Ngân hàng ACB",
    "fullName": "Ngân hàng ACB",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/acb_logo.png"
  },
  {
    "code": "VPBANK",
    "shortName": "VPBank",
    "name": "Ngân hàng Việt Nam Thịnh vượng",
    "fullName": "Ngân hàng Việt Nam Thịnh vượng (VPBank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/vpbank_logo.png"
  },
  {
    "code": "DONGABANK",
    "shortName": "DongABank",
    "name": "Ngân hàng Đông Á",
    "fullName": "Ngân hàng Đông Á (DongABank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/dongabank_logo.png"
  },
  {
    "code": "EXIMBANK",
    "shortName": "Ngân hàng EximBank",
    "name": "Ngân hàng EximBank",
    "fullName": "Ngân hàng EximBank",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/eximbank_logo.png"
  },
  {
    "code": "TPBANK",
    "shortName": "TPBank",
    "name": "Ngân hàng Tiên Phong",
    "fullName": "Ngân hàng Tiên Phong (TPBank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/tpbank_logo.png"
  },
  {
    "code": "NCB",
    "shortName": "NCB",
    "name": "Ngân hàng Quốc dân",
    "fullName": "Ngân hàng Quốc dân (NCB)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/ncb_logo.png"
  },
  {
    "code": "OJB",
    "shortName": "OceanBank",
    "name": "Ngân hàng Đại Dương",
    "fullName": "Ngân hàng Đại Dương (OceanBank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/ojb_logo.png"
  },
  {
    "code": "MSBANK",
    "shortName": "MSBANK",
    "name": "Ngân hàng Hàng Hải",
    "fullName": "Ngân hàng Hàng Hải (MSBANK)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/msbank_logo.png"
  },
  {
    "code": "HDBANK",
    "shortName": "Ngan hàng HDBank",
    "name": "Ngan hàng HDBank",
    "fullName": "Ngân hàng HDBank",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/hdbank_logo.png"
  },
  {
    "code": "NAMABANK",
    "shortName": "NamABank",
    "name": "Ngân hàng Nam Á",
    "fullName": "Ngân hàng Nam Á (NamABank)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/namabank_logo.png"
  },
  {
    "code": "OCB",
    "shortName": "OCB",
    "name": "Ngân hàng Phương Đông",
    "fullName": "Ngân hàng Phương Đông (OCB)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/ocb_logo.png"
  },
  {
    "code": "SCB",
    "shortName": "SCB",
    "name": "Ngân hàng TMCP Sài Gòn",
    "fullName": "Ngân hàng TMCP Sài Gòn (SCB)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/scb_logo.png"
  },
  {
    "code": "IVB",
    "shortName": "IVB",
    "name": "Ngân hàng TNHH Indovina",
    "fullName": "Ngân hàng TNHH Indovina (IVB)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/ivb_logo.png"
  },
  {
    "code": "VIB",
    "shortName": "VIB",
    "name": "Ngân hàng TMCP quốc tế Việt Nam",
    "fullName": "Ngân hàng TMCP quốc tế Việt Nam(VIB)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/vib.png"
  },
  {
    "code": "MB",
    "shortName": "MB",
    "name": "Ngân hàng Quân đội",
    "fullName": "Ngân hàng Quân đội(MB)",
    "logoUrl": "http://sandbox.vnpayment.vn/apis/assets/images/bank/vid.png"
  },
  {
    "code": "PVCOMBANK",
    "shortName": "PVcomBank",
    "name": "Ngân hàng TMCP Đại Chúng Việt Nam",
    "fullName": "Ngân hàng TMCP Đại Chúng Việt Nam(PVcomBank)",
    "logoUrl": "https://sandbox.vnpayment.vn/apis/assets/images/bank/PVComBank_logo.png"
  },
  {
    "code": "SHB",
    "shortName": "SHB",
    "name": "Ngân hàng TMCP Sài Gòn-Hà Nội",
    "fullName": "Ngân hàng TMCP Sài Gòn-Hà Nội(SHB)",
    "logoUrl": "https://sandbox.vnpayment.vn/apis/assets/images/bank/shb_logo.png"
  },
  {
    "code": "LIENVIETPOSTBANK",
    "shortName": "LienVietPostBank",
    "name": "Ngân hàng bưu điện liên việt",
    "fullName": "Ngân hàng bưu điện liên việt (LienVietPostBank)",
    "logoUrl": "https://viviet.vn/static/images/logo-viviet.png"
  }
];
