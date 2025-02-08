<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="NFC" />
    <meta name="keywords" content="Payment, NFC" />
    <meta name="author" content="{{env('AUTHER')}}" />
    <meta
      http-equiv="Content-Security-Policy"
      content="upgrade-insecure-requests"
    />
    <link rel="icon" type="image/x-icon" href="favicon.ico" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    

    <style>
          .d-block {
        display: block !important;
      }

      .d-none {
        display: none !important;
      }

      .second_card {
        border-radius: 20px;
      }
      .card-header {
        border-bottom: transparent !important;
      }
      .middle{
        flex-wrap: wrap;
      }
      .add_to_contact_button2 {
        background-color: black;
        padding: 12px 24px;
        color: white;
        border-radius: 30px;
        border: transparent;
        font-size: 14px;
      }
      .middle2 {
        flex-wrap: wrap !important;
        max-width: 320px !important;
        margin: auto !important;
      }
      .middle2 .btn {
        width: 60px !important;
        height: 60px !important;
      }
      .middle2 .btn i {
        font-size: 25px !important;
      }
     .lvl2 .user_data a{
          color:white !important;
      }
      .lvl2 .card-header{
          margin-top: -76px !important;
      }
      .lvl2 .middle2 .btn{
            width: 45px !important;
            height: 45px !important;
      }
      .lvl3_data {
        border-radius: 5px;
        background: #f5f5f5;
        padding: 6px 12px;
      }
      .lvl3 .card{
          border-radius:1rem !important; 
      }
      .user_data .lvl3_data {
        margin:10px 0; 
    }
    .lvl3 .middle2 .btn{
        width: 40px !important;
        height: 40px !important;
    }
    .lvl3 .middle2 .btn i{
        font-size: 20px !important;
    }
    .lvl3 .middle2{
        max-width: 360px !important;
    }
    
    .contact_btn_3{
        cursor: pointer;
        background: #003a70 !important ;
        border-radius: 20px !important;
    }
    </style>
    <!-- Font awesome  -->
    <!--<link-->
    <!--  rel="stylesheet"-->
    <!--  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"-->
    <!--/>-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
        
    <!-- custom style -->
    <link
      rel="stylesheet"
      href="{{env('APP_URL')}}nfcmulti.css"
    />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>{{env('APP_TITLE')}}</title>
  </head>

  <body style="background:#000000 !important;">
    <div class="preloader">
        <div id="preloader_img" class="h-100 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="{{env('APP_URL')}}preloader.gif" alt="preloader" width="300" />
        </div>
    </div>

    <section
      class="d-none align-items-center justify-content-center h-100 lvl1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-12 ">
            <div class="card">
              <div class="card-banner">
                <figure>
                  <img
                    class="img-fluid avatar_cover"
                    id="avatar_cover"
                    src=""
                    alt=""
                  />
                </figure>
                <a
                  type="button"
                  class="position-absolute top-10 start-10 z-50"
                  data-bs-toggle="modal"
                  data-bs-target="#qr_code"
                >
                  <img
                    class="rounded"
                    src="{{env('APP_URL')}}qrcode.webp"
                    width="30"
                  />
                </a>
                <a
                  type="button"
                  class="position-absolute top-10 end-10 z-50 rounded-circle"
                  data-bs-toggle="modal"
                  data-bs-target="#share"
                >
                  <img class="rounded" src="share.png" width="30" />
                </a>
              </div>
              <div class="card-header px-4 bg-transparent">
                <div>
                  <img
                    class="avatar rounded-circle img-fluid"
                    src=""
                    alt="avatar"
                    id="avatar"
                  />
                  <h4>
                    <span class="firstName" id="firstName"></span>
                    <span class="lastName" id="lastName"></span>
                  </h4>
                  <h6 class="position" id="position">
                    
                  </h6>
                </div>
              </div>
              <div class="card-body px-4">
                <div class="my-2 user_data">
                  <div>
                    <i class="fa fa-briefcase"></i>
                    <a href="javascript:void(0)" class="company" id="company"
                      >Saudi360inc</a
                    >
                  </div>
                  <hr />
                  <div>
                    <i class="fa fa-phone"></i>
                    <a href="javascript:void(0)" class="mobile" id="mobile"
                      ></a
                    >
                  </div>
                  <hr />
                  <a
                    class="d-none telephone"
                    href="javascript:void(0)"
                    id="telephone"
                  ></a>

                  <div>
                    <i class="fa fa-envelope"></i>
                    <a href="javascript:void(0)" class="email" id="email"
                      ></a
                    >
                  </div>
                  <hr />
                  <div>
                    <i class="fa fa-globe"></i>
                    <a
                      target="_blank"
                      href="javascript:void(0)"
                      class="website"
                      id="website"
                      >saudi360inc.com</a
                    >
                  </div>
                  <hr />
                  <div>
                    <i class="fa fa-map-marker"></i>
                    <!--<a class="location" id="location"></a>-->
                    <a target="_blank" href="" class="location"  id="location" > </a>
                  </div>
                  <hr />
                </div>
              </div>
              <div id="note" style="display: none"></div>
              <div class="add-contact-btn my-4">
                <button
                  onclick="saveCard()"
                  class="add_to_contact_button cursor-pointer"
                  id="addtocontact"
                >
                  ADD TO CONTACT
                </button>
                <div style="text-align:center">
                  <a class="applewallet" href="">
                   <img
                    class="rounded"
                    src="public/applewallet.png"
                    width="200"
                  />
                  </a>
                </div>
              </div>
              <div class="middle my-2">
                <a class="btn facebook" id="facebook" href="#">
                  <i class="fa fa-facebook-f"></i>
                </a>
                <a class="btn x-twitter" id="twitter" href="#">
                <i class="fa fa-x-twitter"></i>
                  
                </a>

                <a class="btn insta" id="insta" href="#">
                  <i class="fa fa-instagram"></i>
                </a>
                <a class="btn linkedIn" id="linkedIn" href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
                <a class="btn whatsapp" id="whatsapp" href="#">
                  <i class="fa fa-whatsapp"></i>
                </a>
                <a class="btn snapchat" id="snapchat" href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-snapchat"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M15.943 11.526c-.111-.303-.323-.465-.564-.599a1.416 1.416 0 0 0-.123-.064l-.219-.111c-.752-.399-1.339-.902-1.746-1.498a3.387 3.387 0 0 1-.3-.531c-.034-.1-.032-.156-.008-.207a.338.338 0 0 1 .097-.1c.129-.086.262-.173.352-.231.162-.104.289-.187.371-.245.309-.216.525-.446.66-.702a1.397 1.397 0 0 0 .069-1.16c-.205-.538-.713-.872-1.329-.872a1.829 1.829 0 0 0-.487.065c.006-.368-.002-.757-.035-1.139-.116-1.344-.587-2.048-1.077-2.61a4.294 4.294 0 0 0-1.095-.881C9.764.216 8.92 0 7.999 0c-.92 0-1.76.216-2.505.641-.412.232-.782.53-1.097.883-.49.562-.96 1.267-1.077 2.61-.033.382-.04.772-.036 1.138a1.83 1.83 0 0 0-.487-.065c-.615 0-1.124.335-1.328.873a1.398 1.398 0 0 0 .067 1.161c.136.256.352.486.66.701.082.058.21.14.371.246l.339.221a.38.38 0 0 1 .109.11c.026.053.027.11-.012.217a3.363 3.363 0 0 1-.295.52c-.398.583-.968 1.077-1.696 1.472-.385.204-.786.34-.955.8-.128.348-.044.743.28 1.075.119.125.257.23.409.31a4.43 4.43 0 0 0 1 .4.66.66 0 0 1 .202.09c.118.104.102.26.259.488.079.118.18.22.296.3.33.229.701.243 1.095.258.355.014.758.03 1.217.18.19.064.389.186.618.328.55.338 1.305.802 2.566.802 1.262 0 2.02-.466 2.576-.806.227-.14.424-.26.609-.321.46-.152.863-.168 1.218-.181.393-.015.764-.03 1.095-.258a1.14 1.14 0 0 0 .336-.368c.114-.192.11-.327.217-.42a.625.625 0 0 1 .19-.087 4.446 4.446 0 0 0 1.014-.404c.16-.087.306-.2.429-.336l.004-.005c.304-.325.38-.709.256-1.047Zm-1.121.602c-.684.378-1.139.337-1.493.565-.3.193-.122.61-.34.76-.269.186-1.061-.012-2.085.326-.845.279-1.384 1.082-2.903 1.082-1.519 0-2.045-.801-2.904-1.084-1.022-.338-1.816-.14-2.084-.325-.218-.15-.041-.568-.341-.761-.354-.228-.809-.187-1.492-.563-.436-.24-.189-.39-.044-.46 2.478-1.199 2.873-3.05 2.89-3.188.022-.166.045-.297-.138-.466-.177-.164-.962-.65-1.18-.802-.36-.252-.52-.503-.402-.812.082-.214.281-.295.49-.295a.93.93 0 0 1 .197.022c.396.086.78.285 1.002.338.027.007.054.01.082.011.118 0 .16-.06.152-.195-.026-.433-.087-1.277-.019-2.066.094-1.084.444-1.622.859-2.097.2-.229 1.137-1.22 2.93-1.22 1.792 0 2.732.987 2.931 1.215.416.475.766 1.013.859 2.098.068.788.009 1.632-.019 2.065-.01.142.034.195.152.195a.35.35 0 0 0 .082-.01c.222-.054.607-.253 1.002-.338a.912.912 0 0 1 .197-.023c.21 0 .409.082.49.295.117.309-.04.56-.401.812-.218.152-1.003.638-1.18.802-.184.169-.16.3-.139.466.018.14.413 1.991 2.89 3.189.147.073.394.222-.041.464Z"
                    />
                  </svg>
                  <i class="bi bi-snapchat"></i>
                </a>
              </div>
            </div>
          </div>
          <h6 class="text-center mt-2">
            <span class="text-white">Powered by</span>
            <a
              class="text-light"
              href="https://saudi360inc.com/"
              target="_blank"
              >saudi360inc.com</a
            >
          </h6>
        </div>
      </div>
    </section>

    <section class="d-none align-items-center justify-content-center h-100 lvl2">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-12  text-white">
            <div>
              <figure>
                <img
                  class="img-fluid avatar_cover second_card"
                  id="avatar_cover"
                  src="https://images.adsttc.com/media/images/63f8/8a0a/e8da/b065/7892/5494/large_jpg/the-important-role-libraries-play-in-building-a-creative-and-innovative-society_4.jpg?1677232657"
                  alt=""
                />
              </figure>

              <div class="card-header px-4 bg-transparent">
                <div>
                  <img
                    class="avatar rounded-circle img-fluid"
                    src="https://img.freepik.com/premium-vector/young-smiling-man-avatar-man-with-brown-beard-mustache-hair-wearing-yellow-sweater-sweatshirt-3d-vector-people-character-illustration-cartoon-minimal-style_365941-860.jpg"
                    alt="avatar"
                    id="avatar"
                  />
                  <h4>
                    <span class="firstName" ></span>
                    <span class="lastName" ></span>
                  </h4>
                  <h6 class="position" >
                    
                  </h6>
                </div>
              </div>
              <div class="card-body px-4">
                <div
                  class="my-2 user_data">
                <div>
                    <i class="fa fa-phone"></i>
                    <a href="javascript:void(0)" class="mobile" 
                      ></a
                    >
                  </div>
                  <hr />
                  <a
                    class="d-none telephone"
                    href="javascript:void(0)"
                    
                  ></a>

                  <div>
                    <i class="fa fa-envelope"></i>
                    <a href="javascript:void(0)" class="email" 
                      ></a
                    >
                  </div>
                  <hr />
           <div>
                    <i class="fa fa-globe"></i>
                    <a
                      target="_blank"
                      href="javascript:void(0)"
                      class="website"
                      
                      >saudi360inc.com</a
                    >
                  </div>
                  <hr />
                  <div>
                    <i class="fa fa-map-marker"></i>
                    <!--<a class="location" ></a>-->
                    <a target="_blank" href="" class="location" > </a>
                  </div>
                  <hr />
                </div>
              </div>
              <div id="note" style="display: none"></div>
              <div class="add-contact-btn mb-4 mt-3">
                <button
                  onclick="saveCard()"
                  class="add_to_contact_button2 cursor-pointer"
                  id="addtocontact"
                >
                  Connect with me !
                </button>
              </div>
              <div style="text-align:center">
                  <a class="applewallet" href="">
                   <img
                    class="rounded"
                    src="public/applewallet.png"
                    width="200"
                  />
                  </a>
                </div>
              <div class="middle middle2 my-2">
                  <a
                  type="button"
                  class="btn"
                  data-bs-toggle="modal"
                  data-bs-target="#qr_code"
                >
               
                  <i class="fa fa-qrcode"></i>
                </a>
                <a
                  type="button"
                  class="rounded-circle btn"
                  data-bs-toggle="modal"
                  data-bs-target="#share"
                >
                  <!--<img class="rounded" src="share.png" width="30" />-->
                   <i class="fa fa-share"></i>
                </a>
                <a class="btn facebook"  href="#">
                  <i class="fa fa-facebook-f"></i>
                </a>
                <a class="btn twitter"  href="#">
                  <i class="fa fa-x-twitter"></i>
                </a>

                <a class="btn insta"  href="#">
                  <i class="fa fa-instagram"></i>
                </a>
                <a class="btn linkedIn"  href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
                <a class="btn whatsapp"  href="#">
                  <i class="fa fa-whatsapp"></i>
                </a>
                <a class="btn snapchat"  href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-snapchat"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M15.943 11.526c-.111-.303-.323-.465-.564-.599a1.416 1.416 0 0 0-.123-.064l-.219-.111c-.752-.399-1.339-.902-1.746-1.498a3.387 3.387 0 0 1-.3-.531c-.034-.1-.032-.156-.008-.207a.338.338 0 0 1 .097-.1c.129-.086.262-.173.352-.231.162-.104.289-.187.371-.245.309-.216.525-.446.66-.702a1.397 1.397 0 0 0 .069-1.16c-.205-.538-.713-.872-1.329-.872a1.829 1.829 0 0 0-.487.065c.006-.368-.002-.757-.035-1.139-.116-1.344-.587-2.048-1.077-2.61a4.294 4.294 0 0 0-1.095-.881C9.764.216 8.92 0 7.999 0c-.92 0-1.76.216-2.505.641-.412.232-.782.53-1.097.883-.49.562-.96 1.267-1.077 2.61-.033.382-.04.772-.036 1.138a1.83 1.83 0 0 0-.487-.065c-.615 0-1.124.335-1.328.873a1.398 1.398 0 0 0 .067 1.161c.136.256.352.486.66.701.082.058.21.14.371.246l.339.221a.38.38 0 0 1 .109.11c.026.053.027.11-.012.217a3.363 3.363 0 0 1-.295.52c-.398.583-.968 1.077-1.696 1.472-.385.204-.786.34-.955.8-.128.348-.044.743.28 1.075.119.125.257.23.409.31a4.43 4.43 0 0 0 1 .4.66.66 0 0 1 .202.09c.118.104.102.26.259.488.079.118.18.22.296.3.33.229.701.243 1.095.258.355.014.758.03 1.217.18.19.064.389.186.618.328.55.338 1.305.802 2.566.802 1.262 0 2.02-.466 2.576-.806.227-.14.424-.26.609-.321.46-.152.863-.168 1.218-.181.393-.015.764-.03 1.095-.258a1.14 1.14 0 0 0 .336-.368c.114-.192.11-.327.217-.42a.625.625 0 0 1 .19-.087 4.446 4.446 0 0 0 1.014-.404c.16-.087.306-.2.429-.336l.004-.005c.304-.325.38-.709.256-1.047Zm-1.121.602c-.684.378-1.139.337-1.493.565-.3.193-.122.61-.34.76-.269.186-1.061-.012-2.085.326-.845.279-1.384 1.082-2.903 1.082-1.519 0-2.045-.801-2.904-1.084-1.022-.338-1.816-.14-2.084-.325-.218-.15-.041-.568-.341-.761-.354-.228-.809-.187-1.492-.563-.436-.24-.189-.39-.044-.46 2.478-1.199 2.873-3.05 2.89-3.188.022-.166.045-.297-.138-.466-.177-.164-.962-.65-1.18-.802-.36-.252-.52-.503-.402-.812.082-.214.281-.295.49-.295a.93.93 0 0 1 .197.022c.396.086.78.285 1.002.338.027.007.054.01.082.011.118 0 .16-.06.152-.195-.026-.433-.087-1.277-.019-2.066.094-1.084.444-1.622.859-2.097.2-.229 1.137-1.22 2.93-1.22 1.792 0 2.732.987 2.931 1.215.416.475.766 1.013.859 2.098.068.788.009 1.632-.019 2.065-.01.142.034.195.152.195a.35.35 0 0 0 .082-.01c.222-.054.607-.253 1.002-.338a.912.912 0 0 1 .197-.023c.21 0 .409.082.49.295.117.309-.04.56-.401.812-.218.152-1.003.638-1.18.802-.184.169-.16.3-.139.466.018.14.413 1.991 2.89 3.189.147.073.394.222-.041.464Z"
                    />
                  </svg>
                  <i class="bi bi-snapchat"></i>
                </a>
              </div>
            </div>
          </div>
          <h6 class="text-center mt-2">
            <span class="text-white">Powered by</span>
            <a
              class="text-light"
              href="https://saudi360inc.com/"
              target="_blank"
              >saudi360inc.com</a
            >
          </h6>
        </div>
      </div>
    </section>

    <section class="d-none align-items-center justify-content-center h-100 lvl3">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-12 ">
            <div class="card">
              <div class="card-header px-4 bg-transparent">
                <img
                  class="avatar rounded-circle img-fluid"
                  src="https://img.freepik.com/premium-vector/young-smiling-man-avatar-man-with-brown-beard-mustache-hair-wearing-yellow-sweater-sweatshirt-3d-vector-people-character-illustration-cartoon-minimal-style_365941-860.jpg"
                  alt="avatar"
                  id="avatar"
                />
              </div>
              <div class="card-body px-3">
                <div class="text-center">
                  <h4>
                    <span class="firstName" ></span>
                    <span class="lastName" ></span>
                  </h4>
                  <h6 class="position" >
                    
                  </h6>
                </div>
                <div class="my-2 user_data">
                  <div class="lvl3_data">
                    <i class="fa fa-briefcase"></i>
                    <a href="javascript:void(0)" class="company"></a
                    >
                  </div>
                  <hr />
                  <div class="lvl3_data">
                    <i class="fa fa-phone"></i>
                    <a href="javascript:void(0)" class="mobile"></a
                    >
                  </div>
                  <hr />
                  <a
                    class="d-none telephone"
                    href="javascript:void(0)"></a>

                  <div class="lvl3_data">
                    <i class="fa fa-envelope"></i>
                    <a href="javascript:void(0)" class="email"
                      ></a
                    >
                  </div>
                  <hr />
                  <div class="lvl3_data">
                    <i class="fa fa-globe"></i>
                    <a
                      target="_blank"
                      href="javascript:void(0)"
                      class="website"
                     
                      >saudi360inc.com</a
                    >
                  </div>
                  <hr />
                  <div class="lvl3_data" style="overflow:hidden">
                    <i class="fa fa-map-marker"></i>
                    <!--<a class="location"></a>-->
                    <a target="_blank" href="" class="location"> </a>
                  </div>

                  <hr />
                  <div class="flex justify-content-center mt-2">
                    <a
                      type="button"
                      class=""
                      data-bs-toggle="modal"
                      data-bs-target="#qr_code"
                    >
                      <img
                        class="rounded"
                        src="{{env('APP_URL')}}qrcode.webp"
                        width="30"
                      />
                    </a>
                    <a class="btn whatsapp" href="#">
                  <i class="fa fa-whatsapp" style="font-size:21px !important;"></i>
                </a>
                    <a
                      type="button"
                      class=""
                      data-bs-toggle="modal"
                      data-bs-target="#share"
                    >
                      <img class="rounded" src="share.png" width="30" />
                    </a>
                  </div>
                </div>
              </div>
              <div id="note" style="display: none"></div>
              <div class="add-contact-btn mb-2">
                <button
                  onclick="saveCard()"
                  class="add_to_contact_button contact_btn_3"
                  id="addtocontact"
                >
                  ADD TO CONTACT
                </button>
              </div>
               <div style="text-align:center">
                  <a class="applewallet" href="">
                   <img
                    class="rounded"
                    src="public/applewallet.png"
                    width="200"
                  />
                  </a>
                </div>
               <div class="middle middle2 mt-2 pb-2">
                <a class="btn facebook"  href="#">
                  <i class="fa fa-facebook-f"></i>
                </a>
                <a class="btn twitter"  href="#">
                  <i class="fa fa-x-twitter"></i>
                </a>

                <a class="btn insta"  href="#">
                  <i class="fa fa-instagram"></i>
                </a>
                <a class="btn linkedIn"  href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
                <a class="btn whatsapp" href="#">
                  <i class="fa fa-whatsapp"></i>
                </a>
                <a class="btn snapchat"  href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-snapchat"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M15.943 11.526c-.111-.303-.323-.465-.564-.599a1.416 1.416 0 0 0-.123-.064l-.219-.111c-.752-.399-1.339-.902-1.746-1.498a3.387 3.387 0 0 1-.3-.531c-.034-.1-.032-.156-.008-.207a.338.338 0 0 1 .097-.1c.129-.086.262-.173.352-.231.162-.104.289-.187.371-.245.309-.216.525-.446.66-.702a1.397 1.397 0 0 0 .069-1.16c-.205-.538-.713-.872-1.329-.872a1.829 1.829 0 0 0-.487.065c.006-.368-.002-.757-.035-1.139-.116-1.344-.587-2.048-1.077-2.61a4.294 4.294 0 0 0-1.095-.881C9.764.216 8.92 0 7.999 0c-.92 0-1.76.216-2.505.641-.412.232-.782.53-1.097.883-.49.562-.96 1.267-1.077 2.61-.033.382-.04.772-.036 1.138a1.83 1.83 0 0 0-.487-.065c-.615 0-1.124.335-1.328.873a1.398 1.398 0 0 0 .067 1.161c.136.256.352.486.66.701.082.058.21.14.371.246l.339.221a.38.38 0 0 1 .109.11c.026.053.027.11-.012.217a3.363 3.363 0 0 1-.295.52c-.398.583-.968 1.077-1.696 1.472-.385.204-.786.34-.955.8-.128.348-.044.743.28 1.075.119.125.257.23.409.31a4.43 4.43 0 0 0 1 .4.66.66 0 0 1 .202.09c.118.104.102.26.259.488.079.118.18.22.296.3.33.229.701.243 1.095.258.355.014.758.03 1.217.18.19.064.389.186.618.328.55.338 1.305.802 2.566.802 1.262 0 2.02-.466 2.576-.806.227-.14.424-.26.609-.321.46-.152.863-.168 1.218-.181.393-.015.764-.03 1.095-.258a1.14 1.14 0 0 0 .336-.368c.114-.192.11-.327.217-.42a.625.625 0 0 1 .19-.087 4.446 4.446 0 0 0 1.014-.404c.16-.087.306-.2.429-.336l.004-.005c.304-.325.38-.709.256-1.047Zm-1.121.602c-.684.378-1.139.337-1.493.565-.3.193-.122.61-.34.76-.269.186-1.061-.012-2.085.326-.845.279-1.384 1.082-2.903 1.082-1.519 0-2.045-.801-2.904-1.084-1.022-.338-1.816-.14-2.084-.325-.218-.15-.041-.568-.341-.761-.354-.228-.809-.187-1.492-.563-.436-.24-.189-.39-.044-.46 2.478-1.199 2.873-3.05 2.89-3.188.022-.166.045-.297-.138-.466-.177-.164-.962-.65-1.18-.802-.36-.252-.52-.503-.402-.812.082-.214.281-.295.49-.295a.93.93 0 0 1 .197.022c.396.086.78.285 1.002.338.027.007.054.01.082.011.118 0 .16-.06.152-.195-.026-.433-.087-1.277-.019-2.066.094-1.084.444-1.622.859-2.097.2-.229 1.137-1.22 2.93-1.22 1.792 0 2.732.987 2.931 1.215.416.475.766 1.013.859 2.098.068.788.009 1.632-.019 2.065-.01.142.034.195.152.195a.35.35 0 0 0 .082-.01c.222-.054.607-.253 1.002-.338a.912.912 0 0 1 .197-.023c.21 0 .409.082.49.295.117.309-.04.56-.401.812-.218.152-1.003.638-1.18.802-.184.169-.16.3-.139.466.018.14.413 1.991 2.89 3.189.147.073.394.222-.041.464Z"
                    />
                  </svg>
                  <i class="bi bi-snapchat"></i>
                </a>
              </div>
            </div>
          </div>
          <h6 class="text-center mt-2">
            <span class="text-white">Powered by</span>
            <a
              class="text-light"
              href="https://saudi360inc.com/"
              target="_blank">
              saudi360inc.com
            </a>
          </h6>
        </div>
      </div>
    </section>

    <!-- Modal QR-code-->
    <div
      class="modal fade"
      id="qr_code"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
            <div class="d-flex justify-content-center">
              <div id="qrcode"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Share-->
    <div
      class="modal fade"
      id="share"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
            <div
              class="text-center d-flex flex-column justify-content-center align-items-center gap-4"
            ></div>
            <div>
              <!--<p class="text-white text-wrap" id="website_url" href=""></p>-->
            </div>
            <section class="model_share">
              <div class="menu">
                <input
                  type="checkbox"
                  href="#"
                  class="menu-open"
                  name="menu-open"
                  id="menu-open"
                />
                <label class="menu-open-button" for="menu-open">
                  <i class="fa fa-share-alt share-icon"></i>
                </label>
                <a style="display: none">
                  <i class="fa fa-facebook"></i>
                </a>
                <a style="display: none">
                  <i class="fa fa-twitter"></i>
                </a>
                <a
                  href="#"
                  target="_blank"
                  id="email_share_btn"
                  class="menu-item email_share_btn"
                >
                  <i class="fa fa-envelope"></i>
                </a>
                <a
                  href=""
                  target="_blank"
                  class="menu-item whatsapp_share_btn"
                  id="whatsapp_share_btn"
                >
                  <i class="fa fa-whatsapp"></i>
                </a>
                <a
                  href=""
                  id="facebook_share_btn"
                  target="_blank"
                  class="menu-item facebook_share_btn"
                >
                  <i class="fa fa-facebook"></i>
                </a>
                <a style="display: none">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Waqar Code for QR-Code Generation of Current URL  -->
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    <script>
      currentURL = window.location.href;
      const qrcode = new QRCode(document.getElementById("qrcode"), {
        text: currentURL,
        width: 90,
        height: 90,
        colorDark: "#000",
        colorLight: "#fff",
        correctLevel: QRCode.CorrectLevel.H,
      });

      let existingSearchParams = new URLSearchParams(window.location.search);
      let UserID = existingSearchParams.get("Uid");
      document.addEventListener("DOMContentLoaded", function () {
        fetch(
          `{{env('APP_URL_API')}}api/user/show?id=${UserID}`
        )
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
            $(".firstName").html(data.data.first_name);
            $(".lastName").html(data.data.last_name);
            $(".position").html(data.data.position);
            $(".company").html(data.data.company_name);
            var phoneNumber = data.data.mobile_number;
            // if (phoneNumber.charAt(0) !== "+") {
            //   phoneNumber = "+" + phoneNumber;
            // }
            $(".mobile").html(phoneNumber);
            document.getElementById("mobile").href =
              "tel:" + data.data.telephone_number;
            $(".email").html(data.data.email);
            document.getElementById("email").href = "mailto:" + data.data.email;
            $(".website").html(data.data.website);
            $(".location").html(data.data.address);
            $(".avatar").attr(
              "src",
              `${data.data.profile_pic_base_url}${data.data.profile_pic}`
            );
            $(".avatar_cover").attr(
              "src",
              `${data.data.cover_pic_base_url}${data.data.cover_pic}`
            );
            $(".applewallet").attr(
              "href",
              `${data.data.pass_url}`
            );

            if (data.data.telephone_number == "" || data.data.telephone_number == null || data.data.telephone_number == 'n/a' || data.data.telephone_number == 'N/A')
            {
              $(".telephone").addClass("d-none");
            } else {
              $(".telephone").html(data.data.telephone_number);
            }

            $(".note").html(data.data.notes);

            if (data.data.fb_url === "" || data.data.fb_url === null || data.data.fb_url.toLowerCase() === 'n/a') {
                $(".facebook").addClass("d-none");
            } else {
                $(".facebook").attr("href", data.data.fb_url);
                $("#facebook_share_btn").attr("href", data.data.fb_url);
            }

            if (data.data.twitter_url === "" || data.data.twitter_url === null || data.data.twitter_url.toLowerCase() === 'n/a') {
                $(".twitter").addClass("d-none");
            } else {
                $(".twitter").attr("href", data.data.twitter_url);
            }

            if (data.data.linkedin_url === "" || data.data.linkedin_url === null || data.data.linkedin_url.toLowerCase() === 'n/a') {
                $(".linkedIn").addClass("d-none");
            } else {
                $(".linkedIn").attr("href", data.data.linkedin_url);
            }

            if (data.data.insta_url === "" || data.data.insta_url === null || data.data.insta_url.toLowerCase() === 'n/a') {
                $(".insta").addClass("d-none");
            } else {
                $(".insta").attr("href", data.data.insta_url);
            }
            
            
            if (data.data.website === "" || data.data.website === null || data.data.website.toLowerCase() === 'n/a') {
                $(".website").addClass("d-none");
            } else {
                let websiteURL = data.data.website.toLowerCase();
                if (!websiteURL.startsWith('http://') && !websiteURL.startsWith('https://')) {
                    websiteURL = 'https://' + websiteURL;
                }
                $(".website").attr("href", websiteURL);
            }
             
            if (data.data.address === "" || data.data.address === null || data.data.address === 'N/A' || data.data.address === 'n/a') {
                $(".location").addClass("d-none");
            } else {
                let address = data.data.address;
                if (!address.startsWith('http://') && !address.startsWith('https://')) {
                    address = 'https://' + address;
                }
                $(".location").attr("href", address);
            }



            if (data.data.snapchat_url === "" || data.data.snapchat_url == null || data.data.snapchat_url.toLowerCase() === 'n/a') {
                $(".snapchat").addClass("d-none");
            } else {
                $(".snapchat").attr("href", data.data.snapchat_url);
            }

            if (
              data.data.mobile_number === "" ||
              data.data.mobile_number == null ||
              data.data.mobile_number === "n/a" ||
              data.data.mobile_number === "N/A"
            ) {
              $(".whatsapp").addClass("d-none");
            } else {
              $(".whatsapp").attr("href", `https://wa.me/${data.data.mobile_number}`);
            }

            // $(".preloader").addClass("d-block");
            // $(".card").removeClass("d-block");
            if (data.data.employee_level == "management") {
              $(".lvl1").removeClass("d-none");
              $(".lvl1").addClass("d-flex");
            } else if (data.data.employee_level == "staff") {
              $(".lvl2").removeClass("d-none");
              $(".lvl2").addClass("d-flex");
            } else {
              $(".lvl3").removeClass("d-none");
              $(".lvl3").addClass("d-flex");
            }
            $(".preloader").addClass("d-none");
            $(".card").removeClass("d-none");
            var firstName = $(".firstName").text();
            var lastName = $(".lastName").text();
            var email = $(".email").text();
            var phone = $(".mobile").text();
            var phone2 = $(".telephone").text();
            var website = $(".website").text();
            var address = $(".location").text();
            var company = $(".company").text();
            var position = $(".position").text();
            var note = $(".note").text();
            var avatar_url = document.querySelectorAll(".avatar")[0].src;
            var twitterLink = $(".twitter").attr("href");
            var fbLink = $(".facebook").attr("href");
            var instaLink = $(".insta").attr("href");
            var linkedinLink = $(".linkedIn").attr("href");
            
            var snapchatLink = $(".snapchat").attr("href");
          })
          .catch((error) => {
            console.error(error);
          });
      });

      //   /*whatsapp share button script*/
      var userDetails = window.location.href;
      var encodedUrl = encodeURIComponent(userDetails);
      var Wlink = "https://api.whatsapp.com/send?text=";
      var finallink = Wlink + encodedUrl;
      document.getElementById("whatsapp_share_btn").href = finallink;

      /*fb share button script*/
      $("#facebook_share_btn").on("click", function () {
        var userDetails = window.location.href;
        var encodedUrl = encodeURIComponent(userDetails);
        const navUrl =
          "https://www.facebook.com/sharer/sharer.php?u=" + encodedUrl;
        window.open(navUrl, "_blank");
      });

      $(document).ready(function () {
        var mailtext = "mailto:?subject=";
        var subject = "360inc.com";
        var bodytext = "&body=";
        var body = window.location.href;
        var finalmail = mailtext + subject + bodytext + body;
        document.getElementById("email_share_btn").href = finalmail;
      });
      
      var userAgent = navigator.userAgent;

        // Check if the user agent contains "iPhone"
        if (userAgent.includes("iPhone")) {
        } else {
          $(".applewallet").addClass("d-none");
        }

      function saveCard() {
        var firstName = $("#firstName").text();
        var encodedFirstName = punycode.toASCII(firstName);
        var decodedFirstName = punycode.toUnicode(encodedFirstName);
        var lastName = $("#lastName").text();
        var encodedLastName = punycode.toASCII(lastName);
        var decodedLastName = punycode.toUnicode(encodedLastName);
        var email = $("#email").text();
        // var phoneold = $("#mobile").text();
        // var phone = phoneold.replace('+', ''); // Remove the plus sign
        var phone = $("#mobile").text();
        var phone2 = $("#telephone").text();
        var website = $("#website").text();
        var address = $("#location").text();
        var encodedAddress = punycode.toASCII(address);
        var decodedAddress = punycode.toUnicode(encodedAddress);
        var company = $("#company").text();
        var encodedCompany = punycode.toASCII(company);
        var decodedCompany = punycode.toUnicode(encodedCompany);
        var position = $("#position").text();
        var encodedPosition = punycode.toASCII(position);
        var decodedPosition = punycode.toUnicode(encodedPosition);
        var note = $("#note").text();
        //  var note = encodeURIComponent($("#note").text());
        var avatar_url = document.querySelectorAll("#avatar")[0].src;
        var twitterLink = $("#twitter").attr("href");
        var fbLink = $("#facebook").attr("href");
        var instaLink = $("#insta").attr("href");
        var linkedinLink = $("#linkedIn").attr("href");
        var snapchatLink = $("#snapchat").attr("href");
        fetch(avatar_url)
          .then((response) => response.blob())
          .then((blob) => {
            const reader = new FileReader();
            reader.onloadend = () => {
              const base64Data = reader.result.split(",")[1];
              // Build the VCard text
              var vcard = "BEGIN:VCARD\n";
              vcard += "VERSION:3.0\n";
              vcard += "N:" + lastName + ";" + firstName + ";;;\n"; // separate the first name and last name with a semicolon
              vcard += "PHOTO;TYPE=JPEG;ENCODING=b:" + base64Data + "\n";
              vcard += "EMAIL;INTERNET:" + email + "\n";
              vcard += "TEL;CELL:" + phone + "\n";
              vcard += "TEL;CELL:" + phone2 + "\n";
              // vcard += "ORG;CHARSET=UTF-8:" + encodeURIComponent(company) + "\n"; // add company, encode in UTF-8
              // vcard += "TITLE;CHARSET=UTF-8:" + encodeURIComponent(position) + "\n"; // add position, encode in UTF-8
              vcard +=
                "ORG;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" + company + "\n"; // add company
              vcard +=
                "TITLE;CHARSET=UTF-8;ENCODING=QUOTED-PRINTABLE:" +
                position +
                "\n"; // add position

              if (fbLink && fbLink.length >= 6) {
                vcard += "X-SOCIALPROFILE;type=facebook:" + fbLink + "\n"; // add Facebook link
              }
              if (twitterLink && twitterLink.length >= 6) {
                vcard += "X-SOCIALPROFILE;type=twitter:" + twitterLink + "\n"; // add twitter link
              }
              if (instaLink && instaLink.length >= 6) {
                vcard += "X-SOCIALPROFILE;type=instagram:" + instaLink + "\n"; // add Instagram link
              }
              if (linkedinLink && linkedinLink.length >= 6) {
                vcard += "X-SOCIALPROFILE;type=linkedin:" + linkedinLink + "\n"; // add LinkedIn link
              }
              if (snapchatLink && snapchatLink.length >= 6) {
                vcard += "X-SOCIALPROFILE;type=snapchat:" + snapchatLink + "\n"; // add snapchat link
              }

              vcard += "NOTE:" + note + "\n"; // add note
              vcard += "URL:" + website + "\n";
              vcard += "ADR;CHARSET=UTF-8:;;;" + decodedAddress + ";;;;\n";
                vcard += "LABEL;CHARSET=UTF-8:;;;" + decodedAddress + ";;;;\n"; // Set ADR title to "address" using LABEL
              vcard += "END:VCARD";

              const vcardBlob = new Blob([vcard], {
                type: "text/vcard;charset=utf-8",
              });
              const link = document.createElement("a");
              link.href = URL.createObjectURL(vcardBlob);
              link.setAttribute("download", firstName + ".vcf");
              link.click();
            };
            reader.readAsDataURL(blob);
          })
          .catch((error) => {
            console.error("Error fetching image:", error);
            fetch("avatar.jpg")
              .then((response) => response.arrayBuffer())
              .then((buffer) => {
                const base64Data = btoa(
                  String.fromCharCode(...new Uint8Array(buffer))
                );
                // console.log("Sucess:", `${base64Data}`);
                // Build the VCard text
                var vcard = "BEGIN:VCARD\n";
                vcard += "VERSION:2.1\n";
                vcard +=
                  "N;CHARSET=UTF-8:" +
                  decodedLastName +
                  ";" +
                  decodedFirstName +
                  ";;;\n";
                vcard += "PHOTO;TYPE=JPEG;ENCODING=b:" + base64Data + "\n";
                vcard += "EMAIL;EMAIL:" + email + "\n";
                vcard += "TEL;CELL:" + phone + "\n";
                vcard += "TEL;HOME:" + phone2 + "\n";
                vcard +=
                  "ORG;CHARSET=UTF-8;ENCODING=b:" + decodedCompany + "\n";
                vcard +=
                  "TITLE;CHARSET=UTF-8;ENCODING=b:" + decodedPosition + "\n";
                vcard += "X-SOCIALPROFILE;TYPE=facebook:" + fbLink + "\n"; // add Facebook link
                vcard += "X-SOCIALPROFILE;TYPE=twitter:" + twitterLink + "\n"; // add twitter link
                vcard += "X-SOCIALPROFILE;TYPE=instagram:" + instaLink + "\n"; // add Instagram link
                vcard += "X-SOCIALPROFILE;TYPE=linkedin:" + linkedinLink + "\n"; // add LinkedIn link
                vcard += "X-SOCIALPROFILE;TYPE=snapchat:" + snapchatLink + "\n"; // add snapchat link
                vcard += "NOTE:" + note + "\n"; // add note
                vcard += "URL:" + website + "\n";

                // vcard += "ADR;CHARSET=UTF-8;TYPE=Address:;;;" + decodedAddress + ";;;;\n"; // Set ADR title to "address"

                vcard += "ADR;CHARSET=UTF-8:;;;" + decodedAddress + ";;;;\n";
                vcard += "LABEL;CHARSET=UTF-8:;;;" + decodedAddress + ";;;;\n"; // Set ADR title to "address" using LABEL

                vcard += "END:VCARD";
                // Download the VCard file
                var blob = new Blob([vcard], {
                  type: "text/x-vcard;charset=utf-8",
                });
                var link = document.createElement("a");
                link.download = firstName + ".vcf";
                link.href = window.URL.createObjectURL(blob);
                link.click();
              });
          });
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/punycode/punycode.js"></script>
  </body>
</html>
