{{-- @if (session('warning'))

{{ session('warning') }}

@endif --}}
<script>
  // iziToast.show({
  //   title: 'Hey',
  //   message: 'What would you like to add?'
  // });

//   iziToast.info({
//     title: 'OK',
//     message: 'Successfully inserted record!',
//   });

 // settings関数で初期設定 全体に適応させたい場合
  iziToast.settings({
    timeout: 3000, // default timeout
    resetOnHover: true,
    // icon: '', // icon class
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
    position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
    onOpen: function () {
      console.log('callback abriu!');
    },
    onClose: function () {
      console.log("callback fechou!");
    }
  });
  // iziToast.info({position: "center", title: 'Hello', message: 'iziToast.info()'});
  iziToast.success({timeout: 0, icon: 'fa fa-check', title: 'OK', message: 'iziToast.sucess() with custom icon!'});
  // iziToast.warning({position: "bottomLeft", title: 'Caution', message: '日本語環境のテスト'});
  // iziToast.error({title: 'Error', message: 'Illegal operation'});

  // iziToast.show({
  //   color: 'dark',
  //   icon: 'fa fa-user',
  //   title: 'Hey',
  //   message: 'Custom Toast!',
  //   position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
  //   progressBarColor: 'rgb(0, 255, 184)',
  //   buttons: [
  //     [
  //       '<button>Ok</button>',
  //       function (instance, toast) {
  //         alert("Hello world!");
  //       }
  //     ],
  //     [
  //       '<button>Close</button>',
  //       function (instance, toast) {
  //         instance.hide({
  //           transitionOut: 'fadeOutUp'
  //         }, toast);
  //       }
  //     ]
  //   ]
  // });

  // iziToast.error({
  //   title: 'Errorカラー',
  //   message: 'iziToast.error()'
  // });




</script>